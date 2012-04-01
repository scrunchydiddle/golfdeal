dojo.provide("GD.Form.SpecialDeal");
dojo.require('GD.Form');
dojo.require('dijit.form.Select');
dojo.require('dijit.form.SimpleTextArea');
dojo.require('dijit.form.Button');
dojo.require('dijit.form.DateTextBox');
dojo.require('dijit.form.TimeTextBox');

GD.Form.SpecialDeal = new GD.Form({
	title:'Add new deal',
	items:[
		new dijit.form.Select({
			name: 'golf_course_id',
			label: 'Golf Course : ',
			style:{
				width:'100px'
			},
			options: dojo.map(GD.Stash.courses,function(item){
				return {
					label: item.name,
					value: item.id
				};
			}),
			onChange: function(id){
				dojo.xhrGet({
					url:'golfCourse/viewDeals/'+id,
					handleAs: 'json',
					load:function(resp){
						var opt = dojo.map(resp.data,function(dt){
							return {
								label: dt.description,
								value: dt.deal_id
							};
						});
						var sel = GD.Form.SpecialDeal.getItem('deal_id');
						sel.set('options',opt);
						sel._loadChildren();
						sel.setDisabled(false);
					}
				});
			}
		}),
		new dijit.form.Select({
			name: 'deal_id',
			label: 'Packages : ',
			style:{
				width:'100px'
			},
			disabled: true,
			options: [],
			postCreate: function(){
				dijit.form.Select.prototype.postCreate.call(this,arguments);
				var me = this;
				dojo.xhrGet({
					url:'golfCourse/viewDeals/1',
					handleAs: 'json',
					load:function(resp){
						var opt = dojo.map(resp.data,function(dt){
							return {
								label: dt.description,
								value: dt.deal_id
							};
						});
						
						me.set('options',opt);
						me._loadChildren();
						me.setDisabled(false);
					}
				});
			}
		}),
		new dijit.form.DateTextBox({
			name: 'deal_date',
			label: 'Date :',
			value: new Date(),
			constraints:{
				 datePattern:'dd MMMM yyyy',
			}
		}),
		new dijit.form.TimeTextBox({
			name: 'tee_time',
			label: 'Tee Time :',
			value: new Date(0),
			constraints:{
				timePattern:'HH:mm:ss',
				clickableIncrement:'T01:00:00', 
				visibleIncrement:'T01:00:00', 
				visibleRange:'T04:00:00'
			}
		}),
		new dijit.form.TextBox({
			name: 'price',
			label: 'Offer Price :'
		}),
		new dijit.form.Select({
			name: 'limit',
			label: 'Limit ',
			style:{
				width:'50px'
			},
			options:[{
				label:2,
				value:2
			},{
				label:3,
				value:3
			},{
				label:4,
				value:4
			}]
		})
	],
	formButtons:[
		new dijit.form.Button({
			label: 'Submit',
			getTimeFromDate: function(dateObj){
				return dojo.date.locale.format(dateObj,{selector:'time',timePattern:"HH:mm:ss"});
			},
			getDateFromDate: function(dateObj){
				return dojo.date.locale.format(dateObj,{selector:'time',timePattern:"yyyy-MM-dd"});
			},
			onClick: function(){
				GD.Form.SpecialDeal.mask.show();
				var postContent = dojo.mixin(GD.Form.SpecialDeal.getValues(),{
					ajax: true
				});
				postContent.tee_time = this.getTimeFromDate(postContent.tee_time);
				postContent.deal_date = this.getDateFromDate(postContent.deal_date);
				console.log(postContent);
				dojo.xhrPost({
					url:'specialDeal/create',
					content: postContent,
					load:function(){
						GD.Form.SpecialDeal.mask.hide();
					}
				});
				// GD.Form.SpecialDeal.mask.hide();
			}
		})
	]
});



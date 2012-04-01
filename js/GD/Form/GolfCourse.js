dojo.provide("GD.Form.GolfCourse");
dojo.require('GD.Form');
dojo.require('dijit.form.TextBox');
dojo.require('dijit.form.Select');
dojo.require('dijit.form.TimeTextBox');
dojo.require('dijit.form.SimpleTextArea');
dojo.require('dijit.form.Button');

GD.Form.GolfCourse = new GD.Form({
	title:'Register new Golf Course',
	
	items:[
		new dijit.form.TextBox({
			name: 'name',
			label:'Name :'
		}),
		new dijit.form.Select({
			name: 'state',
			label: 'State: ',
			style:{
				width:'100px'
			},
			options: dojo.map(GD.Stash.states,function(item){
				return {
					label: item.name,
					value: item.id
				};
			})
		}),
		new dijit.form.TimeTextBox({
			name: 'start_time',
			label: 'Opening Time :',
			value: new Date(0),
			clickableIncrement:'T00:15:00', 
			visibleIncrement:'T00:15:00', 
			visibleRange:'T01:00:00'
		}),
		new dijit.form.TimeTextBox({
			name: 'end_time',
			label: 'Closing Time :',
			value: new Date(0),
			clickableIncrement:'T00:15:00', 
			visibleIncrement:'T00:15:00', 
			visibleRange:'T01:00:00'
		}),
		new dijit.form.TextBox({
			name: 'real_price',
			label: 'Walk in Price :'
		}),
		new dijit.form.SimpleTextarea({
			name:'description',
			label:'Description',
			rows:5,
			style: {
				width:'300px',
			}
		}),
		
	],
	formButtons:[
		new dijit.form.Button({
			label: 'Submit',
			getTimeFromDate: function(dateObj){
				return dojo.date.locale.format(dateObj,{selector:'time',timePattern:"HH:mm:ss"});
			},
			onClick: function(){
				GD.Form.GolfCourse.mask.show();
				var postContent = dojo.mixin(GD.Form.GolfCourse.getValues(),{
					ajax: true
				});
				
				postContent.start_time = this.getTimeFromDate(postContent.start_time);
				postContent.end_time = this.getTimeFromDate(postContent.end_time);

				dojo.xhrPost({
					url:'golfCourse/create',
					content: postContent,
					load: function(){
						GD.Form.GolfCourse.mask.hide();
					}
				});
			}
		})
	]
});



dojo.provide("GD.Form.Deal");
dojo.require('GD.Form');
dojo.require('dijit.form.Select');
dojo.require('dijit.form.SimpleTextArea');
dojo.require('dijit.form.Button');

GD.Form.Deal = new GD.Form({
	title:'Add new deal package for Golf Course',
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
			})
		}),
		new dijit.form.SimpleTextarea({
			name:'description',
			label:'Description : ',
			rows:5,
			style: {
				width:'300px',
			}
		}),
		
	],
	formButtons:[
		new dijit.form.Button({
			label: 'Submit',
			onClick: function(){
				GD.Form.Deal.mask.show();
				var postContent = dojo.mixin(GD.Form.Deal.getValues(),{
					ajax: true
				});
				console.log(postContent);
				dojo.xhrPost({
					url:'deal/create',
					content: postContent,
					load:function(){
						GD.Form.Deal.mask.hide();
					}
				});
			}
		})
	]
});



dojo.provide("GD.Form.GolfCourse");
dojo.require('dijit.form.Form');
dojo.require('dijit.form.TextBox');
dojo.require('dijit.form.Select');
dojo.require('dijit.form.TimeTextBox');
dojo.require('dijit.form.TextArea');

GD.Form.GolfCourse = new dijit.form.Form();
var title = dojo.create('div').appendChild(dojo.doc.createTextNode("Add new Golf Course"));
GD.Form.GolfCourse.domNode.appendChild(title);

dojo.xhrGet({
	url:'states/list',
	handleAs:"json",
	load:function(data){
		var nameTb = new dijit.form.TextBox({
			name: 'name'
		});
		var tb = dojo.create('div');
		tb.appendChild(dojo.doc.createTextNode("Name "));
		tb.appendChild(nameTb.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(tb);

		var statesSel = new dijit.form.Select({
			name: 'states',
			style:{width:100},
			
			options: dojo.map(data.data,function(item){
				return {
					label: item.name,
					value: item.id
				}
			})
		});

		var sel = dojo.create('div');
		sel.appendChild(dojo.doc.createTextNode("States "));
		sel.appendChild(statesSel.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(sel);
		
		var startTime = new dijit.form.TimeTextBox({
			name: 'start',
			value: new Date(),
			clickableIncrement:'T00:15:00', 
			visibleIncrement:'T00:15:00', 
			visibleRange:'T01:00:00'
		});
		
		var strtLabel = dojo.create('div');
		strtLabel.appendChild(dojo.doc.createTextNode("Opening Time "));
		strtLabel.appendChild(startTime.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(strtLabel);
		
		var endTime = new dijit.form.TimeTextBox({
			name: 'end',
			value: new Date(),
			clickableIncrement:'T00:15:00', 
			visibleIncrement:'T00:15:00', 
			visibleRange:'T01:00:00'
		});
		
		var endLabel = dojo.create('div');
		endLabel.appendChild(dojo.doc.createTextNode("Closing Time "));
		endLabel.appendChild(endTime.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(endLabel);
		
		var realPrice = new dijit.form.TextBox({
			name: 'realPrice'
		});
		var rp = dojo.create('div');
		rp.appendChild(dojo.doc.createTextNode("Real Price "));
		rp.appendChild(realPrice.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(rp);
		
		var description = new dijit.form.Textarea({
			name:'description',
			label:'description'
		});
		
		var desc = dojo.create('div');
		desc.appendChild(dojo.doc.createTextNode("Description "));
		desc.appendChild(description.domNode);
		
		GD.Form.GolfCourse.domNode.appendChild(desc);
	
	}
});


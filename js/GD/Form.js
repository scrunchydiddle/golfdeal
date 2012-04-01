dojo.provide("GD.Form");
dojo.require('dijit.form.Form');
dojo.require("dojox.layout.TableContainer");
dojo.require("dojox.widget.Standby");

GD.Form = function(config){
	this.tableConfig = {
		colspan: 2
	};
	
	dojo.mixin(this,config);

	this.widgetTable = new dojox.layout.TableContainer(this.tableConfig);
	dojo.forEach( config.items , function( item ){
		this.widgetTable.addChild(item);
	},this);
	this.widgetTable.startup();
	
	var form = new dijit.form.Form();
	if(this.title){
		var title = dojo.create('h1');
		title.appendChild(dojo.doc.createTextNode(this.title));
		form.domNode.appendChild(title);
	}
	
	var tb = dojo.create('div');
	form.domNode.appendChild(this.widgetTable.domNode);

	if(this.formButtons){	
		this.btnToolbar = dojo.create('div');
		this.btnToolbar.buttons = this.formButtons;
		dojo.forEach(this.formButtons,function(btn){
			this.btnToolbar.appendChild(btn.domNode);
		},this);
		form.domNode.appendChild(this.btnToolbar);
	}

	dojo.mixin(this,form);
	
	var mask = new dojox.widget.Standby({
		target: form.domNode
	});
	
	document.body.appendChild(mask.domNode);
	mask.startup();
	
	this.mask = mask;
};

GD.Form.prototype.setValue = function(valueObj){
	dojo.forEach(this.items, function(item){
		if(dojo.isFunction(item.setValue) && valueObj[item.name]){
			item.setValue(valueObj[item.name]);
		}
	});
};

GD.Form.prototype.getItem = function(name){
	var widget;
	dojo.some(this.items,function(item){
		widget = item;
		return item.get('name') == name;
	});
	return widget;
};
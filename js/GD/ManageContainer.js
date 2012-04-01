dojo.provide("GD.ManageContainer");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.layout.ContentPane");
dojo.require("dojo.data.ItemFileReadStore");
dojo.require("dijit.Tree");

GD.ManageContainer = new dijit.layout.BorderContainer({
	id:'manageContainer',
	style:{
		width:'100%',
		height:'100%'
	}
});

dojo.subscribe('golfcourse.click',function(item){
	item.action[0]();
});
dojo.require("dojo.data.ItemFileReadStore");
var store = new dojo.data.ItemFileReadStore({
    data: {
		label: "name",
		identifier: "name",
		//items: dojo.clone(GD.Stash.courses)
		items: [{ 
			name: 'Add new Golf Course',
			action: function(){
				GD.Form.GolfCourse.domNode.hidden = false;
				GD.Form.Deal.domNode.hidden = true;
				GD.Form.SpecialDeal.domNode.hidden = true;
			}
		}, { 
			name: 'Add new Golf Course Package',
			action: function(){
				GD.Form.GolfCourse.domNode.hidden = true;
				GD.Form.Deal.domNode.hidden = false;
				GD.Form.SpecialDeal.domNode.hidden = true;
			}
		},{ 
			name: 'Add new deals for Package',
			action: function(){
				GD.Form.GolfCourse.domNode.hidden = true;
				GD.Form.Deal.domNode.hidden = true;
				GD.Form.SpecialDeal.domNode.hidden = false;
			} 
			
		}],
	}
});

var treeModel = new dijit.tree.ForestStoreModel({
	store: store,
	//query: {"name": "Selangor"},
	rootId: "root",
	rootLabel: "Actions",

});

var left = new dijit.Tree({ 
	region:'left',
	model: treeModel,
	//getIconClass : function(){},
	showRoot: false,
});

dojo.connect(left,'onClick',function(item){
	dojo.publish('golfcourse.click',[item]);
});

GD.ManageContainer.addChild(left);

var center = new dijit.layout.ContentPane({
	region:'center'
});
dojo.require("GD.Form.GolfCourse");
GD.Form.GolfCourse.placeAt(center.containerNode);

dojo.require("GD.Form.Deal");
GD.Form.Deal.placeAt(center.containerNode);
GD.Form.Deal.domNode.hidden = true;

dojo.require("GD.Form.SpecialDeal");
GD.Form.SpecialDeal.placeAt(center.containerNode);
GD.Form.SpecialDeal.domNode.hidden = true;

GD.ManageContainer.addChild(center);

dojo.provide("GD.ManageContainer");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.layout.ContentPane");
dojo.require("dojo.data.ItemFileReadStore");
dojo.require("dijit.Tree");

GD.ManageContainer = new dijit.layout.BorderContainer({
	style:{
		width:'100%',
		height:'100%'
	}
});
dojo.require("dojo.data.ItemFileReadStore");
var store = new dojo.data.ItemFileReadStore({
    data: {
		label: "name",
		identifier: "name",
		items: GD.Stash.states
	}
});

var treeModel = new dijit.tree.ForestStoreModel({
	store: store,
	//query: {"name": "Selangor"},
	rootId: "root",
	rootLabel: "States",

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
GD.ManageContainer.addChild(center);

dojo.require("dijit.form.Form");
dojo.require("dijit.layout.ContentPane");
dojo.require("dojox.layout.TableContainer");

dojo.provide("GD.TableForm");

dojo.declare("GD.TableForm",dijit.form.Form,{
    
    constructor: function(config){
        dojo.mixin(this,config);
    },
    buildRendering: function(){
        this.inherited(arguments);
        this.table = new dojox.layout.TableContainer(this.tableConfig).placeAt(this.containerNode);
        dojo.forEach(this.items,function(item){
            this.table.addChild(item);
        },this);
        this.table.startup();
    },
    addItem: function(item){
        this.table.addChild(item);
    }

});

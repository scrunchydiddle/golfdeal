define("GD/MatrixTable",[
        "dojo/_base/declare",
        "dojo/_base/array",
        "dojo/_base/window",
        "dijit/_WidgetBase",
        "dojox/dtl/_Templated",
        "dojo/cache",
        "dojo/fx/Toggler",
        "dijit/form/CheckBox",
        "dojox/dtl/tag/logic"
        ],function(declare, array, win, wb, tm, cache, toggler){
            declare("GD.MatrixTable",[wb,tm],{
                title: null,
                titleClass: '',
                target: win.body(),
                rendered: false,
                startTime: 8,
                items:['one','two','three'],
                checkboxes:[],
                minutes:['.00','.05','.10','.15','.20','.25','.30','.35','.40','.45','.50','.55'],
                setItems:function(arr, render){
                    this.items = arr;
                    if(render){
                        this.render();
                    }
                },
                widgetsInTemplate: true,
                hide: function(){ this.toggler.hide(); },
                show: function(){ this.toggler.show(); },
                buildCheckboxes: function(){
                    var me = this;
                    me.checkboxes = [];
                    array.forEach(me.minutes,function(minute, index){
                        me.checkboxes.push(me.startTime + minute);
                    });
                },
                postCreate: function(){
                    this.toggler = toggler({ node: this.domNode });
                    this.buildCheckboxes();
                    var origRender = this.render;

                    //intercept render call
                    this.render = function(){
                        if(!this.rendered){
                            this.placeAt(this.target);
                            this.rendered = true;
                        }
                        this.buildCheckboxes();
                        origRender.call(this);
                    };
                },
                templateString:cache("GD","templates/MatrixTable.html")
            });
        });

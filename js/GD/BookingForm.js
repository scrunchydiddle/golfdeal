define("GD/BookingForm", [
        "dojo/_base/declare", 
        "dojo/_base/array", 
        "dojo/cache", 
        "dijit/_WidgetBase", 
        "dojox/dtl/_Templated", 
        "dijit/form/Button", 
        "dijit/form/Select",
		"dijit/form/TextBox",		
        "dojox/dtl/tag/logic"
        ], 
        function(declare, array, cache, wb, tm) {
	declare("GD.BookingForm", [wb, tm], {
		constructor: function(){
			var date = new Date();
			
			this.years = [];
			var counter = 0;
			while (this.years.length != 12 ){
				var year = String(date.getFullYear() + counter).substring(2,4);
				counter++;
				this.years.push(year);	
			}
		},
		months: [ 1,2,3,4,5,6,7,8,9,10,11,12 ],
		title: null,
		titleClass: '',
		golfCourse: '',
		dealType: '',
		date: '',
		teetime: [],
		cctype: [ 'Visa','MasterCard'],
        disabled: true,
		templateString: cache("GD", "templates/BookingForm.html"),
		widgetsInTemplate: true,
        resetTeeTime: function(){
            this.teetime.length = 0;
        },
        formParams:[
            'golfCourse',
        ],
        myself: this,
		postCreate: function() {
			var origPush = this.teetime.push;
			this.teetime.push = function(item) {
				var index = array.indexOf(this, item);
				if (index === - 1) {
					origPush.call(this, item);
                    this.sort();
				} else {
					this.splice(index, 1);
				}
			};

            var origRender = this.render;
            this.render = function(){
                this.validate();
                origRender.call(this);
            };
		},
		validate: function() {
			if (!this.golfCourse) {
                this.disabled = true;
				return false;
			} else if (!this.dealType) {
                this.disabled = true;
				return false;
			} else if (!this.date){
                this.disabled = true;
				return false;
            } else if (this.teetime.length === 0) {
                this.disabled = true;
				return false;
            } else {
                this.disabled = false;
                return true;
            }
		}
	});
});


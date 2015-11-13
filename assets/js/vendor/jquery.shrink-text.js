/*!
 * jQuery Shrink Text
 * Copyright (c) 2015 Benjamin Allison - me<a>benjaminallison<d>com | http://benjaminallison.com
 * Licensed under MIT
 * @projectDescription Shrinks a single line text element to fit within broswer width. Alternitively, specify a parent element.
 * @author Benjamin Allison
 * @version 1.0.0
 *
 * Basic Usage:
 * $("h1").shinkToFit();
 * 
 * Specify container to base constrain on:
 * $("h1").shinkToFit( $("wrap") );
 * 
 * PRO TIP!
 * In your CSS, ensure the element you're targeting has the following properties:
 *
 *      display: block;
 *      white-space: nowrap;
 *
 * Doing so will ensure all rext remains on one line. Otherwise, text might wrap,
 * giving unpredictable results.
 *
 * Widths are based on outerWidth. Keep that in mind when applying margin and padding!
 *
 */

(function(window, $){
	var Plugin = function(elem, container){
		this.elem = elem;
		this.$elem = $(elem);
		this.$container = typeof container !== 'undefined' ? container : $(window);
	};

	Plugin.prototype = {
		init: function() {
			var self = this;
			$(window).bind("load", function(){
				self.$elem.css("font-size", "");
				self.resizeText();
			});
			$(window).on("resize", function(){
				self.$elem.css("font-size", "");
				self.resizeText();
			});
			return self;
		},
		resizeText: function() {
			var self = this;
			if ( self.$elem.outerWidth() > self.$container.outerWidth() ) {
				var fontSize = self.$elem.css("font-size").replace(/[^-\d\.]/g, '');
				self.$elem.css("font-size", fontSize-1 + "px");
				self.resizeText();
			}
		}
	};

	$.fn.shinkToFit = function(container) {
		return this.each(function() {
			new Plugin(this, container).init();
		});
	};

	window.Plugin = Plugin;
})(window, jQuery);
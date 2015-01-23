/*!
 * jQuery Simple Centred parallax
 * Copyright (c) 2015 Benjamin Allison - me<a>benjaminallison<d>com | http://benjaminallison.com
 * Licensed under MIT
 * @projectDescription Simple, subtle parallax on the hero image, which tries to keep image vertically centred as much as possible!. The standard jQuery parallax plugin aligns the top, making the image not centred.
 * @author Benjamin Allison
 * @version 1.0.0
 */

(function(window, $){
	var Plugin = function(elem, breakPoint){
		this.elem = elem;
		this.$elem = $(elem);
		this.heroWidth = 0;
		this.heroHeight = 0;
		this.heroRatio = 0;
		this.bgTrueWidth = 0;
		this.bgTrueHeight = 0;
		this.trueRatio = 0;
		this.heroBgScale = 0;
		this.breakPoint = breakPoint;
	};

	Plugin.prototype = {
		init: function() {
			this.bgImageDimensions();
			return this;
		},
		convertToRange: function(input, inLo, inHi, outLo, outHi) {
			return ((input - inLo) / (inHi - inLo)) * (outHi - outLo) + outLo;
		},
		bgImageDimensions: function() {
			var image_url = this.$elem.css('background-image'),
				image;

			// Remove url() or in case of Chrome url("")
			image_url = image_url.match(/^url\("?(.+?)"?\)$/);

			if (image_url[1]) {
				image_url = image_url[1];
				image = new Image();
				// just in case it is not already loaded
				var self = this;
				$(image).load(function () {
					self.bgTrueWidth = image.width;
					self.bgTrueHeight = image.height;
					// once loaded, do parallax
					self.doParallax();
				});
				image.src = image_url;
			}
		},
		calcVars: function () {
			var self = this;
			var scrollPos = $(window).scrollTop();
			this.heroWidth = this.$elem.outerWidth();
			this.heroHeight = this.$elem.outerHeight();
			// this.heroRatio = this.heroWidth/this.heroHeight;
			// this.trueRatio = this.bgTrueWidth/this.bgTrueHeight;
			// this.heroBgScale = this.heroHeight + 100;
			// var bgPos = this.convertToRange(scrollPos, 1, this.heroHeight, 1, 200);
			console.log(this.bgTrueHeight +"/"+ this.heroHeight);
			var positionOffset = (this.bgTrueHeight - this.heroHeight) / 2;
			var bgPos =  positionOffset - (scrollPos/2);
			this.$elem.css({backgroundPosition: "50% " + -bgPos + "px"});
		},
		doParallax: function() {
			this.calcVars();
			// if the window is larger than the breakpoint, run it!
			if ( $(window).outerWidth() > this.breakPoint ) {
				this.calcVars();
				var self = this;
				$(window).on("resize", function(){
					self.calcVars();
					//if ( self.trueRatio < self.heroRatio ) {
					//	self.$elem.removeClass("bg-tall");
					//	self.$elem.addClass("bg-wide");
					//} else {
					//	self.$elem.removeClass("bg-wide");
					//	self.$elem.addClass("bg-tall");
					//}
				});
				$(window).on("scroll", function() {
					self.calcVars();
				});
			} else {
				this.$elem.removeClass("bg-tall");
				this.$elem.removeClass("bg-wide");
				this.$elem.css({backgroundPosition: ""});
			}
		}
	};

	$.fn.centredParallax = function(options) {
		return this.each(function() {
			new Plugin(this, options).init();
		});
	};

	window.Plugin = Plugin;
})(window, jQuery);
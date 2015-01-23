/*!
 * jQuery Simple Parallax
 * Copyright (c) 2015 Benjamin Allison - me<a>benjaminallison<d>com | http://benjaminallison.com
 * Licensed under MIT
 * @projectDescription Simple, subtle parallax on the hero image, which tries to keep image vertically centred as much as possible!. The standard jQuery parallax plugin aligns the top, making the image not centred.
 * @author Benjamin Allison
 * @version 1.0.0
 */

/*
For best results, apply to a <figure> which has the background image set to cover/center

<figure class="parallax" style="background-image: url('bg.jpg') cover center;"></figure>

*/

(function(window, $){
	var Plugin = function(elem, rate, breakPoint){
		this.elem = elem;
		this.$elem = $(elem);
		this.rate = rate;
		this.breakPoint = breakPoint;
	};

	Plugin.prototype = {
		init: function() {
			this.doParallax();
			return this;
		},
		doParallax: function() {
			var self = this;
			$(window).on("scroll", function() {
				var val = ($(window).scrollTop() * self.rate);
				self.$elem.css({
					"-webkit-transform":"translateY("+val+"px)",
					"-ms-transform":"translateY("+val+"px)",
					"transform":"translateY("+val+"px)"
				});
			});
		}
	};

	$.fn.simpleParallax = function(options) {
		return this.each(function() {
			new Plugin(this, options).init();
		});
	};

	window.Plugin = Plugin;
})(window, jQuery);
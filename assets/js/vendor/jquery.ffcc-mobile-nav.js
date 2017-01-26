/*!
 * jQuery FFCC Mobile Nav
 * Copyright (c) 2015 Benjamin Allison - me<a>benjaminallison<d>com | http://benjaminallison.com
 * Licensed under MIT
 * @projectDescription Simple mobile nav plugin, intended for use with Wordpress's wp_nav structure. Relies on external CSS for animation and appearance.
 * @author Benjamin Allison
 * @version 0.1
 *
 * BASIC USAGE
	$("#nav").ffccMobile({
		button: "#nav_toggle"
	});
 * 
 * The above takes your navigation wrapper, and establishes a connection to your nav toggle button
 *
 * OPTIONS
 *    button – Befines the associated toggle button.
 *    breakPoint – Sets the mobile break point (in pixels). Default: 800.
 *    closeOnResize – If true, nav and toggle .open classes are reset when the browser width increases beyond the breakPoint. Default: true.
 *    openExclusive – If true, closes other menus when this one is activatd. Default: false.
 *
 */

// debouncing function from John Hann
// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
(function($,sr){
	var debounce = function (func, threshold, execAsap) {
		var timeout;
		return function debounced () {
			var obj = this, args = arguments;
			function delayed () {
				if (!execAsap){
					func.apply(obj, args);
					timeout = null;
				}
			}
			if (timeout) {
				clearTimeout(timeout);
			} else if (execAsap){
				func.apply(obj, args);
			}
			timeout = setTimeout(delayed, threshold || 100);
		};
	};
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
})(jQuery,'ffccSmartResize');

(function(window, $){
	var Plugin = function(elem, options){
		this.elem = elem;
		this.$elem = $(elem);
		this.$button = $(options.button);
		this.$openClass = typeof options.openClass !== 'undefined' ? options.openClass : "open";
		this.$breakPoint = typeof options.breakPoint !== 'undefined' ? options.breakPoint : 800;
		this.$closeOnResize = typeof options.closeOnResize !== 'undefined' ? options.closeOnResize : true;
		this.$openExclusive = typeof options.openExclusive !== 'undefined' ? options.openExclusive : false;
	};

	Plugin.prototype = {
		init: function() {
			var self = this;
			self.$elem.addClass("ffcc_menu_wrap");
			self.$button.addClass("ffcc_menu_button");
			self.$button.on("click", function(e){
				e.preventDefault();
				if (self.$openExclusive === true && !self.$button.hasClass(self.$openClass)) {
					$(".ffcc_menu_wrap").removeClass(self.$openClass);
					$(".ffcc_menu_button").removeClass(self.$openClass);
				}
				self.toggleNav();
			});
			$(window).ffccSmartResize(function(){
				if (self.$closeOnResize === true && self.windowDimensions().width >= self.$breakPoint) {
					if (self.$elem.hasClass(self.$openClass) ) {
						self.$button.toggleClass(self.$openClass);
						self.$elem.removeClass(self.$openClass);
						//$(".menu-item.expanded").removeClass("expanded");
					}
				}
			});
			// press escape key to close menu
			$(document).keydown(function(e) {
				if (e.which === 27) {
					e.preventDefault();
					self.closeNav();
				}
			});
			return self;
		},
		// UTILITY TO DETERMINE TRUE BROWSER WIDTH
		windowDimensions: function() {
			var e = window, a = 'inner';
			if (!('innerWidth' in window )) {
				a = 'client';
				e = document.documentElement || document.body;
			}
			return {
				width: e[ a+'Width' ],
				height: e[ a+'Height' ]
			};
		},
		openNav: function() {
			var self = this;
			self.$button.addClass(self.$openClass);
			self.$elem.addClass(self.$openClass);
		},
		closeNav: function() {
			var self = this;
			self.$button.removeClass(self.$openClass);
			self.$elem.removeClass(self.$openClass);
		},
		toggleNav: function() {
			var self = this;
			self.$button.toggleClass(self.$openClass);
			self.$elem.toggleClass(self.$openClass);
		}
	};

	$.fn.ffccMobile = function(options) {
		return this.each(function() {
			new Plugin(this, options).init();
		});
	};
})(window, jQuery);

/*

BASIC STYLES: NAV TOGGLE

.nav_toggle {
	background: transparent;
	display: none;
	height: 48px;
	outline: none;
	left: 0;
	padding: 0;
	position: absolute;
	top: 0em;
	width: 54px;
	&:focus {
		outline: none;
	}
	&:hover {
	}
	&.open {
		background: $brown;
		.toggle_icon_line {
			&.top_line {
				top: 12px;
				@include transform(rotate(45deg));
			}
			&.mid_line {
				left: 50%;
				width: 1px;
			}
			&.bot_line {
				top: 12px;
				@include transform(rotate(-45deg));
			}
		}
	}
}

.toggle_icon {
	left: 12px;
	height: 30px;
	position: absolute;
	width: 30px;
	top: 9px;
}

.toggle_icon_line {
	background: $white;
	display: block;
	width: 30px;
	height: 4px;
	position: absolute;
	left: 0;
	@include transition(all 200ms ease-in-out);
	&.top_line {
		top: 3px;
		@include transform(rotate(0));
	}
	&.mid_line {
		top: 12px;
	}
	&.bot_line {
		top: 21px;
		@include transform(rotate(0));
	}
}

@media screen and (max-width: 800px) {
	.nav_toggle {
		display: block;
	}
}



BASIC STYLES: NAVIGATION WRAP, zoom and fade

.navigation {
	background: rgba(0,0,0,0.75);
	bottom: 0;
	left: 0;
	opacity: 0;
	overflow-y: auto;
	overflow-x: hidden;
	padding: 0;
	position: fixed;
	top: 48px;
	transition: all 0.5s, cubic-bezier(.09,.82,.74,1);
	transform: perspective(500px) translateZ(-60px);
	-webkit-overflow-scrolling: touch;
	visibility: hidden;
	width: 100%;
	z-index: 1;
	.container {
		margin: 0;
		max-width: inherit;
		position: static;
	}
	&.open {
		left: 0;
		opacity: 1;
		transform: perspective(500px) translateZ(0);
		visibility: visible;
	}
}





// NEEDS TO ADD FUNCTION FOR SUBMENUS

//function menuExpandIcon() {
//	if ($.ffccWindowWidth <= 965 && $("li > a > .sub-menu-expand").length < 1) {
//		$(".menu-item-has-children > a").append('<span class="sub-menu-expand"></span>');
//	} else {
//		$(".sub-menu-expand").remove();
//	}
//}
//
//$(".main_menu > .menu-item > a").on("click", function(e){
//	e.preventDefault();
//	$(this).parent().toggleClass("expanded");
//});

*/
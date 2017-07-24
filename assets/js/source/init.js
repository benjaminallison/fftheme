/*global ScrollMagic:true, ScrollScene:true, TweenMax */

jQuery(document).ready(function($) {
	$.windowWidth = 1024;
	$.windowHeight = 768;
	$.mobileBreakPoint = 640;


	function getViewportDimensions() {
		var e = window, a = 'inner';
		if (!('innerWidth' in window )) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		$.windowWidth = e[ a+'Width' ];
		$.windowHeight = e[ a+'Height' ];
	}
	getViewportDimensions();

	//function windowResizeBehaviour() {
	//}

	//if ( $("body").hasClass("desktop-device") ) {
	//	$(".parallax").simpleParallax(0.5, $.mobileBreakPoint);
	//}

	$(window).smartresize(function(){
		getViewportDimensions();
	});

	$(window).load(function() {
		getViewportDimensions();
	});

	$(window).scroll(function () {

	});
});
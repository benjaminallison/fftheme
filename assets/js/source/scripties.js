jQuery(document).ready(function($) {
	window.scrollTo(0, 1);
	$.windowWidth = 34;
	$.windowHeight = null;
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

	function windowResizeBehaviour() {
	}

	$("#nav-toggle").on("click", function(){
		$("#nav-toggle").toggleClass("open");
		$(".mobile-nav").toggleClass("open");
	});

	$(".menu-item-has-children").append('<span class="sub-menu-expand"></span>');

	$(".menu-item-has-children .sub-menu-expand").on("click", function(){
		$(this).parent().toggleClass("expanded");
	});

	if ( $("body").hasClass("desktop-device") ) {
		$(".parallax").simpleParallax(0.5, $.mobileBreakPoint);
	}

	$(document).keydown(function(e) {
		if (e.which === 27) {
			e.preventDefault();
			closeMenu();
			$("nav").animate({ left: "100%" }, 500, "easeInOutExpo");
		}
	});

	$(window).resize(function(){
		getViewportDimensions();
	});

	$(window).load(function() {
		getViewportDimensions();
	});

	$(window).scroll(function () {

	});
});
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

	// mobile menu toggle
	var menuStatus = "closed";

	function openMenu() {
		menuStatus = "open";
		$("body").addClass("no-scroll");
		$(".nav-toggle").addClass("open");
		$("nav").addClass("open");
	}

	function closeMenu() {
		menuStatus = "closed";
		$("body").removeClass("no-scroll");
		$(".nav-toggle").removeClass("open");
		$("nav").removeClass("open");
	}

	$(".nav-toggle").click(function(){
		if (menuStatus === "closed") {
			openMenu();
			$("nav").animate({ left: 0 }, 500, "easeInOutExpo");
		} else {
			closeMenu();
			$("nav").animate({ left: "100%" }, 500, "easeInOutExpo");
		}
	});

	$("#header").centredParallax($.mobileBreakPoint);

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
jQuery(document).ready(function($) {
	window.scrollTo(0, 1);
	$.windowWidth = null;
	$.windowHeight = null;
	$.mobileBreakPoint = 640;

	function convertToRange(input, inLo, inHi, outLo, outHi) {
		return ((input - inLo) / (inHi - inLo)) * (outHi - outLo) + outLo;
	}

	function getViewportDimensions() {
		var e = window, a = 'inner';
		if (!('innerWidth' in window )) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		$.windowWidth = e[ a+'Width' ];
		$.windowHeight = e[ a+'Height' ];
	}

	function windowResizeBehaviour() {
		getViewportDimensions();
		centredParallax();
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

	// simple, subtle parallax on the hero image, which tries to keep image vertically centred as much as possible!
	// the standard jQuery parallax plugin aligns the top, making the image not centred
	function centredParallax() {
		if ( $.windowWidth > $.mobileBreakPoint ) {
			var scrollPos = $(window).scrollTop();
			var heroWidth = $(".centredParallax").outerWidth();
			var heroHeight = $(".centredParallax").outerHeight();
			var heroRatio = heroWidth/heroHeight;
			var bgTrueWidth = $(".centredParallax").data("bgwidth");
			var bgTrueHeight = $(".centredParallax").data("bgheight");
			var trueRatio = bgTrueWidth/bgTrueHeight;
			var heroBgScale = heroHeight + 100;
			var bgPos = convertToRange(scrollPos, 1, heroHeight, 1, 200);
			if ( trueRatio < heroRatio ) {
				$(".centredParallax").removeClass("bg-tall");
				$(".centredParallax").addClass("bg-wide");
				$(".centredParallax").css({backgroundPosition: "50% " + bgPos + "px"});
			} else {
				$(".centredParallax").removeClass("bg-wide");
				$(".centredParallax").addClass("bg-tall");
				$(".centredParallax").css({backgroundPosition: "50% " + bgPos + "px"});
			}
		}
	}

	$(document).keydown(function(e) {
		if (e.which === 27) {
			e.preventDefault();
			closeMenu();
			$("nav").animate({ left: "100%" }, 500, "easeInOutExpo");
		}
	});

	$(window).resize(function(){
		windowResizeBehaviour();
	});

	$(window).load(function() {
		windowResizeBehaviour();
	});

	$(window).scroll(function () {
		centredParallax();
	});

	windowResizeBehaviour();
});
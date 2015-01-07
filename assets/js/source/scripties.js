jQuery(document).ready(function($) {
	window.scrollTo(0, 1);
	$.windowWidth, $.windowHeight;

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
	}

	$(window).resize(function(){
		windowResizeBehaviour();
	});

	$(window).load(function() {
		windowResizeBehaviour();
	});

	windowResizeBehaviour();
});
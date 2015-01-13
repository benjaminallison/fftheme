$.fn.centredParallax = function() {
		var methods = {
			convertToRange : function(input, inLo, inHi, outLo, outHi) {
				return ((input - inLo) / (inHi - inLo)) * (outHi - outLo) + outLo;
			}
		};

		this.each(function(){
			var el = $(this);
			var heroWidth, heroHeight, heroRatio, bgTrueWidth, bgTrueHeight, trueRatio, heroBgScale;
			function calcVars() {
				heroWidth = el.outerWidth();
				heroHeight = el.outerHeight();
				heroRatio = heroWidth/heroHeight;
				bgTrueWidth = el.data("bgwidth");
				bgTrueHeight = el.data("bgheight");
				trueRatio = bgTrueWidth/bgTrueHeight;
				heroBgScale = heroHeight + 100;
			}
			calcVars(el);
			if ( $.windowWidth > $.mobileBreakPoint ) {
				$(window).scroll(function (el) {
					var scrollPos = $(window).scrollTop();
					var bgPos = methods.convertToRange(scrollPos, 1, heroHeight, 1, 200);
					if ( trueRatio < heroRatio ) {
						el.removeClass("bg-tall");
						el.addClass("bg-wide");
						el.css({backgroundPosition: "50% " + bgPos + "px"});
					} else {
						el.removeClass("bg-wide");
						el.addClass("bg-tall");
						el.css({backgroundPosition: "50% " + bgPos + "px"});
					}
				});
			} else {
				// reset bgimage
			}
		});
		return $(this);
	};

	$("#header").centredParallax();
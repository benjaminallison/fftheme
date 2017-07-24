/*global Modernizr */

jQuery(document).ready(function($) {
	if ( !Modernizr.objectfit ) {
		$('.fit_fallback').each(function () {
			var $container = $(this),
				imgUrl = $container.find('.img_to_fit').prop('src');
			if (imgUrl) {
				$container
					.css('backgroundImage', 'url(' + imgUrl + ')')
					.addClass('compat-object-fit');
				$container.find('.img_to_fit').remove();
			}
		});
	}
	var vhFallback = function() {
		if ( !Modernizr.cssvhunit ) {
			$('.vh_fallback').each(function () {
				var vh = $(this).data("vh");
				var newHeight = $.windowHeight * vh/100;
				$(this).height(newHeight);
			});
		}
	};

	$(window).smartresize(function(){
		//vhFallback();
	});

	$(window).load(function() {
		//vhFallback();
	});
});
/*!
 * jQuery Sticky
 * Copyright (c) 2015 Firefly Creative Company
 * Licensed under MIT
 * @projectDescription Simple, plugin to pin items.
 * @author FFCC
 * @version 1.0.0
 */

/*

	$('.myElement').ffccSticky({
		stickyContainer: $('.parent'), (default is .parent())
		pageContent: $('.page_content'),
		footer: $("#footer"),
		topOffset: 30 (default is 0)
	});

*/

(function(window, $){
	var Plugin = function(elem, options){
		this.elem = elem;
		this.$elem = $(elem);
		this.stickyContainer = typeof options.stickyContainer !== 'undefined' ? options.stickyContainer : this.$elem.parent();
		this.$elem.width(this.stickyContainer.width());
		this.pageContent = options.pageContent;
		this.footer = options.footer;
		this.topOffset = typeof options.topOffset !== 'undefined' ? options.topOffset : 0;
		this.stickyAnchor = $('<div class="sticky_anchor"></div>');
		this.stickyContainer.before(this.stickyAnchor);
	};

	Plugin.prototype = {
		init: function() {
			var self = this;
			self.stickyRelocate();
			$(window).resize(function(){
				self.$elem.width(self.stickyContainer.width());
				self.stickyRelocate();
			});
			$(window).scroll(function(){
				self.stickyRelocate();
			});
			return self;
		},
		stickyRelocate: function() {
			var self = this;
			if(self.stickyContainer.length){
				var windowTop = $(window).scrollTop();
				var footerTop = self.footer.offset().top;
				var divTop = self.stickyAnchor.offset().top;
				var divHeight = self.$elem.height();
				// if content is taller than sticky... oh, we're a-stickin
				if( self.pageContent.height() > self.stickyContainer.height() ){
					if (windowTop + divHeight + self.topOffset > footerTop - self.topOffset){ // when footer arrives, unstick
						self.$elem.css({top: (windowTop + divHeight - footerTop + self.topOffset) * -1});
					} else if (windowTop > divTop - self.topOffset) { // if at stick location, stick
						self.$elem.addClass('stickyStuck');
						self.$elem.css({top: self.topOffset});
					} else { // if at stick location, stick
						self.$elem.removeClass('stickyStuck');
					}
				}
			}
		}
	};

	$.fn.ffccSticky = function(options) {
		return this.each(function() {
			new Plugin(this, options).init();
		});
	};
})(window, jQuery);
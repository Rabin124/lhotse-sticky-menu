(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	
	$(window).on('load resize', function(){

		
		var $selector_desk = $(sticky_object.sticky_desktop_menu_selector);

		if( $selector_desk[0] ) {
			var width_desk       = $selector_desk[0].getBoundingClientRect().width;
			var desk_menu_offset = $selector_desk.offset();
			
		}

		 // Desktop
			
			if( ! $(sticky_object.sticky_desktop_menu_selector).length ) {
				console.log('Lhotse Sticky menu: Entered Sticky Element for desktop does not exist, change it in Dashboard / Settings / Lhotse Sticky Menu / Desktop Menu Selector.');
				return;
			}

			$(window).on('scroll', function() {
				
				if( $(window).scrollTop() > desk_menu_offset.top ) {
					
					var adminBarHeight = 0;

					if ($("#wpadminbar")[0]){ // Check if admin bar is enabled.
				  		adminBarHeight = $('#wpadminbar').height();
					}

					if(sticky_object.enable_only_on_home == 0){
						
						$(sticky_object.sticky_desktop_menu_selector).addClass('lhotseSticky');
						$('.lhotseSticky').css('width', width_desk);
						
					}
					else{
						//console.log(sticky_object);
						$('.home ' + sticky_object.sticky_desktop_menu_selector).addClass('lhotseSticky');

					}
				} else {
					$('.lhotseSticky a').removeAttr('style');
					$('.home .lhotseSticky a').removeAttr('style');
					$(sticky_object.sticky_desktop_menu_selector).removeClass('lhotseSticky');
					$(sticky_object.sticky_desktop_menu_selector).removeAttr('style');
					$(sticky_object.sticky__desktop_menu_selector + ' li').removeAttr('style');
					
				}
			});
		}	
	);	
})(jQuery);


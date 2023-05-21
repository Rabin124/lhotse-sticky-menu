jQuery(function ($) {	
	
	// Tabs
	$('.lhotsep_widget_settings .nav-tab-wrapper a').on('click', function (e) {
		e.preventDefault();
		if (!$(this).hasClass('ui-state-active')) {
			$('.nav-tab').removeClass('nav-tab-active');
			$('.wplhotsetab').removeClass('active').fadeOut(0);
			$(this).addClass('nav-tab-active');
			var anchorAttr = $(this).attr('href');
			$(anchorAttr).addClass('active').fadeOut(0).fadeIn(500);
		}
	});
	

	// jQuery Match Height init for sidebar spots
	JQuery(document).ready(function () {
		$(
			'.lhotsep-sidebar-spot .sidebar-spot-inner, .col-2 .lhotsep-lists li, .col-3 .lhotsep-lists li'
		).matchHeight();
	});

	// jQuery UI Tooltip initializaion
	JQuery(document).ready(function () {
		$('.tooltip').tooltip();
	});
});

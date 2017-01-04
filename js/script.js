jQuery(function($){
	// Mobile Menu
	$('#mobile-toggle, #mobile-menu-close').click(function() {
		$('#mobile-menu, #mobile-toggle').toggle();
	});
	
	// Mobile
	$("#mobile-menu .menu li.menu-item-has-children > a").click(function() {
		var parent = $(this).parent();
		
		if (parent.data('status') === 'open')
		{
			// Close it
			parent.removeClass('open');
			parent.data('status', 'closed');
			parent.children('.sub-menu').hide();
		}
		else
		{
			// Open it
			parent.addClass('open');
			parent.data('status', 'open');
			parent.children('.sub-menu').show();
		}

		return false;
	});
	
	// Whole area clickable
	$(".biglink").click(function() {
		window.location = $(this).find("a").attr("href");
		return false;
	});
});
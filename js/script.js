jQuery(function($){
	// Mobile Menu
	$('#mobile-toggle, #mobile-menu-close').click(function() {
		$('#mobile-menu, #mobile-toggle').toggle();
	});
	
	// Whole area clickable
	$(".big-link").click(function() {
		window.location = $(this).find("a").attr("href");
		return false;
	});
});
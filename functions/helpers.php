<?php
	// Helper Functions
	function custom_read_more() {
	    return '...';
	}

	function excerpt($limit, $excerpt = '') {
		if ( ! $excerpt) {
			$excerpt = get_the_excerpt();
		}
		
	    return wp_trim_words($excerpt, $limit, custom_read_more());
	}

	function theme_root() {
		return get_stylesheet_directory_uri();
	}
?>
<?php
	// Helper Functions
	function custom_read_more() {
	    return '...';
	}

	function excerpt($limit) {
	    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
	}
	
	function theme_root() {
		return get_stylesheet_directory_uri();
	}

	/*** Actions ***/
	function action_after_setup_theme(){
		// Theme features
		add_theme_support('post-thumbnails');

		// Image sizes
		// add_image_size('home-splash', 1200, 600, false);
	}
	add_action('after_setup_theme', 'action_after_setup_theme');



	function action_init(){
		// Navs
		register_nav_menu('primary', 'Primary Menu');
		register_nav_menu('utility', 'Utility Menu');
		register_nav_menu('social', 'Social Media Links');

		// Editor styles
		add_editor_style('css/editor-style.css');
	}
	add_action('init', 'action_init');



	function action_widgets_init() {
	    register_sidebar( array(
	        'name' => 'Main Sidebar',
	        'id' => 'sidebar-main',
	        'description' => 'Widgets in this area will be shown on pages.',
	        'before_widget' => '<div id="%1$s" class="widget content %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	    ) );

	    register_sidebar( array(
	        'name' => 'Blog Sidebar',
	        'id' => 'sidebar-blog',
	        'description' => 'Widgets in this area will be shown on posts and in the blog.',
	        'before_widget' => '<div id="%1$s" class="widget content %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	    ) );
	}
	add_action( 'widgets_init', 'action_widgets_init' );



	function action_wp_enqueue_styles(){
		if (is_admin()) return;

		global $wp_styles;
		$theme = get_theme(get_current_theme());

		wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700', $theme['Version']);
		wp_enqueue_style('google-fonts');

		wp_register_style('theme-styles', get_template_directory_uri().'/css/style.css', false, $theme['Version']);
		wp_enqueue_style('theme-styles');
	}
	add_action('wp_enqueue_scripts', 'action_wp_enqueue_styles');



	function action_wp_enqueue_scripts(){
		if (is_admin()) return;

		global $wp_scripts;
		$theme = get_theme(get_current_theme());

		$wp_scripts->registered['jquery']->extra['group'] = 1; //move jquery to footer

		wp_register_script('theme-script', get_template_directory_uri().'/js/script.js', array('jquery'), $theme['Version'], true);
		wp_enqueue_script('theme-script');
	}
	add_action('wp_enqueue_scripts', 'action_wp_enqueue_scripts');
	
	// Formats menu
	function my_mce_before_init_insert_formats( $init_array ) {  
		$style_formats = array(  
			array(
				'title' => 'Big Header',  
				'block' => 'h1'
			),
			array(  
				'title' => 'Header',  
				'block' => 'h2'
			),
			array(
				'title' => 'Paragraph',
				'block' => 'p'
			),
			array(
				'title' => 'Button',
				'block' => 'p',
				'classes' => 'button'
			),
			
		);  

		$init_array['style_formats'] = json_encode( $style_formats );  
	
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
?>
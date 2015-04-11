<?php
	// Callback function to filter the MCE settings
	function my_mce_before_init_insert_formats( $init_array ) {  
		// Define the style_formats array
		$style_formats = array(  
			// Each array child is a format with it's own settings
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
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );  
	
		return $init_array;  
  
	} 
	// Attach callback to 'tiny_mce_before_init' 
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

	require(dirname(__FILE__) . '/functions/configuration.php'); // Config
	require(dirname(__FILE__) . '/functions/plugins.php'); // Plugins
	require(dirname(__FILE__) . '/functions/roles.php'); // Roles
?>
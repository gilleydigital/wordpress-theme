<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo theme_root(); ?>/favicon.ico">

	<title><?php wp_title();?></title>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part('parts/menus/mobile'); ?>
	<div class="header">
	    <div id="mobile-toggle" class="mobile-toggle"><i class="fa fa-bars"></i></div>
		<div class="container">
			<a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo theme_root(); ?>/img/logo.png"></a>
			<?php get_template_part('parts/menus/primary'); ?>
		</div>
	</div>
	<div class="body">
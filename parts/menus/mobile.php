<div class="mobile-menu" id="mobile-menu" >
	<a class="close" id="mobile-menu-close">
		<i class="fa fa-times"></i>
	</a>
	<?php 
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'depth' => 2,
			'container' => 'div',
			'container_class' => 'primary-menu'
		));
	?>
</div>
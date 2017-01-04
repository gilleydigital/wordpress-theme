<?php get_header(); ?>

<div class="body">
	<div class="body-content content">
		<h1>Headline</h1>
		<h2>Test okay</h2>
		<p>Donec sollicitudin molestie malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p>
		<?php
			if (have_posts()):
				while (have_posts()): 
					the_post();
					get_template_part('content', $post->post_type);
				endwhile;
			endif;
		?>
		<div class="map"></div>
	</div>
</div>

<?php get_footer(); ?>
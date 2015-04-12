<?php get_header(); ?>

<div class="container">
	<div class="body-content content">
		<?php get_template_part('parts/blog/back'); ?>

		<h1><?php get_template_part('parts/viewing'); ?></h1>

		<div class="blog-posts">
			<?php
				// The Loop
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part('parts/blog/post');
					}
					
					the_posts_pagination();
				}
				else {
					get_template_part('content', 'none');
				}
				
				// Reset Posts
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
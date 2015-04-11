<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

<div class="container">
	<div class="body-content content">
		<h1><?php get_template_part('parts/viewing'); ?></h1>

		<?php
			if (have_posts()):
				while (have_posts()): 
					the_post();
					get_template_part('parts/blog-post', $post->post_type);
				endwhile;
			endif;
		?>
	</div>
</div>

<?php get_footer(); ?>
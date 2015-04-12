<?php get_header(); ?>

<div class="container">
	<div class="body-content content">
		<?php get_template_part('parts/blog/back'); ?>
		<?php
			if (have_posts()):
				while (have_posts()): 
					the_post();
					get_template_part('parts/blog/post');
				endwhile;
			endif;
		?>
	</div>
</div>

<?php get_footer(); ?>
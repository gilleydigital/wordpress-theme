<?php get_header(); ?>

<div class="body">
	<div class="body-content content">
		<?php
			if (have_posts()):
				while (have_posts()): 
					the_post();
					get_template_part('content', $post->post_type);
				endwhile;
			endif;
		?>
	</div>
</div>

<?php get_footer(); ?>
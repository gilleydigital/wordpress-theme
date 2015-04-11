<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
		
<div class="body-content content container">
	<?php
		if (have_posts()):
			while (have_posts()): 
				the_post();
				get_template_part('content', $post->post_type);
			endwhile;
		endif;
	?>

	<?php
		$args = array(
			'post_type' => 'post',
			'nopaging' => true
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				get_template_part('parts/blog/post');
			}
		}

		// Reset Posts
		wp_reset_postdata();
	?>
</div>

<?php get_footer(); ?>
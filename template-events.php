<?php /* Template Name: Events */ ?>

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

	<div class="blog-posts">
		<?php
			$tonight = time() + (24 * 60 * 60);

			$args = array(
				'post_type' => 'post',
				'nopaging' => true,
				'category_name' => 'upcoming-events',
				'meta_key' => 'datetime',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => 'datetime',
						'compare' => '>=',
						'value' => $tonight,
						'type' => 'NUMERIC'
					)
				)
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					get_template_part('parts/events/event');
				}
			}

			// Reset Posts
			wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>
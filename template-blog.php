<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
		
<div class="container">
	<div class="body-content content">
		<?php
			if (have_posts()):
				while (have_posts()): 
					the_post();
					get_template_part('content', $post->post_type);
				endwhile;
			endif;
			
			wp_reset_postdata();
		?>

		<div class="blog-posts">
			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5
				);

				$args['paged'] = get_query_var( 'paged' ) 
				    ? get_query_var( 'paged' ) 
				    : 1;

				// The Query
				$the_query = new WP_Query( $args );
								
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $the_query;

				// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						get_template_part('parts/blog/post');
					}
					
					the_posts_pagination();
				}
				else {
					get_template_part('content', 'none');
				}
				
				// Reset Posts
				wp_reset_postdata();
				
				// Reset main query object
				$wp_query = NULL;
				$wp_query = $temp_query;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
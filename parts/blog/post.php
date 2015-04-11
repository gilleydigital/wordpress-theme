<?php
	$single = is_single();
	$post_categories = wp_get_post_categories( get_the_ID() );
	$cats = array();
	
	foreach($post_categories as $id){
		$cat = get_category( $id );
	    $link = get_category_link( $id );
		$cats[] = '<a href="'.$link.'">'.$cat->name.'</a>';
	}
?>

<div class="blog-post-wrapper">
	<div class="blog-post">
		<div class="blog-post-image">
			<?php
				if ( has_post_thumbnail() ) {
					if ($single) {
						the_post_thumbnail('medium');						
					}
					else {
						the_post_thumbnail('thumbnail');
					}
				}
			?>
		</div>
		<div class="blog-post-content">
			<?php if ($single): ?>
				<h1 class="blog-post-name"><?php the_title(); ?></h1>
			<?php else: ?>
				<h2 class="blog-post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>
			<h3 class="byline">Author: <?php the_author_posts_link(); ?> | Date: <?php the_time('F jS, Y') ?> | Categories: <?php echo implode(', ', $cats); ?></h3>
			<?php if ( $single ): ?>
				<div class="blog-post-text"><?php the_content(); ?></div>
			<?php else: ?>
				<div class="blog-post-text">
					<p><?php echo excerpt(50); ?></p>
					<p><a href="<?php the_permalink(); ?>" class="button">Read More</a></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
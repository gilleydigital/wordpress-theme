<?php
	$single = is_single();
	$datetime = date('F d, Y \a\t g:i A', get_field('datetime'));
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
			<h3 class="byline"><?php echo $datetime; ?></h3>
			<?php if ( $single ): ?>
				<div class="blog-post-text"><?php the_content(); ?></div>
			<?php else: ?>
				<div class="blog-post-text">
					<p><?php echo excerpt(20); ?></p>
					<p><a href="<?php the_permalink(); ?>" class="button">Read More</a></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
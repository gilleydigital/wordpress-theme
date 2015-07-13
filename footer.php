	</div> <!-- End content -->

	<div class="footer">
		<div class="container">
			<div class="footer-content content">
				<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( $show ); ?></p>
				<?php get_template_part('parts/search-form'); ?>
			</div>
			<?php get_template_part('parts/menus/utility'); ?>
			<?php get_template_part('parts/menus/social'); ?>
		</div>
	</div>
	<?php wp_footer(); ?>
	
</body>
</html>
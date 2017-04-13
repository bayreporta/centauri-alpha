<section class="entry-segment" role="latest-post">
	<h2 class="aligncenter">Latest Post</h2>
	<hr class="fancy-line" />	

	<?php 	
		$args = array(
				'post_type'     	=> array( 'post' ),
				'post_status'   	=> array( 'publish'),
				'category_name' 	=> 'bloggin',
				'cache_results' 	=> true,
				'posts_per_page'	=> 1,
				);
		$query = new WP_Query( $args );
		while ($query->have_posts()) : $query->the_post();?>			
			<?php get_template_part( 'templates/entry/entry' , 'index' ); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<div class="button-container">
		<a href="<?php echo get_site_url(); ?>/recent-posts/"><div class="button">More Posts</div></a>
	</div>	
</section>
<?php /* Template Name: Index */ get_header(); ?>

<!-- Featured image area -->
<?php //get_template_part( 'templates/entry/entry', 'main_image' ) ?>

<main id="content" role="home">

	<!-- Header area -->
	<?php //get_template_part( 'templates/entry/entry', 'service_list' ) ?>

	<!-- Primary Index area -->
	<?php //get_template_part( 'templates/entry/entry', 'primary_index' ) ?>

	<!-- Featured Clips area -->
	<?php //get_template_part( 'templates/entry/entry', 'clips' ) ?>

	<!-- Secondary Index area -->
	<div class="entry-segment" role="sec-index">
		<?php 
			$cat_id = get_field( 'ca_index_query_category' );
			$args = array(
					'post_type'     => array( 'post' ),
					'post_status'   => array( 'publish'),
					//'cat'			=> $cat_id,
					'category_name' => 'bloggin',
					'cache_results' => true
		);
		$query = new WP_Query( $args );
		centalpha_localize_ajax_script( $args );		
		while ($query->have_posts()) : $query->the_post();?>			
			<?php get_template_part( 'templates/entry/entry' , 'index' ); ?>
		<?php endwhile; ?>	
		<?php if ( sizeof( $query->posts ) > 9 ) : ?>
			<div class="button-container">
				<a href="#" class="index-button" data-page="2"><div class="button">load more posts <i class="fa fa-refresh" aria-hidden="true"></i></div></a>
			</div>
		<?php endif; ?>
	</div>
</main>

<!-- main image script -->
<?php get_template_part( 'templates/scripts/script', 'main_image' ); ?>

<?php get_footer(); ?>
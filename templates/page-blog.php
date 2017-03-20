<?php get_header(); /*Template Name: Blog*/ ?>

<main id="content" role="index">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php print get_the_title(); ?></h1>
		</header>
		<section class="entry-content">
			<?php print get_the_content(); ?>
		</section>
		<hr />
		<?php 	$args = array(
				'post_type'     => array( 'post' ),
				'post_status'   => array( 'publish'),
				'category_name' => 'bloggin',
				'cache_results' => true
		);
		$query = new WP_Query( $args );
		ca_localize_ajax_script( $args );		
		while ($query->have_posts()) : $query->the_post();?>			
			<?php get_template_part( 'templates/entry' , 'index' ); ?>
		<?php endwhile; ?>
		<div class="button-container">
			<a href="#" class="index-button" data-page="2"><div class="button">load more posts <i class="fa fa-refresh" aria-hidden="true"></i></div></a>
		</div>
	</div>
</main>
<?php get_footer(); ?>
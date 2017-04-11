<?php get_header();	?>
<main id="content" role="index">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title">
				<?php add_filter( 'get_the_archive_title', function ($title) {
				    if ( is_category() ) {$title = single_cat_title( '', false );} 
				    elseif ( is_tag() ) {$title = single_tag_title( '', false );} 
				    elseif ( is_author() ) {$title = '<span class="vcard">' . get_the_author() . '</span>' ;}
				    return $title;
				});
				$title = get_the_archive_title();
				print $title;
				?>
			</h1>
		</header>
		<hr />
		<?php 
			//handling query and pagination
			$count;
			global $wp_query;
			$args = $wp_query->query;
			centalpha_localize_ajax_script( $args );
		?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'templates/entry/entry' , 'index' ); ?>
			<?php $count += 1; ?>
		<?php endwhile; ?>
			<?php if ( $count > 9 ) : ?>
				<div class="button-container">
					<a href="#" class="index-button" data-page="2"><div class="button">load more posts <i class="fa fa-refresh" aria-hidden="true"></i></div></a>
				</div>
			<?php endif; ?>
		<?php endif; ?>	
	</div>
</main>
<?php get_footer(); ?>
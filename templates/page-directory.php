<?php /* Template Name: Directory */ get_header(); ?>

<!-- Featured image area -->
<?php get_template_part( 'templates/entry/entry', 'main_image' ) ?>

<main id="content" role="directory">

	<!-- Last Updated area -->
	<?php get_template_part( 'templates/directory/directory', 'update' ) ?>

	<!-- Content area -->
	<section class="directory-segment" role="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>
	</section>

	<!-- Table area -->
	<?php get_template_part( 'templates/directory/directory', 'table' ) ?>

	
</main>

<!-- main image script -->
<?php get_template_part( 'templates/scripts/script', 'main_image' ); ?>

<?php get_footer(); ?>
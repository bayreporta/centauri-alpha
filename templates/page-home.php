<?php /* Template Name: Home Page */ get_header(); ?>

<!-- Featured image area -->
<?php get_template_part( 'templates/entry/entry', 'main_image' ) ?>

<main id="content" role="home">

	<!-- Services area -->
	<?php get_template_part( 'templates/entry/entry', 'service_list' ) ?>

	<!-- Testimonials area -->
	<?php get_template_part( 'templates/entry/entry', 'testimonials' ) ?>
	
	<!-- Clips area -->
	<?php get_template_part( 'templates/entry/entry', 'clips' ) ?>

	<!-- Bio area -->
	<?php get_template_part( 'templates/entry/entry', 'bio' ) ?>

	<!-- Contact area -->
	<?php get_template_part( 'templates/entry/entry', 'contact' ) ?>
	
</main>

<!-- main image script -->
<?php get_template_part( 'templates/script', 'main_image' ); ?>

<?php get_footer(); ?>
<?php get_header(); /*Template Name: Services*/ ?>

<!-- Featured image area -->
<?php get_template_part( 'templates/entry/entry', 'main_image' ) ?>

<main id="content" role="services">

	<!-- Services List area -->
	<?php get_template_part( 'templates/entry/entry', 'service_list' ) ?>
	
	<!-- Detailed services area -->
	<section id="service-list">
		<?php print ca_populate_services_details( get_field( 'ca_service_details' ) ); ?>
	</section>	

	<!-- Testimonials area -->
	<?php get_template_part( 'templates/entry/entry', 'testimonials' ) ?>
	
	<!-- Contact area -->
	<?php get_template_part( 'templates/entry/entry', 'contact' ) ?>

</main>

<!-- main image script -->
<?php get_template_part( 'templates/script', 'main_image' ); ?>

<?php get_footer(); ?>
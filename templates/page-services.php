<?php get_header(); /*Template Name: Services*/ ?>

<!-- Featured image area -->
<section class="main-image">
	<div role="main-head">
		<h1 class="aligncenter">
			<?php print get_field( 'ca_main_header' ); ?>		
		</h1>
	</div>
	<div role="second-head">
		<h2 class="aligncenter">
			<?php print get_field( 'ca_second_header' ); ?>		
		</h2>
	</div>
	<div role="image">
		<img alt="" src="">
	</div>
</section>

<main id="content" role="services">

	<!-- Services List area -->
	<?php get_template_part( 'templates/entry/entry', 'service-list' ) ?>
	
	<!-- Detailed services area -->
	<section id="service-list">
		<?php print ca_populate_services_details( get_field( 'ca_service_details' ) ); ?>
	</section>	

	<!-- Testimonials area -->
	<section id="testimonials">
		<h2 class="aligncenter">What Clients Said</h2>	
		<hr class="fancy-line" />	
		<?php print ca_populate_services_testimonial( get_field( 'ca_testimonial_list' ) ); ?>
	</section>

	<!-- Contact area -->
	<?php get_template_part( 'templates/entry/entry', 'contact' ) ?>
	
</main>

<!-- main image script -->
<?php get_template_part( 'templates/script', 'main_image' ); ?>

<?php get_footer(); ?>
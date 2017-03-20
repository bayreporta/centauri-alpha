<?php get_header(); /*Template Name: About*/ ?>

<!-- Featured image area -->
<section class="main-image">
	<div role="main-head">
		<h1 class="aligncenter">
			<?php print get_field('ca_main_header'); ?>		
		</h1>
	</div>
	<div role="second-head">
		<h2 class="aligncenter">
			<?php print get_field('ca_second_header'); ?>		
		</h2>
	</div>
	<div role="image">
		<img alt="" src="">
	</div>
</section>

<main id="content" role="services">

	<!-- Services List area -->
	<section id="service-services">
		<h2 class="aligncenter"><?php print get_field('ca_home_service_header', 4433 ); ?></h2>	
		<hr class="fancy-line" />	
		<?php print ca_populate_services_list(get_field('ca_home_services_list', 4433 )); ?>
	</section>
	
	<!-- Detailed services area -->
	<section id="service-list">
		<?php print ca_populate_services_details(get_field('ca_service_details')); ?>
	</section>	

	<!-- Testimonials area -->
	<section id="testimonials">
		<h2 class="aligncenter">What Clients Said</h2>	
		<hr class="fancy-line" />	
		<?php print ca_populate_services_testimonial(get_field('ca_testimonial_list')); ?>
	</section>

	<!-- Contact information area -->
	<section id="service-contact">
		<div>

		</div>
		<div>
			<?php print get_field('ca_contact_form_code', 4433); ?>
		</div>
	</section>
</main>

<!-- main image script -->
<?php get_template_part( 'templates/script' , 'main_image' ); ?>

<?php get_footer(); ?>
<?php /* Template Name: Home Page */ get_header(); ?>

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

<main id="content" role="home">

	<!-- Services area -->
	<?php get_template_part( 'templates/entry/entry', 'service-list' ) ?>

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
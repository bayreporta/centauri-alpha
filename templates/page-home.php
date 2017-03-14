<script src='https://www.google.com/recaptcha/api.js'></script>
<?php /* Template Name: Home Page */ get_header(); ?>

<!-- Featured image area -->
<section id="home-image">
	<div role="main-head">
		<h1 class="aligncenter">
			<?php print get_field('ca_home_main_header'); ?>
		</h1>
	</div>
	<div role="second-head">
		<h2 class="aligncenter">
			<?php print get_field('ca_home_second_header'); ?>			
		</h2>
	</div>
	<div role="image">
		<img alt="Hands using a silkscreen press. Lots of colors." src="">
	</div>
</section>

<div id="content" class="content home" role="main">

	<!-- Services area -->
	<section id="home-services">
		<h2 class="aligncenter"><?php print get_field('ca_home_service_header'); ?></h2>	
		<hr class="fancy-line" />	
		<?php print ca_populate_home_services(get_field('ca_home_services_list')); ?>
	</section>

	<!-- Home testimonials area -->
	<section id="home-tests">
		<?php print ca_populate_home_testimonial(get_field('ca_testimonial_list', 4507)); ?>
		<div class="button-container">
			<a href="<?php echo get_site_url();?>/about-me/"><div class="button">Read More</div></a>
		</div>
	</section>

	<!-- Featured clips area -->
	<section id="home-clips">
		<h2 class="aligncenter"><?php print get_field('ca_home_clip_header'); ?></h2>
		<hr class="fancy-line" />	
		<?php print ca_populate_home_clips(get_field('ca_home_clip_list')); ?>
	</section>

	<!-- Home bio area -->
	<section id="home-bio">
		<h2 class="aligncenter"><?php print get_field('ca_home_bio_header'); ?></h2>
		<hr class="fancy-line" />	
		<div role="image">
			<img src="<?php echo get_field('ca_home_bio_image'); ?>">
		</div>
		<div role="content">
			<?php print get_field('ca_home_bio_content'); ?>
			<div class="button-container">
				<a href="<?php echo get_site_url();?>/about-me/"><div class="button">Learn More</div></a>
			</div>
		</div>
	</section>

	<!-- Home home area -->
	<section id="home-contact">
		<div>

		</div>
		<div>
			<?php print get_field('ca_contact_form_code'); ?>
		</div>
	</section>

</div>
<?php  $mainImg = get_field('ca_home_main_image'); ?>
<?php  $mainImgMobile = get_field('ca_home_main_image_mobile'); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){		
		/* Adjust featured image for home page based on device width */
		var srcSize = window.innerWidth || document.body.clientWidth,
			mainElm = jQuery('#home-image img'),
			mainImg = <?php echo json_encode(get_the_post_thumbnail_url()); ?> ,
			mainImgTab = <?php echo json_encode(get_the_post_thumbnail_url(null, 'medium-large')); ?> 
			mainImgMob = <?php echo json_encode(get_the_post_thumbnail_url(null, 'medium')); ?>;

		if (srcSize >= 1028) {mainElm.attr('src', mainImg)}
		else if (srcSize >= 768) {mainElm.attr('src', mainImgTab)}
		else {mainElm.attr('src', mainImgMob)}

	})
</script>
<?php get_footer(); ?>
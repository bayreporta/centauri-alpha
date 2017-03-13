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
		<?php print ca_populate_home_services(get_field('ca_home_services_list')); ?>
	</section>


	<!-- Featured clips area -->
	<section id="home-clips">
		<h2 class="aligncenter"><?php print get_field('ca_home_clip_header'); ?></h2>
		<?php print ca_populate_home_clips(get_field('ca_home_clip_list')); ?>
	</section>

	<!-- Home testimonials area -->
	<section id="home-tests">
		<div class="home-test">
			<div role="image">
				<img src="http://localhost/wp-content/uploads/2017/03/temp-bio-pic.png">
			</div>
			<div role="content">
				<div>
					<i class="fa fa-quote-left" aria-hidden="true"></i>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consequat in eros et dictum. Sed ullamcorper, ipsum nec pharetra rhoncus, tortor nunc condimentum lacus, ut ornare purus velit nec massa. In sed condimentum velit.</p>
				</div>
				<div>
					<p>John Osborn D'Agostino, Web Developer</p>
				</div>
			</div>
		</div>
	</section>


	<!-- Home bio area -->
	<section id="home-bio">
		<h2 class="aligncenter"><?php print get_field('ca_home_bio_header'); ?></h2>
		<div>
			<div>
				<img src="<?php echo get_field('ca_home_bio_image'); ?>">
			</div>
			<div>
				<?php print get_field('ca_home_bio_content'); ?>
			</div>
		</div>
		<div class="button-container">
			<a href="<?php echo get_site_url();?>/about-me/"><div class="button">Learn More</div></a>
		</div>
	</section>
	<div style="height:125px;"></div>
	<section id="home-contact">
		<?php print get_field('ca_contact_form_code'); ?>
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
			mainImgTab = <?php echo json_encode(get_the_post_thumbnail_url(null, 'large')); ?> 
			mainImgMob = <?php echo json_encode(get_the_post_thumbnail_url(null, 'medium')); ?>;

		if (srcSize >= 1028) {mainElm.attr('src', mainImg)}
		else if (srcSize >= 768) {mainElm.attr('src', mainImgTab)}
		else {mainElm.attr('src', mainImgMob)}

	})
</script>
<?php get_footer(); ?>
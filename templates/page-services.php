<?php get_header(); /*Template Name: Services*/ ?>

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


<section id="content" role="main">
	<!-- Service List area -->
	<section id="service-list"></section>

	<!-- Detailed services area -->
	<section id="services"></section>

	<!-- Testimonials area -->
	<section id="testimonials"></section>

	<!-- Contact information area -->
	<section id="contact"></section>

</section>

<script type="text/javascript">
	jQuery(document).ready(function(){		
		/* Adjust featured image for home page based on device width */
		var srcSize = window.innerWidth || document.body.clientWidth,
			mainElm = jQuery('.main-image img'),
			mainImg = <?php echo json_encode(get_the_post_thumbnail_url()); ?> ,
			mainImgTab = <?php echo json_encode(get_the_post_thumbnail_url(null, 'large')); ?> 
			mainImgMob = <?php echo json_encode(get_the_post_thumbnail_url(null, 'medium')); ?>;

		if (srcSize >= 1028) {mainElm.attr('src', mainImg)}
		else if (srcSize >= 768) {mainElm.attr('src', mainImgTab)}
		else {mainElm.attr('src', mainImgMob)}

	})
</script>
<?php get_footer(); ?>
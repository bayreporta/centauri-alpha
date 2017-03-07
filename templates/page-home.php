<?php /* Template Name: Home Page */ get_header(); ?>
<div id="home-image"><img src=""></div>
<div id="content" class="content home" role="main">
	<section id="home-bio" class="">
		<h2 class="aligncenter"><strong><?php print get_field('ca_home_bio_header'); ?></strong></h2>
		<div>
			<div>
				<img src="<?php echo get_field('ca_home_bio_image'); ?>">
			</div>
			<div>
				<?php print get_field('ca_home_bio_content'); ?>
			</div>
		</div>
		<div class="button"><a href="<?php echo get_site_url();?>/about-me/">Read More...</a></div>
	</section>
	<div style="height:1000px;"></div>


</div>
<?php  $mainImg = get_field('ca_home_main_image'); ?>
<?php  $mainImgMobile = get_field('ca_home_main_image_mobile'); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){		
		var srcSize = window.innerWidth || document.body.clientWidth,
			mainImg = <?php echo json_encode($mainImg); ?>,
			mainImgMobile = <?php echo json_encode($mainImgMobile); ?>;

		srcSize >= 768 ? jQuery('#home-image img').attr('src', mainImg) : jQuery('#home-image img').attr('src', mainImgMobile);
	})
</script>
<?php get_footer(); ?>
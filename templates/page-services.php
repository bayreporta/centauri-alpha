<?php get_header(); /*Template Name: Services*/ ?>

<!-- Featured image area -->
<section class="main-image">
	<div role="main-head">
		<h1 class="aligncenter">
			
		</h1>
	</div>
	<div role="second-head">
		<h2 class="aligncenter">
						
		</h2>
	</div>
	<div role="image">
		<img alt="Hands using a silkscreen press. Lots of colors." src="">
	</div>
</section>


<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header page-header">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			<div class="page-title"><h1><?php the_title(); ?></h1></div> 
		</header>
		<section class="entry-content">
			<?php the_content(); ?>
			<div class="entry-links"><?php wp_link_pages(); ?></div>
		</section>
	</article>
	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
</section>
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
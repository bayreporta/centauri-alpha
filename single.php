<?php 
	if ( get_field('post_template') === 'redirect' ) {
		if(have_posts()) { 
			while(have_posts()) { 
				the_post();
				$url = get_the_content(); 
				header('Location:'.$url);
				exit;
			}
		}
	}
	else {
		get_header();
	}	
?>

<section id="content" role="main">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php get_template_part( 'templates/single/single', 'header' ); ?>

			<?php get_template_part( 'templates/single/single', 'content' ); ?>

			<?php get_template_part( 'templates/single/single', 'footer' ); ?>

		</article>

		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

	<?php endwhile; ?>
<?php endif; ?>
</section>

<?php get_footer(); ?>
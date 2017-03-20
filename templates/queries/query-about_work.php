<?php 
	$args = array('category__and' => array( 493, 504 ));
	$the_query = new WP_Query($args);
?>
<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article class="about-work">
			<div role="image">
				<a class="dark" href="<?php the_permalink(); ?>" target="_blank"><?php the_post_thumbnail('thumbnail'); ?></a>
			</div>
			<div role="content">
				<a class="dark" href="<?php the_permalink(); ?>" target="_blank"><h3 class="aligncenter"><?php the_title(); ?></h3></a>
			</div>
		</article>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>	
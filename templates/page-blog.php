<?php get_header(); /*Template Name: Blog*/ ?>

<main id="content" role="index">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php print get_the_title(); ?></h1>
		</header>
		<section class="entry-content">
			<?php print get_the_content(); ?>
		</section>
		<hr />
		<?php 	$args = array(
				'post_type'     => array( 'post' ),
				'post_status'   => array( 'publish'),
				'category_name' => 'bloggin',
				'cache_results' => true
		);
		$query = new WP_Query( $args );
		while ($query->have_posts()) : $query->the_post();?>			
			<article id="post-<?php the_ID(); ?>" class="index-entry">
				<header class="header">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<section class="entry-meta">
						<span class="author vcard">By <?php the_author_posts_link(); ?></span>
						<span class="meta-sep"> | </span>
						<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</section>
				</header>
				<section class="entry-content">
					<?php the_excerpt(); ?>
				</section>
				<footer class="entry-footer">
					<p class="cat-links"><?php the_category( ', ' ); ?></p>
					<p class="tag-links"><?php the_tags(); ?></p>
				</footer> 
			</article>
			<?php endwhile; ?>
			<div class="button-container">
				<a href="#" class="index-button" data-page-next="2" data-page-prev="0" data-direction="next"><div class="button">back to the past <i class="fa fa-refresh" aria-hidden="true"></i></div></a>
				<a href="#" class="index-button" data-page-next="2" data-page-prev="0" data-direction="prev"><div class="button">toward the future <i class="fa fa-refresh" aria-hidden="true"></i></div></a>
			</div>
	</div>
</main>
<?php get_footer(); ?>
<?php get_header();	?>

<section id="content" role="main">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="entry-meta">
					<span class="entry-author"><?php the_author_posts_link(); ?></span>
					<span class="meta-sep"> | </span>
					<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				</div>
			</header>
			<section class="entry-content">
				<?php the_content(); ?>
			</section>
			<footer class="entry-footer">
				<?php if ( ! empty( get_the_category() ) ) : ?>
					<p class="cat-links"><strong>categories:</strong> <?php the_category( ', ' ); ?></p>
				<?php endif ?>
				<?php if ( ! empty( get_the_tags() ) ) : ?>
					<p class="tag-links">tags: <?php the_tags(', '); ?></p>
				<?php endif ?>						
			</footer>
		</article>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; ?>
<?php endif; ?>
</section>


<?php get_footer(); ?>
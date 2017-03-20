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
	</footer> 
</article>
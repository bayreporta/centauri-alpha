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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section  class="entry-meta">
	<!-- TITLE -->
	<?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> 
	
	<!-- META -->
	<?php if ( !is_search() ) get_template_part( 'templates/entry/entry', 'meta' ); ?>
	</section>

	<!-- if single get content, if not get summary -->
	<?php get_template_part( 'templates/entry/entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	
	<!-- FOOTER -->
	<?php if ( !is_search() ) get_template_part( 'templates/entry/entry-footer' ); ?>
</article>
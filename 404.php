<?php get_header(); ?>
<section id="content" role="main" style="margin-top: 78px;">
	<article id="post-0" class="post not-found">
		<header class="header">
			<h1 class="entry-title"><?php _e( 'Oops! Something went wrong!', 'centalpha' ); ?></h1>
		</header>
		<section class="entry-content">
			<p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'centalpha' ); ?></p>
			<div style="padding: 30px 5%;">
				<?php get_search_form(); ?>
			</div>
		</section>
	</article>
</section>
<?php get_footer(); ?>
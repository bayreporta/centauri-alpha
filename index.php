<?php get_header();	?>
<section id="content" role="main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section  class="entry-meta">
			<div class="alignleft"><h1 class="uppercase">
				<?php add_filter( 'get_the_archive_title', function ($title) {
					    if ( is_category() ) {$title = single_cat_title( '', false );} 
					    elseif ( is_tag() ) {$title = single_tag_title( '', false );} 
					    elseif ( is_author() ) {$title = '<span class="vcard">' . get_the_author() . '</span>' ;}
					    return $title;
					});
					$title = get_the_archive_title();print $title;?>
			</h1></div>
		</section>
		<div class="entry-content">
				<hr class="thick index-buff">
				<div class="project-container flex">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<aside class="project-item" >
						<div><h2><a class="san-serif" href="<?php the_permalink(); ?>" target="_blank">
							<?php 
								the_title();$redirectChk = get_field('post_template', $post->ID);
								if ($redirectChk == 'redirect'){echo '<i class="fa fa-link"></i>';}
							?></a></h2>
						</div>
						<div>
							<p class="meta">Published: <?php the_time('F j, Y'); ?></p>
							<p class="tags"> 
								<?php 
									$curID = get_the_ID(); 
									print centalpha_retreive_post_categories($curID);
									unset($curID); 
								?>
							</p>
						</div>	
					</aside>
				<?php endwhile;?>
				<div class="pagination">
					<div><?php next_posts_link( 'Older posts' ); ?></div>
					<div><?php previous_posts_link( 'Newer posts' ); ?></div>
				</div>
				<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>	
		</div>
	</article>
<?php //endwhile; endif; ?>
</section>
<?php get_footer(); ?>
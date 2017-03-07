<?php 
	
	/* GRAB CUSTOM VARIABLES
	=====================================*/
	$meta = get_post_meta(get_the_ID(), 'photo');
	$project_landing = get_field('project_landing_page');
	$project_ID = get_field('project_page_id');
	$featured_image = get_field('featured_photo_size');
	$template = get_field('post_template');

	if ($template == 'redirect') {if(have_posts()) { while(have_posts()) { the_post();$url = get_the_content(); header('Location:'.$url);exit;}}}
	else {get_header();}	

	
?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section  class="entry-meta">
			<!-- TITLE -->
			<?php echo '<h1 class="entry-title">'; ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php echo '</h1>'; ?> 
			
			<!-- META -->
			<?php 
				$project_landing = get_field('project_landing_page'); 
				$author = get_the_author();
				$time = get_the_time( get_option( 'date_format' ) );

				if (!$project_landing){
					print '<div>';
					print '<span class="author vcard">By '. $author .'</span>';
					print '<span class="meta-sep"> | </span>';
					print '<span class="entry-date">'.$time.'</span>';
					print '</div>';
			}?>
		</section>
		<div class="entry-content">
			
				<?php 
					/* POST THUMB
					=====================================*/		
					if ( has_post_thumbnail() ) { 
						$thumb_url = get_the_post_thumbnail_url();
						if ($featured_image == 'large' || $featured_image == 'Large'){
							print '<aside><div class="post-large">';
							print '<a href="'.$thumb_url.'">';the_post_thumbnail();print '</a>';
							print '</div></aside>';
						}
						else if ($featured_image == 'hide' || $featured_image == 'Hide'){}
						else if ($featured_image == 'normal' || $featured_image == 'Normal'){
							print '<aside><div class="post-thumb">';
								print '<a href="'.$thumb_url.'">';the_post_thumbnail();print '</a>';
							print '</div></aside>';
						}
					}
				?>
			<section><?php the_content(); ?></section>

		<?php 
			/* PROJECT PAGE?
			==========================================================================================*/
			if ($project_landing){
				$args = array(
					'cat'                    => $project_ID,
					'posts_per_page'         => '-1',
					'category__not_in'		 => '504'
				);

				$the_query = new WP_Query($args);
			} 
			else {$the_query = new WP_Query(null);}
		?>
			
		<?php if ( $the_query->have_posts() ) :?>
			<hr class="thick index-buff">
			<div class="project-container flex">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
			<?php wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>	
			<div class="entry-links"><?php wp_link_pages(); ?></div>
		</div>

		<section class="entry-footer">
		<div class="botbuff"><span class="cat-links"><?php _e( 'Categories: ', 'centalpha' ); ?><?php the_category( ', ' ); ?></span></div>
	</section> 
	</article>
	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>


</section>
<?php get_footer(); ?>
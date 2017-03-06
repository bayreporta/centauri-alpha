<?php 		/* GRAB CUSTOM VARIABLES
			=====================================*/
			$meta = get_post_meta(get_the_ID(), 'photo');
			$project_landing = get_field('project_landing_page');
			$project_ID = get_field('project_page_id');
			$featured_image = get_field('featured_photo_size');

			/* CUSTOM CONTENT VARIABLES
			=====================================*/
			$custom_post_html = get_field('post_custom_html');
			$custom_post_css = get_field('post_custom_css');
			$custom_post_js = get_field('post_custom_js');
			$run_custom_post_js = get_field('run_post_custom_js'); ?>

<article class="entry-content">
	<aside>
		<?php 
			/* POST THUMB
			=====================================*/		
			if ( has_post_thumbnail() ) { 
				if ($meta[0] == 'large' || $featured_image == 'Large'){
					print '<div class="post-large">';
					the_post_thumbnail();
					//print '<p>'.get_post(get_post_thumbnail_id())->post_excerpt.'</p>';
					print '</div>';
				}
				else if ($featured_image == 'Hide'){}
				else if ($meta[0] != 'no' || $featured_image == 'Normal'){
					print '<div class="post-thumb">';
						$thumb_url = get_the_post_thumbnail_url();
						print '<a href="'.$thumb_url.'">';the_post_thumbnail();print '</a>';
					//print '<p>'.get_post(get_post_thumbnail_id())->post_excerpt.'</p>';
					print '</div>';
				}
			}
			
		?>
	</aside>
	<section>
		<?php the_content(); ?>
	</section>

<?php 
	/* PROJECT PAGE?
	=====================================*/
	if ($project_landing){
		$args = array(
			'cat'                    => $project_ID,
			'posts_per_page'         => '-1',
			'category__not_in'		 => '504'
		);

		$the_query = new WP_Query($args);
	} 
	else {
		$the_query = new WP_Query(null);
	}
?>
	
<?php if ( $the_query->have_posts() ) :?>
	<hr class="thick index-buff">
	<div class="index-container">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<article class="index-entry">
			<section>
				<div>
					<h2><a class="dark san-serif" href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h2>
				</div>
				<div>
					<p class="tags"> 
							<?php 
								$curID = get_the_ID(); 
								print retreive_post_categories($curID);
								unset($curID); 
							?>
						</p>
					<p class="meta">Published: <?php the_date(); ?></p>
				</div>	
			</section>	
		</article>
		<hr class="thin">
	<?php endwhile;?>
	<?php wp_reset_postdata(); ?>
	</div>
<?php endif; ?>	
	<div class="entry-links"><?php wp_link_pages(); ?></div>
</article>


<?php 
	/* CUSTOM CONTENT
	=====================================*/
	if ($custom_post_html){

		/* CUSTOM CSS */
		if ($custom_post_css){
			echo $custom_post_css;
		}

		print '<section class="custom-content">';
		print $custom_post_html;
		print '</section>';

		/* CUSTOM JS */
		if ($custom_post_js){
			echo $custom_post_js;
			echo $run_custom_post_js;
		}
	}

 ?>




<article type="blog">
	<div>
		<h2><a class="dark san-serif" href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h2>
	</div>
	<div>
		<p class="meta">Published: <?php the_date(); ?></p>
		<?php the_excerpt() ?>
		<p class="tags"> 
			<?php 
				$curID = get_the_ID(); 
				print centalpha_retreive_post_categories($curID);
				unset($curID); 
			?>
		</p>
	</div>	
</article>
<hr class="thin">
<section class="entry-segment" role="prim-index">
	<h2 class="aligncenter">Featured Work</h2>
	<hr class="fancy-line">
	<?php 
		$clips = get_field( 'ca_featured_clips', 4433 ); 
		$prim_clip = get_field ( 'ca_primary_index_clips' );
		$id = (int)$prim_clip[0]['id'];		
	?>
	<div class="prim-clip">
		<div role="image">
			<?php print '<img src="' . $clips[$id]['image']['url'] . '">'; ?>
		</div>
		<div role="content">
			<?php print '<h3>' . $clips[$id]['headline'] . '</h3>'; ?>
			<?php print '<h4>' . $clips[$id]['subhed'] . '</h4>'; ?>			
			<hr>
			<?php print $clips[$id]['content'] ?>
		</div>
		<div class="button-container">
			<?php print '<a href="' . $clips[$id]['link'] . '"><div class="button">load more</div></a>' ?>			
		</div>
	</div>
</section>
<footer class="entry-footer">
	<?php if ( ! empty( get_the_category() ) ) : ?>
		<p class="cat-links"><strong>categories:</strong> <?php the_category( ', ' ); ?></p>
	<?php endif ?>
	<?php if ( ! empty( get_the_tags() ) ) : ?>
		<p class="tag-links">tags: <?php the_tags(', '); ?></p>
	<?php endif ?>						
</footer>
<section class="entry-segment" role="resume">
	<h2 class="aligncenter">Work Experience</h2>
	<hr class="fancy-line" />	

	<?php 
		$items = get_field( 'ca_resume_work' );
		foreach ( $items as $i ) {
		 	print '<div role="item">';
		 		print '<h4>' . $i['date'] . '</h4>';
		 		print '<h3>' . $i['title'] . '</h3>';
		 		print '<p>' . $i['description'] . '</p>';
		 	print '</div>';
		 } 
		 unset($items);
	?>

	<h2 class="aligncenter">Education</h2>
	<hr class="fancy-line" />
	<?php 
		$items = get_field( 'ca_resume_education' );
		foreach ( $items as $i ) {
		 	print '<div role="item">';
		 		print '<h4>' . $i['date'] . '</h4>';
		 		print '<h3>' . $i['title'] . '</h3>';
		 		print '<p>' . $i['description'] . '</p>';
		 	print '</div>';
		 } 
		 unset($items);
	?>
</section>
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

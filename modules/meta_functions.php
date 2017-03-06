<?php

/* #1: Grab all categories for the post and populate
================================================================================*/
function retreive_post_categories($id){
	$ret = '';
	$posttags = get_the_category($id); 
	$count = count($posttags);
	
	if ($posttags) {
		for ($i=0; $i < $count ; $i++){
			if ($i < $count-1){
				$ret .= '<a href="'. $siteURL .'\/category/'. $posttags[$i]->slug .'">'. $posttags[$i]->name . '</a>, ';
			}
			else {
				$ret .= '<a href="'. $siteURL .'\/category/'. $posttags[$i]->slug .'">'. $posttags[$i]->name . '</a>';
			}
		}
	}
	unset($posttags);
	return $ret;
}
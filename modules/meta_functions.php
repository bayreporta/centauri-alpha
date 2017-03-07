<?php

/* #1: Grab all categories for the post and populate
================================================================================*/
function centalpha_centalpha_retreive_post_categories($id){
	$ret = '';
	$siteURL = get_site_url();
	$posttags = get_the_category($id); 
	$count = count($posttags);
	
	if ($posttags) {
		for ($i=0; $i < $count ; $i++){
			if ($i < $count-1){
				$ret .= '<a target="_blank" href="'. $siteURL .'/category/'. $posttags[$i]->slug .'">'. $posttags[$i]->name . '</a>, ';
			}
			else {
				$ret .= '<a target="_blank" href="'. $siteURL .'/category/'. $posttags[$i]->slug .'">'. $posttags[$i]->name . '</a>';
			}
		}
	}
	unset($posttags);
	return $ret;
}
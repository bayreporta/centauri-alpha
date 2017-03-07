<?php 

/* #1: Populate social media and contact bar
---------------------------------------------------------------------------*/
function centalpha_populate_social_media_buttons(){
	$ret = '';
	$home_ID = 4433;
	$social = get_field('ca_social_media', $home_ID);

	$size = sizeof($social);
	for ( $i = 0 ; $i < $size ; $i++ ){
		$ret .= '<div><a href="'. $social[$i]['link'] .'" target="_blank"><i class="fa fa-'. $social[$i]['code'] .'" aria-hidden="true"></i></a></div>';
	}
	unset($data, $home_ID);
	return $ret;
}
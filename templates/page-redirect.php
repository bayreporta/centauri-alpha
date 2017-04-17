<?php /* Template Name: Redirect */ 
	if(have_posts()) { 
		while(have_posts()) { 
			the_post();
			$url = get_the_content(); 
			header('Location:'.$url);
			exit;
		}
	}
?>

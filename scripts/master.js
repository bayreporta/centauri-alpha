/* #1: Mobile navigation - nom nom nom burger
---------------------------------------------------------------------------*/
jQuery(document).ready(function(){
	jQuery('#burger').on('click', function(){
		if (jQuery(this).hasClass('toggled')){
			jQuery(this).removeClass('toggled');
			jQuery('.menu-navigation-container').hide();
		}
		else {
			jQuery(this).addClass('toggled');
			jQuery('.menu-navigation-container').show();
		}		
	});
});








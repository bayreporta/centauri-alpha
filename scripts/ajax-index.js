/* dynamically load index posts
=============================================*/
(function(jQuery) {

	function find_page_number( element ) {
		element.find('span').remove();
		return parseInt( element.html() );
	}

	jQuery(document).on( 'click', '.index-button', function( event ) {
		event.preventDefault();

		page = find_page_number( jQuery(this).clone() );

		jQuery.ajax({
			url: ajaxpagination.ajaxurl,
			type: 'post',
			data: {
				action: 'ajax_pagination',
				query_vars: ajaxpagination.query_vars,
				page: page
			},
			success: function( html ) {
				jQuery('#content').find( 'article' ).remove();
				//jQuery('#main nav').remove();
				jQuery('#content').append( html );
			}
		})
	})
})(jQuery);
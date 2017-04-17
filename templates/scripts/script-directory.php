<script type="text/javascript">
	jQuery(document).ready(function(){	
		var directoryFilters = {
			genre: 	'',
			status: '',
			news: 	'',
			year: 	''
		}	

		/* DIRECTORY FILTERS
		======================================*/ 
		jQuery( '.directory-filter select' ).change(function(){
			var value 	= jQuery(this).val(),
				select 	= jQuery(this).attr( 'role' );

			//update the filter list
			directoryFilters[select] = value;

			//update filters
			if ( directoryFilters['genre'] === '' && directoryFilters['status'] === '' && directoryFilters['news'] === '' && directoryFilters['year'] === '' ){
				jQuery( '#tb-directory tbody tr' ).css( 'display', 'table-row' );
			}
			else {
				jQuery( '#tb-directory tbody tr' ).css( 'display', 'none' );
				jQuery( '#tb-directory tbody tr[data-genre="' + directoryFilters['genre'] + '"').css( 'display', 'table-row' );
				jQuery( '#tb-directory tbody tr[data-genre="' + directoryFilters['status'] + '"').css( 'display', 'table-row' );
				jQuery( '#tb-directory tbody tr[data-genre="' + directoryFilters['news'] + '"').css( 'display', 'table-row' );
				jQuery( '#tb-directory tbody tr[data-genre="' + directoryFilters['year'] + '"').css( 'display', 'table-row' );
			}		
		});

		/* CONFIGURE TABLESORTER
		======================================*/ 
		jQuery( '#tb-directory' ).tablesorter({
			sortList:[[1,0]],
			headers:{
				0: {
					sorter: false
				}
			}
		});

	});
</script>
//======================================================================
// Change the site's current language.
//======================================================================
$('#changeLocale').click(function(event) {
	
	event.preventDefault();

	/**
	 * '/lang' route in a Windows environment.
	 *
	 * You should specify the full path starting from 'htdocs'.
	 */
	const LANG_WINDOWS = '/sites/iberian/public/lang';

	/**
	 * '/lang' route in a Unix environment.
	 *
	 * On the server, the path is automatically set to the project root (/var/www/html/iberian)
	 */
	const LANG_UNIX = '/lang';


	// Set CSRF Token.
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});

	// Change language.
	$.ajax({
		type: "POST",
		url: LANG_WINDOWS, // POST to '/lang' route.
	   
		// Reload current page on success.
		success: function() {
		 location.reload();
		}

	});

}); // End changeLocale.click
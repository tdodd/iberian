var index = 1000; // Index for id of sources added.

//======================================================================
// Sources section
//======================================================================

/**
 * Delete a source.
 */
$('.delete').click(function(e) {

	if(!confirm('Delete this source?')) {		
		e.preventDefault(); // Do nothing.
	} else { // Delete this source.

		$.ajaxSetup({ // Set CSRF token.
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
		
		$.ajax({ // Delete source.
		   type: "POST",
		   data: { id: e.target.id, ajaxType: 'delete' },

		   success: function(data) {
            // Write response to screen.
            document.write(data);
	      }

		});

	}

}); // End delete.click

//======================================================================
// Relations section
//======================================================================

/**
 * Asynchronous person search.
 */
$('#otherPerson').keyup(function() {

	// Ajax search route in a Windows development environment.
	const SEARCH_WINDOWS = '/sites/iberian/public/async-search';

	// Ajax search route on the production server.	
	const SEARCH_UNIX = '/async-search';

	var input = $(this).val(); // Get what is currently in the search box.

	$.ajaxSetup({ // Set CSRF token.
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});

	$.ajax({
		type: "POST",
		data: { input: input },
		url: SEARCH_UNIX, // POST to '/async-search' route. Change based on your dev environment.

		success: function(data) {
			// Write response to screen.
  		$('#results').html(data);
		}

	});

}); // End otherPerson.keyup
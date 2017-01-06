//======================================================================
// Confirmation message for deleting a person/user.
//======================================================================
$('.deleteForm').on('submit', function(e) {

    if(!confirm('Are you sure?')) {
	    e.preventDefault();
    }

});
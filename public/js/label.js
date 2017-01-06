//======================================================================
// This script adds a label to a field that already has a value.
//======================================================================
$(document).ready(function () {

	// List of fields that should have a label if not empty.
	var names = [
		'fName', 'mName', 'lName', 'alias', 
		'birthCity', 'birthPlaceEN', 'birthPlaceESP', 'arrivalPlaceEN', 'arrivalPlaceESP', 'professionEN', 'professionESP',
		'birthYear', 'birthMonthEN', 'birthMonthESP', 'birthDay', 'deathYear', 'deathMonthEN', 'deathMonthESP', 'deathDay',
		'arrivalYear', 'arrivalMonthEN', 'arrivalMonthESP', 'arrivalDay',
	];

	// If notes field is not empty.
	if ($('#notes').val() != '') {

		$('#notes').attr('rows', '3');
		$('#notes').css('margin-top', '30px');
		$('#notes-label').css('display', 'block');

	}

	// Loop through all inputs.
	$('input').each(function () {

		if ($.inArray($(this).attr('name'), names) != -1 && $(this).val() != '') { // If input is not empty.

			// Create label using placeholder text and append to parent.
			var label = '<label for="' + $(this).attr('name') + '">' + $(this).attr('placeholder') + '</label>';
			$(this).parent().append(label);

		}

	});

}); // End document.ready
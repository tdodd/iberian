//======================================================================
// This script adds the date fields for a given type (birth, death, arrival).
//======================================================================
$('.datebox').click(function() {

    if ($('#birth').is(':checked')) {
		$('.date-birth').fadeIn('fast');
	} else { $('.date-birth').css('display', 'none'); }

	if ($('#death').is(':checked')) {
		$('.date-death').fadeIn('fast');
	} else { $('.date-death').css('display', 'none'); }

	if ($('#arrival').is(':checked')) {
		$('.date-arrival').fadeIn('fast');
	} else { $('.date-arrival').css('display', 'none'); }

});
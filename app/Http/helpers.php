<?php 

//======================================================================
// Custom helper functions not provided by Laravel.
//======================================================================

/**
 * Translates a DB column name to a more user friendly name.
 */
function translate($columnName) {

	$names = [
		'id' => 'ID',

		'fName' => trans('messages.first-name'),
		'mName' => trans('messages.middle-name'),
		'lName' => trans('messages.last-name'),
		'alias' => trans('messages.alias-name'),

		'birthYear' => trans('messages.birth-year'),
		'birthMonthEN' => trans('messages.birth-month'),
		'birthMonthESP' => trans('messages.birth-month'),
		'birthDay' => trans('messages.birth-day'),
		
		'deathYear' => trans('messages.death-year'),
		'deathMonthEN' => trans('messages.death-month'),
		'deathMonthESP' => trans('messages.death-month'),
		'deathDay' => trans('messages.death-day'),
		
		'arrivalYear' => trans('messages.arrival-year'),
		'arrivalMonthEN' => trans('messages.arrival-month'),
		'arrivalMonthESP' => trans('messages.arrival-month'),
		'arrivalDay' => trans('messages.arrival-day'),

		'birthPlaceEN' => trans('messages.birth-place'),
		'birthPlaceESP' => trans('messages.birth-place'),
		'arrivalPlaceEN' => trans('messages.arrival-place'),
		'arrivalPlaceESP' => trans('messages.arrival-place'),

		'professionEN' => trans('messages.profession'),
		'professionESP' => trans('messages.profession'),
		'notes' => trans('messages.notes'),
	];

	// If column is found.
	if (array_key_exists($columnName, $names)) {

		return $names[$columnName];
		
	}

} // End translate.
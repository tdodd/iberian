<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model 
{
	/**
	 * Elements that are mass assignable.
	 * ex: $s = new Source['key' => 'value', ...]
	 */
    protected $fillable = [
    	'nameEN', 'notesEN', 'link'
    ];

    public $timestamps = false;

 	/*
 	 * Get the people associated with a source.
 	 */
 	public function person() {
 		return $this->belongsToMany('App\Person');
  }
} // End Source
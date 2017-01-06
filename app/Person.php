<?php

/*
|--------------------------------------------------------------------------
| Person Model
|--------------------------------------------------------------------------
|
| Database model for the 'people' table.
|
*/

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Person extends Model
{
    /**
     * Attributes that are mass assignable. 
     * i.e. $p = new Person([$key1 => $value1, $key2 => $value2, etc.]);
     */
    protected $fillable = [
        'fName', 'mName', 'lName', 'alias', 'birthPlaceEN', 'birthPlaceESP', 'arrivalPlaceEN', 'arrivalPlaceESP', 'professionEN', 'professionESP', 'notes',

        // Dates.
        'birthYear', 'birthMonthEN', 'birthMonthESP', 'birthDay',  'deathYear', 'deathMonthEN', 'deathMonthESP', 'deathDay', 'arrivalYear', 'arrivalMonthEN', 'arrivalMonthESP', 'arrivalDay'
    ];

    /**
     * Set whether or not the model will have 'createdAt' and 'updatedAt' timestamps.
     */
    public $timestamps = false;
    
    /**
     * Get all sources for this person.
     */
    public function sources() {
        return $this->belongsToMany('App\Source');
    }

    /**
     * Get all relationships for this person.
     */
    public function relations() {
        return $this->belongsToMany('App\Person', 'relations', 'thisPerson', 'otherPerson')->withPivot('id', 'relationNameEN', 'relationNameESP');
    }

    /**
     * Returns an array containing all the columns in the 'people' table.
     *
     * @return array
     */
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

} // End Person
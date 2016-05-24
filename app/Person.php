<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 * @package App
 * A person to be queried in the database.
 */
class Person extends Model
{
    /**
     * Attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'fName', 'mName', 'lName', 'DoB', 'DoD', 'birthCity', 'birthCountry',
        'arrivalCity', 'arrivalCountry', 'arrivalDate', 'profession', 'notes'
    ];
    
    /**
     * Set whether or not the model will have 'createdAt' and 'updatedAt' timestamps.
     * @var bool
     */
    public $timestamps = false;

    /**
     * Returns an array containing all the columns in the 'people' table.
     * @return array
     */
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
    
}

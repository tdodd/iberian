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
     * @var array fillable
     */
    protected $fillable = [
        'fName', 'mName', 'lName', 'DoB', 'DoD', 'birthCity', 'birthCountry',
        'arrivalCity', 'arrivalCountry', 'arrivalDate', 'profession', 'notes'
    ];
    /**
     * Set whether or not the model will have 'createdAt' and 'updatedAt' timestamps.
     * @var bool timestamps
     */
    public $timestamps = false;

}

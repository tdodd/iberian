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
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'fName', 'mName', 'lName', 'DoB', 'DoD', 'birthCity', 'birthCountry',
        'arrivalCity', 'arrivalCountry', 'arrivalDate', 'profession', 'notes'
    ];

    public $timestamps = false;
}

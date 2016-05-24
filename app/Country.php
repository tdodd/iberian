<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * Set whether or not the model will have 'createdAt' and 'updatedAt' timestamps.
     * @var bool
     */
    public $timestamps = false;
}

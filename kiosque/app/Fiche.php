<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fiche
 *
 * @mixin \Eloquent
 */
class Fiche extends Model
{
    protected $fillable = [
        'firstname', 'lastname','adress', 'country', 'city', 'zipcode', 'phone', 'birthdate', 'birthplace'
    ];
}

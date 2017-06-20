<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Fiche
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $adress
 * @property string $country
 * @property string $city
 * @property string $zipcode
 * @property string $birthplace
 * @property string $birthdate
 * @property int $phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereAdress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereBirthdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereBirthplace($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fiche whereZipcode($value)
 * @mixin \Eloquent
 */
class Fiche extends Model
{
    protected $fillable = [
        'firstname', 'lastname','adress', 'country', 'city', 'zipcode', 'phone', 'birthdate', 'birthplace', 'user_id'
    ];
}
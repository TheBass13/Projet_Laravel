<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
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
	class Fiche extends \Eloquent {}
}

namespace App{
/**
 * App\Publication
 *
 * @property int $id
 * @property string $titre
 * @property int $nbnum
 * @property string $photo
 * @property string $details
 * @property int $prix
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereNbnum($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication wherePhoto($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication wherePrix($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereTitre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Publication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Publication extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Fiche $Fiche
 * @property bool $isemploye
 * @method static \Illuminate\Database\Query\Builder|\App\User whereIsemploye($value)
 */
	class User extends \Eloquent {}
}


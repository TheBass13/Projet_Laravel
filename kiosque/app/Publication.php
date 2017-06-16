<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Publication extends Model
{
    protected $fillable = [
        'titre', 'nbnum', 'photo', 'details', 'prix'
    ];
}

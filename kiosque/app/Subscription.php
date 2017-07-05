<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscription
 *
 * @property int $id
 * @property int $user_id
 * @property int $publication_id
 * @property bool $payed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription wherePayed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription wherePublicationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subscription whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Publication $Publication
 * @property-read \App\User $User
 * @property int|null $payment_id
 * @property string $expiry_date
 * @property bool $actif
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereActif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription wherePaymentId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Payment[] $Payment
 */
class Subscription extends Model
{
    //
    protected $fillable = [
        'user_id', 'publication_id','payed','expiry_date','actif'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Publication(){
    return $this->belongsTo('App\Publication');
}

    public function Payment(){
        return $this->hasMany('App\Payment');
    }
}

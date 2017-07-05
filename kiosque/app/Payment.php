<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Payment
 *
 * @property int $id
 * @property int $subscription_id
 * @property int $transaction_id
 * @property int $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereSubscriptionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereTransactionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Payment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Subscription $Subscription
 * @property-read \App\User $User
 * @property int $user_id
 * @property string|null $transaction
 * @property string|null $type
 * @property bool $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Payment whereUserId($value)
 */
class Payment extends Model
{
    protected $fillable = [
        'subscription_id', 'user_id', 'transaction', 'type', 'status', 'amount', 'realAmount'
    ];

    public function Subscription()
    {
        return $this->belongsTo('App\Subscription');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}

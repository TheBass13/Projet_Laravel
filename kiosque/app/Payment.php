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
 */
class Payment extends Model
{
    //
}

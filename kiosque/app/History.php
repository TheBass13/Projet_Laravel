<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\History
 *
 * @property int $id
 * @property int $user_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\History whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\History whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\History whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\History whereUserId($value)
 * @mixin \Eloquent
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\History whereType($value)
 */
class History extends Model
{
    protected $fillable = [
        'content', 'user_id', 'type'
    ];
}

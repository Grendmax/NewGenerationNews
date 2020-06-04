<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App
 *
 * @property-read $id
 * @property $user_id
 * @property $news_id
 * @property $body
 * @property-read Carbon $created_at
 * @property-read $updated_at
 */
class Comment extends Model
{
    protected $fillable = [
        'news_id', 'user_id', 'body'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function post() {
        return $this->belongsTo(News::class);
    }
}

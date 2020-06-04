<?php

namespace App;

use App\Casts\CategoryCast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 *
 * @property-read $id
 * @property $title
 * @property $description
 * @property $imageURL
 * @property $category
 * @property-read Carbon $created_at
 * @property-read $updated_at
 */
class News extends Model
{
    protected $fillable = [
        'title', 'description', 'imageURL','category'
    ];

    protected $casts = [
        'category'=>CategoryCast::class
    ];

    function comments() {
        return $this->hasMany(Comment::class);
    }

}

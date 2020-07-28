<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Scopes\CreatedAt;

class Post extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Boot
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::saving( fn($query) => $query->slug = Str::slug($query->title));
        static::addGlobalScope(new CreatedAt);
    }


    /**
     * Trim and convert the first letter to upper case
     *
     * @param string $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = trim(strtolower($value));
    }

    /**
     * Get value in title
     *
     * @param string $value
     * @return void
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Get thumbnail
     *
     * @param string $value
     * @return void
     */
    public function getThumbnailAttribute($value)
    {
        return ($value) ? 'uploads/thumbnails/' . $value : 'img/default-thumbnail.jpg';
    }

    /**
     * Post categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}

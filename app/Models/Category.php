<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Scopes\CreatedAt;

class Category extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    protected static function boot()
    {
        parent::boot();
        static::saving( fn($query) => $query->slug = Str::slug($query->name));
        static::addGlobalScope(new CreatedAt);
    }

    /**
     * Trim and convert the first letter to upper case
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(strtolower($value));
    }

    /**
     * Get value in title
     *
     * @param string $value
     * @return void
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Category posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

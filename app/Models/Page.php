<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Scopes\CreatedAt;

class Page extends Model
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
     * Get thumbnail
     *
     * @param string $value
     * @return void
     */
    public function getThumbnailAttribute($value)
    {
        return ($value) ? 'thumbnails/' . $value : 'img/default-thumbnail.png';
    }
}

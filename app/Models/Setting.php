<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Trim and convert the title to lower
     *
     * @param string $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = trim(strtolower($value));
    }

    /**
     * Trim description
     *
     * @param string $value
     * @return void
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = trim($value);
    }

    /**
     * Get the title in title case
     *
     * @param string $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Get the logo
     *
     * @param string $value
     * @return string
     */
    public function getLogoAttribute($value)
    {
        return ($value) ? 'uploads/logos/' . $value : '';
    }

    /**
     * Get the favicon
     *
     * @param string $value
     * @return string
     */
    public function getFaviconAttribute($value)
    {
        return ($value) ? 'uploads/logos/' . $value : '';
    }
}

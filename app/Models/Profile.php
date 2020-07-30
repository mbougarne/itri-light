<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Trim and convert the first letter to upper case
     *
     * @param string $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = trim(strtolower($value));
    }

    /**
     * Trim and convert the last letter to upper case
     *
     * @param string $value
     * @return void
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = trim(strtolower($value));
    }

    /**
     * Get the first name in title case
     *
     * @param string $value
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the last name in title case
     *
     * @param string $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the avatar
     *
     * @param string $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return ($value) ? 'uploads/avatars/' . $value : 'img/default-avatar.png';
    }

    /**
     * Profile owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

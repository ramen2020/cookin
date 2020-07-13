<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'content', 'user_picture',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'favorites', 'follow_id', 'user_id')->withTimestamps();
    }

    public function favorite($userId)
    {

        $exist = $this->is_favorites($userId);

        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            return false;
        } else {
            $this->favorites()->attach($userId);
            return true;
        }
    }

    public function unfavorite($userId)
    {

        $exist = $this->is_favorites($userId);

        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {

            $this->favorites()->detach($userId);
            return true;
        } else {

            return false;
        }
    }

    public function is_favorites($userId)
    {
        return $this->favorites()->where('follow_id', $userId)->exists();
    }

    public function feed_favorites()
    {
        $favorite_user_ids = $this->favorites()->pluck('users.id')->toArray();
        return User::whereIn('id', $favorite_user_ids);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}

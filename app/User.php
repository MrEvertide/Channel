<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'picture', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return
     *
     * @return mixed
     */
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * Add the Friend relationship to the user's Model
     *
     * @return mixed
     */
    public function friends() {
        return $this->belongsToMany('App\User', 'friends_users', 'user_id', 'friend_id')
            ->select(['id', 'name', 'email']);
    }

    /**
     * Add a friend for a user
     *
     * @param $friend
     * @return bool
     */
    public function addFriend($friend) {
        if($this->friends()->attach($friend->id) == 'NULL') {
            return false;
        }
        return true;
    }

    /**
     * Get all friends for a user
     *
     * @return bool|mixed
     */
    public function getFriends() {
        // call the user's friend propriety and not the friends relation written above
        $friends = $this->friends;

        //TODO clean this part, model should not return mixed type
        if (count($friends) > 0) {
            return $friends;
        } else {
            return false;
        }
    }

    /**
     * Delete a friend for a user
     *
     * @param $friend
     */
    public function deleteFriend($friend) {
        $this->friends()->detach($friend->id);
    }

}

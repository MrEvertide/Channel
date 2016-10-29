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
        'name', 'email', 'password', 'picture', 'profileId'
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
            ->select(['id', 'name', 'email', 'picture', 'profileId']);
    }

    /**
     * Add the Post relationship to the user's Model
     *
     * @return mixed
     */
    public function posts() {
        return $this->hasMany('App\Post')->select(['id', 'content', 'user_id', 'created_at', 'updated_at']);
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
     * Method used to get all friends posts in the most recent order
     *
     * @return array
     */
    public function getFriendsPosts() {
        $friends = $this->friends;

        $posts = [];
        foreach ($friends as $friend) {
            $userPosts = $friend->posts;
            foreach ($userPosts as $userPost) {
                $posts[] = $userPost;
            }
        }

        usort($posts, [$this, 'compareDates']) ;

        return $posts;
    }

    /**
     * Method used in the friends posts sorting to receive the posts in the most recent order.
     *
     * @param $first
     * @param $second
     * @return bool
     */
    private function compareDates($first, $second) {
        return strtolower( $first->created_at) < strtolower($second->created_at);
    }

    /**
     * Delete a friend for a user
     *
     * @param $friend
     */
    public function deleteFriend($friend) {
        $this->friends()->detach($friend->id);
    }

    /**
     * Method used to return posts from recent to older.
     *
     * @param null $limit
     * @return mixed
     */
    public function getRecentPosts($limit = null) {
        $posts = Post::where('user_id', $this->id)->orderBy('created_at', 'desc')->take($limit)->get();
        return $posts;
    }

}

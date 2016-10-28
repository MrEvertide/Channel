<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["content", "user_id"];


    /**
     * Add the User relationship to the post's Model
     *
     * @return mixed
     */
    public function user() {
        $this->belongsTo('App\User');
    }
}

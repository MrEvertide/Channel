<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;

class Post extends Model
{
    protected $fillable = ["content", "user_id", "created_at", "updated_at"];


    /**
     * Add the User relationship to the post's Model
     *
     * @return mixed
     */
    public function user() {
        return $this->belongsTo('App\User');
    }


    /**
     * Method used to parse the date such as created_at and updated_at to a readable format
     *
     * @param $date
     * @return string
     */
    public function parseDate($date) {
        $parseDate = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        return $parseDate->format('l jS F Y h:i A');

    }

    /**
     * Method used to parse the date such as created_at and updated_at to a readable format - Returns a shorter and less
     * precise date
     *
     * @param $date
     * @return string
     */
    public function parseDateShort($date) {
        $parseDate = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        return $parseDate->format('l jS F');
    }
}

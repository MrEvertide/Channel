<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FriendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the friend dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load all friends for the logged user and send them to the view
        $friends = Auth::User()->getFriends();
        if (!$friends) $friends = null;
        return view('friends.index', array('friends' => $friends));
    }
}

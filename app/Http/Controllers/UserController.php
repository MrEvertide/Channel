<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
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
     * Show the user settings page
     *
     * @return \Illuminate\Http\Response
     */
    public function settings() {
        return view('user.settings');
    }
}

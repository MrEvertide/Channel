<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;


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

    public function update_avatar(Request $request) {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'. $filename));

            $user = Auth::user();
            $user->picture = $filename;
            $user->save();
        }
        return view('user.settings');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\User as User;

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

    /**
     * Method used for a shortcut to the user's profile
     * @return mixed
     *
     * @return \Illuminate\Http\Response
     */
    public function myProfile() {
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Method used to a to view someone's profile
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id) {
        $user = User::where("profileId", $id)->first();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Post method to handle the avatar picture upload
     *
     * @param Request $request
     * @return mixed
     */
    public function updateAvatar(Request $request) {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'. $filename));

            $user = Auth::user();
            $user->picture = $filename;
            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Post method to handle the banner picture upload
     *
     * @param Request $request
     * @return mixed
     */
    public function updateBanner(Request $request) {
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $filename = time() . '.' . $banner->getClientOriginalExtension();

            Image::make($banner)->resize(1920, 1080)->save(public_path('uploads/banner/'. $filename));

            $user = Auth::user();
            $user->banner = $filename;
            $user->save();
        }
        return redirect()->back();
    }
}

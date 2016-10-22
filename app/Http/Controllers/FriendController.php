<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User as User;

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

    /**
     * Method used to delete a friend
     * @param $id
     * @return mixed
     */
    public function deleteFriend($id) {
        $friend = User::find($id);
        $user = Auth::user();
        $user->deleteFriend($friend);

        return redirect()->back();
    }

    /**
     * Method used to add a friend
     * from a POST Request
     *
     * @param Request $request
     * @return mixed
     */
    public function addFriendPost(Request $request) {
        $this->validate($request, ['inputEmail' => "required|email|max:255"] );

        $email = $request->input("inputEmail");
        $friend = User::where("email", $email)->first();
        if (is_null($friend)) {
            //TODO throw error, no account found with send email
        }
        $user = Auth::user();

        if( $user == $friend) {
            //TODO throw error, the user cant add himself as a friend
        }
        //TODO validate that the user is not already friend with the other.

        $user->addFriend($friend);
        return redirect()->back();
    }
}

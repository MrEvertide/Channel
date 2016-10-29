<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post as Post;
use Auth;

class PostController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //temporary page/view - Returns all posts registered in the database
        $posts = Post::all();
        return view('post/list',['posts' => $posts]);
    }

    public function create() {
        return view('post/new');
    }

    /**
     * Method used to handle the create post POST request
     *
     * @param Request $request
     * @return mixed
     */
    public function createPost(Request $request) {
        // add validation on the content field
        $content = $request->input('content');
        if ($content) {
            $user = Auth::user();
            $userPost = Post::create([
                'content' => $content
            ]);
            $user->posts()->save($userPost);
        }
        return redirect()->back();
    }
}

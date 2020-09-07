<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function add(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $user = auth()->user();

        $post = new Posts();
        $post->name = $request->input('name');
        $post->description = $request->input('description');
        $post->user_id = $user->id;
        $post->save();

        return redirect()->route('list_post');
    }
    public function index() {
        return view('/post/view_form');
    }
    public function listOfPosts() {
        $user = auth()->user();
        return view('/post/list_post'
            , ['posts' => Posts::all(), 'user' => $user]
        );
    }
}

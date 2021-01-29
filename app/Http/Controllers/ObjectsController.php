<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\User;
use Collective\Html\FormFacade as Form;
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

    public function postEdit($id, Request $request) {
        $posts = new Posts;
        $post = $posts->find($id);
        if($request->name) {
            $post->name = $request->name;
            $post->description = $request->description;
            $post->save();
            return redirect()->route('post_edit', $id);
        }

        Form::model($post, array('route' => array('post_edit', $id)));

        return view('/post/post_edit',
            [
                'postId' => $id,
                'post' => $post,
            ]);
    }

    public function index() {
        return view('/post/view_form');
    }

    public function listOfPosts() {
        /** @var User $user */
        $user = auth()->user();
        $post = new Posts();

//        dd($user->posts()->get());
//        dd($post->user()->get());

        return view('/post/list_post'
            , ['posts' => $user->posts()->get(), 'user' => $user]
        );
    }
}

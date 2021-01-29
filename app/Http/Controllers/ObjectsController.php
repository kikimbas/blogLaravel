<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Objects;
use App\Models\Posts;
use App\User;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Request;

class ObjectsController extends Controller {
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
            'address' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'area' => 'required',
            'floor' => 'required',
            'rooms_quantity' => 'required',
            'user_id' => 'required',
        ]);

        $user = auth()->user();

        $objects = new Objects();
        $objects->name = $request->input('name');
        $objects->description = $request->input('description');
        $objects->address = $request->input('address');
        $objects->city_id = $request->input('city_id');
        $objects->price = $request->input('price');
        $objects->currency = $request->input('currency');
        $objects->area = $request->input('area');
        $objects->floor = $request->input('floor');
        $objects->rooms_quantity = $request->input('rooms_quantity');
        $objects->date_created = $request->input('date_created');
        $objects->user_id = $user->id;



        $objects->date_created = date('Y-m-d');

        $objects->save();

        return redirect()->route('list_post');
    }

    public function postEdit($id, Request $request) {
        $objects = new Objects;
        $object = $objects->find($id);
        if($request->name) {
            $object->name = $request->name;
            $object->description = $request->description;

            $objects->address = $request->address;
            $objects->city_id = $request->city_id;
            $objects->price = $request->price;
            $objects->currency = $request->currency;
            $objects->area = $request->area;
            $objects->floor = $request->floor;
            $objects->rooms_quantity = $request->rooms_quantity;

            $object->save();
            return redirect()->route('post_edit', $id);
        }

        Form::model($object, array('route' => array('post_edit', $id)));

        return view('/post/post_edit',
            [
                'postId' => $id,
                'post' => $object,
                'city' => $object ? $object->city()->get()[0]->name : '',
            ]);
    }

    public function index() {
        $city = new City();
        $user = auth()->user();
        return view('/post/view_form', [
            'citys' => $city->all(),
            'userId' => $user->id,
        ]);
    }

    public function listOfPosts() {
        /** @var User $user */
        $user = auth()->user();
//        dd($user->posts()->get());

        return view('/post/list_post'
            , ['posts' => $user->objects()->get(), 'user' => $user]
        );
    }
}

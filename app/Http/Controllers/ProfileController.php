<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProfileController extends Controller
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

    public function edit(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = auth()->user();
//dd($user);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('profile-view');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = auth()->user();
        return view('profile', ['user' => $user]);
    }
}
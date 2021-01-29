<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $u = User::find(1);
//        $u->password = Hash::make('5686411');
//        $u->save();
//        var_dump(Hash::make('5686411'));die;

        $user = auth()->user();
        return view('home', ['user' => $user]);
    }
}

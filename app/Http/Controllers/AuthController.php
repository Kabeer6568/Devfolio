<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showForm(string $type){

    $view = [

    'register' => 'layouts.register',
    'login' => 'layouts.login',

    ];
    
    return view($view[$type]);

    }

    public function register(Request $request){

    $validate = $request->validate([

    'name' => 'required|string|max:255',
    'email'=> 'required|string|max:255',
    'password' => 'required|string|max:255',
    'username' => 'required|string|max:255',

    ]);

    $validate['password'] = bcrypt($validate['password']);

    $user = User::create($validate);

    Auth::login($user);
    
    return redirect()->route('user.dashboard')->with('sucess' , 'registered');

    }

}

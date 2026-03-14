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

    public function login(Request $request){

    $request->validate([

    'login' => 'required|string|max:255',
    'password' => 'required|string|max:255',
 
    ]);

    $filterData = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    $credencials = ([

    $filterData => $request->login,
    'password' => $request->password,

    ]);

    if (Auth::attempt($credencials)) {
    
    return redirect()->route('user.dashboard')->with('sucess' , 'logged In');

    }
    else{

    return back()->withError([

    'login' => 'Username/Email or Password is incorrect'

    ])->onlyOutput('login');

    }

    }

    public function dash(){

        $user = auth()->user();
        
        return view('layouts.admin.dashboard' , compact('user'));
        
    }

    public function home(){

        return route('main.index');

    }

}

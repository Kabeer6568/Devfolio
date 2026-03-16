<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function editPage(){

    $user = auth()->user();
        
        return view('layouts.admin.edit-profile' , compact('user'));

    }

    public function editProfile(Request $request){

        $user = auth()->user();

        $data = $request->validate([

        'name' => 'nullable|string|max:255',
        'title' => 'nullable|string|max:255',
        'location' => 'nullable|string|max:255',
        'email'=> 'nullable|string|max:255|unique:users,email,' . auth()->id(),
        'password' => 'nullable|string|max:255',
        'username' => 'nullable|string|max:255|unique:users,username,' . auth()->id(),
        'bio' => 'nullable|string|max:255',
        'yoe' => 'nullable|string|max:255',
        'social_links' => 'nullable|array',
        'upload_cv' => 'nullable|mimes:pdf,docx,doc|max:2048',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
// Update basic fields using fill() to handle everything in the $data array at once
    $user->fill($request->except(['password', 'avatar', 'upload_cv']));

        // Handle Password 
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('avatar')) {
            
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('profiles' , 'public');
            $user->avatar = $path;

        }
        if ($request->hasFile('upload_cv')) {
            
            if ($user->upload_cv && Storage::disk('public')->exists($user->upload_cv)) {
                Storage::disk('public')->delete($user->upload_cv);
            }

            $path = $request->file('upload_cv')->store('profiles' , 'public');
            $user->upload_cv = $path;

        }

        $user->save();

        return redirect()->route('user.edit')->with('sucess' , 'Data updated');
    }

}

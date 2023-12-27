<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\Users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class UsersController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

public function doLogin (LoginRequest $request)
{
$credentials = $request->validated();

if(Auth::attempt($credentials)){
    $request->session()->regenerate();
    return redirect()->intended(route('articles.all'));
}
return to_route('users.login')->withErrors(['email' => "Email invalide"
])->onlyInput('email');
}

public function logout()
{
    Auth::logout();
    return to_route('users.login');
}

public function SignIn(){
    $users = new Users();
    return view('users.signIn' ,[
        'users' => $users
    ]);
}


    public function doSignIn(loginRequest $request){
         Users::create($request->validated());
        $this->doLogin($request);
        return redirect()->route('articles.all')->with('success' , "Votre compte a bien été créé");
    }
}

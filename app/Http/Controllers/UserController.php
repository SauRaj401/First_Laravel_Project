<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register/ Create form
    public function create(){
        return view('users.register');
    }

    //Create new user

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed','min:6']

        ]);

        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and login');

    }

    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

       return redirect('/')->with('message', 'You have been logout');


    }
    //login form
    public function login(){
        return view('users.login');
    }
    //Authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); 
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message','You are now login');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');


    }

}

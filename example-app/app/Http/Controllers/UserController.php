<?php

namespace App\Http\Controllers;

use App\Models\User;

/*
 *User login registration class
 */

class UserController extends Controller
{
    //Create user page
    public function create()
    {
        return view('user.create');
    }

    //Save the user data
    public function store()
    {
        $attributes = request()->validate([
                'login_name' => 'required|max:255|min:3|unique:users,login_name',
                'user_name' => 'required|max:255',
                'email' => 'required|max:255|email|unique:users,email',
                'password' => 'required|min:6|max:255',
        ]);

        $user = User::create($attributes);
        //login user
        auth()->login($user);

        if (!$user) {
            return redirect('user')->withErrors(['error' => 'Register Error']);
        } else {
            return redirect('/');
        }
    }

    //Go to login page
    public function login()
    {
        return view('user.login');
    }

    //Do login
    public function logindo()
    {
        $attributes = request()->validate([
            'login_name' => 'required|max:255|min:3',
            'password' => 'required|min:6|max:255',
        ]);

        $bool = auth()->attempt($attributes);

        if (!$bool) {
            return redirect('user/login')->withErrors(['error' => 'Login Error']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Login Success');
    }

    //Logout
    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Bey!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('portals.register', [
            'title' => 'Register',
            'active' => 'register',
            'logo_nav' => 'logo-red.png',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        User::create($validatedData);
        
        return redirect('/login')->with('success', 'You have successfully registered your account!');
    }
}

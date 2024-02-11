<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('portals.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);   
    }

    public function store(){
        return request()->all();
    }
}

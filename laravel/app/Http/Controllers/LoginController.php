<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function update(){
        $password = $request->input('password');
        DB::table('users')->update(['password'=>$password]);
    }
}

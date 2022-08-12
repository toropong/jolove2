<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // public function index()
    // {
    //     return view('/');
    // }


    public function store(Request $request)
    {   
        $validation = $request -> validate([
            'userId' => ['required', 'string', 'max:255', 'unique:users'], // 요기 추가
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required',  'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'c_num'    => ['required', 'min:11','max:11']
        ]);

        DB::table('customer')->insert([
            'userId' => $validation['userId'],
            'password' => Hash::make($validation['password']),
            'email' => $validation['email'],
            'name' => $validation['name'],
            'nickname' => $validation['nickname'],
            'c_num' => $validation['c_num'],
        ]);

        return redirect('/');

    }

}

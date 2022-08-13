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
        $input_id = trim($_POST['userId']);
        $customers = DB::table('customer')-> where('userId','=',$input_id)->get()->count();
        $validation = $request -> validate([
            'userId' => ['required', 'string', 'max:255', 'unique:users'], // 요기 추가
            'password' => ['required', 'string', 'min:8'],
            'email' => ['required',  'email', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'c_num'    => ['required', 'min:11','max:11']
        ]);
        
        if($customers<1){
        DB::table('customer')->insert([
            'userId' => $request->input(userId),
            'password' => Hash::make($request->input(password)),
            'email' => $request->input(email),
            'name' => $request->input(name),
            'nickname' => $request->input(nickname),
            'c_num' => $request->input(c_num),
        ]);

        return redirect('/');
    }
}
    public function c_overlap(Request $request)
    {
      $input = $request->input('userId');
      $customers = DB::table('customer')-> where('userId','=',$input)->get()->count();
      return response()->json($customers);
    }
}

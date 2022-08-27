<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;


class WorkController extends Controller
{
    // public function __construct()
    // {
    //     $this->works = new Works();
    // }


public function store(Request $request){

    $path=$request->file('picture')->store('/','public');

    DB::table('works')->insert([
        'title' => $request->input('title'),
        'cont' => $request->input('cont'),
        'year' => $request->input('year'),
        'filename'=>$path
    
    ]);
    return redirect('/');
    
    }

public function index(Request $request){   
    
    $works=DB::table('works')->select('*')->get();
    // ->orderby("no","desc")->paginate(10); 
    
    return view('/index',
    compact('works')
);
}

public function product(Request $request){

    $product=DB::table('works')->select('*')->get();
    return view('product', compact('product')
);


}


}
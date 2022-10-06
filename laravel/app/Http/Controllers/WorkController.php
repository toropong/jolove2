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


    public function store(Request $request)
    {
        
        $files = $request -> file('images');
        // $files = $request->file('picture');
        $path = $request -> file('picture') -> store('/', 'public');
        $subpath =  $files[1] -> store('/', 'public');
        $subpath2 =  $files[0] -> store('/', 'public');
        console.log("$file[0],$file[1]");
        // $subpath3 = $request -> file('images') -> store('/', 'public');
        // $subpath4 = $request -> file('images') -> store('/', 'public');
        // $subpath5 = $request -> file('images') -> store('/', 'public');


        DB::table('works')->insert([
        'title' => $request->input('title'),
        'cont' => $request->input('cont'),
        'year' => $request->input('year'),
        'filename'=>$path,
        'subimage_1'=>$subpath,
        'subimage_2'=>$subpath2,
        // 'subimage_3'=>$subpath3,
        // 'subimage_4'=>$subpath4,
        // 'subimage_5'=>$subpath5
        ]);
        return redirect('/');
    
            
    }

    public function index(Request $request)
    {
    
        $works=DB::table('works')->select('*') -> orderby("no", "desc")->paginate(10);
    
        return view('/index', compact('works')
        );
    }

    public function product(Request $request){

        $product=DB::table('works')->select('*')->get();
        return view('product', compact('product')
        );
    }
}
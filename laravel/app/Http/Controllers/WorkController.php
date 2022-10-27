<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Session;


class WorkController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public $user;

    public function __construct()
    {
        $this->works = new Works();
    }


    public function store(Request $request)
    {
        
        $files = $request -> file('images');
        // $files = $request->file('picture');
        $path = $request -> file('picture') -> store('/', 'public');
        $subpath =  $files[0] -> store('/', 'public');
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
    
        $works=DB::table('works')->select('*') -> orderby("visit_count", "desc")->paginate(10);
    
        return view('/index', compact('works')
        );
    }
    

    public function product(Request $request){
        $id = session()->get('userid');
        //조회수 카운트
        if( $visit =\App\Models\Works::where('no', $request->no)
        ->first() ) {
            
            $visit->visit_count++;
            $data["result"] = $visit->update();
            $data["no"] = $visit->no;
        } else {
            $visit = new \App\Models\Works;
            $visit->no = $request->no;
            $visit->visit_count++;
            $data["result"] = $visit->save();
            $data["no"] = $visit->no;
        }         

        $data["product"] = [];
        $data["product"]= \App\Models\Works::select()
        ->where(function ($query) use ($request) {
            if ($request->no) {
                    $query->where("no", $request->no);
            }         
        })->get();

        return view('product', $data);
    }
}
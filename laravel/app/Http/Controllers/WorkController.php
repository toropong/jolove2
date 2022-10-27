<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
// use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class WorkController extends Controller
{
    // public function __construct()
    // {
    //     $this->works = new Works();
    // }


    public function store(Request $request)
    {   
        // // $files = $request->file('picture');
        $path = $request -> file('picture') -> store('/', 'public');
        $subpath =  $request -> file('picture2') -> store('/', 'public');
        $subpath2 =  $request -> file('picture3') -> store('/', 'public');
        $subpath3 = $request -> file('picture4') -> store('/', 'public');
       

        DB::table('works')->insert([
        'title' => $request->input('title'),
        'cont' => $request->input('cont'),
        'year' => $request->input('year'),
        'filename'=>$path,
        'subimage_1'=>$subpath,
        'subimage_2'=>$subpath2,
        'subimage_3'=>$subpath3,
      
        ]);
        return redirect('/');
    
            
    }

    public function index(Request $request)
    {
    
        $works=DB::table('works')->select('*') -> orderby("no", "asc")->paginate(10);
    
        return view('/index', compact('works')
        );
    }

    public function product($no){

        $product = DB::table('works')->select('*')->where('no', '=' , $no)->get();
        
        return view('product', compact('product')
        );
    }
    public function like(Request $request){
       
        $u_no = Auth::user()->id;
        $favorite = DB::table('users')
        ->join('likes', 'users.id','likes.u_no' )
        ->join('works','users.w_no','works.no')->get();
        // $likevalue = $request->input('likevalue');
        // $u_jg = DB::table('users')->select('u_like')->where('id','=',$u_no)->get();
        
        // if(count($u_u)<1){
        //  DB::table('users')->where('id','=',$u_no)->update([
        //     'u_like' => '1'
        // ]);
        // }
        // else {
        //     DB::table('users')->where('id','=',$u_no)->update([
        //         'u_like' => '0'
        //     ]);
        // }
        // $count=DB::table('users')
        // // ->join('likes','users.id','=','likes.u_no')
        // ->select('u_like')->count();
        return response()->json($favorite);
        }
    // }
}
    

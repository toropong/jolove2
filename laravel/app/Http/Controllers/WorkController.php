<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
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
        // // $files = $request->file('picture');
        $path = $request -> file('picture') -> store('/', 'public');
        $subpath =  $request -> file('picture2') -> store('/', 'public');
        $subpath2 =  $request -> file('picture3') -> store('/', 'public');
        $subpath3 = $request -> file('picture4') -> store('/', 'public');
               $u_no = Auth::user()->id;
       
        DB::table('works')->insert([
        'title' => $request->input('title'),
        'cont' => $request->input('cont'),
        'year' => $request->input('year'),
        'filename'=>$path,
        'subimage_1'=>$subpath,
        'subimage_2'=>$subpath2,
        'subimage_3'=>$subpath3,
              'u_no' =>$u_no,
        ]);
        return redirect('/');
    
            
    }


    public function index(Request $request)
    {
        $data["lists"] = [];
        $data["lists"]= \App\Models\Works::select()
        ->where(function ($query) use ($request) {
            if ($request->year) {
                    $query->where("year", $request->year);
            }
        })-> orderby("visit_count", "desc")->paginate(10);
        return view('index', $data);
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
    public function like(Request $no){
        $w_no = DB::table('works')->select('u_no')->where('no','=',$no)->get();
        $w_on = $w_no[0];
        $u_no = Auth::user()->id;
        DB::table('likes')->insert([
            'u_no'=>$u_no,
            'w_no'=>$w_on,
        ]);
        $favorite = DB::table('likes')
        ->join('users', 'likes.u_no','users.id')
        ->join('likes','works.no','likes.w_no')
        ->select('*')->get();
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
        // dd($favorite);
        return response()->json($w_no);
        }
    // }
}
    

<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Works;
use App\Models\Likes;
use App\Models\Comments;
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
        $this->likes = new Likes();
        $this->comments = new Comments();
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
        
        $data["likes"]= \App\Models\Works::select("likes.w_no")
        ->leftjoin('likes', 'no', '=', 'likes.w_no')
        ->where(function ($query) use ($request) {
            if ($request->no) {
                    $query->where("no", $request->no);
            }
        })->count();

         #댓글
         $data["comment"]=[];
         $data["comment"]= \App\Models\Comments::select()
         ->leftjoin('works', 'works.no', '=', 'comments.w_no')
         ->where(function ($query) use ($request) {
           if($request->no) {
                  $query->where("no", $request->no);
              }
          })->get();
         return view('product', $data);
     }
 
     public function comment_update(Request $request){

        $u_no = Auth::user()->id;
        $c_comments = $request->c_comments;  
        $w_no = $request->w_no; 

        
        DB::table('comments')->insert([
            'c_comments' =>$c_comments,
            'w_no' => $w_no ,
            'u_no' =>$u_no,
            ]); 

        return response(1);


        //  $result = [];
        //  if( $request->no ) {
        //      $comments = \App\Models\Comments::where('no', $request->no)->get();
        //  } else {
        //      $comments = new Comments();
        //  }
 
        //  $comments->c_comments = $request->c_comments ?? ""; 
        //  $comments->u_no = session()->get('id')  ?? 0; 
        //  $comments->w_no = $request->no  ?? 0;
 

        // $result['result'] = $comments->save();
                                                            
        //  return response($result);
    }
    
    public function like(Request $request){
        $w_no = $request->input('w_no');
        $u_no = Auth::user()->id;
        if(\App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->doesntExist()){
        DB::table('likes')->insert([
            'u_no'=>$u_no,
            'w_no'=>$w_no,
        ]);
        $favorite = \App\Models\Likes::select('l_no')->where('w_no','=',$w_no)->count();
        return response()->json($favorite);
    }
    else if(\App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->exists()){
        \App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->delete();
        $favorite = \App\Models\Likes::select('l_no')->where('w_no','=',$w_no)->count();
        return response()->json($favorite);
    } 
     }
     public function find_id(Request $request)
     {   
         $i_name = $request->input('name');
         $phone_num = $request->input('phone_num');
         $name = DB::table('users')->select('userid')->where('name','=',$i_name)->get();
         $name2 = $name[0]->userid;
        
         if(DB::table('users')->where('name','=',$i_name)->where('c_num','=',$phone_num)->exists()){
            echo "<script>alert('회원님의 ID는 $name2 입니다');history.back();
            </script>";  
     }
     else{
        echo "<script>alert('없는 계정입니다.'); history.back();</script>";
     }
     }
     public function find_pw(Request $request){
        $u_id = $request->input('id');
        
        if(DB::table('users')->where('userid','=',$u_id)->exists()){
            return redirect('password/reset');   
        }
        
    }

}
    

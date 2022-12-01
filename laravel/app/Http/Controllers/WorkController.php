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

    //
    public function __construct()
    {
        $this->works = new Works();
        $this->likes = new Likes();
        $this->comments = new Comments();
    }


    public function store(Request $request)
    {   $u_no = Auth::user()->id;
        $file1= $request -> file('picture2');
        $file2= $request -> file('picture3');
        $file3= $request -> file('picture4');
        $year = $request -> input('year');
        $path = $request -> file('picture') -> store('/', 'public');
        

        if($file1!=null){
        $subpath =  $request -> file('picture2') -> store('/', 'public');
       }
       if($file2!=null){
        $subpath2 =  $request -> file('picture3') -> store('/', 'public');
       }
       else{
        $subpath2 = '';
       }
       if($file3!=null){
        $subpath3 = $request -> file('picture4') -> store('/', 'public');
              }
              else{
                $subpath3='';
              }
        if(2023<$year||$year<2020){
            echo"<script>alert('2020년도부터 2023년도 사이만 등록가능합니다.');location.reload();
            history.back();</script>";
        }
         
       if(isset($file1)){
        DB::table('works')->insert([
        'title' => $request->input('title'),
        'cont' => $request->input('cont'),
        'year' => $request->input('year'),
        'filename'=>$path,
        'u_no' =>$u_no,
        'subimage_1'=>$subpath,
        'subimage_2'=>$subpath2,
        'subimage_3'=>$subpath3,
        ]);
        echo "<script>alert('등록되었습니다.');
        window.close();</script>";
    }
     else{
        DB::table('works')->insert([
            'title' => $request->input('title'),
            'cont' => $request->input('cont'),
            'year' => $request->input('year'),
            'filename'=>$path,
            'u_no' =>$u_no,
        ]);
        echo "<script>alert('등록되었습니다.');
        window.close();</script>";
     }
       
    }
       
            


    public function index(Request $request)
    {
        $data["lists"] = [];
        $data["lists"]= \App\Models\Works::select()
        ->where(function ($query) use ($request) {
            if ($request->year) {
                    $query->where("year", $request->year);
            }
        })-> orderby("visit_count", "desc")->simplepaginate(8);
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
        
        $data["likes"]= \App\Models\Likes::select("likes.u_no")
        ->leftjoin('works', 'likes.w_no', '=', 'works.no')
        ->where(function ($query) use ($request) {
            if ($request->no) {
                    $query->where("no", $request->no);
            }
        })->count();

        if( Auth::user()){
        $data["likes2"]= \App\Models\Likes::select("*")
        ->where(function ($query) use ($request) {
            if ($request->no) {
                    $query->where("w_no", $request->no);
            }
        })->where('u_no' , Auth::user()->id)
        ->count();
    }
    else{
        $data["likes2"]=0; 
    }

         #댓글
         $data["comment"]=[];
         $data["comment"]= \App\Models\Comments::select("users.userid","comments.c_comments","comments.c_no")
         ->leftjoin('works', 'works.no', '=', 'comments.w_no')
         ->leftjoin('users','users.id','=','comments.u_no')
         ->where(function ($query) use ($request) {
           if($request->no) {
                  $query->where("no", $request->no);
              }
          })->get();

         return view('product', $data);

        
     }


     ## 댓글 작성
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
        
    }


    ##댓글 삭제
    public function comment_delete($id)
    {  
        //  $c_no = $request->c_no;
       DB::table('comments')->where('c_no', '=' , $id)->delete();
       echo "<script>alert('삭제되었습니다.'); location.href=document.referrer;</script>";
    }
    

    public function like(Request $request){
        $w_no = $request->input('w_no');
        $u_no = Auth::user()->id;
        
        if(\App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->doesntExist()){
        DB::table('likes')->insert([
            'u_no'=>$u_no,
            'w_no'=>$w_no,
        ]);
        $favorite['a'] = \App\Models\Likes::select('l_no')->where('w_no','=',$w_no)->where('u_no','=',$u_no)->count();
        //favorite[a]는 하트 색변경
        //favorite[b]는 좋아요 수
        $favorite['b'] = \App\Models\Likes::select('u_no')->where('w_no','=',$w_no)->count();
        return response()->json($favorite);
    }
    else if(\App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->exists()){
        \App\Models\Likes::where('w_no','=',$w_no)->where('u_no','=',$u_no)->delete();
        $favorite['a'] = \App\Models\Likes::select('l_no')->where('w_no','=',$w_no)->where('u_no','=',$u_no)->count();
        $favorite['b'] = \App\Models\Likes::select('u_no')->where('w_no','=',$w_no)->count();
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

    public function result(Request $request)
    {
  
      //insert data
      $search_query = $request->input('query');
  
      //input data와 동일한 값을 Product table의 이름을 기준으로 Search
      $result_data = DB::table('works')->where('title','like','%'.$search_query.'%')->get();
      //input data 결과가 없을 경우 사용할 count
      $result_name = $result_data->count();
  
      return view('search_result',
      ['result_data'=>$result_data,
      'search_query'=>$search_query,
      'result_cnt'=>$result_name]
    );
  
  }
  public function all(Request $request){
    $data["lists"] = [];
    $data["lists"]= \App\Models\Works::select('*')
    -> orderby("visit_count", "desc")->simplepaginate(8);
    return view('index', $data);
  }

}
    
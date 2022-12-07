<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Works;
use App\Models\Likes;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Spatie\Analytics\Period;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Analytics;
use Session;

class ManagerController extends Controller
{
  
    function manage(Request $request){

      $data = Analytics::fetchTotalVisitorsAndPageViews(Period::days(29));
       $dat=0;
     for($i=0; $i<count($data); $i++){
       $dat += Arr::get($data[$i], 'visitors');
     }

     $data2 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(6));
       $dat2=0;
     for($i=0; $i<count($data2); $i++){
       $dat2 += Arr::get($data2[$i], 'visitors');
     }

     $data1 = Analytics::fetchTotalVisitorsAndPageViews(Period::days(0));
     $dat1 =Arr::get($data1[0], 'visitors');

       $level = Auth::user()->level;
       if($level==2){
        $data["manage"] = [];
        $data["manage"] = DB::table('users')->select('*')->get();
        
      //  dd($analytics);

       return view('manage/manage', $data ,[
        'data'=>$data,
        'data1'=>$data1,
        'dat'=>$dat,
        'dat1'=>$dat1,
        'dat2'=>$dat2,

       ]);
       
       }
       else{
           echo"<script>alert('권한이 없습니다.'); history.back();</script>";
       }
    }

    function tables(Request $request){
        $data["work"] = [];
        $data["work"] = DB::table('works')->select('*')->orderby("no", "asc")->get();
        // $data["like1"] = [];
        // $like1 = DB::table('likes')->select('*')->get();
        // // $data["like2"] = [];
        // $like2 = DB::table('works')->union($like1)->get();
        
        // dd($like2);
        return view('manage/tables', $data);
    }

    function remove($id){
        DB::table('users')->where('id','=',$id)->delete();
        echo "<script>alert('삭제되었습니다.');location.href=document.referrer;</script>";
    }

    function w_remove($id){
        DB::table('works')->where('no','=',$id)->delete();
          echo "<script>alert('삭제되었습니다.'); location.href=document.referrer;</script>";
    }
}

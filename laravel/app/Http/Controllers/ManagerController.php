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
use Carbon\Carbon;
use Analytics;
use Session;

class ManagerController extends Controller
{
  
    function manage(Request $request){

        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        $level = Auth::user()->level;
        if($level==2){
        $data["manage"] = [];
        $data["manage"] = DB::table('users')->select('*')->get();

       return view('manage/manage', $data, $analyticsData);
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
        echo "<script>alert('삭제되었습니다.');</script>";
          return redirect('manage');
    }

    function w_remove($id){
        DB::table('works')->where('no','=',$id)->delete();
          echo "<script>alert('삭제되었습니다.');</script>";
        return redirect('manage');
    }
}

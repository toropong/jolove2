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

class ManagerController extends Controller
{
    function manage(Request $request){
        $data["manage"] = [];
        $data["manage"] = DB::table('users')->select('*')->get();
       return view('manage/manage', $data);
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
          return redirect('manage')->with('alert','삭제되었습니다.');
    }

    function w_remove($id){
        DB::table('works')->where('no','=',$id)->delete();
          return redirect('manage')->with('alert','삭제되었습니다.');
    }
}

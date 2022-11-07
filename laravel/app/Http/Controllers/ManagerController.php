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
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
        /*
        |--------------------------------------------------------------------------
        | Register Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles the registration of new users as well as their
        | validation and creation. By default this controller uses a trait to
        | provide this functionality without requiring any additional code.
        |
        */
    
        // use RegistersUsers;
    
        /**
         * Where to redirect users after registration.
         *
         * @var string
         */
        protected $redirectTo = RouteServiceProvider::HOME;
    
        /**
         * Create a new controller instance.
         *
         * @return void
         */
    public function __construct()
    {
            $this->middleware('guest');
    }
    
        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
    protected function validator(array $data)
    {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'userid' => ['required', 'string',  'max:255', 'unique:users'],
                'c_num' => ['required', 'string', 'max:11', 'min:11'],
            ]);
    }
    
        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\Models\User
         */
    protected function create(array $data)
    {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'userid' => $data['userid'],
                'c_num' => $data['c_num'],
                'password' => Hash::make($data['password']),
            ]);
            return redirect('/');
    }
}
    // public function index()
    // {
    //     return view('/');
    // }


//     public function store(Request $request)
//     {  
//         $input_id = trim($_POST['userId']);
//         $customers = DB::table('customer')-> where('userId','=',$input_id)->get()->count();
//         $validation = $request -> validate([
//             'userId' => ['required', 'string', 'max:255', 'unique:users'], // 요기 추가
//             'password' => ['required', 'string', 'min:8'],
//             'email' => ['required',  'email', 'max:255', 'unique:users'],
//             'name' => ['required', 'string', 'max:255'],
//             'nickname' => ['required', 'string', 'max:255'],
//             'c_num'    => ['required', 'min:11','max:11']
//         ]);
        
//         if($customers<1){
//         DB::table('customer')->insert([
//             'userId' => $request->input(userId),
//             'password' => Hash::make($request->input(password)),
//             'email' => $request->input(email),
//             'name' => $request->input(name),
//             'nickname' => $request->input(nickname),
//             'c_num' => $request->input(c_num),
//         ]);

//         return redirect('/');
//     }
// }
//     public function c_overlap(Request $request)
//     {
//       $input = $request->input('userId');
//       $customers = DB::table('customer')-> where('userId','=',$input)->get()->count();
//       return response()->json($customers);
//     }


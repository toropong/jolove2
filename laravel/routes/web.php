<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WorkController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'LoginController@login');

Route::get('/index/{year}',[WorkController::class, 'index']); 

Route::get('/product/{no}',[WorkController::class, 'product']); 

// Route::post('/product/like',[WorkController::class, 'like']);

Route::post('/product/test','WorkController@like');

Route::post('/product/update','WorkController@comment_update' );

Route::post('/product/delete','WorkController@comment_delete' );

Route::get('/register', function () {
    return view('register');
});

Route::get('/findid', function () {
    return view('findid');
});

Route::get('/findpw', function () {
    return view('findpw');
});

Route::get('/manage', 'ManagerController@manage' );

Route::get('/tables', 'ManagerController@tables' );

Route::any('/search', 'WorkController@result');

Route::post('/find','WorkController@find_id');

Route::post('/findpw','WorkController@find_pw');

Route::post('/image', 'WorkController@store');

Route::post('/remove/{id}', 'ManagerController@remove');

Route::post('/w_remove/{id}', 'ManagerController@w_remove');


//  Route::get('register', [RegisterController::class, 'index']) -> name('register');
Route::post('/register', 'RegisterController@store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/image_popup', function () {
    return view('image');
});

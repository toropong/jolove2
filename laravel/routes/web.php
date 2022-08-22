<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('index');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/findid', function () {
    return view('findid');
});

//  Route::get('register', [RegisterController::class, 'index']) -> name('register');
Route::post('/register', 'RegisterController@store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/image_popup', function () {
    return view('image');
});

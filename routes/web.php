<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// rotta home_public fatta con HomeController
Route::get('/', 'HomeController@index');
// rotta per lo show tramite slug fatta con PostController
Route::get('/post/{slug}', 'PostController@show')->name('posts.show');

Auth::routes();


//raggruppo tutte le rotte dell'area riservata admin
//rotte area riservata
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin')->group(function(){
  Route::get('/', 'HomeController@index')->name('home_login');
  Route::resource('/posts', 'PostController');
});

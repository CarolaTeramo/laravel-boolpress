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
Route::get('/', 'HomeController@index')->name('home_public');
// rotta per lo show public tramite slug fatta con PostController public
Route::get('/post/{slug}', 'PostController@show')->name('posts.show_public');
//rotta pubblica per indirizzare alla pagina che seleziona tutti i post di 1 categoria
//categories???
Route::get('/categories/{slug}', 'PostController@posts_of_x_category')->name('posts.posts_of_x_category');
Route::get('/tags/{slug}', 'PostController@posts_of_x_tags')->name('posts.posts_of_x_tags');

Auth::routes();


//raggruppo tutte le rotte dell'area riservata admin
//rotte area riservata
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
  Route::get('/', 'HomeController@index')->name('home_login');
  //rotte per le crud dell'area riservata con file (in view) inseriti nella
  //cartella post
  Route::resource('posts', 'PostController');
});

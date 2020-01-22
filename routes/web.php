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

Route::get('/', 'PostController@index')->name('welcome');
Route::resource('/complain', 'ComplaintsController');

Route::get('/viewpost', function () {
    return view('post');
});

Auth::routes();


Route::get('complain/masukan', 'ComplaintsController@masukan')->name('complain.masukan')->middleware('auth');
Route::get('complain/keluhan', 'ComplaintsController@keluhan')->name('complain.keluhan')->middleware('auth');
Route::get('complain/{complaint}', 'ComplaintsController@show')->middleware('auth');


Route::resource('/post', 'PostController');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::delete('/posts/{id}', 'HomeController@destroy');
Route::get('test', function () {
    event(new App\Events\ComplaintNotif('Someone'));
    return "Event has been sent!";
});
Route::get('/coba', function(){
    return view("test");
});

Route::get('/notif', 'ComplaintsController@notif');
Route::get('/terkonfirmasi', 'ComplaintTaskController@index')->name('terkonfirmasi');
Route::patch('/terkonfirmasi/{task}', 'ComplaintTaskController@update');

Route::post('/complaint/{complaint}/tasks', 'ComplaintTaskController@store');
Route::resource('/home', 'HomeController');
Route::delete('/img/{id}', 'HomeController@img');

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

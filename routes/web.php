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

// Auth::routes();

Route::resource('/admin-setting', 'UserController');

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
Route::get('/ubah-password', function(){
    return view("auth.passwords.reset");
});

Route::get('/notify', 'HomeController@notify');

Route::get('/lupa-password', 'ComplaintsController@form')->name('form');
Route::post('/reset', 'ComplaintsController@attempt')->name('reset');

Route::get('/notif', 'ComplaintsController@notif');
Route::get('/terkonfirmasi', 'ComplaintTaskController@index')->name('terkonfirmasi');
Route::patch('/terkonfirmasi/{task}', 'ComplaintTaskController@update');

Route::post('/complaint/{complaint}/tasks', 'ComplaintTaskController@store');
Route::resource('/home', 'HomeController');
Route::delete('/img/{id}', 'HomeController@img');
Route::delete('/deletnotif', 'HomeController@deletNotif');

Auth::routes([
    'register' => false, // Registration Routes...
]);

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

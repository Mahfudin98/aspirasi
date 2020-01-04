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

Route::get('/tambah-admin', function () {
    return view('admin.createadmin');
});

Route::get('/list-admin', function () {
    return view('admin.listadmin');
});

Route::get('/ubah-password', function () {
    return view('admin.ubahpassword');
});

Route::get('/terkonfirmasi', function () {
    return view('admin.terkonfirmasi');
});

Auth::routes();


Route::get('complain', 'ComplaintsController@index')->middleware('auth');
Route::get('complain/{complaint}', 'ComplaintsController@show')->middleware('auth');


Route::resource('/post', 'PostController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

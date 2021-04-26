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
    return redirect('/admin/login');
});

// Route::get('/', function () {
//     return view('/admin/master');
// });

Auth::routes();

Route::post('/admin/postlogin', 'UserController@postlogin');

Route::get('/admin/login', 'UserController@login');

Route::get('/admin/logout', 'UserController@logout');

Route::get('/admin/user/index', 'UserController@index');

Route::get('/admin/template/dashboard', 'HomeController@index');

Route::get('/admin/kriteria/index', 'KriteriaAHPController@index');

Route::get('/admin/teacher/index', 'TeacherController@index');

Route::get('/admin/penilain/index', 'PenilaianController@index');

// Route::get('/admin/home', 'HomeController@index')->name('home');

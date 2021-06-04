<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/admin/user/index', 'UserController@index');
Route::get('/admin/user/create', 'UserController@create');
Route::post('/admin/user', 'UserController@store')->name('user.store');
Route::get('/admin/user/{user}/edit', 'UserController@edit');
Route::put('/admin/user/{user}', 'UserController@update')->name('user.update');
Route::delete('/admin/user/{user}', 'UserController@delete')->name('user.delete');

Route::get('/admin/template/dashboard', 'HomeController@index');

Route::get('/admin/kriteria/index', 'KriteriaAHPController@index');
Route::get('/admin/kriteria/create', 'KriteriaAHPController@create');
Route::post('/admin/kriteria', 'KriteriaAHPController@store')->name('kriteria.store');
Route::get('/admin/kriteria/{kriteria}/edit', 'KriteriaAHPController@edit');
Route::put('/admin/kriteria/{kriteria}', 'KriteriaAHPController@update');
Route::delete('/admin/kriteria/{kriteria}', 'KriteriaAHPController@delete')->name('kriteria.delete');
Route::get('/admin/kriteria/{kriteria}/detail', 'KriteriaAHPController@detail');
Route::get('/admin/kriteria/matriks', 'KriteriaAHPController@matriks')->name('matriks');
Route::post('/admin/kriteria/matriks/update', 'KriteriaAHPController@matriksUpdate')->name('matriks.update');

Route::get('/admin/teacher/index', 'TeacherController@index');
Route::get('/admin/teacher/{user}/edit', 'TeacherController@edit');

Route::get('/admin/penilaian/index', 'PenilaianController@index')->name('admin.penilaian.index');
Route::get('/admin/penilaian/import_form', 'PenilaianController@importForm');
Route::post('/admin/penilaian/import', 'PenilaianController@import')->name('import');

Route::get('/admin/ahp', 'AhpMethodController@index')->name('ahp');
Route::get('/admin/ahp/generate', 'AhpMethodController@generate')->name('ahp.generate');

Route::get('/admin/wp', 'AhpMethodController@index')->name('wp');
Route::get('/admin/wp/generate', 'AhpMethodController@generate')->name('wp.generate');

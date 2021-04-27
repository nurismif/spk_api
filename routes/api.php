<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/users', 'UserController@get_all_user');
Route::post('/user/guru', 'UserController@insert_guru');
Route::post('/user/kepsek', 'UserController@insert_kepsek');
Route::post('/user/tim_pkg', 'UserController@insert_tim_pkg');
Route::post('/users/postapilogin', 'UserController@postApiLogin');
Route::put('/user/update/{id}', 'UserController@update_user');
Route::delete('/user/delete/{id}', 'UserController@delete_user');


Route::get('/penilaian', 'PenilaianController@get_all_penilaian');
Route::post('/penilaian/insert_nilai_ahp', 'PenilaianController@insert_nilai_ahp');
Route::put('/penilaian/update/{id}', 'PenilaianController@update_nilai_ahp');
Route::delete('/penilaian/delete/{id}', 'PenilaianController@delete_nilai_ahp');


Route::get('/kri_ahp', 'KriteriaAHPController@get_all_kr_ahp');
Route::post('/kri_ahp/tambah_kri_ahp', 'KriteriaAHPController@insert_kri_ahp');
Route::put('/kri_ahp/update/{id_kr_ahp}', 'KriteriaAHPController@update_kri_ahp');
Route::delete('/kri_ahp/delete/{id_kr_ahp}', 'KriteriaAHPController@delete_kri_ahp');

Route::get('/detail_kri', 'DetailController@get_all_detailpen');
Route::post('/detail_kri/tambah_detail', 'DetailController@insert_detail');
Route::put('/detail_kri/update/{id}', 'DetailController@update_detail');
Route::delete('/detail_kri/delete/{id_kr_ahp}', 'DetailController@delete_detail');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

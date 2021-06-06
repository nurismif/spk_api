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

// Users
Route::get('/users', 'UserController@get_all_user');
Route::post('/user/guru', 'UserController@insert_guru');
Route::get('/user/guru/ranking', 'UserController@get_ranking_guru');
Route::get('/user/guru/ranking/ahp', 'UserController@get_ranking_guru_ahp');
Route::post('/user/kepsek', 'UserController@insert_kepsek');
Route::post('/user/tim_pkg', 'UserController@insert_tim_pkg');
Route::post('/users/postapilogin', 'UserController@postApiLogin');
Route::put('/user/update/{id}', 'UserController@update_user');
Route::delete('/user/delete/{id}', 'UserController@delete_user');
//Untuk get data profile berdasarkan id user
Route::get('/user/{id}/profile', 'UserController@get_profile_user');

Route::get('/penilaian', 'PenilaianController@get_all_penilaian');
Route::post('/penilaian/insert_nilai_ahp', 'PenilaianController@insert_nilai_ahp');
Route::put('/penilaian/update/{id}', 'PenilaianController@update_nilai_ahp');
Route::delete('/penilaian/delete/{id}', 'PenilaianController@delete_nilai_ahp');
//Untuk get data daftar nilai berdasarkan id user
Route::get('/penilaian/{id}/nilai', 'UserController@get_nilai_user');

Route::get('/kri_ahp', 'KriteriaAHPController@get_all_kr_ahp');
Route::post('/kri_ahp/tambah_kri_ahp', 'KriteriaAHPController@insert_kri_ahp');
Route::put('/kri_ahp/update/{id_kr_ahp}', 'KriteriaAHPController@update_kri_ahp');
Route::delete('/kri_ahp/delete/{id_kr_ahp}', 'KriteriaAHPController@delete_kri_ahp');
//Untuk get detail kriteria berdasarkan id kriteria
Route::get('/kri_ahp/{id_kr_ahp}/detail', 'KriteriaAHPController@get_detail_kriteria_ahp');

Route::get('/detail_kri', 'DetailController@get_all_detailpen');
Route::post('/detail_kri/tambah_detail', 'DetailController@insert_detail');
Route::put('/detail_kri/update/{id}', 'DetailController@update_detail');
Route::delete('/detail_kri/delete/{id}', 'DetailController@delete_detail');

Route::get('/perbandingan', 'PerbandinganController@get_all_perbandingan');
Route::post('/perbandingan/tambah_perbandingan', 'PerbandinganController@insert_perbandingan');
Route::put('/perbandingan/update/{id}', 'PerbandinganController@update_perbandingan');
Route::delete('/perbandingan/delete/{id}', 'PerbandinganController@delete_perbandingan');

Route::get('/nil_perbandingan', 'NilaiPerbandinganController@get_all_nil_perbandingan');
Route::post('/nil_perbandingan/tambah_nil_perbandingan', 'NilaiPerbandinganController@insert_nil_perbandingan');
Route::put('/nil_perbandingan/update/{id}', 'NilaiPerbandinganController@update_perbandingan');
Route::delete('/nil_perbandingan/delete/{id}', 'NilaiPerbandinganController@delete_perbandingan');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
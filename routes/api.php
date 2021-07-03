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

Route::group(['middleware' => ['cors', 'json.response']], function () {
    // Public
    Route::post('/auth/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/users/postapilogin', 'Api\ApiUserController@postApiLogin');
    // Dashboard
    Route::get('/dashboard/ahp', 'Api\ApiDashboardController@showAhpChart');
    Route::get('/dashboard/wp', 'Api\ApiDashboardController@showWpChart');
    Route::get('/dashboard/hasil-akhir', 'Api\ApiDashboardController@showHasilAkhirChart');
    // auth routes
    Route::middleware('auth:api')->group(function () {
        // Logout
        Route::post('/auth/logout', 'Api\AuthController@logout')->name('logout.api');
        // Users
        Route::get('/users', 'Api\ApiUserController@getAllUser');
        Route::get('/users/guru', 'Api\ApiUserController@getAllGuru');
        //Untuk get data profile sendiri
        Route::get('/user/profile', 'Api\ApiUserController@getMyProfile');
        Route::post('/users/guru', 'Api\ApiUserController@storeGuru');
        Route::get('/user/guru/ranking', 'Api\ApiUserController@getRankGuru');
        Route::get('/user/guru/ranking/ahp', 'Api\ApiUserController@getRankGuruAhp');
        Route::post('/user/kepsek', 'Api\ApiUserController@storeKepsek');
        Route::post('/user/tim_pkg', 'Api\ApiUserController@storeTimPkg');
        Route::put('/user/update/{id}', 'Api\ApiUserController@updateUser');
        Route::delete('/user/delete/{id}', 'Api\ApiUserController@deleteUser');
        //Untuk get data profile berdasarkan id user
        Route::get('/user/{id}/profile', 'Api\ApiUserController@getProfileUser');
        //Untuk get data daftar nilai berdasarkan id user
        Route::get('/penilaian/{id}/nilai', 'Api\ApiUserController@getNilaiUser');
        //untuk get data penilaian dan juga daftar kriteria
        Route::get('/penilaian', 'Api\ApiPenilaianController@getAllPenilaian');
        Route::post('/penilaian/insertNilaiAhp', 'Api\ApiPenilaianController@insertNilaiAhp');
        Route::put('/penilaian/update/{id}', 'Api\ApiPenilaianController@updateNilaiAhp');
        Route::delete('/penilaian/delete/{id}', 'Api\ApiPenilaianController@deleteNilaiAhp');

        Route::get('/kri_ahp', 'Api\ApiKriteriaController@getAllKriteriaAhp');
        Route::post('/kri_ahp/tambah_kri_ahp', 'Api\ApiKriteriaController@storeKriteriaAhp');
        Route::put('/kri_ahp/update/{id_kr_ahp}', 'Api\ApiKriteriaController@updateKriteriaAhp');
        Route::delete('/kri_ahp/delete/{id_kr_ahp}', 'Api\ApiKriteriaController@deleteKriteriaAhp');
        //Untuk get detail kriteria berdasarkan id kriteria
        Route::get('/kri_ahp/{id_kr_ahp}/detail', 'Api\ApiKriteriaController@detailKriteriaAhp');

        Route::get('/detail_kri', 'Api\ApiDetailController@getAllDetailKriteria');
        Route::post('/detail_kri/tambah_detail', 'Api\ApiDetailController@storeDetailKriteria');
        Route::put('/detail_kri/update/{id}', 'Api\ApiDetailController@updateDetailKriteria');
        Route::delete('/detail_kri/delete/{id}', 'Api\ApiDetailController@deleteDetailKriteria');

        Route::get('/perbandingan', 'Api\ApiPerbandinganController@getAllPerbandingan');
        Route::post('/perbandingan/tambah_perbandingan', 'Api\ApiPerbandinganController@storePerbandingan');
        Route::put('/perbandingan/update/{id}', 'Api\ApiPerbandinganController@updatePerbandingan');
        Route::delete('/perbandingan/delete/{id}', 'Api\ApiPerbandinganController@deletePerbandingan');

        Route::get('/nil_perbandingan', 'Api\ApiNilaiPerbandinganController@getAllNilaiPerbandingan');
        Route::post('/nil_perbandingan/tambah_nil_perbandingan', 'Api\ApiNilaiPerbandinganController@storeNilaiPerbandingan');
        Route::put('/nil_perbandingan/update/{id}', 'Api\ApiNilaiPerbandinganController@updateNilaiPerbandingan');
        Route::delete('/nil_perbandingan/delete/{id}', 'Api\ApiNilaiPerbandinganController@deleteNilaiPerbandingan');

        Route::get('/ahp', 'Api\ApiAhpMethodController@index');
        Route::get('/ahp/generate', 'Api\ApiAhpMethodController@generate');

        Route::get('/wp', 'Api\ApiWpMethodController@index');
        Route::get('/wp/generate', 'Api\ApiWpMethodController@generate');

        Route::get('/hasil-akhir', 'Api\ApiHasilAkhirController@index');
        Route::get('/hasil-akhir/generate', 'Api\ApiHasilAkhirController@generate');
    });
});

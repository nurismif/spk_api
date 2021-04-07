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

Route::get('/kri_ahp', 'KriteriaAHPController@get_all_kr_ahp');

Route::post('/kri_ahp/tambah_kri_ahp', 'KriteriaAHPController@insert_data_kri_ahp');

Route::put('/kri_ahp/update/{id_kr_ahp}', 'KriteriaAHPController@update_data_kri_ahp');

Route::delete('/kri_ahp/delete/{id_kr_ahp}', 'KriteriaAHPController@delete_data_kri_ahp');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

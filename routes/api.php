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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('register', 'AuthController@register');
Route::get('user', 'AuthController@getAuthenticatedUser')->middleware('jwt.verify');


Route::get('data', 'DataController@bgKarame');



Route::prefix('profil-kelurahan')->group(function () {
    Route::apiResource('/identitas-kelurahan', 'IdentitasKelurahanController')->middleware('jwt.verify');
});


Route::prefix('kependudukan')->group(function () {
    Route::apiResource('/penduduk', 'PendudukController')->middleware('jwt.verify');
    Route::post('search-penduduk', 'DataController@searchPenduduk');
});

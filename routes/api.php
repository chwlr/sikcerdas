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
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('register', 'AuthController@register');
Route::get('user', 'AuthController@getAuthenticatedUser')->middleware('jwt.verify');


Route::get('data', 'DataController@bgKarame');
Route::post('data', 'DataController@bgKarameUpdate');



Route::prefix('profil-kelurahan')->group(function () {
    Route::apiResource('/identitas-kelurahan', 'IdentitasKelurahanController', ['only' => ['index', 'store']])->middleware('jwt.verify');
    Route::apiResource('/informasi-administrasi', 'InformasiAdministrasiController', ['only' => ['index', 'store']])->middleware('jwt.verify');
});


Route::prefix('kependudukan')->group(function () {
    Route::apiResource('/pemilik', 'PemilikController', ['only' => ['index', 'show']])->middleware('jwt.verify');
    Route::group(['prefix' => 'pemilik'], function () {
        Route::apiResource('/{nop}/penghuni', 'PenghuniController', ['only' => ['store', 'update', 'index', 'show']])->middleware('jwt.verify');
    });

    // Route::get('/pemilik-penduduk/{nop}', ['as' => 'pemilik-penduduk.index', 'uses' => 'PemilikController@dataPendudukPemilik'])->middleware('jwt.verify');


    // Route::post('/penduduk/{nop}', ['as' => 'penduduk.store', 'uses' => 'PendudukController@storePenduduk'])->middleware('jwt.verify');
    // Route::put('/penduduk/{id}', ['as' => 'penduduk.update', 'uses' => 'PendudukController@updatePenduduk'])->middleware('jwt.verify');


    // SEARCH ROUTE
    // Route::post('search-penduduk-nama', 'DataController@searchPendudukNama');
    // Route::post('search-penduduk-rumah', 'DataController@searchPendudukRumah');
});


Route::prefix('pkk')->group(function () {
    Route::apiResource('/buku-kegiatan', 'BukuKegiatanController')->middleware('jwt.verify');
    Route::apiResource('/anggota-pkk', 'AnggotaPkkController')->middleware('jwt.verify');
    Route::apiResource('/industri-rt', 'IndustriRTController')->middleware('jwt.verify');
    Route::apiResource('/inventaris', 'InventarisController')->middleware('jwt.verify');
    Route::apiResource('/anggota-kader', 'AnggotaKaderController')->middleware('jwt.verify');
    Route::apiResource('/catatan-keluarga', 'CatatanKeluargaController')->middleware('jwt.verify');
    Route::group(['prefix' => 'catatan-keluarga'], function () {
        Route::apiResource('/{catatanKeluarga}/catatanKelAnggota', 'CatatanKelAnggotaController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });

    Route::apiResource('/data-keluarga', 'DataKeluargaController', ['only' => ['store', 'update', 'show', 'index', 'destroy']])->middleware('jwt.verify');
    Route::group(['prefix' => 'data-keluarga'], function () {
        Route::apiResource('/{dataKeluarga}/daftarAkeluarga', 'DaftarAkeluargaController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });

    Route::apiResource('/pelatihan-kader', 'PelatihanKaderController')->middleware('jwt.verify');
    Route::group(['prefix' => 'pelatihan-kader'], function () {
        Route::apiResource('/{pelatihanKader}/daftarPelatihan', 'DaftarPelatihanController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });

    Route::apiResource('/taman-bacaan', 'TamanBacaanController')->middleware('jwt.verify');
    Route::group(['prefix' => 'taman-bacaan'], function () {
        Route::apiResource('/{tamanBacaan}/jenisBuku', 'JenisBukuController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });

    Route::apiResource('/posyandu', 'PosyanduController')->middleware('jwt.verify');
    Route::group(['prefix' => 'posyandu'], function () {
        Route::apiResource('/{posyandu}/kegiatan-posyandu', 'KegiatanPosyanduController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });

    Route::apiResource('/warung-pkk', 'WarungPkkController')->middleware('jwt.verify');
    Route::group(['prefix' => 'warung-pkk'], function () {
        Route::apiResource('/{warung_pkk}/komoditi-warung', 'KomoditiWarungController', ['only' => ['store', 'update', 'index']])->middleware('jwt.verify');
    });
});

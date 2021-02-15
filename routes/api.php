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
Route::post('register', 'AuthController@register')->middleware('jwt.verify');
Route::get('user', 'AuthController@getAuthenticatedUser')->middleware('jwt.verify');

Route::prefix('bansos')->name('bansos.')->group(function () {
    Route::get('export', 'DataBansosController@export')->name('export');
    Route::post('import', 'DataBansosController@import')->name('import');
    Route::get('data_filter', 'DataBansosController@dataTemp')->name('data_filter');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::apiResource('users', 'UsersController', ['only' => ['index', 'update', 'destroy', 'edit']])->middleware('jwt.verify');
});


Route::prefix('profil-kelurahan')->group(function () {
    Route::apiResource('/identitas-kelurahan', 'IdentitasKelurahanController', ['only' => ['index', 'store', 'update']])->middleware('jwt.verify');
    Route::apiResource('/informasi-administrasi', 'InformasiAdministrasiController', ['only' => ['index', 'store', 'update']])->middleware('jwt.verify');
});


Route::prefix('kependudukan')->group(function () {
    Route::apiResource('/pemilik', 'PemilikController', ['only' => ['index', 'show', 'update', 'destroy', 'store']]);
    Route::group(['prefix' => 'pemilik'], function () {
        Route::apiResource('/{pemilik}/penghuni', 'PenghuniController')->middleware('jwt.verify');
    });

    Route::get('/pemilik-fid/{fid}', 'PemilikController@pemilikFid')->middleware('jwt.verify');

});


Route::prefix('pkk')->group(function () {
    Route::apiResource('/buku-kegiatan', 'BukuKegiatanController')->middleware('jwt.verify');
    Route::apiResource('/anggota-pkk', 'AnggotaPkkController')->middleware('jwt.verify');
    Route::apiResource('/industri-rt', 'IndustriRTController')->middleware('jwt.verify');
    Route::apiResource('/penerimaan', 'KeuanganPenerimaanController');
    Route::apiResource('/pengeluaran', 'KeuanganPengeluaranController')->middleware('jwt.verify');
    Route::apiResource('/koperasi', 'KoperasiController')->middleware('jwt.verify');
    Route::apiResource('/pekarangan', 'PekaranganController')->middleware('jwt.verify');
    Route::apiResource('/penyuluhan', 'SimulasiPenyuluhanController')->middleware('jwt.verify');
    Route::apiResource('/surat-masuk', 'SuratMasukController')->middleware('jwt.verify');
    Route::apiResource('/surat-keluar', 'SuratKeluarController')->middleware('jwt.verify');
    Route::apiResource('/inventaris', 'InventarisController')->middleware('jwt.verify');
    Route::apiResource('/kejar-paket', 'KejarPaketController')->middleware('jwt.verify');
    Route::apiResource('/anggota-kader', 'AnggotaKaderController')->middleware('jwt.verify');
    Route::apiResource('/catatan-keluarga', 'CatatanKeluargaController')->middleware('jwt.verify');
    Route::group(['prefix' => 'catatan-keluarga'], function () {
        Route::apiResource('/{catatanKeluarga}/catatanKelAnggota', 'CatatanKelAnggotaController', ['only' => ['store', 'update', 'index', 'destroy']])->middleware('jwt.verify');
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

Route::prefix('kemiskinan')->group(function () {
    Route::apiResource('/data-kemiskinan', 'DataKemiskinanController')->middleware('jwt.verify');
});

<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    public function bgKarame()
    {
        $data = File::get(storage_path('app/bangunan_karame.geojson'));;
        return $data;
    }

    public function searchPenduduk(Request $request)
    {
        $data = Penduduk::query()
            ->where('nama', 'LIKE', "%{$request->nama}%")
            ->get();

        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Kemiskinan\DataKemiskinan;
use App\Penduduk;
use App\PendudukTerdampak;
use App\Penghuni;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    public function bgKarame()
    {
        $data = File::get(storage_path('app/bangunan_karame.geojson'));;
        return $data;
    }

    public function searchPendudukNama(Request $request)
    {
        $data = Penduduk::query()
            ->where('nama', 'LIKE', "%{$request->nama}%")
            ->get();

        return response()->json($data);
    }

    public function searchPendudukRumah(Request $request)
    {
        $data = Penduduk::query()
            ->where('nomor_rumah', 'LIKE', "%{$request->nomor_rumah}%")
            ->where('kode_lingkungan', 'LIKE', "%{$request->kode_lingkungan}%")
            ->get();

        return response()->json($data);
    }

    public function searchDataKemiskinan(Request $request)
    {
        $data = DataKemiskinan::query()
            ->where('nama_krt', 'LIKE', "%{$request->nama_krt}%")
            ->get();
        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan']);
        }

        return response()->json($data);
    }

    public function BansosData()
    {
        //$a = Penghuni::query()->pluck('nik');
        //$result = PendudukTerdampak::whereNotIn('nik', $a);
        $b = PendudukTerdampak::query()->pluck('nik');
        $result = Penghuni::whereNotIn('nik', $b)->get();

        return $result;



        // foreach ($a as $nik) {
        //     if (PendudukTerdampak::query()->where('nik', 'LIKE', "%{$nik}%")) {
        //         return $nik;
        //     }
        // }
    }
}

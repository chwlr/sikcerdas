<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KegiatanPosyandu;
use App\Model\Pkk\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KegiatanPosyanduController extends Controller
{
    public function index(Posyandu $posyandu)
    {
        return response()->json(['data' => $posyandu->kegiatanPosyandu], 200);
    }

    public function store(Request $request, Posyandu $posyandu)
    {
        $request->validate([
            'jenis_kegiatan' => 'required|unique:mysql_pkk.kegiatan_posyandu',
            'frekwensi_layanan' => 'required',
            'pengunjung_pria' => 'required',
            'pengunjung_wanita' => 'required',
            'petugas_pria' => 'required',
            'petugas_wanita' => 'required',
            'keterangan' => 'required'
        ]);

        $data = new KegiatanPosyandu($request->all());
        $posyandu->kegiatanPosyandu()->save($data);
        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, Posyandu $posyandu, KegiatanPosyandu $kegiatan_posyandu)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $posyandu->kegiatanPosyandu->find($kegiatan_posyandu);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }

    public function destroy(Posyandu $posyandu, KegiatanPosyandu $kegiatan_posyandu)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $posyandu->kegiatanPosyandu->find($kegiatan_posyandu);
        $data->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

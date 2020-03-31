<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KomoditiWarung;
use App\Model\Pkk\WarungPkk;
use Illuminate\Http\Request;

class KomoditiWarungController extends Controller
{
    public function index(WarungPkk $warung_pkk)
    {
        return response()->json(['data' => $warung_pkk->komoditiWarung], 200);
    }

    public function store(Request $request, WarungPkk $warung_pkk)
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

        $data = new KomoditiWarung($request->all());
        $warung_pkk->komoditiWarung()->save($data);
        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, WarungPkk $warung_pkk, KomoditiWarung $komoditi_warung)
    {
        $data = $warung_pkk->komoditiWarung->find($komoditi_warung);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KomoditiWarung;
use App\Model\Pkk\WarungPkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KomoditiWarungController extends Controller
{
    public function index(WarungPkk $warung_pkk)
    {
        return response()->json(['data' => $warung_pkk->komoditiWarung], 200);
    }

    public function store(Request $request, WarungPkk $warung_pkk)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

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
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = $warung_pkk->komoditiWarung->find($komoditi_warung);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }

    public function destroy(WarungPkk $warung_pkk, KomoditiWarung $komoditi_warung)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = $warung_pkk->komoditiWarung->find($komoditi_warung);
        $data->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Pkk\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuratMasukController extends Controller
{
    public function index()
    {
        return response()->json(SuratMasuk::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'nomor_surat' => 'required|unique:mysql_pkk.surat_masuk',
            'tanggal_surat' => 'required',
            'kepada' => 'required',
            'perihal' => 'required',
            'lampiran' => 'required',
            'tembusan' => 'required'
        ]);

        $data = SuratMasuk::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = SuratMasuk::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(SuratMasuk $surat_masuk)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $surat_masuk->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

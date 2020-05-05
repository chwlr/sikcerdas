<?php

namespace App\Http\Controllers;

use App\Model\Pkk\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SuratKeluarController extends Controller
{
    public function index()
    {
        return response()->json(SuratKeluar::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'terima_surat' => 'required',
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required|unique:mysql_pkk.surat_keluar',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'required',
            'diteruskan_kepada' => 'required'
        ]);

        $data = SuratKeluar::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = SuratKeluar::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(SuratKeluar $surat_keluar)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $surat_keluar->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

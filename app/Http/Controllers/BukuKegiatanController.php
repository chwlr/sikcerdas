<?php

namespace App\Http\Controllers;

use App\Model\Pkk\BukuKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BukuKegiatanController extends Controller
{
    public function index()
    {
        return response()->json(BukuKegiatan::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'tempat_kegiatan' => 'required',
            'uraian_kegiatan' => 'required'
        ]);

        $data = BukuKegiatan::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $BukuKegiatan = BukuKegiatan::find($id);
        $BukuKegiatan->update($request->all());

        return response()->json($BukuKegiatan, 200);
    }

    public function destroy(BukuKegiatan $buku_kegiatan)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $buku_kegiatan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

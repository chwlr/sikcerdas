<?php

namespace App\Http\Controllers;

use App\Model\Pkk\BukuKegiatan;
use Illuminate\Http\Request;

class BukuKegiatanController extends Controller
{
    public function index()
    {
        return response()->json(BukuKegiatan::all());
    }

    public function store(Request $request)
    {
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
        $BukuKegiatan = BukuKegiatan::find($id);
        $BukuKegiatan->update($request->all());

        return response()->json($BukuKegiatan, 200);
    }

    public function destroy(BukuKegiatan $buku_kegiatan)
    {
        $buku_kegiatan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

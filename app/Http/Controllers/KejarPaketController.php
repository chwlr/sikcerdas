<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KejarPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KejarPaketController extends Controller
{
    public function index()
    {
        return response()->json(KejarPaket::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_kejar_paket' => 'required',
            'jenis_paket' => 'required',
            'total_pria' => 'required',
            'total_wanita' => 'required',
            'jumlah_pengajar' => 'required',
        ]);

        $data = KejarPaket::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = KejarPaket::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(KejarPaket $kejar_paket)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $kejar_paket->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

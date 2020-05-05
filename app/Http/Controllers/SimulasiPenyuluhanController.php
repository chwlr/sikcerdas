<?php

namespace App\Http\Controllers;

use App\Model\Pkk\SimulasiPenyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SimulasiPenyuluhanController extends Controller
{
    public function index()
    {
        return response()->json(SimulasiPenyuluhan::all());
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
            'nama_kegiatan' => 'required|unique:mysql_pkk.simulasi_penyuluhan',
            'jenis_simulasi' => 'required',
            'jumlah_kelompok' => 'required',
            'jumlah_sosialisasi' => 'required'
        ]);

        $data = SimulasiPenyuluhan::make($request->all());
        $data->save();

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = SimulasiPenyuluhan::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(SimulasiPenyuluhan $penyuluhan)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $penyuluhan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

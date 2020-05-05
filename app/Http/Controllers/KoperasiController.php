<?php

namespace App\Http\Controllers;

use App\Model\Pkk\Koperasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KoperasiController extends Controller
{
    public function index()
    {
        return response()->json(Koperasi::all());
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
            'nama_koperasi' => 'required|unique:mysql_pkk.koperasi',
            'jenis_koperasi' => 'required',
            'status_hukum' => 'required',
            'total_pria' => 'required',
            'total_wanita' => 'required'
        ]);

        $data = Koperasi::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = Koperasi::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(Koperasi $koperasi)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $koperasi->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

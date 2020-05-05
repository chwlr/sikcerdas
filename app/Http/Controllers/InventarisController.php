<?php

namespace App\Http\Controllers;

use App\Model\Pkk\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InventarisController extends Controller
{
    public function index()
    {
        return response()->json(Inventaris::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'nama_barang' => 'required|unique:mysql_pkk.inventaris_barang',
            'asal_barang' => 'required',
            'tanggal_penerimaan' => 'required',
            'tanggal_pembelian' => 'required',
            'tempat_penyimpanan' => 'required',
            'kondisi_barang' => 'required',
            'keterangan' => 'required',
        ]);

        $data = Inventaris::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = Inventaris::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(Inventaris $inventari)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $inventari->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

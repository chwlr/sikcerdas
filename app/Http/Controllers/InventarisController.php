<?php

namespace App\Http\Controllers;

use App\Model\Pkk\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        return response()->json(Inventaris::all());
    }

    public function store(Request $request)
    {
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
        $data = Inventaris::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }
}

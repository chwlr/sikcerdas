<?php

namespace App\Http\Controllers;

use App\Http\Resources\TamanBacaanResource;
use App\Model\Pkk\TamanBacaan;
use Illuminate\Http\Request;

class TamanBacaanController extends Controller
{
    public function index()
    {
        return TamanBacaanResource::collection(TamanBacaan::all());
    }

    public function show(TamanBacaan $tamanBacaan)
    {
        return new TamanBacaanResource($tamanBacaan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'nama_taman_bacaan' => 'required|unique:mysql_pkk.taman_bacaan',
            'nama_pengelola' => 'required',
            'jumlah_buku' => 'required',
        ]);

        $data = TamanBacaan::make($request->all());
        $data->save();

        return response()->json(['data' => new TamanBacaanResource($data)]);
    }

    public function update(Request $request, TamanBacaan $tamanBacaan)
    {
        $tamanBacaan->update($request->all());
        return response()->json(['data' => new TamanBacaanResource($tamanBacaan)], 200);
    }

    public function destroy(TamanBacaan $tamanBacaan)
    {
        $tamanBacaan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

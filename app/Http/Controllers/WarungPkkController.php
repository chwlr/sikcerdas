<?php

namespace App\Http\Controllers;

use App\Http\Resources\WarungPkkResource;
use App\Model\Pkk\WarungPkk;
use Illuminate\Http\Request;

class WarungPkkController extends Controller
{
    public function index()
    {
        return WarungPkkResource::collection(WarungPkk::all());
    }

    public function show(WarungPkk $warung_pkk)
    {
        return new WarungPkkResource($warung_pkk);
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'nama_warung' => 'required|unique:mysql_pkk.posyandu',
            'nama_pengelola' => 'required'
        ]);

        $data = WarungPkk::make($request->all());
        $data->save();

        return response()->json(['data' => new WarungPkkResource($data)]);
    }

    public function update(Request $request, WarungPkk $warung_pkk)
    {
        $warung_pkk->update($request->all());
        return response()->json(['data' => new WarungPkkResource($warung_pkk)], 200);
    }

    public function destroy(WarungPkk $warung_pkk)
    {
        $warung_pkk->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

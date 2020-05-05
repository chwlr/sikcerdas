<?php

namespace App\Http\Controllers;

use App\Http\Resources\PosyanduResource;
use App\Model\Pkk\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PosyanduController extends Controller
{
    public function index()
    {
        return PosyanduResource::collection(Posyandu::all());
    }

    public function show(Posyandu $posyandu)
    {
        return new PosyanduResource($posyandu);
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
            'nama_posyandu' => 'required|unique:mysql_pkk.posyandu',
            'nama_pengelola' => 'required',
            'jenis_posyandu' => 'required',
            'jumlah_kader' => 'required',
        ]);

        $data = Posyandu::make($request->all());
        $data->save();

        return response()->json(['data' => new PosyanduResource($data)]);
    }

    public function update(Request $request, Posyandu $posyandu)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $posyandu->update($request->all());
        return response()->json(['data' => new PosyanduResource($posyandu)], 200);
    }

    public function destroy(Posyandu $posyandu)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $posyandu->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\CatatanKeluargaResource;
use App\Model\Pkk\CatatanKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CatatanKeluargaController extends Controller
{
    public function index()
    {
        return CatatanKeluargaResource::collection(CatatanKeluarga::all());
    }

    public function show(CatatanKeluarga $catatanKeluarga)
    {
        return new CatatanKeluargaResource($catatanKeluarga);
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'catatan_kel_dari' => 'required|unique:mysql_pkk.catatan_keluarga',
            'dasa_wisma' => 'required',
            'tahun' => 'required',
            'kriteria_rumah' => 'required',
            'jamban_keluarga' => 'required',
            'sumber_air' => 'required',
            'tempat_sampah' => 'required',
        ]);

        $data = CatatanKeluarga::make($request->all());
        $data->save();

        return response()->json(['data' => new CatatanKeluargaResource($data)]);
    }

    public function update(Request $request, CatatanKeluarga $catatanKeluarga)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $catatanKeluarga->update($request->all());
        return response()->json(['data' => new CatatanKeluargaResource($catatanKeluarga)], 200);
    }

    public function destroy(CatatanKeluarga $catatanKeluarga)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $catatanKeluarga->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

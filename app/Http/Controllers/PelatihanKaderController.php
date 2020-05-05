<?php

namespace App\Http\Controllers;

use App\Http\Resources\PelatihanKaderResource;
use App\Model\Pkk\PelatihanKader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PelatihanKaderController extends Controller
{
    public function index()
    {
        return PelatihanKaderResource::collection(PelatihanKader::all());
    }

    public function show(PelatihanKader $pelatihanKader)
    {
        return new PelatihanKaderResource($pelatihanKader);
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
            'no_registrasi' => 'required|unique:mysql_pkk.pelatihan_kader',
            'nama' => 'required|unique:mysql_pkk.pelatihan_kader',
            'tanggal_masuk' => 'required',
            'kedudukan_fungsi' => 'required',
        ]);

        $data = PelatihanKader::make($request->all());
        $data->save();

        return response()->json(['data' => new PelatihanKaderResource($data)]);
    }

    public function update(Request $request, PelatihanKader $pelatihanKader)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $pelatihanKader->update($request->all());
        return response()->json(['data' => new PelatihanKaderResource($pelatihanKader)], 200);
    }

    public function destroy(PelatihanKader $pelatihanKader)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $pelatihanKader->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\IdentitasKelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdentitasKelurahanController extends Controller
{
    public function index()
    {
        return response()->json(IdentitasKelurahan::all());
    }

    public function store(Request $request)
    {

        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $request->validate([
            'nama_kelurahan' => 'required|unique:identitas_kelurahan',
            'kode_kelurahan' => 'required|unique:identitas_kelurahan',
            'kecamatan' => 'required',
            'kabutapen_kota' => 'required',
            'provinsi' => 'required',
            'alamat_kantor_lurah' => 'required',
            'telepon_kelurahan' => 'required',
            'email_kelurahan' => 'required',
            'nama_lurah' => 'required',
            'nip_lurah' => 'required',
            'telepon_lurah' => 'required',
            'email_lurah' => 'required',
            'nama_sekertaris_lurah' => 'required',
            'nip_sekertaris_lurah' => 'required',
            'telepon_sekertaris_lurah' => 'required',
            'email_sekertaris_lurah' => 'required',
        ]);
        $data = IdentitasKelurahan::make($request->all());
        $data->save();
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $data = IdentitasKelurahan::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }
}

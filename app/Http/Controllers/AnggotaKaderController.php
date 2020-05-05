<?php

namespace App\Http\Controllers;

use App\Model\Pkk\AnggotaKader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnggotaKaderController extends Controller
{
    public function index()
    {
        return response()->json(['data' => AnggotaKader::all()], 200);
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'nomor_registrasi' => 'required',
            'jenis_kelamin' => 'required',
            'status_kedudukan' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'required',
        ]);

        $data = AnggotaKader::make($request->all());
        $data->save();

        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $AnggotaKader = AnggotaKader::find($id);
        $AnggotaKader->update($request->all());

        return response()->json(['data' => $AnggotaKader], 200);
    }

    public function destroy(AnggotaKader $anggota_kader)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $anggota_kader->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

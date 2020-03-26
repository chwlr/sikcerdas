<?php

namespace App\Http\Controllers;

use App\Model\Pkk\AnggotaPkk;
use Illuminate\Http\Request;

class AnggotaPkkController extends Controller
{
    public function index()
    {
        return response()->json(AnggotaPkk::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'required',
        ]);

        $data = AnggotaPkk::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $AnggotaPkk = AnggotaPkk::find($id);
        $AnggotaPkk->update($request->all());

        return response()->json($AnggotaPkk, 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        return response()->json(Penduduk::all());
    }

    public function store(Request $request)
    {
        $data = Penduduk::make($request->all());
        $data->save();
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $request->validate([
            'nik' => 'required',
            'nomor_rumah' => 'required',
            'nomor_kk' => 'required',
            'nop' => 'required',
            'foto' => 'required|max:2000'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/images/', $fileName);
            $penduduk->foto = $fileName;
        }

        $penduduk->update($request->all());

        return response()->json($penduduk, 200);
    }
}

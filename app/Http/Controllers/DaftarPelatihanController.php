<?php

namespace App\Http\Controllers;

use App\Model\Pkk\DaftarPelatihan;
use App\Model\Pkk\PelatihanKader;
use Illuminate\Http\Request;

class DaftarPelatihanController extends Controller
{
    public function index(PelatihanKader $pelatihanKader)
    {
        return response()->json(['data' => $pelatihanKader->daftarPelatihan], 200);
    }

    public function store(Request $request, PelatihanKader $pelatihanKader)
    {
        $request->validate([
            'nama_pelatihan' => 'required',
            'kriteria_pelatihan' => 'required',
            'tahun' => 'required',
            'penyelenggara' => 'required',
            'keterangan' => 'required'
        ]);

        $data = new DaftarPelatihan($request->all());
        $pelatihanKader->daftarPelatihan()->save($data);
        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, PelatihanKader $pelatihanKader, DaftarPelatihan $daftarPelatihan)
    {
        $data = $pelatihanKader->daftarPelatihan->find($daftarPelatihan);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }
}

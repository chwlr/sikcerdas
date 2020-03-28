<?php

namespace App\Http\Controllers;

use App\Model\Pkk\JenisBuku;
use App\Model\Pkk\TamanBacaan;
use Illuminate\Http\Request;

class JenisBukuController extends Controller
{
    public function index(TamanBacaan $tamanBacaan)
    {
        return response()->json(['data' => $tamanBacaan->jenisBacaan], 200);
    }

    public function store(Request $request, TamanBacaan $tamanBacaan)
    {
        $request->validate([
            'nama_pelatihan' => 'required',
            'kriteria_pelatihan' => 'required',
            'tahun' => 'required',
            'penyelenggara' => 'required',
            'keterangan' => 'required'
        ]);

        $data = new JenisBuku($request->all());
        $tamanBacaan->jenisBuku()->save($data);
        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, TamanBacaan $tamanBacaan, JenisBuku $jenisBuku)
    {
        $data = $tamanBacaan->jenisBuku->find($jenisBuku);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }
}

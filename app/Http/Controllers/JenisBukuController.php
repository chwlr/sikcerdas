<?php

namespace App\Http\Controllers;

use App\Model\Pkk\JenisBuku;
use App\Model\Pkk\TamanBacaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JenisBukuController extends Controller
{
    public function index(TamanBacaan $tamanBacaan)
    {
        return response()->json(['data' => $tamanBacaan->jenisBacaan], 200);
    }

    public function store(Request $request, TamanBacaan $tamanBacaan)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
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
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $tamanBacaan->jenisBuku->find($jenisBuku);
        $data->update($request->all());
        return response()->json(['data' => $data], 200);
    }

    public function destroy(TamanBacaan $tamanBacaan, JenisBuku $jenisBuku)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $tamanBacaan->jenisBuku->find($jenisBuku);
        $data->delete();
        return response()->json(['data' => $data], 200);
    }
}

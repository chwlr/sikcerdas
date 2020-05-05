<?php

namespace App\Http\Controllers;

use App\InformasiAdministrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InformasiAdministrasiController extends Controller
{
    public function index()
    {
        return response()->json(InformasiAdministrasi::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $request->validate([
            'batas_wil_utara' => 'required',
            'batas_wil_timur' => 'required',
            'batas_wil_selatan' => 'required',
            'batas_wil_barat' => 'required',
            'luas_wil_administrasi' => 'required',
            'luas_wil_perkantoran' => 'required',
            'luas_wil_pemukiman' => 'required',
            'luas_lahan_sawah' => 'required',
            'luas_lahan_ladang' => 'required',
            'luas_lahan_perkebunan' => 'required',
            'luas_hutan' => 'required',
            'luas_danau' => 'required',
            'luas_waduk' => 'required',
            'luas_lap_olahraga' => 'required',
            'luas_taman_kota' => 'required'
        ]);

        $data = InformasiAdministrasi::make($request->all());
        $data->save();
        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $data = InformasiAdministrasi::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }
}

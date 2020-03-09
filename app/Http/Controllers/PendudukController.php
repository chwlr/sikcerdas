<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        return response()->json(Penduduk::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:formsurveys',
            'nomor_rumah' => 'required|unique:formsurveys',
            'nomor_kk' => 'required|unique:formsurveys',
            'nop' => 'required|unique:formsurveys',

        ]);

        $data = Penduduk::make($request->all());
        $data->save();
        return response($data, Response::HTTP_CREATED);
    }
}

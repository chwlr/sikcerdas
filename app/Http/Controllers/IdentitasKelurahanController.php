<?php

namespace App\Http\Controllers;

use App\IdentitasKelurahan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentitasKelurahanController extends Controller
{
    public function index()
    {
        return response()->json(IdentitasKelurahan::all());
    }

    public function store(Request $request)
    {
        $count = IdentitasKelurahan::count();

        if ($count > 0) {
            IdentitasKelurahan::find(1)->update($request->all());
            return response()->json(['data' => IdentitasKelurahan::first()], Response::HTTP_CREATED);
        }

        $request->validate([
            'kode_kelurahan' => 'required|unique:IdentitasKelurahan'
        ]);

        $data = IdentitasKelurahan::make($request->all());
        $data->save();
        return response($data, Response::HTTP_CREATED);
    }
}

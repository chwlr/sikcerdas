<?php

namespace App\Http\Controllers;

use App\IdentitasKelurahan;
use Illuminate\Http\Request;

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
            return response()->json(['data' => IdentitasKelurahan::first()], 201);
        }


        $data = IdentitasKelurahan::make($request->all());
        $data->save();
        return response()->json($data, 201);
    }
}

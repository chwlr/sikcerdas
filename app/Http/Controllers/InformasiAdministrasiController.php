<?php

namespace App\Http\Controllers;

use App\InformasiAdministrasi;
use Illuminate\Http\Request;

class InformasiAdministrasiController extends Controller
{
    public function index()
    {
        return response()->json(InformasiAdministrasi::all());
    }

    public function store(Request $request)
    {

        $count = InformasiAdministrasi::count();

        if ($count > 0) {
            InformasiAdministrasi::find(1)->update($request->all());
            return response()->json(['data' => InformasiAdministrasi::first()], 201);
        }

        $data = InformasiAdministrasi::make($request->all());
        $data->save();
        return response()->json($data, 201);
    }
}

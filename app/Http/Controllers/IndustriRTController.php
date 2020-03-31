<?php

namespace App\Http\Controllers;

use App\Model\Pkk\IndustriRT;
use Illuminate\Http\Request;

class IndustriRTController extends Controller
{
    public function index()
    {
        return response()->json(IndustriRT::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'komoditi' => 'required|unique:mysql_pkk.industri_rumah_tangga',
            'volume' => 'required',
        ]);

        $data = IndustriRT::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = IndustriRT::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }
}

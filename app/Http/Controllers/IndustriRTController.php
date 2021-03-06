<?php

namespace App\Http\Controllers;

use App\Model\Pkk\IndustriRT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IndustriRTController extends Controller
{
    public function index()
    {
        return response()->json(IndustriRT::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

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
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = IndustriRT::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(IndustriRT $industri_rt)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $industri_rt->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

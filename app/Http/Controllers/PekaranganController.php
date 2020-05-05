<?php

namespace App\Http\Controllers;

use App\Model\Pkk\Pekarangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PekaranganController extends Controller
{
    public function index()
    {
        return response()->json(Pekarangan::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $request->validate([
            'kategori' => 'required',
            'komoditi' => 'required|unique:mysql_pkk.pemanfaatan_pekarangan',
            'jumlah' => 'required',
        ]);

        $data = Pekarangan::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = Pekarangan::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(Pekarangan $pekarangan)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $pekarangan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KeuanganPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KeuanganPenerimaanController extends Controller
{
    public function index()
    {
        return response()->json(KeuanganPenerimaan::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $request->validate([
            'tanggal' => 'required',
            'sumber_dana' => 'required',
            'uraian' => 'required',
            'nomor_bukti_kas' => 'required',
            'jumlah_penerimaan' => 'required'
        ]);

        $data = KeuanganPenerimaan::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = KeuanganPenerimaan::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(KeuanganPenerimaan $penerimaan)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $penerimaan->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Pkk\KeuanganPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KeuanganPengeluaranController extends Controller
{
    public function index()
    {
        return response()->json(KeuanganPengeluaran::all());
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
            'jumlah_pengeluaran' => 'required'
        ]);

        $data = KeuanganPengeluaran::make($request->all());
        $data->save();

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $data = KeuanganPengeluaran::find($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy(KeuanganPengeluaran $pengeluaran)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $pengeluaran->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Pemilik;
use App\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function storePenduduk(Request $request, $nop)
    {
        $a = Pemilik::where('nop', $nop)->first();
        $b = Penduduk::make($request->all());
        $c = $a->penduduk()->save($b);

        return response()->json($c, 201);
    }

    public function updatePenduduk(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->update($request->all());

        return $penduduk;
        // return response()->json($c, 200);
    }
}

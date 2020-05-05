<?php

namespace App\Http\Controllers;

use App\Pemilik;
use App\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PenghuniController extends Controller
{
    public function index($nop)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $a =  Pemilik::where('nop', $nop)->first();
        $data = Penghuni::where('formsurveys_id', $a->id)->get();
        return response()->json(['data' => $data]);
    }

    public function store(Request $request, $nop)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $pemilik =  Pemilik::where('nop', $nop)->first();

        $request->validate([
            'nik' => 'required|unique:formsurveypenghunis',
            'dluar_kk' => 'required',
            'nama' => 'required',
            'j_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'p_trakhir' => 'required',
            'agama' => 'required',
            'j_pekerjaan' => 'required',
            'b_pghasilan' => 'required',
            'prov_kk' => 'required',
            'kabkot_kk' => 'required'

        ]);
        $data = new Penghuni($request->all());
        $pemilik->penghuni()->save($data);
        return response()->json(['data' => $data], 201);
    }

    public function update(Request $request, $nop, $penghuni)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }

        $pemilik =  Pemilik::where('nop', $nop)->first();
        Penghuni::where('formsurveys_id', $pemilik->id)->where('nik', $penghuni)->update($request->all());

        //$data->update($request->all());
        return response()->json(['message' => 'Update success']);
    }

    public function destroy($nop, $penghuni)
    {
        if (!Gate::denies('staff_pkk') and !Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }

        $pemilik =  Pemilik::where('nop', $nop)->first();
        Penghuni::where('formsurveys_id', $pemilik->id)->where('nik', $penghuni)->delete();
        return response()->json('Data telah terhapus');
    }
}

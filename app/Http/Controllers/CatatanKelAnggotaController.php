<?php

namespace App\Http\Controllers;

use App\Model\Pkk\CatatanKelAnggota;
use App\Model\Pkk\CatatanKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CatatanKelAnggotaController extends Controller
{
    public function index(CatatanKeluarga $catatanKeluarga)
    {
        return response()->json(['data' => $catatanKeluarga->catatanKelAnggota]);
    }

    public function store(Request $request, CatatanKeluarga $catatanKeluarga)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $request->validate([
            'nama_anggota_keluarga' => 'required|unique:mysql_pkk.catatan_kel_anggota',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'bkbthn_khusus' => 'required',
            'pp_pancasila' => 'required',
            'gotong_royong' => 'required',
            'pendidikan_keterampilan' => 'required',
            'pk_koperasi' => 'required',
            'pangan' => 'required',
            'sandang' => 'required',
            'kesehatan' => 'required',
            'perencanaan_sehat' => 'required'
        ]);

        $data = new CatatanKelAnggota($request->all());
        $catatanKeluarga->catatanKelAnggota()->save($data);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, CatatanKeluarga $catatanKeluarga, CatatanKelAnggota $catatanKelAnggotum)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $catatanKeluarga->catatanKelAnggota->find($catatanKelAnggotum);
        $data->update($request->all());
        return response()->json(['data' => $data]);
    }

    public function destroy(CatatanKeluarga $catatanKeluarga, CatatanKelAnggota $catatanKelAnggotum)
    {
        if (!Gate::denies('staff')) {
            return response()->json('Access Denied', 500);
        }
        $data = $catatanKeluarga->catatanKelAnggota->find($catatanKelAnggotum);
        $data->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

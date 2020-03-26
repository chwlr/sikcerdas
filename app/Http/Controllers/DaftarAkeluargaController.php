<?php

namespace App\Http\Controllers;

use App\Model\Pkk\DaftarAkeluarga;
use App\Model\Pkk\DataKeluarga;
use Illuminate\Http\Request;

class DaftarAkeluargaController extends Controller
{
    public function index(DataKeluarga $dataKeluarga)
    {
        return response()->json(['data' => $dataKeluarga->daftarAkeluarga]);
    }

    public function store(Request $request, DataKeluarga $dataKeluarga)
    {
        $request->validate([
            'nomor_registrasi' => 'required',
            'nama_anggota' => 'required|unique:mysql_pkk.daftar_anggota_keluarga',
            'status_dlm_keluarga' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ]);

        $data = new DaftarAkeluarga($request->all());
        $dataKeluarga->daftarAkeluarga()->save($data);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, DataKeluarga $dataKeluarga, DaftarAkeluarga $daftarAkeluarga)
    {
        $data = $dataKeluarga->daftarAkeluarga->find($daftarAkeluarga);
        $data->update($request->all());
        return response()->json(['data' => $data]);
    }
}

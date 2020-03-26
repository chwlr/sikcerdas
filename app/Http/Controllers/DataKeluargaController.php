<?php

namespace App\Http\Controllers;

use App\Model\Pkk\DataKeluarga;
use Illuminate\Http\Request;
use App\Http\Resources\DataKeluargaResource;


class DataKeluargaController extends Controller
{
    public function index()
    {
        return DataKeluargaResource::collection(DataKeluarga::all());
    }
    public function show(DataKeluarga $dataKeluarga)
    {
        return new DataKeluargaResource($dataKeluarga);
    }
    public function store(Request $request)
    {
        $request->validate([
            'dasa_wisma' => 'required',
            'provinsi' => 'required',
            'kab_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'lingkungan' => 'required',
            'nama_kepala_rt' => 'required|unique:mysql_pkk.data_keluarga',
        ]);

        $data = DataKeluarga::make($request->all());
        $data->save();

        return response()->json(['data' => new DataKeluargaResource($data)]);
    }

    public function update(Request $request, DataKeluarga $dataKeluarga)
    {
        $dataKeluarga->update($request->all());
        return response()->json(['data' => new DataKeluargaResource($dataKeluarga)], 200);
    }

    public function destroy(DataKeluarga $dataKeluarga)
    {
        $dataKeluarga->delete();
        return response()->json(['message' => 'Record deleted']);
    }
}

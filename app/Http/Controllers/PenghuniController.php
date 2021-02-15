<?php

namespace App\Http\Controllers;

use App\Http\Resources\PenghuniResource;
use App\Pemilik;
use App\Penghuni;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class PenghuniController extends Controller
{
    public function index(Pemilik $pemilik)
    {

        if ($pemilik->exists()) {
            return PenghuniResource::collection($pemilik->penghuni);
        }

        return response()->json('Data tidak ditemukan');
    }

    public function show(Pemilik $pemilik, Penghuni $penghuni)
    {
        if ($penghuni->exists()) {
            return response([
                'data' => new PenghuniResource($penghuni)
            ], Response::HTTP_OK);
        }
        return response()->json('Data tidak ditemukan');
    }

    public function store(Request $request, Pemilik $pemilik)
    {

        $request->validate([
            'nik' => 'required|unique:penghuni',
        ]);


        $data = new Penghuni($request->all());
        $pemilik->penghuni()->save($data);

        return response([
            'data' => new PenghuniResource($data)
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Pemilik $pemilik,  Penghuni $penghuni)
    {
        $penghuni->update($request->all());
        return response([
            'data' => new PenghuniResource($penghuni)
        ], Response::HTTP_CREATED);
    }

    public function destroy(Pemilik $pemilik, Penghuni $penghuni)
    {
        $penghuni->delete();
        return response()->json('Data berhasil terhapus');
    }
}

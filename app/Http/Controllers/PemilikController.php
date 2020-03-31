<?php

namespace App\Http\Controllers;

use App\Http\Resources\PemilikResource;
use App\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{

    public function index()
    {
        // $a = Pemilik::where('nop', $nop)->first();
        // if (!$a) {
        //     return response()->json('nop tidak ditemukan');
        // }
        // $data = Pemilik::find($a->id)->penduduk;
        // return response()->json(['pemilik' => $a, 'penghuni' => $data]);

        return PemilikResource::collection(Pemilik::paginate(5));
    }

    public function show($pemilik)
    {
        $data = Pemilik::where('nop', $pemilik)->first();
        return new PemilikResource($data);
    }



    // public function index()
    // {
    //     // return response()->json(Pemilik::find(2));

    //     $data = Pemilik::find(2)->penduduk;
    //     return $data;
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nomor_rumah' => 'required',
            'nomor_kk' => 'required',
            'nop' => 'required',
            'foto' => 'required|max:2000'
        ]);
        $data = Pemilik::make($request->all());
        $data->save();
        return response()->json(['data' => new PemilikResource($data)], 201);
    }

    public function update(Request $request, Pemilik $pemilik)
    {
        $request->validate([
            'nik' => 'required',
            'nomor_rumah' => 'required',
            'nomor_kk' => 'required',
            'nop' => 'required',
            'foto' => 'required|max:2000'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/images/', $fileName);
            $pemilik->foto = $fileName;
        }

        $pemilik->update($request->all());

        return response()->json(['data' => new PemilikResource($pemilik)], 200);
    }
}

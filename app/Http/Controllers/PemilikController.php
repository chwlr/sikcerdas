<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PemilikResource;
use App\Pemilik;
use Illuminate\Support\Facades\Gate;

class PemilikController extends Controller
{
    public function index()
    {
        // if (!Gate::denies('staff_pkk')) {
        //     return response()->json('Access Denied', 500);
        // }

        return PemilikResource::collection(Pemilik::all());
    }

    public function store(Request $request)
    {
        if (!Gate::denies('staff_pkk')) {
            return response()->json('Access Denied', 500);
        }


        $data = Pemilik::make($request->all());
        $data->save();
        return response()->json(['data' => new PemilikResource($data)], 201);
    }

    public function show($id)
    {
        $data = Pemilik::find($id);
        return new PemilikResource($data);
    }

    public function update(Request $request, $id)
    {
        $pemilik = Pemilik::find($id);
        $pemilik->update($request->all());

        return response()->json('updated');
    }

    public function pemilikFid($fid)
    {
        //get pemilik_id by FID
        //$pemilik = Pemilik::where('fid', '=', $fid)->value('id_pemilik');

        $pemilik = Pemilik::where('fid', '=', $fid)->first();
        return response()->json($pemilik);
    }
}

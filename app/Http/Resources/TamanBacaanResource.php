<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TamanBacaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => $this->provinsi,
            'kabupaten_kota' => $this->kab_kota,
            'nama_taman_bacaan' => $this->nama_taman_bacaan,
            'nama_pengelola' => $this->nama_pengelola,
            'jumlah_buku' => $this->jumlah_buku,
            'href' => [
                'jenis_buku' => route('taman-bacaan.index', $this->id)
            ]
        ];
    }
}

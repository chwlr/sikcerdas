<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PosyanduResource extends JsonResource
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
            'kabupaten_kota' => $this->kab_kota,
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'nama_posyandu' => $this->nama_posyandu,
            'nama_pengelola' => $this->nama_pengelola,
            'jenis_posyandu' => $this->jenis_posyandu,
            'jumlah_kader' => $this->jumlah_kader,
            'href' => [
                'kegiatan_posyandu' => route('kegiatan-posyandu.index', $this->id)
            ]
        ];
    }
}

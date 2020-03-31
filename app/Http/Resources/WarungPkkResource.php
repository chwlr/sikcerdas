<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarungPkkResource extends JsonResource
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
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'nama_warung' => $this->nama_warung,
            'nama_pengelola' => $this->nama_pengelola,
            'href' => [
                'komoditi_warung' => route('komoditi-warung.index', $this->id)
            ]
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PelatihanKaderResource extends JsonResource
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
            'nomor_registrasi' => $this->no_registrasi,
            'nama' => $this->nama,
            'tanggal_masuk' => $this->tanggal_masuk,
            'kedudukan_fungsi' => $this->kedudukan_fungsi,
            'href' => [
                'anggota_keluarga' => route('daftarPelatihan.index', $this->id)
            ]
        ];
    }
}

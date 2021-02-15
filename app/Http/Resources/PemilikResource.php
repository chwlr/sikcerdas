<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemilikResource extends JsonResource
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
            'id' => $this->id_pemilik,
            'no_bangunan' => $this->no_bangunan,
            'nama_pemilik' => $this->nama_pemilik,
            'status_bangunan' => $this->status_bangunan,
            'alamat' => $this->alamat,
            'kode_pos' => $this->kode_pos,
            'nama_jalan' => $this->nama_jalan,
            'nomor_rumah' => $this->nomor_rumah,
            'imb' => $this->imb,
            'nop' => $this->nop,
            'no_sertifikat' => $this->no_sertifikat,
            'nama_usaha' => $this->nama_usaha,
            'jenis_usaha' => $this->jenis_usaha,
            'npwpd' => $this->npwpd,
            'keterangan' => $this->keterangan,
            'href' => [
                'daftar_penghuni' => route('penghuni.index', $this->id_pemilik)
            ]
        ];
    }
}

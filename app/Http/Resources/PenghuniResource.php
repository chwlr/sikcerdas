<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenghuniResource extends JsonResource
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
            'id_penghuni' => $this->id_penghuni,
            'nik' => $this->nik,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'nama_ibu' => $this->nama_ibu,
            'nama_ayah' => $this->nama_ayah,
            'agama' => $this->stts_nikah,
            'stts_nikah' => $this->stts_nikah,
            'shdk' => $this->shdk,
            'pdkk_terakhir' => $this->pdkk_terakhir,
            'pekerjaan' => $this->pekerjaan,
            'kelurahan' => $this->kelurahan,
            'kode_lingkungan' => $this->kode_lingkungan,
            'no_kk' => $this->no_kk,
            'nama_kpl_klrg' => $this->nama_kpl_klrg,
            'alamat' => $this->alamat,
            'tgl_lahir' => $this->tgl_lahir,
        ];
    }
}

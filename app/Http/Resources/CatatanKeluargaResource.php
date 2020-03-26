<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatatanKeluargaResource extends JsonResource
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
            'catatan_keluarga_dari' => $this->catatan_kel_dari,
            'dasa_wisma' => $this->dasa_wisma,
            'tahun' => $this->tahun,
            'kriteria_rumah' => $this->kriteria_rumah,
            'jamban_keluarga' => $this->jamban_keluarga,
            'sumber_air' => $this->sumber_air,
            'href' => [
                'anggota_keluarga' => route('catatanKelAnggota.index', $this->id)
            ]
        ];
    }
}

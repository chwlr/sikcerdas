<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataKeluargaResource extends JsonResource
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
            'dasa_wisma' => $this->dasa_wisma,
            'provinsi' => $this->provinsi,
            'kab_kota' => $this->kab_kota,
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'lingkungan' => $this->lingkungan,
            'nama_kepala_rt' => $this->nama_kepala_rt,
            'jmlh_anggota_keluarga' => $this->jmlh_anggota_keluarga,
            'total_pria' => $this->total_pria,
            'total_wanita' => $this->total_wanita,
            'jumlah_kk' => $this->jumlah_kk,
            'jumlah_balita' => $this->jumlah_balita,
            'jumlah_pus' => $this->jumlah_pus,
            'jumlah_wus' => $this->jumlah_wus,
            'jumlah_org_buta' => $this->jumlah_org_buta,
            'jumlah_ibu_hamil' => $this->jumlah_ibu_hamil,
            'jumlah_ibu_mnysui' => $this->jumlah_ibu_mnysui,
            'jumlah_lansia' => $this->jumlah_lansia,
            'makanan_pokok' => $this->makanan_pokok,
            'jamban_keluarga' => $this->jamban_keluarga,
            'sumber_air' => $this->sumber_air,
            'pembuangan_sampah' => $this->pembuangan_sampah,
            'saluran_air_limbah' => $this->saluran_air_limbah,
            'stiker_p4k' => $this->stiker_p4k,
            'kriteria_rumah' => $this->kriteria_rumah,
            'aktifitas_up2k' => $this->aktifitas_up2k,
            'usaha_ksht_lngkn' => $this->usaha_ksht_lngkn,
            'href' => [
                'daftar_anggota_keluarga' => route('daftarAkeluarga.index', $this->id)
            ]
        ];
    }
}

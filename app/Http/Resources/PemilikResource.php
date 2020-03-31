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
            'id' => $this->id,
            'kode_kecamatan' => $this->kode_kecamatan,
            'kode_kelurahan' => $this->kode_kelurahan,
            'kode_lingkungan' => $this->kode_lingkungan,
            'kode_pos' => $this->kode_pos,
            'nama_pemilik' => $this->nama,
            'nama_jalan' => $this->nama_jalan,
            'nomor_rumah' => $this->nomor_rumah,
            'nomor_kk' => $this->nomor_kk,
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'status_kerja' => $this->status_kerja,
            'usia_sekolah' => $this->usia_sekolah,
            'sekolah' => $this->sekolah,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
            'lama_pendidikan' => $this->lama_pendidikan,
            'pendidikan_berjalan' => $this->pendidikan_berjalan,
            'imb' => $this->imb,
            'nomor_siup' => $this->nomor_siup,
            'nomor_situ' => $this->nomor_situ,
            'nomor_tdp' =>  $this->nomor_tdp,
            'slf' => $this->slf,
            'slbg' => $this->slbg,
            'nop' => $this->nop,
            'alamat' => $this->alamat,
            'agama' => $this->agama,
            'jlh_pghasilan' => $this->jlh_pghasilan,
            'prov_kk' => $this->prov_kk,
            'kab_kot' => $this->kab_kot,
            'no_sertifikat' => $this->no_sertifikat,
            'j_bangunan' => $this->j_bangunna,
            'nama_usaha' => $this->nama_usaha,
            'jenis_usaha' => $this->jenis_usaha,
            'Pemilik_usaha' => $this->pem_usaha,
            'npwpd' => $this->npwpd,
            'Bdg_tanah' => $this->bdg_tanah,
            'bangunan' => $this->bangunan,
            'jml_lantai' => $this->jml_lantai,
            'luas_bestm' => $this->luas_bestm,
            'tgl_kons' => $this->tgl_kons,
            'tinggi_bang' => $this->tinggi_bang,
            'r_hijau' => $this->r_hijau,
            'luas_rterbuka' => $this->luas_rterbuka,
            'bangunan_bawah' => $this->bngunan_bawah,
            'transportasi' => $this->transportasi,
            'penumpang' => $this->penumpang,
            'kapsul' => $this->kapsul,
            'barang' => $this->barang,
            'lbr_kurang_08' => $this->lbr_kurang_08,
            'lbr_lebih_08' => $this->lbr_lebih_08,
            'daya_listrik' => $this->daya_listrik,
            'limbah_b3' => $this->limbah_b3,
            'sistem_tampung' => $this->sistem_tampung,
            'wc_km' => $this->wc_km,
            'mck_umum' => $this->mck_umum,
            'split' => $this->split,
            'window' => $this->window,
            'ac_central' => $this->ac_central,
            'jml_saluran' => $this->jml_saluran,
            'luas' => $this->luas,
            'diplester' => $this->diplester,
            'dgn_pelapis' => $this->dgn_pelapis,
            'beton_dgnlmpu' => $this->beton_dgnlmpu,
            'aspal_dgnlmpu' => $this->aspal_dgnlmpu,
            'tr_dgnlmpu' => $this->tr_dgnlampur,
            'beton_nolampu' => $this->beton_nolampu,
            'aspal_nolampu' => $this->aspal_nolampu,
            'tr_nolampu' => $this->tr_nolampu,
            'pjg_pagar' => $this->pjg_pagar,
            'bhn_pgr' => $this->bhn_pgr,
            'hydrant' => $this->hydrant,
            'sprinkler' => $this->sprinkler,
            'firea1' => $this->firea1,
            'limbah_dom' => $this->limbah_dom,
            'kedalaman_sumur' => $this->kdlm_sumur,
            'kedap' => $this->kedap,
            'bocor' => $this->bocor,
            'keterangan' => $this->keterangan,
            'href' => [
                'daftar_penghuni' => route('penghuni.index', $this->id)
            ]
        ];
    }
}

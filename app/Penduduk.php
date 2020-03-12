<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'formsurveys';
    protected $fillable = ['kode_kecamatan', 'kode_kelurahan', 'kode_lingkungan', 'kode_pos', 'nama_jalan', 'nomor_rumah', 'alamat', 'nomor_kk', 'nama_lengkap', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'sekolah', 'pendidikan_terakhir', 'lama_pendidikan', 'status_kerja', 'jlh_pghasilan'];

    // ['kode_kecamatan', 'kode_kelurahan', 'kode_lingkungan', 'kode_pos', 'nama_jalan', 'foto', 'nomor_rumah', 'nomor_kk', 'nama_lengkap', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'status_kerja', 'usia_sekolah', 'sekolah', 'pendidikan_terakhir', 'lama_pendidikan', 'pendidikan_berjalan', 'imb', 'nomor_siup', 'nomor_situ', 'nomor_tdp', 'slf', 'slbg', 'nop', 'foto', 'alamat', 'agama', 'jlh_pghasilan', 'prov_kk', 'kab_kot', 'no_kk', 'tanggal', 'no_sertifikat', 'j_bangunan', 'nama_usaha', 'jenis_usaha', 'Pem_usaha', 'npwpd', 'Bdg_tanah', 'bangunan', 'jml_lantai', 'luas_bestm', 'tgl_kons', 'tinggi_bang', 'r_hijau', 'luas_rterbuka', 'bngunan_bawah', 'transportasi', 'penumpang', 'kapsul', 'barang', 'lbr_kurang_08', 'lbr_lebih_08', 'daya_listrik', 'limbah_b3', 'sistem_tampung', 'wc_km', 'mck_umum', 'split', 'window', 'ac_central', 'jml_saluran', 'luas', 'diplester', 'dgn_pelapis', 'beton_dgnlmpu', 'aspal_dgnlmpu', 'tr_dgnlmpu', 'beton_nolampu', 'aspal_nolampu', 'tr_nolampu', 'pjg_pagar', 'bhn_pgr', 'hydrant', 'sprinkler', 'fireal1', 'limbah_dom', 'kdlm_sumur', 'kedap', 'bocor', 'keterangan'];
}

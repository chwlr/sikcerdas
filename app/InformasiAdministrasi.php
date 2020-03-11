<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiAdministrasi extends Model
{
    protected $table = 'informasi_administrasi';
    protected $fillable = [
        'batas_wil_utara',
        'batas_wil_selatan',
        'batas_wil_barat',
        'batas_wil_timur',
        'luas_wil_administrasi',
        'luas_wil_perkantoran',
        'luas_wil_pemukiman',
        'luas_lahan_sawah',
        'luas_lahan_ladang',
        'luas_lahan_perkebunan',
        'luas_hutan',
        'luas_danau',
        'luas_waduk',
        'luas_lap_olahraga',
        'luas_taman_kota'
    ];
}

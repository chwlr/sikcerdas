<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class Koperasi extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'koperasi';
    protected $fillable = ['provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'nama_koperasi', 'jenis_koperasi', 'status_hukum', 'total_pria', 'total_wanita'];
}

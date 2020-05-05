<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class SimulasiPenyuluhan extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'keuangan_penerimaan';
    protected $fillable = ['provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'nama_kegiatan', 'jenis_simulasi', 'jumlah_kelompok', 'jumlah_sosialisasi'];
}

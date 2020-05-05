<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class KejarPaket extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'kejar_paket';
    protected $fillable = ['provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'nama_kejar_paket', 'jenis_paket', 'total_pria', 'total_wanita', 'jumlah_pengajar'];
}

<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class BukuKegiatan extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'buku_kegiatan';
    protected $fillable = ['nama', 'jabatan', 'tanggal_kegiatan', 'tempat_kegiatan', 'uraian_kegiatan'];
}

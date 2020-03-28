<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class KegiatanPosyandu extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'kegiatan_posyandu';
    protected $fillable = ['jenis_kegiatan', 'frekwensi_layanan', 'pengunjung_pria', 'pengunjung_wanita', 'petugas_pria', 'petugas_wanita', 'keterangan'];
    public function posyandu()
    {
        return $this->belongsTo('App\Model\Pkk\Posyandu');
    }
}

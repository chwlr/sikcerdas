<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class DaftarPelatihan extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'daftar_pelatihan';
    protected $fillable = ['nama_pelatihan', 'kriteria_pelatihan', 'tahun', 'penyelenggara', 'keterangan'];
    public function pelatihanKader()
    {
        return $this->belongsTo('App\Model\Pkk\PelatihanKader');
    }
}

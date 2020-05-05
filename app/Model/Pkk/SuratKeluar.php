<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'surat_keluar';
    protected $fillable = ['terima_surat', 'tanggal_surat', 'nomor_surat', 'asal_surat', 'perihal', 'lampiran', 'diteruskan_kepada'];
}

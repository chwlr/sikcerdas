<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'surat_masuk';
    protected $fillable = ['nomor_surat', 'tanggal_surat', 'kepada', 'perihal', 'lampiran', 'tembusan'];
}

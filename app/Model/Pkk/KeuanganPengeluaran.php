<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class KeuanganPengeluaran extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'keuangan_pengeluaran';
    protected $fillable = ['tanggal', 'sumber_dana', 'uraian', 'nomor_bukti_kas', 'jumlah_pengeluaran'];
}

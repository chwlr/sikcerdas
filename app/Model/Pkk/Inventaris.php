<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'inventaris_barang';
    protected $fillable = ['nama_barang', 'asal_barang', 'tanggal_penerimaan', 'tanggal_pembelian', 'jumlah', 'tempat_penyimpanan', 'kondisi_barang', 'keterangan'];
}

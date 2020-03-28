<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class JenisBuku extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'jenis_buku';
    protected $fillable = ['jenis_buku', 'nama_buku', 'kategori', 'jumlah'];
    public function tamanBacaan()
    {
        return $this->belongsTo('App\Model\Pkk\TamanBacaan');
    }
}

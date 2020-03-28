<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class TamanBacaan extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'taman_bacaan';
    protected $fillable = ['provinsi', 'kab_kota', 'nama_taman_bacaan', 'nama_pengelola', 'jumlah_buku'];

    public function jenisBuku()
    {
        return $this->hasMany('App\Model\Pkk\JenisBuku', 'tamanbacaan_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($tamanBacaan) {
            $tamanBacaan->jenisBuku()->delete();
        });
    }
}

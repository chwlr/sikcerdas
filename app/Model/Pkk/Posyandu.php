<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'posyandu';
    protected $fillable = ['provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'nama_posyandu', 'nama_pengelola', 'nama_sekretaris', 'jenis_posyandu', 'jumlah_kader'];

    public function kegiatanPosyandu()
    {
        return $this->hasMany('App\Model\Pkk\KegiatanPosyandu', 'posyandu_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($posyandu) {
            $posyandu->kegiatanPosyandu()->delete();
        });
    }
}

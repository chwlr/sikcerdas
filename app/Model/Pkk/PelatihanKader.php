<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class PelatihanKader extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'pelatihan_kader';
    protected $fillable = ['provinsi', 'kab_kote', 'tahun', 'kecamatan', 'kelurahan', 'no_registrasi', 'nama', 'tanggal_masuk', 'kedudukan_fungsi'];

    public function daftarPelatihan()
    {
        return $this->hasMany('App\Model\Pkk\DaftarPelatihan', 'pelatihankader_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($pelatihanKader) {
            $pelatihanKader->daftarPelatihan()->delete();
        });
    }
}

<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class CatatanKeluarga extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'catatan_keluarga';
    protected $fillable = ['catatan_kel_dari', 'dasa_wisma', 'tahun', 'kriteria_rumah', 'jamban_keluarga', 'sumber_air', 'tempat_sampah'];

    public function catatanKelAnggota()
    {
        return $this->hasMany('App\Model\Pkk\CatatanKelAnggota', 'catatankel_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($catatanKeluarga) {
            $catatanKeluarga->catatanKelAnggota()->delete();
        });
    }
}

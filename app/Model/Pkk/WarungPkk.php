<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class WarungPkk extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'warung_pkk';
    protected $fillable = ['provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'nama_warung', 'nama_pengelola'];

    public function komoditiWarung()
    {
        return $this->hasMany('App\Model\Pkk\KomoditiWarung', 'warungpkk_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($warung_pkk) {
            $warung_pkk->komoditiWarung()->delete();
        });
    }
}

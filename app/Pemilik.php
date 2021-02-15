<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik';
    protected $fillable = ['no_bangunan', 'nama_pemilik', 'status_bangunan', 'alamat', 'kode_pos', 'nama_jalan',  'nomor_rumah', 'imb', 'nop', 'no_sertifikat', 'nama_usaha', 'jenis_usaha', 'npwpd', 'keterangan'];

    public function penghuni()
    {
        return $this->hasMany('App\Penghuni', 'id_pemilik');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($pemilik) {
            $pemilik->penghuni()->delete();
        });
    }
}

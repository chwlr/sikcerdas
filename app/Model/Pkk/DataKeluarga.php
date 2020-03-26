<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'data_keluarga';
    protected $fillable = ['dasa_wisma', 'provinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'lingkungan', 'nama_kepala_rt', 'jmlh_anggota_keluarga', 'total_pria', 'total_wanita', 'jumlah_kk', 'jumlah_balita', 'jumlah_pus', 'jumlah_wus', 'jumlah_org_buta', 'jumlah_ibu_hamil', 'jumlah_ibu_mnysui', 'jumlah_lansia', 'makanan_pokok', 'jamban_keluarga', 'sumber_air', 'pembuangan_sampah', 'saluran_air_limbah', 'stiker_p4k', 'kriteria_rumah', 'aktifitas_up2k', 'usaha_ksht_lngkn'];
    public function daftarAkeluarga()
    {
        return $this->hasMany('App\Model\Pkk\DaftarAkeluarga', 'datakeluarga_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($dataKeluarga) { // before delete() method call this
            $dataKeluarga->daftarAkeluarga()->delete();
            // do the rest of the cleanup...
        });
    }
}

<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class DaftarAkeluarga extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'daftar_anggota_keluarga';
    protected $fillable = ['nomor_registrasi', 'nama_anggota', 'status_dlm_keluarga', 'status_perkawinan', 'jenis_kelamin', 'tanggal_lahir', 'umur', 'pendidikan', 'pekerjaan'];
    public function datakeluarga()
    {
        return $this->belongsTo('App\Model\Pkk\DataKeluarga');
    }
}

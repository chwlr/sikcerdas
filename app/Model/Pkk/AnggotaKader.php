<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class AnggotaKader extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'anggota_kader';
    protected $fillable = ['nomor_registrasi', 'jenis_kelamin', 'status_kedudukan', 'tanggal_lahir', 'umur', 'alamat', 'pendidikan', 'pekerjaan', 'keterangan'];
}

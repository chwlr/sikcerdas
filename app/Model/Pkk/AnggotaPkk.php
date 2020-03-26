<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class AnggotaPkk extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'anggota_pkk';
    protected $fillable = ['nama', 'jabatan', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'umur', 'status_perkawinan', 'alamat', 'pendidikan', 'pekerjaan', 'keterangan'];
}

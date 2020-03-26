<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class CatatanKelAnggota extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'catatan_kel_anggota';
    protected $fillable = ['nama_anggota_keluarga', 'status_perkawinan', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'umur', 'agama', 'pendidikan', 'pekerjaan', 'bkbthn_khusus', 'pp_pancasila', 'gotong_royong', 'pendidikan_keterampilan', 'pk_koperasi', 'pangan', 'sandang', 'kesehatan', 'perencanaan_sehat'];
    public function catatankeluarga()
    {
        return $this->belongsTo('App\Model\Pkk\CatatanKeluarga');
    }
}

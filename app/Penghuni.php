<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'penghuni';
    protected $primaryKey = 'id_penghuni';
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'nama_ibu', 'nama_ayah', 'gol_darah', 'agama', 'stts_nikah', 'shdk', 'pdkk_terakhir', 'pekerjaan', 'kelurahan', 'kode_lingkungan', 'no_kk', 'nama_kpl_klrg', 'alamat', 'tgl_lahir'];

    public function pemilik()
    {
        return $this->belongsTo('App\Pemilik');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentitasKelurahan extends Model
{
    protected $table = 'identitas_kelurahan';
    protected $fillable = ['nama_kelurahan', 'kode_kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi', 'alamat_kantor_kelurahan', 'telepon_kelurahan', 'email_kelurahan', 'nama_lurah', 'nip_lurah', 'telepon_lurah', 'email_lurah', 'nama_sekertaris_lurah', 'nip_sekertaris_lurah', 'telepon_sekertaris_lurah', 'email_sekertaris_lurah'];
}

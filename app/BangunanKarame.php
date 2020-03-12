<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BangunanKarame extends Model
{
    protected $table = 'bangunan_karame';
    protected $fillable = ['desa', 'kecamatan', 'kabupaten', 'provinsi', 'lingkungan'];
}

<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class IndustriRT extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'industri_rumah_tangga';
    protected $fillable = ['kategori', 'komoditi', 'volume'];
}

<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class Pekarangan extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'pemanfaatan_pekarangan';
    protected $fillable = ['kategori', 'komoditi', 'jumlah'];
}

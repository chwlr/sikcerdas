<?php

namespace App\Model\Pkk;

use Illuminate\Database\Eloquent\Model;

class KomoditiWarung extends Model
{
    protected $connection = 'mysql_pkk';
    protected $table = 'kegiatan_posyandu';
    protected $fillable = ['komoditi', 'kategori', 'volume'];
    public function warungPkk()
    {
        return $this->belongsTo('App\Model\Pkk\WarungPkk');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = 'formsurveypenghunis';
    protected $fillable = ['nik', 'nama', 'dluar_kk', 'j_kelamin', 'tgl_lahir', 'p_trakhir', 'agama', 'j_pekerjaan', 'b_pghasilan', 'prov_kk', 'kabkot_kk'];

    public function pemilik()
    {
        return $this->belongsTo('App\Pemilik');
    }
}

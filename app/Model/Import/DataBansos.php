<?php

namespace App\Model\Import;

use Illuminate\Database\Eloquent\Model;

class DataBansos extends Model
{
    protected $table = 'data_bansos';
    protected $fillable = ['nama', 'nik'];
}

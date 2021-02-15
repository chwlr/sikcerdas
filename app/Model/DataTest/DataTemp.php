<?php

namespace App\Model\DataTest;

use Illuminate\Database\Eloquent\Model;

class DataTemp extends Model
{
    protected $table = 'data_temp';
    protected $fillable = ['nama', 'nik'];
}

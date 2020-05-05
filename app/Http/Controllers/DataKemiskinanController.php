<?php

namespace App\Http\Controllers;

use App\Model\Kemiskinan\DataKemiskinan;
use Illuminate\Http\Request;

class DataKemiskinanController extends Controller
{
    public function index()
    {
        return response()->json(['data' => DataKemiskinan::all()]);
    }
}

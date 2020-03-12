<?php

namespace App\Http\Controllers;

use App\BangunanKarame;
use Illuminate\Http\Request;

class BangunanKarameController extends Controller
{
    public function show($id)
    {
        return BangunanKarame::find($id);
    }

    public function update(Request $request, $id)
    {
    }
}

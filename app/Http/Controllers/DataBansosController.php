<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DatabansosExport;
use App\Imports\DatabansosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Model\Import\DataBansos;
use App\Model\DataTest\DataPhkTest;
use App\Model\DataTest\DataKemiskinanTest;


class DataBansosController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */


    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new DatabansosExport, 'DataHasilFilter.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        DB::table('data_temp')->truncate();
        DB::table('data_bansos')->truncate();
        Excel::import(new DatabansosImport, request()->file('file'));

        $a = DataBansos::query()->pluck('nik');
        $x = DataKemiskinanTest::whereIn('nik', $a)->get();

        $b = $x->pluck('nik');
        $results = DataPhkTest::whereIn('nik', $b)->get();

        foreach ($results as $result) {

            $result = array('nama' => $result->nama, 'nik' => $result->nik);
            DB::table('data_temp')->insert($result);
        }

        return response()->json('Import data berhasil');
    }

    public function dataTemp()
    {
        $data = DB::table('data_temp')->get();
        return response()->json($data);
    }
}

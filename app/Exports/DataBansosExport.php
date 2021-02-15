<?php

namespace App\Exports;

use App\Model\DataTest\DataTemp;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataBansosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DataTemp::all();
    }
}

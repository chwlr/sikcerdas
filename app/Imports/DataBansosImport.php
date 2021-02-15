<?php

namespace App\Imports;

use App\Model\Import\DataBansos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataBansosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DataBansos([
            'nama' => $row['nama'],
            'nik' => $row['nik']
        ]);
    }
}

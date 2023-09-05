<?php

namespace App\Imports;

use App\Models\Rules;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RulesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rules([
            'co'        => $row['co'],
            'nh3'       => $row['nh3'],
            'no2'       => $row['no2'],
            'grade'     => $row['grade'],
        ]);
    }
}

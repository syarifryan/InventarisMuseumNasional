<?php

namespace App\Imports;

use App\Models\Handle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HandleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Handle([
            'rentang_1'        => $row['rentang_1'],     
            'rentang_2'        => $row['rentang_2'],     
            'penanganan'       => $row['penanganan'],     
        ]);
    }
}

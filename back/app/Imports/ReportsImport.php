<?php

namespace App\Imports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Report([
            'r_title' => $row[0],
            'r_path' => $row[1],
        ]);
    }
}

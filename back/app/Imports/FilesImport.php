<?php

namespace App\Imports;

use App\Models\File;
use Maatwebsite\Excel\Concerns\ToModel;

class FilesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new File([
            'product_code' => $row[0],
            'user_id' => $row[1],
            'zone_code' => $row[2],
            'score_skinbiosense' => $row[3],
            'session_id' => $row[4],
            'mesure' => $row[5],
        ]);
    }
}
<?php

namespace App\Imports;

use App\Medicine;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicinesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medicine([
            "name_english" => $row[0],
            "qty" => $row[1],
            "price" => $row[2]
        ]);
    }
}

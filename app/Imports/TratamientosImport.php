<?php

namespace App\Imports;

use App\Tratamiento;
use Maatwebsite\Excel\Concerns\ToModel;

class TratamientosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tratamiento([
            'name'     => $row[0],
            'descripcion'    => $row[1],
        ]);
    }
}

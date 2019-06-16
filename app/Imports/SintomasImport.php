<?php

namespace App\Imports;

use App\Sintoma;
use App\Tratamiento;
use Maatwebsite\Excel\Concerns\ToModel;

class SintomasImport implements ToModel
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

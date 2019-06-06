<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Sintoma extends Model
{
    use ColumnFillable;
    protected $fillable = ['name','descripcion'];

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class)->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Tratamiento extends Model
{
    use ColumnFillable;
    protected $fillable = ['name','descripcion','tipo_id'];

    public function enfermedades()
    {
        return $this->belongsToMany(Enfermedad::class)->withTimestamps();
    }

    // public function items()
    // {
    //     $ids = \DB::table('enfermedad_tratamiento')->where('tratamiento_id', '=', $this->id)->lists('tratamiento_id');
    //     return \Item::whereNotIn('id', $ids)->get();
    // }

}

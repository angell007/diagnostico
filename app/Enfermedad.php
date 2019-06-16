<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Enfermedad extends Model
{
    use ColumnFillable;
    protected $fillable = ['name','descripcion','category_id'];


    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class)->withTimestamps();
    }

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class)->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User', 'historials', 'user_id', 'enfermedad_id')->withTimestamps();
    }

}

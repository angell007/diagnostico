<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class Category extends Model
{
    use ColumnFillable;
    protected $fillable = ['name','descripcion'];
}

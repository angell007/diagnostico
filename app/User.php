<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kjjdion\Laracrud\Traits\ColumnFillable;

class User extends Authenticatable
{
    use Notifiable, ColumnFillable;
    protected $fillable = [
        'name', 'email', 'password','edad','identificacion'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function enfermedades(){
        return $this->belongsToMany('App\Enfermedad', 'historials', 'user_id', 'enfermedad_id')->withTimestamps();
    }
}

// public function hasRole($role)
// {
//     if ($this->roles()->where('name', $role)->first()) {
//         return true;
//     }
//     return false;
// }

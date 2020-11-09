<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    // * metodo para esconder dados de requisições tipo senhas.
    // protected $hidden = ['senha']

    public function pets(){
        return $this->hasMany('App\Models\Pets');
    }

}



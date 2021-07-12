<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = [
        'nome', 
        'data_inicio'
    ];

    public function matriculas()
    {
        return $this->hasMany('App\Matriculas');
    }
}

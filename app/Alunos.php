<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $fillable = [
        'nome', 
        'email', 
        'senha'
    ];    

    public function matriculas()
    {
        return $this->hasMany('App\Matriculas');
    }
}

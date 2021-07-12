<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    protected $fillable = [
        'curso_id', 
        'aluno_id', 
        'ativo', 
        'data_admissao'
    ];
    
     public function curso()
     {
        return $this->belongsTo('App\Cursos');
     }

    public function aluno()
    {
        return $this->belongsTo('App\Alunos');
    }
}

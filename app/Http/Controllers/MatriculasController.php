<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alunos;
use App\Cursos;
use App\Matriculas;

class MatriculasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Exibe uma lista de matriculas.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $matriculas = Matriculas::all()->sortBy('id');
        
        return view('matriculas/listar')->with('matriculas', $matriculas);
    }

    /**
     * Mostra o formulário de criação de um novo matricula.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {        
        $alunos = Alunos::pluck('nome', 'id');
        $cursos = Cursos::pluck('nome', 'id');

        return view('matriculas/criar')->with('alunos', $alunos)
            ->with('cursos', $cursos);
    }

    /**
     * Salva um matricula no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required',
            'curso_id' => 'required',
            'ativo' => 'required',
            'data_admissao' => 'required'
        ]);
    
        Matriculas::create($request->all());
     
        return redirect()->route('matriculas')
                        ->with('success','Matrícula criada com sucesso.');
    }

    /**
     * Mostra o formulário para editar o matricula.
     *
     * @param  \App\Models\Matriculas  $matricula
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $matricula = Matriculas::find($id);
        $alunos = Alunos::pluck('nome', 'id');
        $cursos = Cursos::pluck('nome', 'id');

		if(empty($matricula)) {
			return redirect()->route('matriculas')
                ->with('danger','Nenhum matricula encontrada.');
		}

		return view('matriculas/editar')
            ->with('matricula', $matricula)
            ->with('alunos', $alunos)
            ->with('cursos', $cursos);
    }

    /**
     * Atualiza o matricula no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matriculas  $matricula
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {        
        $request->validate([
            'aluno_id' => 'required',
            'curso_id' => 'required',
            'ativo' => 'required',
            'data_admissao' => 'required'
        ]);
    
        Matriculas::find($id)->update($request->all());
    
        return redirect()->route('matriculas')
            ->with('success','Matrícula alterada com sucesso.');
    }

    /**
     * Exclui o matricula do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        Matriculas::find($id)->delete();

        return redirect()->route('matriculas')
            ->with('success','Matrícula excluída com sucesso.');
    }
    
}

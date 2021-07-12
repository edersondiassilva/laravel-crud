<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alunos;

class AlunosController extends Controller
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
     * Exibe uma lista de alunos.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $alunos = Alunos::all()->sortBy('id');
        
        return view('alunos/listar')->with('alunos', $alunos);
    }

    /**
     * Mostra o formulário de criação de um novo aluno.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {        
        return view('alunos/criar');
    }

    /**
     * Salva um aluno no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {        
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required'
        ]);
    
        Alunos::create($request->all());
     
        return redirect()->route('alunos')
                        ->with('success','Aluno criado com sucesso.');
    }

    /**
     * Mostra o formulário para editar o aluno.
     *
     * @param  \App\Models\Alunos  $aluno
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $aluno = Alunos::find($id);
		if(empty($aluno)) {
			return redirect()->route('alunos')
                        ->with('danger','Nenhum aluno encontrado.');
		}

		return view('alunos/editar')->with('aluno', $aluno);
    }

    /**
     * Atualiza o aluno no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alunos  $aluno
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required'
        ]);
    
        Alunos::find($id)->update($request->all());
    
        return redirect()->route('alunos')
                        ->with('success','Aluno alterado com sucesso.');
    }

    /**
     * Exclui o aluno do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        Alunos::find($id)->delete();

        return redirect()->route('alunos')
                        ->with('success','Aluno excluído com sucesso.');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cursos;

class CursosController extends Controller
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
     * Exibe uma lista de cursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $cursos = Cursos::all()->sortBy('id');
        
        return view('cursos/listar')->with('cursos', $cursos);
    }

    /**
     * Mostra o formulário de criação de um novo curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {        
        return view('cursos/criar');
    }

    /**
     * Salva um curso no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {        
        $request->validate([
            'nome' => 'required',
            'data_inicio' => 'required'
        ]);
    
        Cursos::create($request->all());
     
        return redirect()->route('cursos')
                        ->with('success','Curso criado com sucesso.');
    }

    /**
     * Mostra o formulário para editar o curso.
     *
     * @param  \App\Models\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $curso = Cursos::find($id);
		if(empty($curso)) {
			return redirect()->route('cursos')
                        ->with('danger','Nenhum curso encontrado.');
		}

		return view('cursos/editar')->with('curso', $curso);
    }

    /**
     * Atualiza o curso no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cursos  $curso
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'data_inicio' => 'required'
        ]);
    
        Cursos::find($id)->update($request->all());
    
        return redirect()->route('cursos')
                        ->with('success','Curso alterado com sucesso.');
    }

    /**
     * Exclui o curso do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excluir($id)
    {
        Cursos::find($id)->delete();

        return redirect()->route('cursos')
                        ->with('success','Curso excluído com sucesso.');
    }
    
}

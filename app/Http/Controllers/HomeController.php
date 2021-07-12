<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Matriculas;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $alunos = DB::table('alunos')->count();
        $cursos = DB::table('cursos')->count();
        $matriculas = Matriculas::where('ativo', 1)->count();
        
        return view('home')
            ->with('alunos', $alunos)
            ->with('cursos', $cursos)
            ->with('matriculas', $matriculas);
    }
}

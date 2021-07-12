<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->unsigned();
            $table->integer('aluno_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->boolean('ativo');
            $table->datetime('data_admissao')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}

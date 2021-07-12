@extends('template.app')
@section('content')
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Alteração da Matricula</h3>
</div>
<!-- /.box-header -->
<!-- form start -->

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opa</strong> Houve alguns problemas com sua solicitação.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('matriculas.atualizar',$matricula->id) }}">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <input type="hidden" name="id" value="{{ $matricula->id }}" />
  <div class="box-body">
    <div class="form-group">
      <label>Aluno</label>
      <select name="aluno_id" class="form-control select2" style="width: 100%;">
          @foreach ($alunos as $id => $nome)
          <option value="{{ $id }}" {{ ( $id == $matricula->aluno_id) ? 'selected' : '' }}>{{ $nome }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Curso</label>
      <select name="curso_id" class="form-control select2" style="width: 100%;">
          @foreach ($cursos as $id => $nome)
          <option value="{{ $id }}" {{ ( $id == $matricula->curso_id) ? 'selected' : '' }}>{{ $nome }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="data_admissao">Data admissão</label>
      <input name="data_admissao" type="date" class="form-control" id="data_admissao" value="{{ \Carbon\Carbon::parse($matricula->data_admissao)->format('Y-m-d')}}">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="ativo" class="form-control select2" style="width: 100%;">
      <option value="1" {{ ( $matricula->ativo == 1) ? 'selected' : '' }}>Ativo</option>
      <option value="0" {{ ( $matricula->ativo == 0) ? 'selected' : '' }}>Inativo</option>
      </select>
    </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
</div>

  
      
@endsection
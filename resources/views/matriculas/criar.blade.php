@extends('template.app')
@section('content')
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Matricular aluno</h3>
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

<form method="post" action="{{url('/matriculas/salvar')}}">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <div class="box-body">
    <div class="form-group">
      <label>Aluno</label>
      <select name="aluno_id" class="form-control select2" style="width: 100%;">
          <option value=""></option>
          @foreach ($alunos as $id => $nome)
          <option value="{{ $id }}">{{ $nome }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Curso</label>
      <select name="curso_id" class="form-control select2" style="width: 100%;">
          <option value=""></option>
          @foreach ($cursos as $id => $nome)
          <option value="{{ $id }}">{{ $nome }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="data_admissao">Data admissão</label>
      <input name="data_admissao" type="date" class="form-control" id="data_admissao" value="{{ old('data_admissao') }}">
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="ativo" class="form-control select2" style="width: 100%;">
      <option value="1" selected="selected">Ativo</option>
      <option value="0">Inativo</option>
      </select>
    </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
</div>

  
      
@endsection
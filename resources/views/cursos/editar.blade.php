@extends('template.app')
@section('content')
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Cadastro de Cursos</h3>
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

<form method="post" action="{{ route('cursos.atualizar',$curso->id) }}">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <input type="hidden" name="id" value="{{ $curso->id }}" />
  <div class="box-body">
    <div class="form-group">
      <label for="nome">Nome</label>
      <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" value="{{ $curso->nome }}">
    </div>
    <div class="form-group">
      <label for="data_inicio">Data início</label>
      <input name="data_inicio" type="date" class="form-control" id="data_inicio" value="{{ \Carbon\Carbon::parse($curso->data_inicio)->format('Y-m-d')}}">
    </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
</div>

  
      
@endsection
@extends('template.app')
@section('content')
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Cadastro de Alunos</h3>
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

<form method="post" action="{{url('/alunos/salvar')}}">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <div class="box-body">
    <div class="form-group">
      <label for="nome">Nome</label>
      <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" value="{{ old('nome') }}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
      <label for="senha">Senha</label>
      <input name="senha" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ old('senha') }}">
    </div>
  <!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
</div>

  
      
@endsection
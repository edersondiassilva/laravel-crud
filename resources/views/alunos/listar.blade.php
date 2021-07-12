@extends('template.app')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pesquisa de Alunos</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif
      @if ($message = Session::get('danger'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
      @endif
      @if(empty($alunos))
      <div class="alert alert-danger">
          Você não tem nenhum aluno cadastrado.
      </div>
      @else
        <table id="table-alunos" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>#</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($alunos as $a)
          <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->nome }}</td>
            <td>{{ $a->email }}</td>

            <td>
              <a class="btn btn-primary" href="{{ route('alunos.editar',$a->id) }}">Editar</a>
              <a class="btn btn-danger" href="{{ route('alunos.excluir',$a->id) }}">Excluir</a>
          </td>

          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>#</th>
          </tr>
          </tfoot>
        </table>
        @endif
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
      
<div class="pull-right">
  <a class="btn btn-primary" href="{{url('/alunos/criar')}}">Criar</a>
</div>

<script>
  $(function () {
    $('#table-alunos').DataTable({
      'searching'   : true
    });
  })
</script>
@endsection
@extends('template.app')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pesquisa de Cursos</h3>
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
      @if(empty($cursos))
      <div class="alert alert-danger">
          Você não tem nenhum curso cadastrado.
      </div>
      @else
        <table id="table-cursos" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Data início</th>
            <th>#</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($cursos as $c)
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>{{ \Carbon\Carbon::parse($c->data_inicio)->format('d/m/Y')}}</td>

            <td>
              <a class="btn btn-primary" href="{{ route('cursos.editar',$c->id) }}">Editar</a>
              <a class="btn btn-danger" href="{{ route('cursos.excluir',$c->id) }}">Excluir</a>
          </td>

          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Data início</th>
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
  <a class="btn btn-primary" href="{{url('/cursos/criar')}}">Criar</a>
</div>

<script>
  $(function () {
    $('#table-cursos').DataTable({
      'searching'   : true
    });
  })
</script>
@endsection
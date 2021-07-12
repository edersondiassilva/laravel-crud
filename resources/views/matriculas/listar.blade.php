@extends('template.app')
@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pesquisa de Matriculas</h3>
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
      @if(empty($matriculas))
      <div class="alert alert-danger">
          Você não tem nenhuma matricula cadastrada.
      </div>
      @else
        <table id="table-matriculas" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Matricula</th>
            <th>Curso</th>
            <th>Aluno</th>
            <th>Data admissão</th>
            <th>Status</th>
            <th>#</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($matriculas as $m)
          <tr>
            <td>{{ $m->id }}</td>
            <td>{{ $m->curso->nome }}</td>
            <td>{{ $m->aluno->nome }}</td>
            <td>{{ \Carbon\Carbon::parse($m->data_admissao)->format('d/m/Y')}}</td>
            <td>                 
            @if($m->ativo =='1')         
              <span class="label label-success">Ativo</span>         
            @else
              <span class="label label-warning">Inativo</span>        
            @endif
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('matriculas.editar',$m->id) }}">Editar</a>
              <a class="btn btn-danger" href="{{ route('matriculas.excluir',$m->id) }}">Excluir</a>
          </td>

          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>            
            <th>Matricula</th>
            <th>Curso</th>
            <th>Aluno</th>
            <th>Data admissão</th>
            <th>Status</th>
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
  <a class="btn btn-primary" href="{{url('/matriculas/criar')}}">Criar</a>
</div>

<script>
  $(function () {
    $('#table-matriculas').DataTable({
      'searching'   : true
    });
  })
</script>
@endsection
@extends('template.app')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Lista de Clientes</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
      @endif
      @if (count($clients) == 0)
      <div class="alert alert-danger">
          Você não tem nenhum cliente cadastrado.
      </div>
      @else
        <table id="table-clients" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>#</th>
            <th>Nome</th>
            <th>Documento</th>
            <th>Enviado em</th>
            <th>Status</th>
            <th>Data Status</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($clients as $c)
          <tr>
            <td>
                <a class="fa fa-pencil nav-link" href="/clients/edit/{{ $c->id }}" target="_parent">&nbsp;</a>
            </td>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>
              @for ($i = $c->documents_count; $i > 0; $i--)
                <i class="fa fa-fw fa-file-pdf-o"></i>
              @endfor
            </td>
            <td>{{ $c->documents->first->id->created_at }}</td>
            <td>
              @if ($c->documents->first->id->status === 'Aprovado')
                <span class="label label-success">{{ $c->documents->first->id->status }}</span>
              @else
                <span class="label label-danger">{{ $c->documents->first->id->status }}</span>
              @endif
            </td>
            <td>
              @if ($c->documents->first->id->status === 'Aprovado')
                {{ $c->documents->first->id->updated_at }}
              @else
                <i class="fa fa-fw fa-thumbs-o-up"></i>Aprovar ou <i class="fa fa-fw fa-thumbs-o-down"></i> Reprovar
              @endif
            </td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th>#</th>
            <th>Nome</th>
            <th>Documento</th>
            <th>Enviado em</th>
            <th>Status</th>
            <th>Data Status</th>
          </tr>
          </tfoot>
        </table>
        @endif
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="/clients/create" class="btn btn-sm btn-info btn-flat pull-left">Inserir</a> 
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
      
<script>
  $(function () {
    $('#table-clients').DataTable({
      'searching'   : true,
      "pagingType": "full_numbers"
    });
  })
</script>
@endsection
@extends('template.app')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Lista de Documentos</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
      @endif
      @if(empty($documents))
      <div class="alert alert-danger">
          Você não tem nenhum documento cadastrado.
      </div>
      @else
        <table id="table-documents" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>#</th>
            <th>Documento</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($documents as $d)
          <?php $label = ($d->status) == 'Aprovado' ? 'label-success' : 'label-danger'; ?>
          <tr>
            <td>
                <a class="fa fa-pencil nav-link" href="/documents/edit/{{ $d->id }}" target="_parent">&nbsp;</a>
            </td>
            <td>{{ $d->id }}</td>
            <td>{{ $d->document }}</td>
            <td><span class="label {{$label}}">{{ $d->status }}</span></td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th>#</th>
            <th>Documento</th>
            <th>Status</th>
          </tr>
          </tfoot>
        </table>
        @endif
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="/documents/create" class="btn btn-sm btn-info btn-flat pull-left">Inserir</a> 
      </div>
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
      
<script>
  $(function () {
    $('#table-documents').DataTable({
      'searching'   : true
    });
  })
</script>
@endsection
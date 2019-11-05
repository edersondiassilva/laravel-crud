@extends('template.app')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Relat&oacute;rio de Contas a Pagar por Apartamento</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
      @endif
      @if(empty($apartments))
      <div class="alert alert-danger">
          Você não tem nenhum lançamento cadastrado.
      </div>
      @else
        <table id="table-documents" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Condom&iacute;nio</th>
            <th>Bloco</th>
            <th>Despesas</th>
            <th>Apartamento</th>
            <th>Morador</th>
            <th>Fra&ccedil;&atilde;o Ideal</th>
            <th>Valor a Pagar</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($apartments as $a)
          <tr>
            <td>{{ $a->block->condominium->name }}</td>
            <td>{{ $a->block->name }}</td>
            <td>R$ {{ number_format($a->block->expenses->sum('value'), 2, ',', '.') }}</td>
            <td>{{ $a->number }}</td>
            <td>{{ $a->resident->name }} {{ $a->resident->surname }}</td>
            <td>{{ $a->fraction }}%</td>
            <td>R$ {{ number_format($a->block->expenses->sum('value') * $a->fraction / 100, 2, ',', '.') }}</td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Condom&iacute;nio</th>
            <th>Bloco</th>
            <th>Despesas</th>
            <th>Apartamento</th>
            <th>Morador</th>
            <th>Fra&ccedil;&atilde;o Ideal</th>
            <th>Valor a Pagar</th>
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
      
<script>
  $(function () {
    $('#table-documents').DataTable({
      'searching'   : true
    });
  })
</script>
@endsection
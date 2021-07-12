@extends('template.app')
@section('content')
<div class="row">
  <div class="col-xs-12">
  <div class="box-header">
    <h3 class="box-title">Dashboard</h3>
  </div>
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-address-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ALUNOS</span>
              <span class="info-box-number">{{$alunos}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CURSOS</span>
              <span class="info-box-number">{{$cursos}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-laptop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">MATRÍCULAS ATIVAS</span>
              <span class="info-box-number">{{$matriculas}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
      
@endsection
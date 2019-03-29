@extends('template.app')
@section('content')
<div class="col-xs-12 col-md-12">
    <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do Cliente</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/clients/store" method="post" role="form" @submit.prevent="validateBeforeSubmit" novalidate>
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <div class="box-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group col-xs-9 col-md-9">
                  <label for="name">Nome<span class="required">* </span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" maxlength="100">
                </div>
                <div class="form-group col-xs-9 col-md-9">
                  <label for="email">Email<span class="required">* </span></label>
                  <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" maxlength="100">
                </div>
                <div class="form-group col-xs-4 col-md-4">
                  <label for="phone">Celular<span class="required">* </span></label>
                  <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" maxlength="17">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/clients" class="btn btn-primary">Listar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
@endsection
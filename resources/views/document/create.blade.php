@extends('template.app')
@section('content')
<div class="col-xs-12 col-md-12">
    <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Dados do Documento</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="/documents/store" method="post" role="form">
              <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              <input type="hidden" name="id" value="{{ old('id') }}" />
              <div class="box-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
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
                  <label for="type">Cliente<span class="required">* </span></label>
                  <select class="form-control" name="client_id" id="client_id" required="required">
                  <option value="">&nbsp;</option>
                  @foreach($clients as $id => $number)
                      <option value="{{ $id }}"{{ (old("account_id") == $id ? "selected":"") }}> {{ $number }} </option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group col-xs-9 col-md-9">
                  <label for="document">Nome documento</label>
                  <input type="text" class="form-control" name="document" id="document" value="{{ old('document') }}" maxlength="100">
                </div>
                <div class="form-group col-xs-4 col-md-4">
                  <label for="status">Status<span class="required">* </span></label>
                  <select class="form-control" name="status" id="status" required="required">
                  <option value="">&nbsp;</option>
                  @foreach($status as $id => $description)
                      <option value="{{ $id }}"{{ (old("status") == $id ? "selected":"") }}> {{ $description }} </option>
                  @endforeach
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/documents" class="btn btn-primary">Listar</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
@endsection
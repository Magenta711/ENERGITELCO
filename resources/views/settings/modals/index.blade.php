@extends('lte.layouts')
@section('content')

<section class="content-header">
    <h1>
        Configuraciones <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">General</li>
    </ol>
</section>
<section class="content">
   
  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-text-width"></i>
      <h3 class="box-title">Empleado del mes</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{route('setting_modals_update')}}" class="form-horizontal" method="post">
      @csrf
      <input type="hidden" name="current" value="{{$value->id}}">
      <div class="box-body">
          <div class="form-check">
              <input type="checkbox" name="messege_intro" id="messege_intro" {{$value->messege_intro == 1 ? 'checked' : ''}} value="1">
              <label for="messege_intro">Mensaje de entrada</label>
          </div>
          <div class="form-check">
              <input type="checkbox" name="employee_month" id="employee_month" {{$value->employee_month == 1 ? 'checked' : ''}} value="1">
              <label for="employee_month">Empleado del mes</label>
          </div>
          <div class="form-check">
              <input type="checkbox" name="birthday" id="birthday" {{$value->birthday == 1 ? 'checked' : ''}} value="1">
              <label for="birthday">Cumpleaños</label>
          </div>
          <div class="form-check">
              <input type="checkbox" name="active_24_7" id="active_24_7" {{$value->active_24_7 == 1 ? 'checked' : ''}} value="1">
              <label for="active_24_7">Activarse 24/7</label>
          </div>
          <div class="form-check">
              <input type="checkbox" name="test_intro" id="test_intro" {{$value->test_intro == 1 ? 'checked' : ''}} value="1">
              <label for="test_intro">Test de entrada</label>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button class="btn btn-sm btn-success">Guardar</button>
      </div>
    </form>
  </div>
</section>
@endsection

@extends('lte.layouts')

@section('content')

{{dd($system_setting)}}

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
  @include('includes.alerts')
  <div class="box box-solid">
    <div class="box-header with-border">
      <i class="fa fa-text-width"></i>

      <h3 class="box-title">Datos general</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{route('setting_store')}}" class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="current" value="{{$value->id}}">
      <div class="box-body">
        <div class="form-group">
          <label for="name_app" class="col-md-4 control-label">Nombre del sistema</label>
          <div class="col-md-8 @error('name_app') has-error @enderror">
            <input type="text" name="name_app" value="{{$value->name_app}}" id="name_app" class="form-control" placeholder="Nombre del sistema">
            @error('name_app') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <h4>Datos de sucursal</h4>
        <div class="form-group">
          <label for="nit" class="col-md-4 control-label">Nit</label>
          <div class="col-md-8 @error('nit') has-error @enderror">
            <input type="text" name="nit" id="nit" value="{{$value->nit}}" class="form-control" placeholder="Nit o cedula">
            @error('nit') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="company" class="col-md-4 control-label">Nombre de la empresa</label>
          <div class="col-md-8 @error('company') has-error @enderror">
            <input type="text" name="company" id="company" value="{{$value->company}}" class="form-control" placeholder="Nombre de la empresa">
            @error('company') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-md-4 control-label">Ciudad</label>
          <div class="col-md-8 @error('city') has-error @enderror">
            <input type="text" name="city" id="city" value="{{$value->city}}" class="form-control" placeholder="Nombre de la empresa">
            @error('city') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="tel" class="col-md-4 control-label">Teléfono</label>
          <div class="col-md-8 @error('tel') has-error @enderror">
            <input type="tel" name="tel" id="tel" value="{{$value->tel}}" class="form-control" placeholder="Teléfono">
            @error('tel') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-md-4 control-label">Dirección principal</label>
            <div class="col-md-8 @error('address') has-error @enderror">
              <input type="text" name="address" id="address" value="{{$value->address}}" class="form-control" placeholder="Dirección">
              @error('address') <span class="help-block">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-md-4 control-label">Correo electrónico de la empresa</label>
          <div class="col-md-8 @error('email') has-error @enderror">
            <input type="email" name="email" id="email" value="{{$value->email}}" class="form-control" placeholder="Correo">
            @error('email') <span class="help-block">{{$message}}</span> @enderror
          </div>
        </div>
        <hr>
        <h4>Responsable del aplicativo</h4>
        <div class="form-group">
            <label for="name_responsable" class="col-md-4 control-label">Nombre</label>
            <div class="col-md-8 @error('name_responsable') has-error @enderror">
                <input type="text" id="name_responsable" name="name_responsable" value="{{$value2->name_responsable}}" class="form-control" placeholder="">
                @error('name_responsable') <span class="help-block">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="email_responsable" class="col-md-4 control-label">Correo</label>
            <div class="col-md-8 @error('email_responsable') has-error @enderror">
                <input type="email" id="email_responsable" name="email_responsable" value="{{$value2->email_responsable}}" class="form-control" placeholder="">
                @error('email_responsable') <span class="help-block">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="tel_responsable" class="col-md-4 control-label">Teléfono</label>
            <div class="col-md-8 @error('tel_responsable') has-error @enderror">
                <input type="tel" id="tel_responsable" name="tel_responsable" value="{{$value2->tel_responsable}}" class="form-control" placeholder="">
                @error('tel_responsable') <span class="help-block">{{$message}}</span> @enderror
            </div>
        </div>
        {{-- <hr>
        @php
          $i=0;
        @endphp
        <div class="row">
          <div class="col-md-4">
            <label>Logo principal</label>
            <img src="/img/{{$value2->file_main}}" id="file_main" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_main" id="item_{{$i}}" class="file_input hide">
          </div>
          @php
            $i++;
          @endphp
          <div class="col-md-4">
            <label>Logo principal pequeño</label>
            <img src="/img/{{$value2->file_main_small}}" id="file_main_small" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_main_small" id="item_{{$i}}" class="file_input hide">
          </div>
          @php
            $i++;
          @endphp
          <div class="col-md-4">
            <label>Logo facturas CCJL</label>
            <img src="/img/{{$value2->file_ccjl}}" id="file_ccjl" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_ccjl" id="item_{{$i}}" class="file_input hide">
          </div>
          @php
            $i++;
          @endphp
          <div class="col-md-4">
            <label for="">Logo claro</label>
            <img src="/img/{{$value2->file_claro}}" id="file_claro" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_claro" id="item_{{$i}}" class="file_input hide">
          </div>
          @php
            $i++;
          @endphp
          <div class="col-md-4">
            <label for="">Logo Normas Técnicas y certificación</label>
            <img src="/img/{{$value2->file_cc}}" id="file_cc" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_cc" id="item_{{$i}}" class="file_input hide">
          </div>
          @php
            $i++;
          @endphp
          <div class="col-md-4">
            <label for="">Logo MinTIC</label>
            <img src="/img/{{$value2->file_mintic}}" id="file_mintic" alt="" style="margin: 30px;width: -webkit-fill-available;">
            <label for="item_{{$i}}" class="form-control text-center" id="label_file_{{ $i }}"><i class="fa fa-upload"></i></label>
            <input type="file" name="file_mintic" id="item_{{$i}}" class="file_input hide">
          </div>
        </div> --}}
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button class="btn btn-sm btn-success">Guardar</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
</section>
@endsection

@section('js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.file_input').change(function () {
        $($('#'+this.id).parent().children('label')).addClass('text-aqua');
        readImage(this);
    });

    function readImage (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+input.name).attr('src', e.target.result); // Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
@endsection
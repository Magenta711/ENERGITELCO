@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar comisiones a técnicos <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Editar comisiones a técnicos</li>
    </ol>
</section>
<section class="content">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <div class="box-title">Editar comisión a técnicos</div>
                    <div class="box-tools">
                        <a href="{{route('setting_bonuses_technical')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('bonuses_setting_update_technical',$id->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                   <div class="form-group">
                       <label for="position_id">Cargo</label>
                       <select name="position_id" id="position_id" class="form-control">
                           <option selected disabled></option>
                           @foreach ($positions as $position)
                               <option {{ ($id->position_id == $position->id) ? 'selected' : '' }} value="{{$position->id}}">{{$position->name}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class="form-group">
                       <label for="value">Valor</label>
                       <input type="number" name="value" id="value" class="form-control" value="{{$id->value}}">
                   </div>                   
                   <div class="form-group">
                       <label for="days">Frecuencia <small>(Días)</small></label>
                       <input type="number" name="days" id="days" class="form-control" value="{{$id->days}}">
                   </div>
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
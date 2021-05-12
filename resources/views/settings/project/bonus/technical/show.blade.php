@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver comisiones a técnicos <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Ver comisiones a técnicos</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <div class="box-title">Ver comisión a técnicos</div>
                    <div class="box-tools">
                        <a href="{{route('setting_bonuses_technical')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="position_id">Cargo</label>
                                <p>{{ $id->position->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="value">Valor</label>
                                <p>{{ number_format($id->value,2,',','.') }}</p>
                            </div>                   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="days">Frecuencia <small>(Días)</small></label>
                                <p>{{$id->days}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        <!-- /.box -->
</section>
@endsection
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver material <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li><a href="#">Lista de materiales</a></li>
        <li class="active">Ver material</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
        
                    <h3 class="box-title">{{$id->description}}</h3>
                    <div class="box-tools">
                        <a href="{{route('materials_setting')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <h4>Información</h4>
                    <strong>Descripción</strong>
                    <p>{{$id->description}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Tipo de proyecto</strong>
                            <p>{{$id->project_types->type}}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Lugar</strong>
                            <p>{{($id->place == 1) ? 'Materiales' : 'Acomedida'}}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Estado</strong>
                            <p>{{$id->state == 1 ? 'Activo' : 'Inactivo'}}</p>
                        </div>
                        <div class="col-md-3">
                            <strong>Tiene longitud</strong>
                            <p>{{($id->hasLength == 1) ? 'Si' : 'No'}}</p>
                            </select>
                        </div>
                    </div>
                   
                    <hr>
                    <h4>Consumables</h4>
                    <ul class="list-group">
                        @foreach ($id->consumables as $consumable)
                            <li class="list-group-item">
                                {{$consumable->id.'. '.$consumable->description}}
                                <br>
                                <strong>Formula</strong>
                                <br>
                                {{$id->hasFormula($consumable->id)}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="box-footer">
                    <a href="{{route('materials_setting_edit',$id->id)}}" class="btn btn-sm btn-success">Editar</a>
                </div>
            </div>
</section>
@endsection
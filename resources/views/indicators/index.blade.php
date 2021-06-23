@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Indicadores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Dirección</a></li>
        <li class="active">Indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de indicadores</div>
            <div class="box-tools">
                @can('Crear indicadores')
                    <a href="{{route('indicators_create')}}" class="btn btn-sm btn-success">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Proceso</th>
                            <th>Porcentaje actual</th>
                            <th>Estado</th>
                            <th>Corte</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->process_id }}</td>
                                <td>{{ $lastRegister = $item->lastRegister()->value ?? 0 }}</td>
                                <td>
                                    <small class="label {{ $lastRegister < 70 ? 'bg-red' : (($lastRegister <= 89) ? 'bg-yellow' : 'bg-green') }}">{{ $lastRegister < 70 ? 'Alarma' : (($lastRegister <= 89) ? 'Alerta' : 'Cumple') }}</small>
                                </td>
                                <td>{{ $item->lastCut() }}</td>
                                <td>
                                    @can('Informe de indicadores')
                                        <a href="{{ route('indicators_show',$item->id) }}" class="btn btn-sm btn-success">Informe</a>
                                    @endcan
                                    @can('Seguimiento de indicadores')
                                        <a href="{{ route('indicators_tracing',$item->id) }}" class="btn btn-sm btn-primary">Seguimiento</a>
                                    @endcan
                                    @can('Administración de indicadores')
                                        <a href="{{ route('indicators_edit',$item->id) }}" class="btn btn-sm btn-warning">Administración</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
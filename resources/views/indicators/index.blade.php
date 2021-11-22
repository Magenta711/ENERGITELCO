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
                            <th>Corte anterior</th>
                            <th>Porcentaje actual</th>
                            <th>Estado</th>
                            <th>Siguiente corte</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $item)
                            @php
                                $lRegister = $item->lastRegister();
                                $lastRegister = $lRegister->value ?? 0;
                            @endphp
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->process_id }}</td>
                                <td>{{ $lastCut = $item->lastCut()['date'] }}</td>
                                <td>{{ $lRegister->cut >= $lastCut ? $lastRegister.' %' : '0.00 %' }}</td>
                                <td>
                                    @php
                                        if ($lRegister->cut >= $lastCut) {
                                            $calification = explode('-',$item->calification);
                                            if ($calification[0] != 100) {
                                                $bg = $lastRegister < intval($calification[0])  ? 'bg-red' : (($lastRegister <= intval($calification[1])) ? 'bg-yellow' : 'bg-green');
                                                $status = $lastRegister < intval($calification[0])  ? 'Alarma >' : (($lastRegister <= intval($calification[1])) ? 'Alerta >' : 'Cumple >');
                                            }
                                            if ($calification[0] == 100) {
                                                $bg = $lastRegister > intval($calification[1])  ? 'bg-red' : 'bg-green';
                                                $status = $lastRegister > intval($calification[1])  ? 'Alarma <' : 'Cumple <';
                                            }
                                        }else {
                                            $lRegister = $item->updateTracing($lastCut);
                                            $bg = 'bg-red';
                                            $status = 'Alarma -';
                                        }
                                    @endphp
                                    <small class="label {{$bg}}">{{ $status }}</small>
                                </td>
                                <td>{{ $item->nextCut()['date'] }}</td>
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
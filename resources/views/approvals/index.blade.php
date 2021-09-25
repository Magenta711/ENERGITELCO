@php
    function sudmenuActive()
    {
        if ($submenu = Session::get('sudmenu')) {
            return $submenu;
        }else {
            return 1;
        }
    }
@endphp
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Aprobaciones <small>Listado de formatos sin aprobar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Aprobaciones</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                <i class="fa fa-th"></i> Aprobaciones
            </div>
        </div>
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    {{-- Proyectos --}}
                    @can('Aprobar bonificaciones de permisos de trabajo')
                        <li {!! sudmenuActive() == 18 ? 'class="active"' : '' !!}>
                            <a href="#tab_18" data-toggle="tab">Pago de bonificaciones
                                <span class="label label-primary">{{count($cuts)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar proyectos')
                        <li {!! sudmenuActive() == 17 ? 'class="active"' : '' !!}>
                            <a href="#tab_17" data-toggle="tab">Planeación de proyectos
                                <span class="label label-primary">{{count($projects)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar proyectos de MINTIC')
                    <li {!! sudmenuActive() == 16 ? 'class="active"' : '' !!}>
                        <a href="#tab_16" data-toggle="tab">MINTIC
                            <span class="label label-primary">{{count($mintics)}}</span>
                        </a>
                    </li>
                    @endcan
                    @can('Aprobar proyectos de rutas')
                        <li {!! sudmenuActive() == 15 ? 'class="active"' : '' !!}>
                            <a href="#tab_15" data-toggle="tab">Rutas
                                <span class="label label-primary">{{count($routes)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar proyectos de desmonte')
                        <li {!! sudmenuActive() == 14 ? 'class="active"' : '' !!}>
                            <a href="#tab_14" data-toggle="tab">Desmontes
                                <span class="label label-primary">{{count($clearings)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar hojas de vida')
                        <li {!! sudmenuActive() == 13 ? 'class="active"' : '' !!}>
                            <a href="#tab_13" data-toggle="tab">Hojas de vida
                                <span class="label label-primary">{{count($curriculums)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar evaluación de desempeño')
                        <li {!! sudmenuActive() == 12 ? 'class="active"' : '' !!}>
                            <a href="#tab_12" data-toggle="tab">Evaluaciones de desempeño
                                <span class="label label-primary">{{count($performance)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar entrevistas')
                        <li {!! sudmenuActive() == 11 ? 'class="active"' : '' !!}>
                            <a href="#tab_11" data-toggle="tab">Entrevistas
                                <span class="label label-primary">{{count($interviews)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar llamados de atención')
                        <li {!! sudmenuActive() == 10 ? 'class="active"' : '' !!}>
                            <a href="#tab_10" data-toggle="tab">Llamados de atencción
                                <span class="label label-primary">{{count($attention_calls)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar retiro de cesantías')
                        <li {!! sudmenuActive() == 9 ? 'class="active"' : '' !!}>
                            <a href="#tab_9" data-toggle="tab">Solicitud de retiro de cesatías o carta laboral
                                <span class="label label-primary">{{count($trabajos10)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar reporte de novedades de nómina y horas extras')
                        <li {!! sudmenuActive() == 8 ? 'class="active"' : '' !!}>
                            <a href="#tab_8" data-toggle="tab">Reporte de novedades de nomina
                                <span class="label label-primary">{{count($trabajos8)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de permiso laboral o notificación de incapacidad')
                        <li {!! sudmenuActive() == 7 ? 'class="active"' : '' !!}>
                            <a href="#tab_7" data-toggle="tab">Solicitud de permiso laboral o notificación de incapacidad médica
                                <span class="label label-primary">{{count($trabajos7)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de lista de verificación para el mantenimiento de computadores')
                        <li {!! sudmenuActive() == 6 ? 'class="active"' : '' !!}>
                            <a href="#tab_6" data-toggle="tab">Verificación para el mantenimiento de los computadores
                                <span class="label label-primary">{{count($trabajos6)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de entrega de dotación personal')
                        <li {!! sudmenuActive() == 5 ? 'class="active"' : '' !!}>
                            <a href="#tab_5" data-toggle="tab">Entrega de dotación personal
                                <span class="label label-primary">{{count($trabajos5)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de Revisión y asignación de herramientas')
                        <li {!! sudmenuActive() == 4 ? 'class="active"' : '' !!}>
                            <a href="#tab_4" data-toggle="tab">Revisión y asignación de herramientas
                                <span class="label label-primary">{{count($trabajos4)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de Inspección detallada de vehículos')
                        <li {!! sudmenuActive() == 3 ? 'class="active"' : '' !!}>
                            <a href="#tab_3" data-toggle="tab">Inspección detallada de vehículos
                                <span class="label label-primary">{{count($trabajos3)}}</span>
                            </a>
                        </li>
                    @endcan
                    @can('Aprobar solicitud de Inspección y protección contra caídas')
                        <li {!! sudmenuActive() == 2 ? 'class="active"' : '' !!}>
                            <a href="#tab_2" data-toggle="tab">Inspección y protección contra caídas
                                <span class="label label-primary">{{count($trabajos2)}}</span>
                            </a>
                        </li>
                    @endcan
                    @if(auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') || auth()->user()->hasPermissionTo('Aprobar solicitudes permisos propios'))
                        <li {!! sudmenuActive() == 1 ? 'class="active"' : '' !!}>
                            <a href="#tab_1" data-toggle="tab">Permisos de trabajo
                                <span class="label label-primary">{{count($trabajos1)}}</span>
                            </a>
                        </li>
                    @endif
                    <li class="pull-left header"></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane {{sudmenuActive() == 1 ? 'active' : ''}}" id="tab_1">
                        <div class="table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos1 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar permisos de trabajo')
                                                        <a href="{{route('work_permit_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 2 ? 'active' : ''}}" id="tab_2">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos2 as $trabajo)
                                            <tr class="table-active">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar inspecciones de equipos de protección contra caídas')
                                                        <a href="{{route('fall_protection_equipment_inspection_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 3 ? 'active' : ''}}" id="tab_3">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos3 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar inspecciones detalladas de vehículos')
                                                        <a href="{{route('detailed_inspection_vehicles_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 4 ? 'active' : ''}}" id="tab_4">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos4 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar listas de verificación para el mantenimiento de los computadores')
                                                        <a href="{{route('review_assignment_tools_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 5 ? 'active' : ''}}" id="tab_5">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos5 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar entrega de dotación personal')
                                                        <a href="{{route('delivery_staffing_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 6 ? 'active' : ''}}" id="tab_6">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos6 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar revisión y asignación de herramientas')
                                                        <a href="{{route('checklist_computer_maintenance_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 7 ? 'active' : ''}}" id="tab_7">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos7 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica')
                                                        <a href="{{route('request_withdraw_severance_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 8 ? 'active' : ''}}" id="tab_8">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos8 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar reporte de novedades de nómina y horas extras')
                                                        <a href="{{route('payroll_overtime_news_report_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 9 ? 'active' : ''}}" id="tab_9">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Código del formulario</th>
                                        <th scope="col">Responsable del Trabajo</th>
                                        <th scope="col">Fecha de la solicitud</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($trabajos10 as $trabajo)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $trabajo->id }}</th>
                                                <th>{{$trabajo->codigo_formulario}}</th>
                                                <td>{{$trabajo->responsableAcargo->name}}</td>
                                                <td>{{ $trabajo->created_at }}</td>
                                                <td>
                                                    @can('Consultar retiro de cesantías')
                                                        <a href="{{route('work_permits_notifications_medical_incapacity_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 10 ? 'active' : ''}}" id="tab_10">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Asunto</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Receptor</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($attention_calls as $call)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $call->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <th scope="row">{{ $call->id }}</th>
                                                <td>{{$call->affair}}</td>
                                                <td>{{$call->responsableCall->name}}</td>
                                                <td>{{$call->receiverCall->name}}</td>
                                                <td>{{$call->created_at}}</td>
                                                <td>
                                                    @can('Ver llamados de atención')
                                                        <a href="{{route('attention_call_show',$call->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 11 ? 'active' : ''}}" id="tab_11">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Aspirante</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($interviews as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->register->name}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver entrevistas')
                                                        <a href="{{route('interview_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 12 ? 'active' : ''}}" id="tab_12">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Evaluado</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($performance as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->evaluado->name}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver evaluaciones de desempeño')
                                                        <a href="{{route('performance_evaluation_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 13 ? 'active' : ''}}" id="tab_13">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Aspirante</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($curriculums as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->register->name ? $item->register->name : ''}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver hojas de vida')
                                                        <a href="{{route('curriculum_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 17 ? 'active' : ''}}" id="tab_17">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($projects as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver proyectos')
                                                        <a href="{{route('project_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 15 ? 'active' : ''}}" id="tab_15">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($routes as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver proyectos de rutas')
                                                        <a href="{{route('routes_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 16 ? 'active' : ''}}" id="tab_16">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($mintics as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver proyectos de MINTIC')
                                                        <a href="{{route('mintic_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 14 ? 'active' : ''}}" id="tab_14">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($clearings as $item)
                                            <tr class="{{(auth()->user()->getRoleNames()[0] == 'Administrador' || $item->approver == auth()->id()) ? 'table-active' : ''}}">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver proyectos de desmonte')
                                                        <a href="{{route('clearings_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane {{sudmenuActive() == 18 ? 'active' : ''}}" id="tab_18">
                        <div class="box-body table-responsive">
                            <table class="table table-hover">
                                
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Responsable</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($cuts as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->responsable->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>
                                                    @can('Ver bonificaciones de permisos de trabajo')
                                                        <a href="{{ route('bonus_minor_box_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</section>
@endsection
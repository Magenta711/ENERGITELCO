@extends('lte.layouts')
@section('content')
{{-- 1633535962Imbnk.jpg --}}
{{-- 1633536739t8Mqj.jpeg --}}
@php
        $months = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOBIEMBRE','DICIEMBRE'];
    @endphp
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Página principal <small>Sistema de gestión de calidad de Energitelco S.A.S</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">Inicio</li>
        </ol>
    </section>
    <section class="content">
         
        {{-- Content main --}}

        {{-- Reports --}}
        @if (auth()->user()->hasRole('Administrador'))
            <!-- Main content -->
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-light-blue-active">
                        <div class="inner">
                            <h3>{{ $usuarios }}</h3>

                            <p>Usuarios registrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('users') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $proyectos }}</h3>
                            <p>Proyectos</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <a href="{{ route('project') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                {{ $total_sin_aprobar }}
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Pendientes sin aprobar</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check-square"></i>
                        </div>
                        <a href="{{ route('approval') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $trabajos1 }}</h3>
                            <p>Permisos de trabajo</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hand-paper"></i>
                        </div>
                        <a href="{{ route('work_permit') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <!-- ./col --> --}}
            </div>
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $customers }}</h3>

                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-database"></i>
                        </div>
                        <a href="{{ route('customers') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>{{ $providers }}</h3>

                            <p>Proveedores</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-gem"></i>
                        </div>
                        <a href="{{ route('providers') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $job_application }}</h3>

                            <p>Solicitudes de empleo</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <a href="{{ route('job_application') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>7</h3>

                            <p>Entrevistas</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('interview') }}" class="small-box-footer btn-send">Más información <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <div class="col-xs-12">
                <a href="#" class="btn btn-link pull-right">Ver más reportes</a>
            </div> --}}
            </div>
        @endif
        <div class="row">
            @if (auth()->user()->hasPermissionTo('CVS Lista de ventas') ||
        auth()->user()->hasPermissionTo('CVS Exportar reporte de ventas') ||
        auth()->user()->hasPermissionTo('CVS Crear ventas') ||
        auth()->user()->hasPermissionTo('CVS Ver ventas') ||
        auth()->user()->hasPermissionTo('CVS Finalizar ventas') ||
        auth()->user()->hasPermissionTo('CVS Cancelar ventas'))
                <div class="col-sm-2 col-xs-3">
                    <div class="box box-primary">
                        <a href="{{ route('cvs_sales') }}" class="btn-send">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-store"></i></span>
                                <h5 class="description-header">CVS</h5>
                                <span class="description-text">Ventas</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermissionTo('CVS Lista de recibos por pagar') ||
        auth()->user()->hasPermissionTo('CVS Pagar recibos') ||
        auth()->user()->hasPermissionTo('CVS Cancelar ventas'))
                <div class="col-sm-2 col-xs-3">
                    <div class="box">
                        <a href="{{ route('cvs_invoices') }}" class="btn-send">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i
                                        class="fa fa-file-invoice-dollar"></i></span>
                                <h5 class="description-header">CVS</h5>
                                <span class="description-text">Recibos</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') ||
        auth()->user()->hasPermissionTo('Consultar permisos de trabajo') ||
        auth()->user()->hasPermissionTo('Descargar PDF de permisos de trabajo') ||
        auth()->user()->hasPermissionTo('Digitar formulario de Permisos de trabajo') ||
        auth()->user()->hasPermissionTo('Eliminar formato de permisos de trabajo'))
                <div class="col-sm-2 col-xs-3">
                    <div class="box box-success">
                        <a href="{{ route('work_permit_create') }}" class="btn-send">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-briefcase"></i></span>
                                <h5 class="description-header">Solicitud</h5>
                                <span class="description-text">Permiso de trabajo</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
        auth()->user()->hasPermissionTo('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica') ||
        auth()->user()->hasPermissionTo('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica') ||
        auth()->user()->hasPermissionTo('Digitar formulario de solicitud de permiso laboral o notificación de incapacidad') ||
        auth()->user()->hasPermissionTo('Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad médica'))
                <div class="col-sm-2 col-xs-3">
                    <div class="box box-warning">
                        <a href="{{ route('work_permits_notifications_medical_incapacity') }}" class="btn-send">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-compress"></i></span>
                                <h5 class="description-header">Solicitud</h5>
                                <span class="description-text">Permiso laboral</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            <div class="col-sm-2 col-xs-3">
                <div class="box box-danger">
                    <a href="{{route('request_withdraw_severance')}}" class="btn-send">
                        <div class="description-block border-right">
                            <span class="description-percentage text-green"><i class="fa fa-money-bill"></i></span>
                            <h5 class="description-header">Solicitud</h5>
                            <span class="description-text">Carta de retiro de cesantísas o laboral</span>
                        </div>
                    </a>
                </div>
            </div>
            @can('Lista de formularios')
                <div class="col-sm-2 col-xs-3">
                    <div class="box box-info">
                        <a href="{{ route('forms') }}" class="btn-send">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fab fa-wpforms"></i></span>
                                <h5 class="description-header">Gestión</h5>
                                <span class="description-text">Formularios</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-md-8">
                @if (count($taskings))
                    <div class="box box-danger">
                        <div class="box-header">
                            Frente de trabajo
                        </div>
                        <div class="box-body">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Actividades</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taskings as $tasking)
                                        <tr>
                                            <td>
                                                <div class="row" style="cursor: pointer" data-toggle="modal"
                                                    data-target="#show-modal-{{ $tasking->id }}">
                                                    <div class="col-xs-6">
                                                        <p>{{$tasking->eb ? $tasking->eb->projectble->name : $tasking->station_name}}</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <p class="date-starts">{{ $tasking->date_start }}</p>
                                                    </div>
                                                    <div class="col-xs-6 list-user">
                                                        @foreach ($tasking->users as $user)
                                                            <p id="list-user-{{ $tasking->id }}-{{ $user->id }}">
                                                                {{ $user->name }}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        {{ $tasking->am ? 'AM' . ($tasking->pm ? ' / ' : '') : '' }}
                                                        {{ $tasking->pm ? 'PM' : '' }}
                                                    </div>
                                                    <div class="col-xs-6 text-right list-vehicles">
                                                        @foreach ($tasking->vehicles as $vehicle)
                                                            <span class="label label-default"
                                                                id="list-vehicle-{{ $tasking->id }}-{{ $vehicle->vehicle->id }}">
                                                                {{ $vehicle->vehicle->plate }} -
                                                                {{ $vehicle->vehicle->brand }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @include('tasking.includes.modals.show',['item' => $tasking])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                @can('Consultar cartelera')
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <i class="fa fa-th"></i> Cartelera
                            </div>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body">

                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    @foreach ($bill_types as $bill_type)
                                        <li class="{{ $bill_type->id == 1 ? 'active' : '' }}"><a
                                                href="#tab_{{ $bill_type->id }}"
                                                data-toggle="tab">{{ $bill_type->name }}</a></li>
                                    @endforeach
                                    <li class="pull-left header"></li>
                                </ul>
                                <div class="tab-content">
                                    @foreach ($bill_types as $bill_type)
                                        <div class="tab-pane {{ $bill_type->id == 1 ? 'active' : '' }}"
                                            id="tab_{{ $bill_type->id }}">
                                            <div class="row">
                                                @foreach ($bill_type->documents as $cartel)
                                                    @php
                                                        $type = explode('.', $cartel->document)[count(explode('.', $cartel->document)) - 1];
                                                    @endphp
                                                    <div class="col-md-4 col-sm-4">
                                                        <span
                                                            class="mailbox-attachment-icon {{ $type == 'jpg' || $type == 'png' || $type == 'jpeg' ? 'has-img' : '' }}"
                                                            id="icon_{{ $cartel->id }}">
                                                            <div id="type_{{ $cartel->cartel }}">
                                                                @if (strtolower($type) == 'pdf')
                                                                    <i class="fa fa-file-pdf"></i>
                                                                @endif
                                                                @if (strtolower($type) == 'docx' || strtolower($type) == 'doc')
                                                                    <i class="fa fa-file-word"></i>
                                                                @endif
                                                                @if (strtolower($type) == 'xlsx' || strtolower($type) == 'xls')
                                                                    <i class="fa fa-file-excel"></i>
                                                                @endif
                                                                @if (strtolower($type) == 'pptx' || strtolower($type) == 'ppt')
                                                                    <i class="fa fa-file-powerpoint"></i>
                                                                @endif
                                                                @if (strtolower($type) == 'png' || strtolower($type) == 'jpg' || strtolower($type) == 'jpeg')
                                                                    <img src="/file/billboard/{{ $cartel->document }}" style="width: 100%;" alt="Attachment">
                                                                @endif
                                                                @if (strtolower($type) == 'mp3')
                                                                    <i class="fa fa-file-audio"></i>
                                                                @endif
                                                                @if (strtolower($type) == 'mp4' || strtolower($type) == 'MP4')
                                                                    <i class="fa fa-file-video"></i>
                                                                @endif
                                                            </div>
                                                        </span>
                                                        <div class="mailbox-attachment-info">
                                                            <p class="mailbox-attachment-name"
                                                                style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"
                                                                data-toggle="tooltip" title="{{ $cartel->name_document }}"><i
                                                                    class="fa fa-paperclip"></i><span
                                                                    id="name_{{ $cartel->id }}">{{ $cartel->name_document }}</span>
                                                            </p>
                                                            <span class="mailbox-attachment-size">
                                                                .
                                                                <span
                                                                    id="size_{{ $cartel->cartel }}">{{ $cartel->size }}</span>
                                                                <a target="_black"
                                                                    href="/file/billboard/{{ $cartel->document }}"
                                                                    class="btn btn-default btn-xs pull-right"><i
                                                                        class="fa fa-download"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    @endforeach
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                    </div>
                @endcan
                {{-- <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-title">
                            <i class="far fa-calendar-alt"></i> Calendario
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="calendar"></div>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bienvenido, {{ Auth::user()->name }}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                                <i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <p id="menssage_user">{!! $start_mesage ? str_replace("\n", '</br>', addslashes($start_mesage->description)) : '' !!}</p>
                    </div>
                    <!-- /.box-body -->
                    {{-- <div class="box-footer">
                    Footer
                </div> --}}
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            </div>
            @if ($proof_payment)
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <div class="col-xs-8 col-sm-10 col-md-9">
                                    Descargar comprobante de pago {{ $proof_payment->work->start_date }} -
                                    {{ $proof_payment->work->end_date }}
                                </div>
                                <div class="col-xs-4 col-sm-2 col-md-3">
                                    <a href="{{ route('payroll_overtime_news_report_export', $proof_payment->work->id) }}"
                                        class="btn btn-danger">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </div>
                            </h3>
                        </div>
                        <!-- /.box-body -->
                        {{-- <div class="box-footer">
                        Footer
                    </div> --}}
                        <!-- /.box-footer-->
                    </div>
                </div>
            @endif
            {{-- <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        PQRSF
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('suggestions_mailbox_save')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type">Tipo</label>
                                    <select name="type" id="type" class="form-control">
                                        <option selected disabled>Seleccione...</option>
                                        <option {{old('type') == 'Peticiones' ? 'selected' : ''}} value="Peticiones">Peticiones</option>
                                        <option {{old('type') == 'Quejas' ? 'selected' : ''}} value="Quejas">Quejas</option>
                                        <option {{old('type') == 'Reclamos' ? 'selected' : ''}} value="Reclamos">Reclamos</option>
                                        <option {{old('type') == 'Sugerencia' ? 'selected' : ''}} value="Sugerencia">Sugerencia</option>
                                        <option {{old('type') == 'Felicitaciones' ? 'selected' : ''}} value="Felicitaciones">Felicitaciones</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <select name="area" id="area" class="form-control">
                                        <option selected disabled>Seleccione...</option>
                                        <option {{old('area') == 'Administrava' ? 'selected' : ''}} value="Administrava">Administrava</option>
                                        <option {{old('area') == 'Gestión' ? 'selected' : ''}} value="Gestión humana">Gestión humana</option>
                                        <option {{old('area') == 'Técnica' ? 'selected' : ''}} value="Técnica">Técnica</option>
                                        <option {{old('area') == 'Sistemas' ? 'selected' : ''}} value="Sistemas">Sistemas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="affair">Motivo</label>
                            <input type="text" name="affair" id="affair" value="{{old('affair')}}" class="form-control" placeholder="Especifique el mensaje">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Mensaje...">{{old('description')}}</textarea>
                        </div>
                        <button class="btn btn-sm btn-primary">Guardar</button>
                    </form>
                </div>
                <!-- /.box-body -->
                <!-- <div class="box-footer">
                    Footer
                </div>-->
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div> --}}
            @if (auth()->user()->b24_7)
                <div class="col-md-4">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                Reporte 24/7
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('bonus_24-7') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="date_time_start">Fecha</label>
                                    <input type="date" name="date_start" id="date_start" class="form-control"
                                        value="{{ now()->format('Y-m-d') }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">Nombre de EB o CD</label>
                                    <input type="text" name="description" id="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="plus">
                                        <input type="checkbox" name="plus" id="plus" value="1">
                                        Me retiro con actividad exitosa, visto bueno de coordinador y con 0 impacto
                                        ambiental o sitio limpio
                                    </label>
                                </div>
                                <div class="form-group">
                                    <small class="text-muted"><b>Nota:</b> Recuerde enviar reportes en linea a <i
                                            class="fab fa-whatsapp"></i>3113066482</small>
                                </div>
                                <button class="btn btn-sm btn-primary">Enviar</button>
                            </form>
                        </div>
                        <!-- /.box-body -->
                        <!-- <div class="box-footer">
                            Footer
                        </div>-->
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
                </div>
            @endif
            {{-- @if (!auth()->user()->register())
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Importante</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item">Favor actualizar datos de perfil clic <a href="{{route('add_information')}}" class="btn-send">aquí</li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div>
        @endif --}}
            {{-- Notifications --}}
        </div>
    </section>
    
@endsection

@section('css')
    <link href="{{asset('assets/'.$theme.'/bower_components/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet" />
    <style>
        .swal2-content {
            font-size: 15px !important;
        }

    </style>
@endsection
@section('js')
    <script src="{{asset('assets/'.$theme.'/bower_components/fullcalendar/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/moment/moment.js')}}"></script>
    <script src='{{asset('assets/'.$theme.'/bower_components/fullcalendar/dist/fullcalendar.min.js')}}'></script>
    <script src='{{asset('assets/'.$theme.'/bower_components/fullcalendar/dist/locale/es.js')}}'></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).ready(function() {
            // var calendar = $('#calendar').fullCalendar({
            //     editable: true,
            //     events: '/home/callendar',
            //     displayEventTime: false,
            //     eventLimit: true,
            //     defaultView: 'month',
            //     header: {
            //         left: 'prev,next today',
            //         center: 'title',
            //         right: 'month,agendaWeek,agendaDay'
            //     },
            //     selectable: true,
            //     selectHelper: true,
            // });
        });
        @if ($system->messege_intro)
        let text_message = $('#menssage_user').text();
        Swal.fire({
            title: 'Bienvenido, {{ auth()->user()->name }}',
            text: text_message,
            width: 600,
            icon: 'info',
        }).then((value) => {
        @endif
            @if ($system->employee_month)
            Swal.fire({
                
                html: '<h1 style="font-size: 16pt;color:#0080ff;">RECONOCIMIENTO AL EMPLEADO DEL MES</h1><p style="font-size: 14pt;color:#252525">"No es lo que sabes, es lo que haces con lo que sabes"</p><div style="display: flex;">    <div style="width:40%">        @php            $i = 3;            $j = 1;        @endphp        @foreach($months as $key => $month)            @php                $good = false;            @endphp            @if($i % 3 == 0)                <div style="display: flex;width:100%">            @endif                <div style="border: 1px solid #000000;width: 33.3%">                    <p>{{$month}}</p>                    @foreach($employee_months as $employee )                        @if (intval(explode("-",$employee->month)[1]) == ($key + 1))                            @if ($employee->file)                                <img src="storage/avatars/{{$employee->file->name}}" width="100%">                            @else                                <img src="img/{{$employee->user->foto}}" width="100%">                            @endif                            <p class="text-center">{{$employee->user->name}}</p>                            @php                                $good = true;                            @endphp                        @endif                    @endforeach            @if (!$good)                <img src="img/anonimus.png" width="100%">            @endif                </div>            @if($j % 3 == 0)                </div>            @endif            @php                $i++;                $j++;            @endphp        @endforeach    </div>    <div  style="width:60%"><p style="font-size: 12pt">Comenzaremos de nuevo este año, con el programa y la motivación para que seas el empleado del mes.</p><p style="font-size: 12pt">Te invitamos a que leas y te enteres de nuestros valores corporativos que encuentran y lo apliques en tu vida laboral diaria.</p><p style="font-size: 12pt">Los valores son.</p>        <ul style="font-size: 12pt;text-align:left">            <li>Honestidad</li>            <li>Saber seguir instrucciones</li>            <li>Estar de lado de la empresa (Lealtad)</li>            <li>Compromiso</li>            <li>Desarrollo humano</li>            <li>Respeto</li>        </ul>        <p style="font-size: 14pt;color:#252525">¡Anímate a ser el mejor compañero y colaborador del mes!</p>    </div></div><p><small style="font-size: 9pt">ENERGITELCO S.A.S.</small></p>',
                width: 1000,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mousedown', Swal.stopTimer)
                    toast.addEventListener('mouseup', Swal.resumeTimer)
                }
            }).then((val) => {
            @endif
                readyBirthDay = false;
                @if ($system->birthday && $user_births && count($user_births) > 0)
                    readyBirthDay = true;
                    Swal.fire({
                        html: '<div style="background-color: #323c41;width: 700px; height: 400px; position: absolute; top: 50%; left: 50%; margin: -200px 0 0 -350px; overflow: hidden; border-radius: 10px; box-shadow: 3px 3px 20px rgba(0, 0, 0, .5); text-align: center; background: url(https://energitelco.com/assets/img/as.jpg) no-repeat; background-size: 100% 100%" class="blog-card spring-fever"><div class="title-content" style="text-align: center;margin: 70px 0 0 0;position: absolute;z-index: 20;width: 100%;top: 0;left: 0;">  <h3 style="font-size: 20px;font-weight: 500;letter-spacing: 2px;color: #9CC9E3;font-family: "Roboto", sans-serif;margin-bottom: 0;">FELIZ CUMPLEAÑOS</h3>  <hr style="width: 50px;height: 3px;margin: 20px auto;border: 0;background: #D0BB57" />  <div class="intro" style="width: 170px;margin: 0 auto;color: #DCE3E7;font-family: "Droid Serif", serif;font-size: 13px;font-style: italic;line-height: 18px;">Los mejores deseos para esté día tan especial.</div></div><!-- /.title-content --><div class="card-info" style="width: 100%;position: absolute;bottom: 45px;left: 0;margin: 0 auto;padding: 0 50px;color: #DCE3E7;z-index: 20;"><div style="display: flex;justify-content: center;"> @foreach($user_births as $user_birth) <div style="width:20%;margin:0px 5px;max-height: 150px;height:auto"><img src="/img/{{$user_birth->foto}}" style="width:100%;border-radius: 8px;max-height: 88%;height: auto;"> <p>{{$user_birth->name}}</p></div> @endforeach </div> </div><!-- /.card-info --><div class="utility-info" style=" position: absolute;bottom: 0px;left: 0;z-index: 20;">  <ul class="utility-list" style="list-style-type: none;margin: 0 0 15px 20px;padding: 0;width: 100%;">    <li class="comments" style="margin: 0 15px 0 0;padding: 0 0 0 22px;  display: inline-block;  color: #DCE3E7;  font-family: "Roboto", sans-serif;">ENERGITELCO S.A.S.</li>    <li class="date" style="margin: 0 15px 0 0;padding: 0 0 0 22px;display: inline-block;color: #DCE3E7;  font-family: "Roboto", sans-serif;">{{now()->format("d.m.Y")}}</li>  </ul></div><!-- /.utility-info --><!-- overlays --><div class="gradient-overlay" style="background-image: -webkit-linear-gradient(rgba(0,0,0,0.00) 0%, rgba(0,0,0,.6) 21%);background-image: -moz-linear-gradient(rgba(0,0,0,0.00) 0%, rgba(0,0,0,.6) 21%);background-image: -o-linear-gradient(rgba(0,0,0,0.00) 0%, rgba(0,0,0,.6) 21%);background-image: linear-gradient(rgba(0,0,0,0.00) 0%, rgba(0,0,0,.6) 21%);width: 700px;height: 400px;position: absolute;top: 700px;left: 0;z-index: 15;"></div><div class="color-overlay" style="background: rgba(84,104,110,0.4);width: 700px; height: 400px;position: absolute;z-index: 10;top: 0;left: 0;transition: background .3s cubic-bezier(.33,.66,.66,1);"></div></div>',
                        width: 600,
                        showConfirmButton: false,
                        // timer: 2500
                    })
                @endif
                readyQuestion = false;
                @if ($question && $system->test_intro)
                    if (!{{$question->status}} && !readyBirthDay){
                        readyQuestion = true;
                        const inputOptions = new Promise((resolve) => {
                            @php
                                $i = 0;
                            @endphp
                            resolve({ @foreach ($question->test->options as $option) {{++$i > 1 ? ','.$option->id : $option->id}}: '{{$option->text_answer}}' @endforeach })
                        })

                        Swal.fire({
                            title: '{{ $question->test->question }}',
                            input: 'radio',
                            width: 500,
                            inputOptions: inputOptions,
                            icon: 'question',
                            allowOutsideClick: false,
                            inputValidator: (value) => {
                                if (!value) {
                                    return '¡Selecciona una opción para continuar!'
                                }
                            }
                        }).then((result) => {
                            $url = '/learned_lessons/answer/home?answer_id='+result.value+'&id='+{{$question->id}};
                            var jqxhr = $.post($url, function (data) {
                                Swal.fire(data['success']);
                            })
                            .fail(function() {
                                console.log("error");
                            });
                        });
                    }
                @endif
                @if ($system->active_24_7)
                if (!{{ auth()->user()->b24_7 }} && !readyQuestion && !readyBirthDay) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-default text-black'
                        }
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Actualmente no estas habilitado como 24/7',
                        text: "De clic en activar si deseas habilitarlo",
                        footer: '<a href="{{ route('policy_condition_24_7') }}" target="_blank">Políticas y condiciones</a>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#f4f4f4',
                        confirmButtonText: 'Activar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var jqxhr = $.post('/profile/all_week', function name(data) {
                                swalWithBootstrapButtons.fire(
                                    'Bien!',
                                    'Tu estado como 24/7 se ha activado.',
                                    'success'
                                )
                            })
                            .fail(function() {
                                console.log("error");
                            });
                        }
                    })
                }
                @endif
            @if ($system->employee_month)
            })
            @endif
        @if ($system->messege_intro)
        });
        @endif

        // allowOutsideClick: false,
        $('#swal2-content').css('font-size', 14);
        $('.swal2-content').css('font-size', 14);
    </script>
@endsection

{{-- https://c2rsetup.officeapps.live.com/c2r/download.aspx?ProductreleaseID=ProPlusRetail&language=es-ES&platform=x64&token=43GG3-NCYQR-WF7CQ-74g6JP-FX892&TaxRegion=CO&Source=O15PKC&version=O16GA --}}

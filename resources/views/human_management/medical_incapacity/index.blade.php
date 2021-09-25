@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-24 SOLICITUD DE PERMISO LABORAL O NOTIFICACIÓN DE INCAPACIDAD MÉDICA
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Solicitud de permiso laboral o notificación de incapacidad médica</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de solicitudes de permiso laboral o notificaciones de incapacidades médicas</h3>
                <div class="box-tools">
                    @can('Habilitar permisos laborales')
                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#hasPermissionModal">Permisos</button>
                        @include('human_management.medical_incapacity.includes.modals.has_permission')
                    @endcan
                    @can('Digitar formulario de solicitud de permiso laboral o notificación de incapacidad')
                        @if (auth()->user()->hasPermisisonWork && auth()->user()->hasPermisisonWork->amount > 0)
                            <a href="{{route('work_permits_notifications_medical_incapacity_create')}}" class="btn btn-sm btn-success">Crear</a>
                        @endif
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medical_incapacities as $medical_incapacity)
                            <tr>
                                <th scope="row">{{ $medical_incapacity->id }}</th>
                                <th scope="row">{{ $medical_incapacity->codigo_formulario ? $medical_incapacity->codigo_formulario.'-'.$medical_incapacity->id : 'N/A' }}</th>
                                <td>{{ ($medical_incapacity->responsableAcargo) ? $medical_incapacity->responsableAcargo->name : ''}}</td>
                                <td>{{ ($medical_incapacity->estado != 'Sin aprobar' && $medical_incapacity->coordinadorAcargo) ? $medical_incapacity->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $medical_incapacity->tipo_solicitud }}</td>
                                <td>{{ $medical_incapacity->created_at }}</td>
                                <td>
                                    <small class="label {{($medical_incapacity->estado == 'Sin aprobar') ? 'bg-green' : (($medical_incapacity->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$medical_incapacity->estado}}</small>
                                </td>
                                <td>
                                    @if (
                                        auth()->user()->hasPermissionTo('Aprobar solicitud de permiso laboral o notificación de incapacidad') ||
                                        auth()->user()->hasPermissionTo('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica')
                                    )
                                        
                                    @endif
                                    <a href="{{route('work_permits_notifications_medical_incapacity_show',$medical_incapacity->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @if ($medical_incapacity->estado == 'Aprobado')
                                        @can('Descargar PDF de solicitud de permisos laborales o notificaciones de incapacidad médica')
                                            <a href="{{route("work_permits_notifications_medical_incapacity_download",$medical_incapacity->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                        @endcan
                                    @endif
                                    @can('Eliminar formato de solicitud de permisos laborales o notificaciones de incapacidad')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$medical_incapacity->id}}">Eliminar</button>
                                        <div class="modal fade" id1="delete_{{$medical_incapacity->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('work_permits_notifications_medical_incapacity_delete',$medical_incapacity->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>¿Está seguro que desa eliminar el formato?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('.btn-plus').click(function () {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                let url = '/human_management/work_permits_notifications_medical_incapacity/plus/'+id;
                $('#plus_'+id).prop("disabled", true);
                $('#rest_'+id).prop("disabled", true);
                $.post(url, function (data) {
                    $('#plus_'+id).prop("disabled", false);
                    $('#rest_'+id).prop("disabled", false);
                    $('#amount_'+id).text(data.amount);
                    $('#td_responsable_'+id).text('{{auth()->user()->name}}');
                    $('#td_update_'+id).text(data.updated_at);
                }).fail(function() {
                    console.log("error");
                });
            });

            $('.btn-rest').click(function () {
                let id = this.id.split('_')[this.id.split('_').length - 1];
                let url = '/human_management/work_permits_notifications_medical_incapacity/rest/'+id;
                $('#plus_'+id).prop("disabled", true);
                $('#rest_'+id).prop("disabled", true);
                $.post(url, function (data) {
                    $('#plus_'+id).prop("disabled", false);
                    $('#rest_'+id).prop("disabled", false);
                    $('#amount_'+id).text(data.amount);
                    $('#td_responsable_'+id).text('{{auth()->user()->name}}');
                    $('#td_update_'+id).text(data.updated_at);
                    if (data.amount == 0) {
                        $('#rest_'+id).prop("disabled", true);
                    }
                }).fail(function() {
                    console.log("error");
                });
            });
        })
    </script>
@endsection
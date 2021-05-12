@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Lista de formatos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Formatos de gestión</a></li>
        <li class="active">Lista de formatos</li>
    </ol>
</section>
<section class="content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{$name_work}}</h3>

                    <div class="box-tools">
                        <a href="{{route('forms')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha de la solicitud</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trabajos as $trabajo)
                                <tr>
                                    <th scope="row">{{ $trabajo->codigo_formulario.'-'.$trabajo->id }}</th>
                                    <td>{{ $trabajo->created_at }}</td>
                                    <td>{{($trabajo->responsableAcargo) ? $trabajo->responsableAcargo->name : ''}}</td>
                                    <td>{{ $trabajo->tipo_solicitud }}</td>
                                    <td>
                                        <small class="label {{($trabajo->estado == 'Sin aprobar') ? 'bg-green' : (($trabajo->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$trabajo->estado}}</small>
                                    </td>
                                    <td>
                                        <a href="{{route('approval_form',[$list,$trabajo->id])}}" class="btn btn-sm btn-success">Ver</a>
                                        @if ($trabajo->estado == 'Aprobado')
                                            @can($text_permission)
                                                <a href="{{route("exportar",[$list,$trabajo->id])}}" class="btn btn-warning btn-sm">Descargar</a>
                                            @endcan
                                        @endif
                                        @can($text_permission_delete)
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$trabajo->id}}">Eliminar</button>
                                            <div class="modal fade" id="delete_{{$trabajo->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Eliminar formato</h4>
                                                        </div>
                                                        <form action="{{route('format_delete',[$list,$trabajo->id])}}" method="post">
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
                    <hr>
                    <p>{{ count($solicitud[0]).' => Cita Médica' }} </p>
                    <p>{{ count($solicitud[1]).' => Emergencia Personal o Familiar' }} </p>
                    <p>{{ count($solicitud[2]).' => Fallecimiento de Familiar' }} </p>
                    <p>{{ count($solicitud[3]).' => Incapacidad médica' }} </p>
                    <p>{{ count($solicitud[4]).' => Licencia de Maternidad o Paternidad' }} </p>
                    <p>{{ count($solicitud[5]).' => Cita Médica' }} </p>
                    <p>{{ count($solicitud[6]).' => Permiso Compensado' }} </p>
                    <p>{{ count($solicitud[7]).' => Permiso no remunerado' }} </p>
                    <p>{{ count($solicitud[8]).' => Vacaciones' }} </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
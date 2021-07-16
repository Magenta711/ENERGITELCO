@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Actas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Actas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de actas</h3>
                <div class="box-tools">
                    @can('Crear actas')
                            <a href="{{route('proceeding_create')}}" class="btn btn-sm btn-success">Crear</a>
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
                                <th scope="col">Motivo</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Asistentes e invitados</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proceedings as $proceeding)
                            <tr>
                                <th scope="row">{{ $proceeding->id }}</th>
                                <th scope="row">D-FR-12-{{ $proceeding->id }}</th>
                                <td scope="row">{{ $proceeding->affair }}</td>
                                <td>{{ $proceeding->responsable->name }}</td>
                                <td>
                                    @php
                                        $on = 0;
                                    @endphp
                                    @foreach ($proceeding->users as $item)
                                        @if ($on < 4)
                                            - {{$item->name}}<br>
                                            @php
                                                $on++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    {{$on < count($proceeding->users) ? '...' : ''}}
                                </td>
                                <td>{{ $proceeding->date }}</td>
                                <td>
                                    @if (count($proceeding->users) != count($proceeding->signaturebles))
                                        <small class="label bg-red">Firmas pendientes</small>
                                    @else
                                        <small class="label {{($proceeding->status == 2) ? 'bg-yellow' : (($proceeding->status == 1) ? 'bg-blue' : 'bg-red') }}">{{$proceeding->status == 3 ? 'Sin firmar' : ( $proceeding->status == 2 ? 'Compromisos pendientes' : 'Aprobada')}}</small>
                                    @endif
                                </td>
                                <td>
                                    @can('Ver actas')
                                        <a href="{{route('proceeding_show',$proceeding->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar actas')
                                        <a href="{{route('proceeding_edit',$proceeding->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    @endcan
                                    @can('Descargar actas')
                                        <a href="{{route("proceeding_download",$proceeding->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                    @endcan
                                    @can('Eliminar actas')
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$proceeding->id}}">Eliminar</button>
                                        <div class="modal fade" id="delete_{{$proceeding->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Eliminar formato</h4>
                                                    </div>
                                                    <form action="{{route('proceeding_delete',$proceeding->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <div class="modal-body">
                                                            <p>¿Está seguro que desa eliminar el acta?</p>
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
                        <tfoot>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Asistentes e invitados</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
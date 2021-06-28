@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Bonificaciones de administrativos y conductores <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="#">Bonificaciones de administrativos y conductores</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Lista de cortes de pago de bonificaciones</h3>
            <div class="box-tools">
                @can('Crear bonificaciones a administrativos y conductores')
                    <a class="btn btn-sm btn-success" href="{{route('admin_bonuses_create')}}">
                        Crear
                    </a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Responsable</th>
                            <th>Aprobador</th>
                            <th>Periodo </th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bonus as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>D-FR-29-{{ $item->id }}</td>
                                <td>{{ $item->responsable->name }}</td>
                                <td>{{ $item->approve ? $item->approve->name : '' }}</td>
                                <td>{{ $item->start_date.' / '.$item->end_date }}</td>
                                <td>{{ ($item->status == 1) ? 'Aprobado' : (($item->status == 2) ? 'Sin aprobar' : 'No aprobado') }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @can('Ver bonificaciones a administrativos y conductores')
                                        <a href="{{ route('admin_bonuses_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @can('Editar bonificaciones a administrativos y conductores')
                                        @if ($item->status == 2)
                                            <a href="{{ route('admin_bonuses_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        @endif
                                    @endcan
                                    @if ($item->status == 1)
                                        @can('Descargar bonificaciones a administrativos y conductores')
                                            <a href="{{ route('admin_bonuses_download',$item->id) }}" class="btn btn-sm btn-warning">Exportar</a>
                                        @endcan
                                    @endif
                                    @if ($item->status == 2)
                                        @can('Eliminar bonificaciones a administrativos y conductores')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$item->id}}">Eliminar</button>
                                            <div class="modal fade" id="delete_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Eliminar formato</h4>
                                                        </div>
                                                        <form action="{{route('admin_bonuses_delete',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <div class="modal-body">
                                                                <p>¿Está seguro que desa eliminar el registro?</p>
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
                                    @endif
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
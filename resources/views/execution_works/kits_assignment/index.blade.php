@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        ASIGNACIÓN DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Asignación de Kits</li>
    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de revisión y asignación de Kits</h3>
            <div class="box-tools">
                @can('Crear asignación')
                    <a href="{{route('kits_assignment_assginment')}}" class="btn btn-sm btn-primary btn-send">Asignación</a>
                @endcan
                @can('Revisar asignación')
                    <a href="{{route('kits_review')}}" class="btn btn-sm btn-info btn-send">Revisión</a>
                @endcan
                @can('Lista de kits')
                    <a href="{{route('kits')}}" class="btn btn-sm btn-warning btn-send">Kits</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            {{-- <th scope="col"></th> --}}
                            <th scope="col">#</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Asignado</th>
                            <th scope="col">Kit</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigment as $assigment)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$assigment->responsable->name}}</td>
                            <td>{{$assigment->asignado->name}}</td>
                            <td>{{$assigment->kit_asignado->nombre}}</td>
                            <td>{{$assigment->status==1 ? 'Asignado' : 'Devuelto'}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group ms-2">
                                    @can('Ver asignación')
                                    <a href="{{ route('kits_assignment_show',$assigment->id) }}" class="btn btn-sm btn-primary" value="Ver"> Ver</a>
                                    @endcan
                                    @if ($assigment->status==1)
                                        @can('Editar asignación')
                                        <a  href="{{ route('kits_assignment_edit',$assigment->id) }}" class="btn btn-sm btn-success" value="Editar">Editar</a>
                                        @endcan
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</SECTION>
@endsection

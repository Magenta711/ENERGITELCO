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
            {{-- </div> --}}
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
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$assigment->responsable->name}}</td>
                            <td>{{$assigment->asignado->name}}</td>
                            <td>{{$assigment->kit_asignado->nombre}}</td>
                            <td>{{$assigment->kit_asignado->estado_kit->estado}}
                                {{-- <small class="label {{($review_tool->estado == 'Sin aprobar') ? 'bg-green' : (($review_tool->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$review_tool->estado}}</small> --}}
                            </td>
                            <td>
                                <div class="btn-group ms-2">
                                    @can('Ver asignación')
                                    <a href="{{ route('kits_assignment_show',$assigment->id) }}" class="btn btn-sm btn-primary" value="Ver"> Ver</a>
                                    @endcan
                                    @can('Editar asignación')
                                    <a  href="{{ route('kits_assignment_edit',$assigment->id) }}" class="btn btn-sm btn-success" value="Editar">Editar</a>
                                    @endcan

                                        {{-- <a  href="{{ route('kits_edit',$kit->id) }}" class="btn btn-sm bg-olive" value="Editar este kit">Editar este kit</a> --}}

                                        {{-- <input type="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_delete_{{$kit->id}}" value="Eliminar">
                                        @include('execution_works.kits.modals.delete')

                                        <input type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_all_{{$kit->id}}" value="Eliminar todos los kits">
                                        @include('execution_works.kits.modals.delete_all') --}}
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

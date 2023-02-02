@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        REVISIÓN DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Revisión de Kits</li>
    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de revisión de Kits</h3>
            <div class="box-tools">
                <a href="{{route('kits_assigment')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            {{-- <th scope="col"></th> --}}
                            <th scope="col">#</th>
                            <th scope="col">Asignado</th>
                            <th>Asignaciones</th>
                            <th scope="col">Última </th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($num = $user->numAssigment())
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$num}}</td>
                                    <td>{{ $user->getLastAssigment()->created_at }}
                                    </td>
                                    {{-- <td>{{$assigment->responsable->name}}</td> --}}
                                        {{-- <small class="label {{($review_tool->estado == 'Sin aprobar') ? 'bg-green' : (($review_tool->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$review_tool->estado}}</small> --}}
                                    <td>
                                        <div class="btn-group ms-2">

                                            <a href="{{ route('review_personal',$user->id) }}" class="btn btn-sm btn-success" value="Ver">Revisar</a>

                                                {{-- <a  href="{{ route('kits_assignment_edit',$assigment->id) }}" class="btn btn-sm btn-success" value="Editar">Editar</a> --}} 

                                                {{-- <a  href="{{ route('kits_edit',$kit->id) }}" class="btn btn-sm bg-olive" value="Editar este kit">Editar este kit</a> --}}

                                                {{-- <input type="submit" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_delete_{{$kit->id}}" value="Eliminar">
                                                @include('execution_works.kits.modals.delete')

                                                <input type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_all_{{$kit->id}}" value="Eliminar todos los kits">
                                                @include('execution_works.kits.modals.delete_all') --}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</section>
</SECTION>
@endsection
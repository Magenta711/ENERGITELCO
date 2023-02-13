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
                            <th scope="col">Última</th>
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
                                    @php
                                        $review = $user->getLastReview();
                                    @endphp
                                    <td>{{ $review ? $review->fecha_revision : '' }}
                                    </td>
                                    <td>
                                        <div class="btn-group ms-2">
                                            <a  href="{{ route('kits_review_show', $user->id)}}" class="btn btn-sm btn-primary" value="Ver">Ver</a>
                                            <a href="{{ route('review_personal',$user->id) }}" class="btn btn-sm btn-success" value="Editar">Revisar</a>
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

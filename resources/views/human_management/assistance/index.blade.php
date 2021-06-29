@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Asistencias
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Asistencia</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools">
                    <a href="{{route('assistance_create')}}" class="btn btn-sm btn-success">Crear</a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assistances as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->responsable->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                        <a href="{{route('assistance_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
                                        <a href="{{route('assistance_edit',$item->id)}}" class="btn btn-sm btn-primary">Editar</a>
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
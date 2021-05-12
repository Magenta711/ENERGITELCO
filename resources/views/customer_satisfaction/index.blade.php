@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Satisfacción del cliente <small>Evaluaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Satisfacción del cliente</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de evaluaciones</div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($satisfactions as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->customer->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <small class="label {{($item->state == 1) ? 'bg-red' : 'bg-primary' }}">{{($item->state == 1) ? 'Sin responder' : 'Respondido'}}</small>                                    
                                </td>
                                <td>
                                    @can('Ver evaluaciones de satisfacción de los clientes')
                                    <a href="{{route('satisfaction_show',$item->id)}}" class="btn btn-sm btn-success">Ver</a>
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
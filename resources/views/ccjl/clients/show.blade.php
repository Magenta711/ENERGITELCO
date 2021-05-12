@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">CVS</a></li>
        <li><a href="">Clientes</a></li>
        <li class="active">Mostrar clientes</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title"></div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{route('CCJL_clients')}}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <h4>Informacion del cliente</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Nombre</b></p>
                            <p>{{ $id->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Correo</b></p>
                            <p>{{ $id->email }}</p>
                        </div>
                        <div class="col-md-2">
                            <p><b>Tipo de documento</b></p>
                            <p>{{ $id->document_type }}</p>
                        </div>
                        <div class="col-md-2">
                            <p><b>Cédula</b></p>
                            <p>{{ $id->document }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Célular</b></p>
                            <p>{{ $id->number }}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Compras</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($id->rents as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->statusCheck() }}</td>
                                    <td>
                                        <a href="{{ route('CCJL_rents_show',$item->id) }}" class="btn btn-sm btn-success">Ver</a>
                                        <a href="{{ route('CCJL_rents_edit',$item->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
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
                        <a class="btn btn-sm btn-primary" href="{{route('cvs_clients')}}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <h4>Informacion del cliente</h4>
                    <div class="row">
                        <div class="col-md-2">
                            <p><b>Documento</b></p>
                            <p>{{ $id->document_type }}</p>
                        </div>
                        <div class="col-md-2">
                            <p><b>Número</b></p>
                            <p>{{ $id->document }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Nombre</b></p>
                            <p>{{ $id->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Correo</b></p>
                            <p>{{ $id->email }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Teléfono</b></p>
                            <p>{{ $id->tel }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Fecha de ultima compra</b></p>
                            <p>{{ $id->created_at }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Cliente convergente</b></p>
                            <p>{{ $id->converged_client == 1 ? 'Si' : 'No' }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Revivir publicidad</b></p>
                            <p>{{ $id->send_emails == 1 ? 'Si' : 'No' }}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Compras</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendedor</th>
                                <th>Sede</th>
                                <th>Garantia</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($id->shopping as $item)    
                                <tr>
                                    <td>{{ $item->cod_invoice }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->sede->name }}</td>
                                    <td>{{ now()->format('Y-m-d') < $item->expiration_date ? 'activa' : 'Vencida' }}</td>
                                    <td>{{ $item->sale_date }}</td>
                                    <td>{{ $item->status == 3 ? 'Sin pago' : (($item->status == 2) ? 'Pago' : (($item->status == 1) ? 'Finalizado' : 'Cancelado')) }}</td>
                                    <td><a href="{{ route('cvs_sales_show',$item->id) }}" class="btn btn-sm btn-primary">Ver</a></td>
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
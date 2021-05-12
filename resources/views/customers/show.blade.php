@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar cliente
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Clientes</a></li>
        <li class="active">Mostrar clientes</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">{{$id->name}}</div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{route('customers')}}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Nit:</h4>
                            <p>{{$id->nit}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Nombre:</h4>
                            <p>{{$id->name}}</p>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Correo:</h4>
                            <p>{{$id->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Teléfono:</h4>
                            <p>{{$id->tel}}</p>
                        </div>
                    </div>    
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Ciudad:</h4>
                            <p>{{$id->city}}</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Dirección:</h4>
                            <p>{{$id->address}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Estado:</h4>
                            <p>{{$id->state == 1 ? 'Activo' : 'Inactivo'}}</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('customer_edit',$id->id)}}" class="btn btn-sm btn-success">Editar</a>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
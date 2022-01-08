@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        COMPROBANTES DE PAGO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Lista de comprobantes de pago</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de comprobantes de pagos</h3>
                <div class="box-tools">
                    @can('Digitar formulario de entrega de dotación personal')
                        <a href="{{route('chargeaccount_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chargeAccounts as $chargeAccount)
                                <tr>
                                    <td>{{$chargeAccount->id}}</td>
                                    <td>{{$chargeAccount->user ? $chargeAccount->user->name : 'Invitado' }}</td>
                                    <td>{{$chargeAccount->approve ? $chargeAccount->approve->name : '' }}</td>
                                    <td>{{$chargeAccount->name }}</td>
                                    <td>{{$chargeAccount->value }}</td>
                                    <td>{{($chargeAccount->status == 0) ? 'Sin aprobar' : (($chargeAccount->status == 1) ? 'Aprobado' : (($chargeAccount->status == 2) ? 'No aprobado' : 'Sin respuesta' )) }}</td>
                                    <td>{{$chargeAccount->created_at }}</td>
                                    <td>
                                        <a href="{{route('chargeaccount_show',$chargeAccount->id)}}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="{{route('chargeaccount_donwload',$chargeAccount->id)}}" class="btn btn-sm btn-warning">Descargar</a>
                                        <a href="{{route('chargeaccount_delete',$chargeAccount->id)}}" class="btn btn-sm btn-danger">Eliminar</a>
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
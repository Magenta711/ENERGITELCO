@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Lista de personas que han cotizado un sistema solar con Energitelco</div>
                    <div class="box-tools">
                        {{-- @can('Disparar evaluación de desempeño') --}}
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Editar valores de cotización</button>
                   {{-- @endcan --}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_user" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nombre del Cotizante</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Solicitud de Visita</th>
                                    <th scope="col">Valor del Sistema</th>
                                    <th scope="col">Cotización</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Quote as $item)
                                    <tr>
                                        <td scope="col">{{$loop->iteration}}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>{{ $item->visita == 1 ? 'Solicitado' : 'No solicitado'  }}</td>
                                        <td>$ {{number_format($item->valorTotal, 2)}}</td>
                                        <td>
                                            <a href="https://www.energitelco.test/storage/app/public/cotizaciones/{{ $item->name_file }}" class="btn btn-primary" target="_blank">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('energy.admin.edit')
@endsection

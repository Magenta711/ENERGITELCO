@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bodegas de técnicos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Ejecución de obras</a></li>
        <li><a href="#">Inventario</a></li>
        <li class="active">Herramientas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
     
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de técnicos con sus bodegas</h3>
                    <div class="box-tools">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $arrUser = array();
                                    $i = 0;
                                @endphp
                                @foreach ($inventories as $item)
                                    @if (!in_array($item->user_id,$arrUser) && ($item->stock > 0 || $item->tickets > 0 || $item->departures > 0))
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>
                                                @can('Ver inventario de técnicos')
                                                    <a href="{{ route('inventary_technical_show',$item->user_id) }}" class="btn btn-sm btn-success">Ver</a>
                                                @endcan
                                                @can('Editar inventario de técnicos')
                                                    <a href="{{ route('inventary_technical_edit',$item->user_id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @php
                                            $arrUser[$item->user_id] = $item->user_id;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection

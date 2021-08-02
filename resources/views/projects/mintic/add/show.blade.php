@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Ver implementación <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Proyectos</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Ver implementación proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{route('mintic_add_consumables',$id)}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">Funcionario</label>
                            <p>{{$item->user->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Detalle</th>
                                <th>Cantidad</th>
                                <th>Gastado</th>
                                <th>Devuelto</th>
                                @if ($item->status == 1)
                                    <th>Faltante</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->details as $detail)
                                <tr>
                                    <td>
                                        @if ($detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticConsumable')
                                            <p>Consumable</p>
                                        @endif
                                        @if ($detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticEquipment')
                                            <p>Equipo</p>
                                        @endif
                                    </td>
                                    <td>{{$detail->productable->serial}} {{$detail->productable->serial ? '-' : ''}} {{$detail->productable->item}} - {{$detail->productable->type}}</td>
                                    <td>{{$detail->amount}}</td>
                                    <td>{{$detail->spent}}</td>
                                    <td>{{$detail->delivered}}</td>
                                    @if ($item->status == 1)
                                        <td>
                                            {{($detail->delivered + $detail->spent) == $detail->amount ? 0 : ($detail->delivered + $detail->spent) - $detail->amount }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="form-group">
                <label for="">Comentarios</label>
                <p>{!! str_replace("\r\n", '<br>', addslashes($item->commentary))!!}</p>
            </div>
        </div>
    </section>
@endsection
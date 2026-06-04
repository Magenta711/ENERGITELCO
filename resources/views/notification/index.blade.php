@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Notificaciones <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Notificaciones</li>
    </ol>
</section>
@php
    $i = 1;
@endphp
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Lista de notificaciones</div>
            <div class="box-tools">
                <a href="{{route('notification_all_read')}}" class="btn btn-sm btn-primary">Marcar todas como leídas</a>
                <a href="{{route('notification_delete')}}" class="btn btn-sm btn-success">Borrar todas las leídas</a>
                {{-- <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">Tooltip on bottom</button>  --}}
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="table_index" class="table" data-page-length='15'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descricción</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $item)
                        <tr class="{{$item->read_at ? '' : 'active'}}">
                            <td>{{$i++}}</td>
                            <td style="cursor: pointer;" class="btn-link" onclick="markerNotificationAsRead('{{$item->id}}','{{$item->data['link']}}')"><span>{{$item->data['amount']}}</span></td>
                            <td>{{$item->read_at ? 'Leido' : 'Sin leer'}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
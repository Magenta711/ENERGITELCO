@extends('lte.layouts')

@php
    function selected($array,$id){
        foreach ($array as $key => $value) {
            if ($id == $value->id) {
                return true;
            }
        }
        return false;
    }
    function selectedVehicles($array,$id){
        foreach ($array as $key => $value) {
            if ($id == $value->vehicle->id) {
                return true;
            }
        }
        return false;
    }
    function hasConsumable($consumables,$id,$type)
    {
        foreach ($consumables as $key => $item) {
            if ($item->inventaryble_id == $id && $item->inventaryble_type == $type) {
                return $item;
            }
        }
        return false;
    }
    function expirateDate($enrollment_date,$soat_date,$gases_date,$technomechanical_date)
    {
        if ($enrollment_date && $enrollment_date < now()) {
            return true;
        }
        if ($soat_date && $soat_date < now()) {
            return true;
        }
        if ($gases_date && $gases_date < now()) {
            return true;
        }
        if ($technomechanical_date && $technomechanical_date < now()) {
            return true;
        }
        return false;
    }
@endphp

@section('content')
<section class="content-header">
    <h1>
        Frente de trabajo <small>Programaciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Frente de trabajo</li>
        <li>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#create-modal"><i class="fa fa-plus"></i> Crear</button>
        </li>
    </ol>
    @include('tasking.includes.modals.create')
</section>
<div class="hide">
    {{-- Permisos de trabajo --}}
    @foreach ($permissions as $permission)
        <input type="hidden" value="{{$permission->cedula_trabajador}}" class="permission-idUser">
        <input type="hidden" value="{{$permission->fecha_inicio}}" class="permission-dateStart">
        <input type="hidden" value="{{$permission->hora_inicio}}" class="permission-timeStart">
        <input type="hidden" value="{{$permission->fecha_finalizacion}}" class="permission-dateEnd">
        <input type="hidden" value="{{$permission->hora_finalizacion}}" class="permission-timeEnd">
        <input type="hidden" value="{{$permission->tipo_solicitud}}" class="permission-type">
        <input type="hidden" value="{{$permission->estado}}" class="permission-status">
    @endforeach
    {{-- Vehiculos --}}
    @foreach ($vehicles as $vehicle)
        <input type="hidden" value="{{$vehicle->id}}" class="data-vehicles-id">
        <input type="hidden" value="{{$vehicle->plate}}" class="data-vehicles-plate">
        <input type="hidden" value="{{$vehicle->enrollment_date}}" class="data-vehicles-enrollment-date">
        <input type="hidden" value="{{$vehicle->soat_date}}" class="data-vehicles-soat-date">
        <input type="hidden" value="{{$vehicle->gases_date}}" class="data-vehicles-gases-date">
        <input type="hidden" value="{{$vehicle->technomechanical_date}}" class="data-vehicles-technomechanical-date">
    @endforeach
</div>
<section class="content">
    @include('includes.alerts')
    {{-- Tables --}}
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Programadas</div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-striped table-bordered" data-page-length='10'>
                             <thead>
                                 <tr>
                                    <th>Actividades</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($taskings as $item)
                                    @if ($item->date_start > now()->format('Y-m-d H:i:s'))
                                        <tr>
                                            <td>
                                                <div class="row" style="cursor: pointer" data-toggle="modal" data-target="#edit-modal-{{$item->id}}">
                                                    <div class="col-xs-6">
                                                        <p>{{$item->eb ? $item->eb->projectble->name : $item->station_name}}</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <p class="date-starts">{{$item->date_start}}</p>
                                                    </div>
                                                    <div class="col-xs-6 list-user">
                                                        @foreach ($item->users as $user)
                                                            <span class="label label-default" id="list-user-{{$item->id}}-{{$user->id}}">{{$user->name}}</span>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        {{$item->am ? 'AM'.($item->pm ? ' / ' : '') : ''}} {{$item->pm ? 'PM' : ''}}
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 text-right list-vehicles">
                                                    @foreach ($item->vehicles as $vehicle)
                                                        <span class="label label-default" id="list-vehicle-{{$item->id}}-{{$vehicle->vehicle->id}}">
                                                            {{$vehicle->vehicle->plate}} - {{$vehicle->vehicle->brand}}
                                                        </span>
                                                    @endforeach
                                                </div>
                                                @include('tasking.includes.modals.edit')
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">En proceso o sin reporte</div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-striped table-bordered" data-page-length='10'>
                             <thead>
                                 <tr>
                                    <th>Actividades</th>
                                 </tr>
                            </thead>
                            <tbody>
                                @foreach ($taskings as $item)
                                    @if ($item->date_start <= now()->format('Y-m-d H:i:s') && !$item->report)
                                        <tr>
                                            <td>
                                                <div class="row" style="cursor: pointer" data-toggle="modal" data-target="#show-modal-{{$item->id}}">
                                                    <div class="col-xs-6">
                                                        <p>{{$item->eb ? $item->eb->projectble->name : $item->station_name}}</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <p class="date-starts">{{$item->date_start}}</p>
                                                    </div>
                                                    <div class="col-xs-6 list-user">
                                                        @foreach ($item->users as $user)
                                                            <span class="label label-default" id="list-user-{{$item->id}}-{{$user->id}}">{{$user->name}}</span>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <p>{{$item->am ? 'AM'.($item->pm ? ' / ' : '') : ''}} {{$item->pm ? 'PM' : ''}}</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right list-vehicles">
                                                        @foreach ($item->vehicles as $vehicle)
                                                            <span class="label label-default" id="list-vehicle-{{$item->id}}-{{$vehicle->vehicle->id}}">
                                                                {{$vehicle->vehicle->plate}} - {{$vehicle->vehicle->brand}}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @include('tasking.includes.modals.show')
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Finalizadas</div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-striped table-bordered" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th>Actividades</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taskings as $item)
                                    @if ($item->date_start <= now()->format('Y-m-d H:i:s') && $item->report)
                                        <tr>
                                            <td>
                                                <div class="row" style="cursor: pointer" data-toggle="modal" data-target="#show-modal-{{$item->id}}">
                                                    <div class="col-xs-6">
                                                        <p>{{$item->eb ? $item->eb->projectble->name : $item->station_name}}</p>
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        <p class="date-starts">{{$item->date_start}}</p>
                                                    </div>
                                                    <div class="col-xs-6 list-user">
                                                        @foreach ($item->users as $user)
                                                            <p id="list-user-{{$item->id}}-{{$user->id}}">{{$user->name}}</p>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-xs-6 text-right">
                                                        {{$item->am ? 'AM'.($item->pm ? ' / ' : '') : ''}} {{$item->pm ? 'PM' : ''}}
                                                    </div>
                                                    <div class="col-xs-6 text-right list-vehicles">
                                                        @foreach ($item->vehicles as $vehicle)
                                                            <span class="label label-default" id="list-vehicle-{{$item->id}}-{{$vehicle->vehicle->id}}">
                                                                {{$vehicle->vehicle->plate}} - {{$vehicle->vehicle->brand}}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @include('tasking.includes.modals.show')
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
    <style>
        .option-form-menu {
            position: absolute;
            right: 0;
            left: auto;
            width: 90%;
            padding: 0 0 0 0;
            margin: 0;
            top: 15%;
        }
        .option-form-menu>.menu>li.header{
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            background-color: #ffffff;
            padding: 7px 10px;
            border-bottom: 1px solid #f4f4f4;
            color: #444444;
            font-size: 14px;
        }
        .option-form-menu>.menu{
            max-height: 200px;
            margin: 0;
            padding: 0;
            list-style: none;
            overflow-x: hidden;
        }
        .option-form-menu>.menu>li>a{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
        }
        .option-form-menu>.menu>li>button{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 10px;
            display: block;
            white-space: nowrap;
            border: none;
            background: #fff;
            width: 100%;
            text-align: left;
        }
    </style>
@endsection
@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/moment/moment.js")}}"></script>
    <script src="{{asset("js/tasking/main.js")}}"></script>
@endsection
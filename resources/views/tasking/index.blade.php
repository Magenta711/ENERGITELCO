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
    function hasConsumable($consumables,$id,$type)
    {
        foreach ($consumables as $key => $item) {
            if ($item->inventaryble_id == $id && $item->inventaryble_type == $type) {
                return $item;
            }
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
                                                        <p>{{$item->eb->projectble->name}}</p>
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
                                                        <p>{{$item->eb->projectble->name}}</p>
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
                                                        <p>{{$item->eb->projectble->name}}</p>
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
<script>
    $(function () {
        $('.select2').select2();
        $('.table').DataTable( {
            order: [[ 0, 'desc' ]],
            select: true,
            lengthMenu: [ [10,15, 30, 50, -1], [10,15, 30, 50, "Todos"] ],
            pagingType: 'full_numbers',
            language: {
                lengthMenu:       "_MENU_",
                zeroRecords:      "No se encontro registros",
                search:           "",
                paginate: {
                    first:    '«',
                    previous: '‹',
                    next:     '›',
                    last:     '»'
                },
                aria: {
                    paginate: {
                        first:    'First',
                        previous: 'Previous',
                        next:     'Next',
                        last:     'Last'
                    }
                },
                info:             "_START_ a _END_ de _TOTAL_",
                infoFiltered:     "(filtrado de _MAX_ registros totales)",
                infoEmpty:        "0 a 0 de 0"
            },
        });
    });
    $(document).ready(function() {
        $('#date_start').blur(function () {
            if (this.value) {
                $('#users').prop('disabled',false);
                $('#vehicles').prop('disabled',false);
                usersDisable(this.value);
                vehiclesDisable(this.value);
            }
        });
        $('#municipality').change(function () {
            // $('.option-department').prop('disabled',true );
            $('#department').prop('disabled',false);
            // $('.'+this.value).prop('disabled',false);
        });
        $('#add-activities').click(function () {
            $('#activities').clone().appendTo('#destino-activities').val('');
        });
        $('.open-modal-inv').click(function () {
            let users = $('#users').val();
            users.forEach(idU => {
                let name = $('#option_user_'+idU).text();
                $('<option>',{
                    'value' : idU,
                    'text' : name,
                }).appendTo('.inv_user');
            });
        });
        $('.inv_user').change(function (){
            $('.inv_user').val(this.value);
        });
    });

    function usersDisable(date) {
        newDate = moment(date);
        dates = $('.date-starts');
        // Usuarios ya programados
        for (let i = 0; i < dates.length; i++) {
            let newDates = moment(dates[i].innerHTML);
            if (newDate.format('YYYY-MM-DD') == newDates.format('YYYY-MM-DD')) {
                let eleUsers = $(dates[i]).parent().parent().children('.list-user').children();
                for (let j = 0; j < eleUsers.length; j++) {
                    let id = eleUsers[j].id.split('-')[(eleUsers[j].id.split('-').length - 1)];
                    $('#option_user_'+id).prop('disabled',true).text(eleUsers[j].innerHTML+' (no disponible)');
                }
            }
        }

        // Usuarios de permisos
        let datesStart = $('.permission-dateStart');
        let datesEnd = $('.permission-dateEnd');
        let timeStart = $('.permission-timeStart');
        let timeEnd = $('.permission-timeEnd');
        let idUser = $('.permission-idUser');
        let type = $('.permission-type');
        let status = $('.permission-status');
        for (let i = 0; i < datesStart.length; i++) {
            let newDatesStart = moment(datesStart[i].value);
            let newDatesEnd = moment(datesEnd[i].value);
            if (newDate.format('YYYY-MM-DD') >= newDatesStart.format('YYYY-MM-DD') && newDate.format('YYYY') <= newDatesEnd.format('YYYY-MM-DD')) {
                if (status[i].value != 'No aprobado') {
                    let state = status[i].value == 'Aprobado' ? true : false;
                    let textState = status[i].value == 'Sin aprobar' ? ' sin aprobar' : '';
                    $('#option_user_'+idUser[i].value).prop('disabled',state).text($('#option_user_'+idUser[i].value).text()+' ('+type[i].value+textState+')');
                }
            }
        }
    }
    function vehiclesDisable() {
        
        // $('#option_vehicle_'+id).prop('disabled',true);
    }
    
</script>
@endsection
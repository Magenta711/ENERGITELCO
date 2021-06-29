@extends('lte.layouts')

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
    <div class="modal fade" id="create-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nombre del proyecto</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="">Funcionarios</label>
                                    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach ($users as $user)
                                            <option data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Municipio</label>
                                    <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                        <option disabled selected></option>
                                        <option data-select2-id="Antioquia" value="Antioquia">Antioquia</option>
                                        <option data-select2-id="Caldas" value="Caldas">Caldas</option>
                                        <option data-select2-id="Valle del cauca" value="Valle del cauca">Valle del cauca</option>
                                        <option data-select2-id="Pereira" value="Pereira">Pereira</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Departamento</label>
                                    <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un la estación base" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                        <option disabled selected></option>
                                        <option data-select2-id="Medellin" value="Medellin">Medellin</option>
                                        <option data-select2-id="Envigado" value="Envigado">Envigado</option>
                                        <option data-select2-id="Cali" value="Cali">Cali</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Proyecto</label>
                                    <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un la estación base" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        <option disabled selected></option>
                                        <option data-select2-id="MINTIC" value="MINTIC">MINTIC</option>
                                        <option data-select2-id="RUTAS" value="RUTAS">RUTAS</option>
                                        <option data-select2-id="DESNONTES" value="DESNONTES">DESNONTES</option>
                                        <option data-select2-id="INSTALACIÓN" value="INSTALACIÓN">INSTALACIÓN</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Estación base</label>
                                    <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un la estación base" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                        <option disabled selected></option>
                                        @foreach ($mintics as $mintic)
                                            <option class="project-mintic" data-select2-id="{{$mintic->id}}" value="{{$mintic->id}}">{{$mintic->name}}</option>
                                        @endforeach
                                        @foreach ($works as $work)
                                            @if ($work->nombre_eb)
                                                <option class="project-works" data-select2-id="{{$work->id}}" value="{{$work->id}}">{{$work->nombre_eb}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Vehiculos</label>
                                    <select class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona un la estación base" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                        <option disabled selected></option>
                                        @foreach ($vehicles as $vehicle)
                                            <option data-select2-id="{{$vehicle->id}}" value="{{$vehicle->id}}">{{$vehicle->plate}} - {{$vehicle->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fecha de salida</label>
                                    <input type="datetime-local" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Diposición</label>
                                    <br>
                                    <label for="am"><input type="checkbox" name="" id="am"> AM</label> <label for="pm"><input type="checkbox" name="" id="pm"> PM</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=""><i class="fa fa-align-left"></i> Descripción</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <label for=""><i class="fa fa-list"></i> Actividades</label>
                                    </div>
                                    <div class="col-sm-2 text-right">
                                        <button class="btn btn-sm btn-secundary"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <input type="text" name="" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""><i class="fa fa-align-left"></i> Comentarios</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""><i class="fa fa-align-left"></i> Reporte de cierre</label>
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button  type="button" class="btn btn-sm btn-block btn-secundary text-left" style="text-align: left !important" data-toggle="modal" data-target="#eb-modal">
                                <i class="fa fa-satellite-dish"></i> Estación base
                            </button>
                            <button  type="button" class="btn btn-sm btn-block btn-secundary text-left" style="text-align: left !important" data-toggle="modal" data-target="#date-modal">
                                <i class="fa fa-calendar-alt"></i> Fecha de salida
                            </button>
                            <button  type="button" class="btn btn-sm btn-block btn-secundary text-left" style="text-align: left !important" data-toggle="modal" data-target="#resourse-modal">
                                <i class="fa fa-car"></i> Recursos
                            </button>
                            <button  type="button" class="btn btn-sm btn-block btn-secundary text-left" style="text-align: left !important" data-toggle="modal" data-target="#equipment-modal">
                                <i class="fa fa-hdd"></i> Equipos
                            </button>
                            <button type="button" class="btn btn-sm btn-block btn-secundary text-left" style="text-align: left !important" data-toggle="modal" data-target="#equipment-modal">
                                <i class="fa fa-plug"></i> Consumibles
                            </button>
                            <div class="modal fade" id="project-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Proyecto</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="eb-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Estación base</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="date-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Fecha de salida</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="resourse-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Recursos</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="equipment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Equipos</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="consumables-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Consumibles</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Tables --}}
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Sin ejecutar</div>
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
                                <tr>
                                    <td>
                                        <div class="row" style="cursor: pointer" data-toggle="modal" data-target="#edit-modal-1">
                                            <div class="col-sm-6">
                                                Suramericana
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                {{now()->format('Y-m-d')}}
                                            </div>
                                            <div class="col-sm-6">
                                                Esteban
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                AM/PM
                                            </div>
                                        </div>
                                        <div class="modal fade" id="edit-modal-1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title">Name</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Hola mundo
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">En proceso</div>
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
                                <tr>
                                    <td>
                                        <div class="row" style="cursor: pointer">
                                            <div class="col-sm-6">
                                                Suramericana
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                {{now()->format('Y-m-d')}}
                                            </div>
                                            <div class="col-sm-6">
                                                Esteban
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                AM/PM
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
                                <tr>
                                    <td>
                                        <div class="row" style="cursor: pointer">
                                            <div class="col-sm-6">
                                                Suramericana
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                {{now()->format('Y-m-d')}}
                                            </div>
                                            <div class="col-sm-6">
                                                Esteban
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                AM/PM
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
    <script src="{{asset("assets/$theme//bower_components/select2/dist/js/select2.full.min.js")}}"></script>
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
                info:             "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoFiltered:     "(filtrado de _MAX_ registros totales)",
                infoEmpty:        "Mostrando 0 a 0 de 0 entradas"
            },
        });
    });
</script>
@endsection
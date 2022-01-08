@php
    function checkedActivity($idActivity, $activities)
    {
        foreach ($activities as $key => $value) {
            if ($value->activity_id == $idActivity ) {
                return $value->status;
            }
        }
        return 'NO';
    }

@endphp

@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Mantenimiento proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="active">Ver</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title">Ver mantenimiento</div>
            <div class="box-tools">
                <a href="{{route('mintic_maintenance',$id)}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
           <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type_format">Tipo de formato</label>
                        {{$item->type_format}}
                    </div>
                </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label for="num">N° de caso</label>
                       <p>{{$item->num}}</p>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label for="date">Fecha</label>
                       <p>{{$item->date}}</p>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                       <label for="collaborating_company">Empresa colaboradora</label>
                       <p>{{$item->collaborating_company}}</p>
                   </div>
               </div>
           </div>
           <hr>
           <h3>Información general</h3>
           <div class="row">
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="department">Departamento</label>
                       <p>{{$item->department}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="municpality">Municipio</label>
                       <p>{{$item->municpality}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="population">Centro poblado</label>
                       <p>{{$item->population}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="name">Sede institución o caso especial</label>
                       <p>{{$item->name}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="code">Id de beneficiario</label>
                       <p>{{$item->code}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="responsable_name">Nombre del responsable <small>(Responsable de la institución educativa / autoridad competente)</small></label>
                       <p>{{$item->responsable_name}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="responsable_name">Número de cedula</label>
                       <p>{{$item->responsable_cc}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="responsable_number">Número de contacto</small></label>
                       <p>{{$item->responsable_number}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="responsable_email">Correo electrónico</small></label>
                       <p>{{$item->responsable_email}}</p>
                   </div>
               </div>
           </div>
           <hr>
           {{-- <div class="prevent_block" style="{{ $item->type_format == 'Mantenimiento correctivo' ? "display: none" : ''}}"> --}}
           @if ($item->type_format == 'Mantenimiento preventivo')
           <h3>Actividades de mantenimiento preventivo</h3>
           <div class="table-responsable">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <td>SAP</td>
                           <td>Descripción</td>
                           <td>SI</td>
                           <td>NO</td>
                           <td>N/A</td>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($activities as $activity)
                           @php
                               $checkedActivity = checkedActivity($activity->id,$item->activities);
                           @endphp
                            <tr>
                                <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{$activity->sap}}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                                <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{$activity->description}}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                                <td>{{$checkedActivity == "SI" ? 'X' : '' }}</td>
                                <td>{{$checkedActivity == "NO" ? 'X' : '' }}</td>
                                <td>{{$checkedActivity == "N/A" ? 'X' : '' }}</td>
                            </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
           <hr>
            @else
            <h3>Equipos instalados / retirados</h3>
                <div class="table-responsable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>SAP</td>
                                <td>Descripción</td>
                                <td>Cantidad retirado</td>
                                <td>Cantidad instalado</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                    <tr>
                                        <td>{{$equipment->sap}}</td>
                                        <td>{{$equipment->name}}</td>
                                        <td>
                                            @php
                                                $amount = 0;
                                                foreach ($item->equipments as $key => $value) {
                                                    if ($value->type == 'retired' && $value->detail_id == $equipment->id) {
                                                        $amount++;
                                                    }
                                                }
                                                echo $amount;
                                                $amount = 0;
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $amount = 0;
                                                foreach ($item->equipments as $key => $value) {
                                                    if ($value->type == 'install' && $value->detail_id == $equipment->id) {
                                                        $amount++;
                                                    }
                                                }
                                                echo $amount;
                                                $amount = 0;
                                            @endphp
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
           @endif
           <h3>Serial equipo/s retirados e instalados</h3>
           <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Serial equipo/s retirados</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->equipments as $equipment_item)
                                    @if ($equipment_item->type == 'retired')
                                        <tr>
                                            <td>{{$equipment_item->serial}}</td>
                                            <td>{{$equipment_item->detail->name}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">Serial equipo/s instalados</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->equipments as $equipment_item)
                                        @if ($equipment_item->type == 'install')
                                            <tr>
                                                <td>{{$equipment_item->serial}}</td>
                                                <td>{{$equipment_item->detail->name}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
               </div>
           </div>
           
           <hr>
           <h3>Descripción de la falla / Hallazgos</h3>
           <div class="form-group">
               <p>{{$item->fault_description}}</p>
           </div>
           <h3>Declaración</h3>
           <hr>
           <h4>Datos de quien repara el servicio en el centro digital</h4>
           <div class="row">
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="receives_name">Nombres y apellidos</label>
                       <p>{{$item->receives_name}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="receives_position">Cargo</label>
                       <p>{{$item->receives_position}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="receives_cc">Número de cedula</label>
                       <p>{{$item->receives_cc}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="receives_tel">Número de teléfono o celular</label>
                       <p>{{$item->receives_tel}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="receives_mail">Correo electrónico</label>
                       <p>{{$item->receives_mail}}</p>
                   </div>
               </div>
           </div>
           <h4>Datos de ingeniero de soporte NOC</h4>
           <div class="row">
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_name">Nombres y apellidos</label>
                       <p>{{$item->repair_name}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_position">Cargo</label>
                       <p>{{$item->repair_position}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_position">Ticket, Si aplica</label>
                       <p>{{$item->ticket}}</p>
                   </div>
               </div>
               {{-- <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_cc">Número de cedula</label>
                       <p>{{$item->repair_cc}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_tel">Número de teléfono o celular</label>
                       <p>{{$item->repair_tel}}</p>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_mail">Correo electrónico</label>
                       <p>{{$item->repair_mail}}</p>
                   </div>
               </div> --}}
           </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/water_marker/tss.js')}}"></script>
@endsection
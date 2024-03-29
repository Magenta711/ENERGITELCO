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
    @include('includes.alerts')
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
           <h3>2. Equipos instalados / retirados</h3>
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
                       {{-- @foreach ($equiments as $equiment)
                            <tr>
                                <td>{{$equiment->sap}}</td>
                                <td>{{$equiment->name}}</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                       @endforeach --}}
                   </tbody>
               </table>
           </div>
           <hr>
           <h3>Serial equipo/s retirados e instalados</h3>
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Serial equipo/s retirados</label>
                       <p></p>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Serial equipo/s instalados</label>
                       <p></p>
                   </div>
               </div>
           </div>
           <hr>
           <h3>3. Descripción de la falla</h3>
           <div class="form-group">
               <p>{{$item->fault_description}}</p>
           </div>
           <h3>4. Declaración</h3>
           <hr>
           <h4>Datos de quien recibe el centro digital (rector, docente, autoridad competente)</h4>
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
           <h4>Datos de quien repara el servicio en el centro digital</h4>
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
               </div>
           </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/water_marker/tss.js')}}"></script>
@endsection
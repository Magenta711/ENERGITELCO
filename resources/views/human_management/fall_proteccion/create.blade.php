@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
       Inpección de equipos de protección contra caídas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Inpección de equipos de protección contra caídas</a></li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <form action="{{ route('fall_protection_equipment_inspection_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="box-body">
            
            <div class="box-group" id="accordion">
                @include('human_management.fall_proteccion.includes.form1')
                @include('human_management.fall_proteccion.includes.form2')
                @include('human_management.fall_proteccion.includes.form3')
                @include('human_management.fall_proteccion.includes.form4')
                @include('human_management.fall_proteccion.includes.form5')
            </div>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Enviar y firmar</button>
            <!-- modal -->
            <div class="modal fade new_documento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalCenterTitle">Confirmar</h4>
                        </div>
                        <div class="modal-body">
                            <p>Con la presente firma, estoy certificando el equipo que describo en el formulario y doy fe que tengo la capacidad técnica exigida por la norma para realizarlo.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" data-toggle="modal" data-target=".new_documento1">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade new_documento1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Confirmar</h4>
                        </div>
                        <div class="modal-body">
                            <p>{!! ($message) ? str_replace("\n", '</br>', addslashes($message->description)) : '' !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="send" class="btn btn-sm btn-success btn-send">Aceptar</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/form2.js') }}" defer></script>
    <script>
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return d.submit();
                
            });
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection


{{-- DESCRICION:

[*]este formulario es el unica que le aparece este formulario, puede ingresar a el diligenciarlo, adjuntarles todas las imajenes y darle enviar.
[*]Al darle enviar le aparece un mensaje que dice con la presente firma, estoy certificando el equipo que describo en el formulario y doy fe que tengo la capacidad tecnica exigida por la norma para realizarlo, cuando este funcionario de aceptar inmediatamente se envia un mail a energitelco@energitelco.com.co. y energitelco@energitelco.com donde se envia el formulario con el asunto EQUIPO DE ALTURAS REVIZADO Y CERTIFICADO EXITOSAMENTE. --}}
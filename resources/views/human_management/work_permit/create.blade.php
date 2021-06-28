@php
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
@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Permiso de trabajo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Permiso de trabajo</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    @if (now()->format('H') >= 19)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
            <ul>
                No puedes enviar una solicitud de permisos de trabajo despues de las 7 PM
            </ul>
        </div>
    @endif
    {{-- @if (now()->format('H') >= 11)
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
            <ul>
                Justifica el retraso, recordar que los cortes del permisos de trabajo son para antes de las 11 a.m.
            </ul>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Aplica para alturas y en general cualquier actividad o desplazamiento del área técnica.</h3>
                </div>
        <form action="{{ route('work_permit_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="box-body">
                <div class="box-group" id="accordion">
                    @include('human_management.work_permit.includes.form1')
                    @include('human_management.work_permit.includes.form2')
                    @include('human_management.work_permit.includes.form3')
                    @include('human_management.work_permit.includes.form4')
                    @include('human_management.work_permit.includes.form5')
                    @include('human_management.work_permit.includes.form6')
                    @include('human_management.work_permit.includes.form8')
                    @include('human_management.work_permit.includes.form7')
                    @include('human_management.work_permit.includes.form9')
                </div>
            </div>
            @if (now()->format('H') < 19)
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
            @endif
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/form1.js') }}" defer></script>
    <script>
        var bPreguntar = true;
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('#send').click(function (){
                bPreguntar = false;
                return true;
            });
            $('.file_input').change(function (){
                $($(this).parent().children('label')[1]).addClass('text-aqua');
            });
        });
        function preguntarAntesDeSalir()
        {
            if (bPreguntar)
                return "¿Seguro que quieres salir?";
        }
    </script>
@endsection
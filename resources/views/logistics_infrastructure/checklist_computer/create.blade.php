@extends('lte.layouts')

@section('content')
{{-- Content header --}}
<section class="content-header">
    <h1>
        Lista de verificación para el mantenimiento de los computadores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active"><a href="#">Lista de verificación para computadores</a></li>
    </ol>
</section>
<section class="content">
     
    {{-- setion "content" --}}
    <div class="box">
        <form action="{{ route('checklist_computer_maintenance_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="box-body">
                <div class="box-group" id="accordion">
                    @include('logistics_infrastructure.checklist_computer.includes.form1')
                    @include('logistics_infrastructure.checklist_computer.includes.form2')
                    @include('logistics_infrastructure.checklist_computer.includes.form3')
                    @include('logistics_infrastructure.checklist_computer.includes.form4')
                    @include('logistics_infrastructure.checklist_computer.includes.form5')
                    @include('logistics_infrastructure.checklist_computer.includes.form6')
                    @include('logistics_infrastructure.checklist_computer.includes.form7')
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
{{-- Cambiar los card por box --}}
{{-- Quitar el titulos que se ponen en el header --}}
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

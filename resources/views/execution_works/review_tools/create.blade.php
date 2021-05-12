@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>
        Revisión y asignación de herramientas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li><a href="#">Revisión y asignación de herramientas</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <form action="{{ route('review_assignment_tools_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="box-body">
            <small>Todo campo con <span class="text-danger">*</span> es herramienta obligatoria mínima</small><br>
            <small>Todo campo con <span class="text-danger">**</span> es equipo obligatorio mínimo</small>
            
            @csrf
            <div class="box-group" id="accordion">
                @include('execution_works.review_tools.includes.form1')
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
                            <p>Con la presente firma usted está aceptando ser responsable de los activos fijos descritos en el formulario y sabe las responsabilidades que tiene sobre el uso de los mismos y en caso de pérdida.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" data-toggle="modal" data-target=".new_documento2">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->
            <div class="modal fade new_documento2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalCenterTitle">Confirmar</h4>
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


{{-- MECANICA:
[*]EL FUNCIONARIO REVIZOR LLENA EL FORMULARIO DESDE SU USUARIO EN LA HERRAMIENTA Y DE DA ENVIAR.

[*]LUEGO EL FUNCIONARIO REVIZADO INGRESA A LA PLATAFORMA, BUSCA EL FORMULARIO Y LE DA FIRMAR Y HAY MISMO LE APARECE UN MENSAJE QUE DICE CON LA PRESENTE FIRMA USTED ESTA ACEPTANDO SER RESPONSABLE DE LOS ACTIVOS FIJOS DESCRITOS EN EL FORMULARIO Y SABE LAS RESPONSABILIDADES QUE TIENE SOBRE EL USO DE LOS MISMOS Y EN CASO DE PERDIDA. HAY LE DA ACEPTAR EL REVIZADO Y EL FORMULARIO ENVIA EL MAIL CON EL MENSAJE REVICIÓN Y ASIGNACIÓN EXITOSA DE ACTIVOS A XXXXX BEDOYA ZAPATA

CONDICIONALES:
[*]SI EL FUNCIONARIO REVIZADO ES TECNICO Y FALTA ALGO DE COLOR AMARILLO EL SISTEMA LE DICE AL REVIZADOR NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE N COMPLETE LA HERRAMIENTA OBLIGATORIA MINIMA.
[*]SI EL FUNCIONARIO REVIZADO ES TECNICO Y FALTA ALGO DE COLOR ROJO EL SISTEMA LE DICE AL REVIZADOR NO ES POSIBLE ENVIAR FORMULARIO HASTA QUE N COMPLETE EL EQUIPO OBLIGATORIO LEGAL MINIMO. --}}
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>Entrega de dotación personal</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li>Formatos</li>
        <li class="active">Entrega de dotación personal</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <form action="{{ route('delivery_staffing_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="box-body">
                        @csrf
                        <div class="box-group" id="accordion">
                            @include('human_management.delivery_staffing.includes.form1')
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
        </div>
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
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Solicitud de carta de retiro de cesantías o laboral
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Solicitud de carta de retiro de cesantías o laboral</li>
    </ol>
</section>

<section class="content">
     
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Crear solicitud de carta de retiro de cesantías o laboral</h3>
                    <div class="box-tools">
                        <a href="{{route('request_withdraw_severance')}}" class="btn btn-sm btn-primary">Volver</a>
                    </div>
                </div>
                <form action="{{ route('request_withdraw_severance_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="box-body">
                    @csrf
                    <div class="box-group" id="accordion">
                        @include('human_management.withdraw_serveraces.includes.form1')
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
                                    <button type="submit" class="btn btn-sm btn-success btn-send" id="send">Aceptar</button>
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
<script>
    var bPreguntar = true;
    
    window.onbeforeunload = preguntarAntesDeSalir;

    $(document).ready(function() {
        $('#file').change(function (){
            $('#label_file').addClass('text-aqua');
        });
        $('#send').click(function (){
            bPreguntar = false;
            return d.submit();
            
        });
        $('#reason').change(function () {
            if (this.value == 'carta laboral') {
                $('.input_value').hide();
                $('.input_file').hide();
                $('.input_form').show();
            }else if(this.value == 'pago de vacaciones'){
                $('.input_value').hide();
                $('.input_file').hide();
                $('.input_form').hide();
            }else {
                $('.input_form').show();
                $('.input_value').show();
                $('.input_file').show();
            }
        });
    });
    
    function preguntarAntesDeSalir()
    {
        if (bPreguntar)
        return "¿Seguro que quieres salir?";
    }
</script>
@endsection
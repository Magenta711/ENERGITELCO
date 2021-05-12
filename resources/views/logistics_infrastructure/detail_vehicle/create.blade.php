@extends('lte.layouts')

@section('content')

<section class="content-header">
    <h1>Inpección detallada de vehículos</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li><a href="#">Inpección detallada de vehículos</a></li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <form action="{{ route('detailed_inspection_vehicles_store') }}" method="post" name="formulario" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="box-body">
            <div class="box-group" id="accordion">
                <h4 class="my-3">CHEQUEOS ANTES DE LA MARCHA DEL VEHÍCULO</h4>
                @include('logistics_infrastructure.detail_vehicle.includes.form1')
                @include('logistics_infrastructure.detail_vehicle.includes.form2')
                @include('logistics_infrastructure.detail_vehicle.includes.form3')
                <h4 class="my-3">EQUIPO DE SEGURIDAD OBLIGATORIO</h4>
                @include('logistics_infrastructure.detail_vehicle.includes.form4')
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
@endsection

@section('js')
    <script src="{{ asset('js/form2.js') }}" defer></script>
    <script>
        function btnEnd() {
            //Campos
            let con = 0;
            let con2 = 0;
            let con3 = 0;
            let con4 = 0;
            let radioBtn = new Array();
            legal_verification = document.getElementsByClassName('legal_verification');
            security_equip = document.getElementsByClassName('security_equip');
            for (let i = 0; i < legal_verification.length; i++) {
                if (legal_verification[i].type == 'radio'){
                    if(legal_verification[i].checked){
                        con++;
                        if(legal_verification[i].value == 'Bien')
                            con2++;
                    }
                }
            }
            for (let i = 0; i < security_equip.length; i++) {
                if (security_equip[i].type == 'radio'){
                    if(security_equip[i].checked){
                        con3++;
                        if(security_equip[i].value == 'Bien' || security_equip[i].value == 'No aplica')
                            con4++;
                    }
                }
            }
            form = false;
            form1 = false;
            cant = 11;
            if (con == con2 && con == 5){
                form = true;
            }else{
                alert('Parar el vehículo y no moverlo hasta que el se subsane el inconveniente y el Director de Proyecto de su visto bueno.');
            }
            if (con3 == con4 && con3 == cant){
                form1 = true;
            }else{
                alert('Parar el vehículo y no moverlo hasta que el se subsane el inconveniente y el Director de Proyecto de su visto bueno.');
                alert('Reparar el vehículo con autorización del Director de proyectos y no moverlo hasta que el se subsane el inconveniente y el Director de Proyecto de su visto bueno.');
            }
            if(form && form1){
                alert('Bajo gravedad de juramento certifico que la información suministrada en el presente formulario es 100% verídica para la fecha y hora de la revisión y soy consciente que el fraude pone en riesgo la seguridad de mis compañeros y por ende tiene efectos según reglamento interno en mi hoja de vida. Está seguro de aprobar el formulario y le debe dar aceptar para enviar.');
            }
            return [form, form1];
        }
        var bPreguntar = true;
    
        window.onbeforeunload = preguntarAntesDeSalir;
        $(document).ready(function() {
            $('.files').change(function () {
                $($('#'+this.id).parent().children('label')).addClass('text-aqua');
            });
            $('.file').change(function () {
                $($('#'+this.id).parent().children('label')[1]).addClass('text-aqua');
            });
            $('#send').click(function (){
                let btn = btnEnd();
                if (!btn[0] || !btn[1]) {
                    bPreguntar = true;
                    $('.loader').hide();
                    $('.new_documento').modal('hide')
                    return false;
                }else {
                    bPreguntar = false;
                    return submit();
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
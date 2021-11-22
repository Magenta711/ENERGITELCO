@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Preparación anexos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Preparar anexos</li>
    </ol>
</section>
<section class="content">
     
    @php
        $submit = true;
    @endphp
    {{-- @if ($id->minor_box && ($id->minor_box->charges > 0 || $id->minor_box->discharges > 0 || $id->minor_box->pending > 0 || ($id->register->hasContract() && $id->register->hasContract()->signatured_at == '') || !$id->register->hasContract())) --}}
    <div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
        <ul>
            @if ($id->minor_box && $id->minor_box->charges > 0)
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con {{number_format($id->minor_box->charges,2,',','.')}} de caja menor por descargar</li>
            @endif
            @if ($id->minor_box && ($id->minor_box->discharges > 0 || $id->minor_box->pending > 0))
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con ${{number_format(($id->minor_box->discharges + $id->minor_box->pending),2,",",".")}} pendientes por pagarle</li>
            @endif
            @if (!$id->register->hasContract())
                @php
                    $submit = false;
                @endphp
                <li>El usuario no tiene contrato activo</li>
            @endif
            @if ($id->register->hasContract() && $id->register->hasContract()->signatured_at == '')
                @php
                    $submit = false;
                @endphp
                <li>El usuario no ha firmado el contrato</li>
            @endif
            @if(count($id->tools) > 0)
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con {{count($id->tools)}} herramientas asignadas</li>
            @endif
            @if(count($id->computers) > 0)
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con {{count($id->computers)}} computadores asignados</li>
            @endif
            @if(count($id->unapprovedCurriculum()) > 0)
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con {{count($id->unapprovedCurriculum())}} hoja(s) de vida sin aprobar</li>
            @endif
            @if(count($id->unpaymentTransitTaxes()) > 0)
                @php
                    $submit = false;
                @endphp
                <li>El usuario cuenta con {{count($id->unpaymentTransitTaxes())}} multas sin pagar</li>
            @endif
        </ul>
    </div>
    <div class="alert alert-warning alert-dismissible">
        <h4><i class="icon fas fa-exclamation"></i> Alvertencia!</h4>
        <ul>
            @if(count($id->unapprovedEvaluation()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedEvaluation())}} evaluación de desempeño por cerrar</li>
            @endif
            @if(count($id->unapprovedCallAttetion()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedCallAttetion())}} llamados de atención por cerrar</li>
            @endif
            @if(count($id->unapprovedSeverance()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedSeverance())}} solicitud de retiro de cesantia o carta laboral por cerrar</li>
            @endif
            @if(count($id->unconfirmedMemoradums()) > 0)
                <li>El usuario cuenta con {{count($id->unconfirmedMemoradums())}} memorandos sin firmar</li>
            @endif
            @if(count($id->unapprovedInterview()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedInterview())}} entrevista(s) sin aprobar</li>
            @endif
            @if(count($id->unapprovedBonuUser()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedBonuUser())}} reporte de bonificación administrativa sin cerrar</li>
            @endif
            @if(count($id->unapprovedBonuses()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedBonuses())}} reporte de bonificación administrativa sin aprobar</li>
            @endif
            @if(count($id->unapprovedBoxes()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedBoxes())}} reporte de bonificación ténicas o caja menor sin aprobar</li>
            @endif
            @if(count($id->unconfirmedAcction()) > 0)
                <li>El usuario cuenta con {{count($id->unconfirmedAcction())}} acciones de mejora sin cerrar</li>
            @endif
            @if(count($id->unapprovedProceedings()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedProceedings())}} actas por cerrar</li>
            @endif
            @if(count($id->unapprovedPayrollOverTime()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedPayrollOverTime())}} reporte de pago de nomina sin aprobar</li>
            @endif
            @if(count($id->unapprovedCheckListComputer()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedCheckListComputer())}} listas de verificación de computadores sin aprobar</li>
            @endif
            @if(count($id->unapprovedDeliveryStaffing()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedDeliveryStaffing())}} entregas de dotación personal sin aprobar</li>
            @endif
            @if(count($id->unapproveDreviewTool()) > 0)
                <li>El usuario cuenta con {{count($id->unapproveDreviewTool())}} revición y asignación de herramientas sin aprobar</li>
            @endif
            @if(count($id->unapprovedFallProtection()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedFallProtection())}} equipos de protección contra caidas sin aprobar</li>
            @endif
            @if(count($id->unapprovedWorkPermit()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedWorkPermit())}} permisos de trabajo sin aprobar</li>
            @endif
            @if(count($id->unapprovedDateilVehicles()) > 0)
                <li>El usuario cuenta con {{count($id->unapprovedDateilVehicles())}} inspección detallada de vehiculos sin aprobar</li>
            @endif
        </ul>
    </div>
    {{-- @endif --}}
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Anexos</div>
            <div class="box-tools"><a href="{{route('users')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <form action="{{route('user_end_work_store',$id->id)}}" method="POST" autocomplete="off">
            @csrf
        <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" readonly name="name" id="name" value="{{$id->name}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="cedula">Cédula</label>
                        <input type="text" readonly name="cedula" id="cedula" value="{{$id->cedula}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="email">Correo</label>
                        <input type="email" readonly name="email" id="email" value="{{$id->email}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        {{-- cedes City --}}
                        <label for="city">Cuidad</label>
                        <input type="text" name="city" id="city" value="Medellín" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="date">Fecha de incio</label>
                        <input type="date" name="date" id="date" value="{{$id->register && $id->register->hasContract() ? $id->register->hasContract()->start_date : ''}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="date_end">Fecha de fin</label>
                        <input type="date" name="date_end" id="date_end" value="{{ $id->register && $id->register->hasContract() && $id->register->hasContract()->date_end ? $id->register->hasContract()->date_end : now()->format('Y-m-d') }}" class="form-control">
                    </div>
                </div>
                <hr>
                <label for="date_end">Cartas</label><br>
                <ul class="list-group">
                    <li class="list-group-item">
                        <label class="form_checked" for="letter_1">
                            <input type="checkbox" name="letters[]" value="letter_1" id="letter_1" checked>
                            Carta de recomendación
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label class="form_checked" for="letter_2">
                            <input type="checkbox" name="letters[]" value="letter_2" id="letter_2" checked>
                            Carta de examenes medicos
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label class="form_checked" for="letter_3">
                            <input type="checkbox" name="letters[]" value="letter_3" id="letter_3" checked>
                            Carta de terminación laboral
                        </label>
                    </li>
                    <li class="list-group-item">
                        <label class="form_checked" for="letter_4">
                            <input type="checkbox" name="letters[]" value="letter_4" id="letter_4" {{ $monthDff > 2 ? 'checked' : '' }}>
                            Carta de retiro de cesantías
                        </label>
                    </li>
                </ul>
            </div>
            <div class="box-group" id="accordion">
                {{-- Carta de recomendacion --}}
                <div class="letter_1">
                    @include('end_work.includes.letter_1')
                </div>
                {{-- Carta de terminacion laboral --}}
                <div class="letter_2">
                    @include('end_work.includes.letter_2')
                </div>
                {{-- Examen de retiro --}}
                <div class="letter_3">
                    @include('end_work.includes.letter_3')
                </div>
                {{-- Retiro de cesantías --}}
                <div class="letter_4">
                    @include('end_work.includes.letter_4')
                </div>
                {{-- Carta de recomendacion ?? --}}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary btn-send" {{$submit ? '' : 'disabled'}}>Enviar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            for (let i = 0; i < $('.form_checked').length; i++) {
                let id = $($('.form_checked')[i]).children().attr('id');
                checkeLetter(id);
            }
            $('.form_checked').click(function () {
                let id = $(this).children().attr('id')
                checkeLetter(id);
            });
        });
        function checkeLetter(id){
            letter = $('#'+id);
            if (letter.is(':checked')) {
                $('.'+letter.val()).show();
            }else {
                $('.'+letter.val()).hide();
            }
        }
    </script>
@endsection
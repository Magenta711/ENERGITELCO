@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS</li>
    </ol>
</section>

<section class="content">
     
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <form action="{{ route('payroll_overtime_news_report_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="month">Periodo de pago</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="date" name="start_date" value="{{ now()->format('Y-m-01') }}" id="start_date" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="end_date" value="{{ now()->format('Y-m-30') }}" id="end_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="value_assistance">Valor de auxilio transporte mes</label>
                            <input type="text" name="value_assistance" value="{{ old('value_assistance') ?? 106454 }}" id="value_assistance" class="inputs_general form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="box-group" id="accordion">
                        @include('human_management.payroll_over_time.includes.form1')
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
    <script src="{{ asset('js/forms/form8.js') }}"></script>
@endsection
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Liquidación prestaciones sociales
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Liquidación prestaciones sociales</li>
    </ol>
</section>
<div class="hide">
    @php
        $months = ['0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];                             
    @endphp
    @foreach ($users as $user)
        <input type="hidden" disabled value="{{$user->name}}" id="name_{{$user->id}}">
        <input type="hidden" disabled value="{{$user->register && $user->register->date ? $user->register->date : $user->created_at }}" id="date_start_{{$user->id}}">
        <input type="hidden" disabled value="{{ ($user->register && $user->register->date_end != '') ? $user->register->date_end : ($user->state == 0) ? $user->updated_at : '' }}" id="date_end_{{$user->id}}">
        <input type="hidden" disabled value="{{ ($user->register && $user->register->hasContract()) ? $user->register->hasContract()->salary : 0 }}" id="salary_{{$user->id}}">
        {{-- <input type="hidden" disabled value="{{ ($user->register && $user->register->date_end != '') ? $user->register->date_end : (($user->state == 0) ? $user->updated_at : now()->format('Y-m-d')) }}" id="date_end_r_{{$user->id}}"> --}}
        @foreach ($user->workPermssion7 as $permission)
            @if ($permission->estado == 'Aprobado')
                <input type="hidden" class="permission_date_start_{{ $user->id }}" name="date_start_permission" value="{{ $permission->fecha_inicio }}">
                <input type="hidden" class="permission_date_end_{{ $user->id }}" name="date_end_permission" value="{{ $permission->fecha_finalizacion }}">
                <input type="hidden" class="permission_time_start_{{ $user->id }}" name="time_start_permission" value="{{ $permission->hora_inicio }}">
                <input type="hidden" class="permission_time_end_{{ $user->id }}" name="time_end_permission" value="{{ $permission->hora_finalizacion }}">
                <input type="hidden" class="permission_type_{{ $user->id }}" name="type_permission" value="{{ $permission->tipo_solicitud }}">
            @endif
        @endforeach
        @foreach ($user->Work8Users as $pay)
            @if ($pay->work && $pay->work->estado == 'Aprobado')
                <input type="hidden" class="salary_{{ $user->id }}" value="{{ $pay->total_devengado_tx - $pay->extras_sc_tx - $pay->surcharge_n_tx - $pay->extras_d_tx - $pay->extras_dc_tx - $pay->extras_n_tx - $pay->extras_s_tx - $pay->holyday_n_tx - $pay->extras_hn_tx - $pay->unpaid_leave_tx - $pay->disabilities_1_tx - $pay->disabilities_2_tx }}">
                <input type="hidden" class="assistance_{{ $user->id }}" value="{{ $pay->assistance_tx }}">
                <input type="hidden" class="extras_{{ $user->id }}" value="{{ $pay->extras_sc_tx+$pay->surcharge_n_tx + $pay->extras_d_tx + $pay->extras_dc_tx + $pay->extras_n_tx + $pay->extras_s_tx + $pay->holyday_n_tx + $pay->extras_hn_tx + $pay->unpaid_leave_tx + $pay->disabilities_1_tx + $pay->disabilities_2_tx }}">
                <input type="hidden" class="month_{{ $user->id }}" value="{{ intval(explode('-',$pay->work->start_date)[1]) }}">
            @endif
        @endforeach
    @endforeach
</div>

<section class="content">
    @include('includes.alerts')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <form action="{{ route('settlement_update',$id->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="box-body">
                    @csrf
                    @method('PUT')
                    <div class="box-group" id="accordion">
                        @include('human_management.settlement.includes.form_edit')
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
                                    {{-- <p>{!! ($message) ? str_replace("\n", '</br>', addslashes($message->description)) : '' !!}</p> --}}
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
    <script src="{{ asset('js/moment/moment.js') }}" defer></script>
    <script src="{{ asset('js/forms/form9.js') }}" defer></script>
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

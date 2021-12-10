@php
     function showMonth($month,$start,$end)
    {
        $x = intval(explode('-',$start)[1]);
        $y = intval(explode('-',$end)[1]);
        $m = intval($month);
        if ($m >= $x && $m <= $y) {
            return false;
        }
        return true;
    }
@endphp
@extends('lte.layouts')
@section('content')


<section class="content-header">
    <h1>
        Prima de servicios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li class="active">Prima de servicios</li>
    </ol>
</section>
<div class="hide">
    @foreach ($users as $user)
        <input type="hidden" disabled value="{{$user->register && $user->register->date ? $user->register->date : $user->created_at }}" id="date_start_user_{{$user->id}}">
        @foreach ($user->workPermssion7 as $permission)
            @if ($permission->estado == 'Aprobado')
                <input type="hidden" disabled class="permission_date_start_{{ $user->id }}" value="{{ $permission->fecha_inicio }}">
                <input type="hidden" disabled class="permission_date_end_{{ $user->id }}" value="{{ $permission->fecha_finalizacion }}">
                <input type="hidden" disabled class="permission_time_start_{{ $user->id }}" value="{{ $permission->hora_inicio }}">
                <input type="hidden" disabled class="permission_time_end_{{ $user->id }}" value="{{ $permission->hora_finalizacion }}">
                <input type="hidden" disabled class="permission_type_{{ $user->id }}" value="{{ $permission->tipo_solicitud }}">
            @endif
        @endforeach
        @foreach ($user->Work8Users as $pay)
            @if ($pay->work && $pay->work->estado == 'Aprobado')
                <input type="hidden" disabled class="salary_{{ $user->id }}" value="{{ $pay->total_devengado_tx - $pay->extras_sc_tx - $pay->surcharge_n_tx - $pay->extras_d_tx - $pay->extras_dc_tx - $pay->extras_n_tx - $pay->extras_s_tx - $pay->holyday_n_tx - $pay->extras_hn_tx - $pay->unpaid_leave_tx - $pay->disabilities_1_tx - $pay->disabilities_2_tx }}">
                <input type="hidden" disabled class="assistance_{{ $user->id }}" value="{{ $pay->assistance_tx }}">
                <input type="hidden" disabled class="extras_{{ $user->id }}" value="{{ $pay->extras_sc_tx+$pay->surcharge_n_tx + $pay->extras_d_tx + $pay->extras_dc_tx + $pay->extras_n_tx + $pay->extras_s_tx + $pay->holyday_n_tx + $pay->extras_hn_tx + $pay->unpaid_leave_tx + $pay->disabilities_1_tx + $pay->disabilities_2_tx }}">
                <input type="hidden" disabled class="month_{{ $user->id }}" value="{{ intval(explode('-',$pay->work->start_date)[1]) }}">
            @endif
        @endforeach
    @endforeach
</div>
<section class="content">
    <div class="hide">
        @php
            $months = ['0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
        @endphp
    </div>
     
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <form action="{{ route('premium_update',$id->id) }}" method="post"  autocomplete="off">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="month">Periodo de pago</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="date" name="start_date" value="{{ $id->start_date }}" id="start_date" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="end_date" value="{{ $id->end_date }}" id="end_date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="box-group" id="accordion">
                        @include('human_management.premium.includes.form_edit')
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
                                    <button type="submit" id="send" class="btn btn-sm btn-success">Aceptar</button>
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
    <script src="{{ asset('js/forms/premium.js') }}"></script>
@endsection
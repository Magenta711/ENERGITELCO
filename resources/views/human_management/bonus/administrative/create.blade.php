@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Bonificaciones de administrativos y conductores
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Formatos de gestión</a></li>
        <li><a href="#">Bonificaciones de administrativos y conductores</a></li>
        <li class="active">Crear</li>
    </ol>
</section>

<section class="content">
     
    <div class="hide">
        @foreach ($bonusTechnical as $key => $bonu)
            @foreach ($bonu as $key => $item)
                <input type="hidden" value="{{$item['bonification']}}" class="bonus_user_{{$key}}">
                <input type="hidden" value="{{$item['count']}}" class="permit_w_user_{{$key}}">
            @endforeach
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <form action="{{ route('admin_bonuses_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="box-body">
                    @csrf
                    <div class="form-group">
                        <label for="month">Periodo de pago</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="start_date" value="{{ old('start_date') ?? now()->subMonth()->format('Y-m-01') }}" id="start_date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <input type="date" name="end_date" value="{{ old('end_date') ?? now()->subMonth()->format('Y-m-30') }}" id="end_date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="box-group" id="accordion">
                        @include('human_management.bonus.administrative.includes.users')
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
    <script src="{{ asset('js/moment/moment.js') }}"></script>
    <script src="{{ asset('js/forms/bonus/administrative.js') }}"></script>
@endsection
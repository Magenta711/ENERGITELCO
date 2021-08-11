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
    @include('includes.alerts')
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
                <div class="row">
                    <div class="col-md-6">
                        <label for="date_end">Cartas </label><br>
                        <label class="form_checked" for="letter_1"><input type="checkbox" name="letters[]" value="letter_1" id="letter_1" checked>Carta de recomendación</label><br>
                        <label class="form_checked" for="letter_2"><input type="checkbox" name="letters[]" value="letter_2" id="letter_2" checked>Carta de examenes medicos</label><br>
                        <label class="form_checked" for="letter_3"><input type="checkbox" name="letters[]" value="letter_3" id="letter_3" checked>Carta de terminación laboral</label><br>
                        <label class="form_checked" for="letter_4"><input type="checkbox" name="letters[]" value="letter_4" id="letter_4" {{ $monthDff > 2 ? 'checked' : '' }}>Carta de retiro de cesantías</label><br>
                    </div>
                </div>
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
            <button class="btn btn-sm btn-primary btn-send">Enviar</button>
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
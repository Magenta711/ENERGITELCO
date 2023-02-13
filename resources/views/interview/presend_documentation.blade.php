@extends('lte.layouts')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Preparar documentos <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Entrevistas</a></li>
            <li class="active">Preparar documentos</li>
        </ol>
    </section>
    <section class="content">

        {{-- Content main --}}
        <div class="box">
            <div class="box-header">
                <div class="box-title">Documentos</div>
                <div class="box-tools"><a href="{{ route('interview') }}" class="btn btn-sm btn-primary">Volver</a></div>
            </div>
            <form action="{{ route('interview_send_documentation', $id->id) }}" method="POST" autocomplete="off">
                @csrf
                <div class="box-body">
                    {{-- Informacion de usuario --}}
                    <h4>Información general</h4>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" value="{{ $id->register->name }}" id="name"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="document">Número de documento</label>
                                <input type="text" name="document" value="{{ $id->register->document }}" id="document"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="email">Correo electrónico</label>
                                <input type="text" name="email" value="{{ $id->register->email }}" id="email"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" value="{{ $id->register->address }}" id="address"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="age">Edad</label>
                                <input type="number" name="age" value="{{ $id->register->age }}" id="age"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="marital_status">Estado civil</label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option disabled selected></option>
                                    <option {{ $id->register->marital_status == 'Soltero' ? 'selected' : '' }}
                                        value="Soltero">Soltero</option>
                                    <option {{ $id->register->marital_status == 'Casado' ? 'selected' : '' }}
                                        value="Casado">Casado</option>
                                    <option {{ $id->register->marital_status == 'Viudo' ? 'selected' : '' }}
                                        value="Viudo">Viudo</option>
                                    <option {{ $id->register->marital_status == 'Unión libre' ? 'selected' : '' }}
                                        value="Unión libre">Union libre</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="position_aspires_id">Cargo al que aspira</label>
                                <select name="position_aspires_id" id="position_aspires_id" class="form-control">
                                    <option selected disabled></option>
                                    @foreach ($positions as $position)
                                        <option {{ $id->register->position_id == $position->id ? 'selected' : '' }}
                                            value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="place_residence">Lugar de residencia</label>
                                <input type="text" name="place_residence" value="{{ $id->register->place_residence }}"
                                    id="place_residence" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="neighborhood">Barrio</label>
                                <input type="text" name="neighborhood" value="{{ $id->register->neighborhood }}"
                                    id="neighborhood" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="date_birth">Fecha de nacimiento</label>
                                <input type="date" name="date_birth" value="{{ $id->register->date_birth }}"
                                    id="date_birth" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nationality">Nacionalidad</label>
                                <input type="text" name="nationality" value="{{ $id->register->nationality }}"
                                    id="nationality" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- Contracto --}}
                    <h4>Contrato</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_contract">Contrato termino</label>
                                <br>
                                <label>
                                    <input type="radio" {{ old('type_contract') == 'Definido' ? 'checked' : '' }}
                                        name="type_contract" id="option1" value="Definido" class="type_contract">
                                    Definido
                                </label>
                                <label>
                                    <input type="radio" {{ old('type_contract') == 'Indefinido' ? 'checked' : '' }}
                                        name="type_contract" id="option2" value="Indefinido" class="type_contract">
                                    Indefinido
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group hide" id="div_months">
                                <label for="months">Cuantos meses</label>
                                <input type="number" name="months" value="{{ old('months') }}" id="months"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha de inicio</label>
                                <input type="date" name="date" value="{{ old('date') }}" id="date"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">Salario</label>
                                <input type="text" name="salary" value="{{ old('salary') }}" id="salary"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="day_breack">Día de descanso</label>
                            <select name="day_breack" id="day_breack" class="form-control">
                                <option selected disabled></option>
                                <option {{ old('day_breack') == 'Lunes' ? 'selected' : '' }} value="Lunes">Lunes
                                </option>
                                <option {{ old('day_breack') == 'Martes' ? 'selected' : '' }} value="Martes">Martes
                                </option>
                                <option {{ old('day_breack') == 'Miercoles' ? 'selected' : '' }} value="Miercoles">
                                    Miercoles</option>
                                <option {{ old('day_breack') == 'Jueves' ? 'selected' : '' }} value="Jueves">Jueves
                                </option>
                                <option {{ old('day_breack') == 'Viernes' ? 'selected' : '' }} value="Viernes">Viernes
                                </option>
                                <option {{ old('day_breack') == 'Sabado' ? 'selected' : '' }} value="Sabado">Sabado
                                </option>
                                <option {{ old('day_breack') == 'Domingo' ? 'selected' : '' }} value="Domingo">Domingo
                                </option>
                            </select>
                        </div>
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
            type_contract();
            $(".type_contract").click(function() {
                type_contract();
            });
        });

        function type_contract() {
            ele = $('.type_contract');
            for (let i = 0; i < ele.length; i++) {
                if (ele[i].checked) {
                    if (ele[i].value == "Definido")
                        $('#div_months').removeClass('hide');
                    if (ele[i].value == "Indefinido")
                        $('#div_months').addClass('hide');
                }
            }
        }
    </script>
@endsection

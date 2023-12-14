@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Editar usuario <small>Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Usuarios</a></li>
            <li class="active">Editar usuarios</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-4">
                @include('users.include.user_information')
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <a href="{{ route('users') }}" class="btn btn-sm btn-primary">
                                Volver
                            </a>
                        </div>
                    </div>
                    {{-- HasRegister --}}
                    <hr>
                    {{-- @if ($id->register) --}}
                    <h3>Información adicional</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="age">Edad</label>
                            <input type="number" name="age" value="{{$id->register && $id->register->age ? $id->register->age : old('age')}}" id="age" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status">Estado civil</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option disabled selected></option>
                                <option {{ $id->register && $id->register->marital_status == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                <option {{ $id->register && $id->register->marital_status == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                <option {{ $id->register && $id->register->marital_status == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                <option {{ $id->register && $id->register->marital_status == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="place_residence">Lugar de residencia</label>
                            <input type="text" name="place_residence" value="{{$id->register && $id->register->place_residence ? $id->register->place_residence : old('place_residence')}}" id="place_residence" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="neighborhood">Barrio</label>
                            <input type="text" name="neighborhood" value="{{ $id->register && $id->register->neighborhood ? $id->register->neighborhood : old('neighborhood')}}" id="neighborhood" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="date_birth">Fecha de nacimiento</label>
                            <input type="date" name="date_birth" value="{{$id->register && $id->register->date_birth ? $id->register->date_birth : old('date_birth')}}" id="date_birth" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="nationality">Nacionalidad</label>
                            <input type="text" name="nationality" value="{{$id->register && $id->register->nationality ? $id->register->nationality : old('nationality')}}" id="nationality" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergency_contact">Contacto de emergencia</label>
                            <input type="text" name="emergency_contact" value="{{ $id->register && $id->register->emergency_contact ? $id->register->emergency_contact : old('emergency_contact') }}" id="emergency_contact" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergency_contact_number">Número de contacto de emergencia</label>
                            <input type="text" name="emergency_contact_number" value="{{ $id->register && $id->register->emergency_contact_number ? $id->register->emergency_contact_number : old('emergency_contact_number') }}" id="emergency_contact_number" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eps">EPS</label>
                            <input type="text" name="eps" value="{{ $id->register && $id->register->eps ? $id->register->eps : old('eps') }}" id="eps" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="arl">ARL</label>
                            <input type="text" name="arl" value="{{ $id->register && $id->register->arl ? $id->register->arl : old('arl') }}" id="arl" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pension">Pensión</label>
                            <input type="text" name="pension" value="{{ $id->register && $id->register->pension ? $id->register->pension : old('pension') }}" id="pension" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rh">RH</label>
                            <input type="text" name="rh" value="{{ $id->register && $id->register->rh ? $id->register->rh : old('rh') }}" id="rh" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="shirt_size">Talla camisa</label>
                            <input type="text" name="shirt_size" value="{{ $id->register && $id->register->shirt_size ? $id->register->shirt_size : old('shirt_size') }}" id="shirt_size" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pant_size">Talla pantalón</label>
                            <input type="text" name="pant_size" value="{{ $id->register && $id->register->pant_size ? $id->register->pant_size : old('pant_size') }}" id="pant_size" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="shoe_size">Talla calzado</label>
                            <input type="text" name="shoe_size" value="{{ $id->register && $id->register->shoe_size ? $id->register->shoe_size : old('shoe_size') }}" id="shoe_size" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="height">Estatura</label>
                            <input type="text" name="height" value="{{ $id->register->height ?? old('height') }}" id="height" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Peso</label>
                            <input type="text" name="weight" value="{{ $id->register->weight ?? old('weight') }}" id="weight" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <small class="text-muted">No se cambian tallas despues de fecha de corte</small>
                        </div>
                    </div>
                    <hr>
                    <h4>Información bancaria</h4>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="type_bank_account">Tipo de cuenta</label>
                            <input type="text" name="type_bank_account" id="type_bank_account" class="form-control" value="{{ $id->register ? $id->register->type_bank_account : old('type_bank_account') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Número cuenta</label>
                            <input type="text" name="bank_account" id="bank_account" class="form-control" value="{{ $id->register ? $id->register->bank_account : old('bank_account') }}">
                        </div>
                    </div>
                    @if (auth()->user()->hasPermissionTo('Editar contrato'))
                    <hr>
                    {{-- Informacion de contrato --}}
                    <h3>Información Contrato</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_contract">Contrato termino</label>
                                <br>
                                <label>
                                    <input type="radio" {{ $contract && $contract->type_contract == 'Definido' ? 'checked' : ((old('type_contract') == 'Definido') ? 'checked' : '') }} name="type_contract" id="option1" value="Definido" class="type_contract"> Definido
                                </label>
                                <label>
                                    <input type="radio" {{ ($contract && $contract->type_contract == 'Indefinido') ? 'checked' : ((old('type_contract') == 'Indefinido') ? 'checked' : '')  }} name="type_contract" id="option2" value="Indefinido" class="type_contract"> Indefinido
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group hide" id="div_months">
                                <label for="months">Cuantos meses</label>
                                <input type="number" name="months" value="{{$contract && $contract->months ? $contract->months : old('months')}}" id="months" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Fecha de inicio</label>
                                <input type="date" name="date" value="{{$contract && $contract->start_date ? $contract->start_date : old('date')}}" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="salary">Salario</label>
                                <input type="number" name="salary" value="{{$contract && $contract->salary ? $contract->salary : old('salary')}}" id="salary" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="day_breack">Día de descanso</label>
                            <select name="day_breack" id="day_breack" class="form-control">
                                <option selected disabled></option>
                                <option {{($contract && $contract->day_breack == 'Lunes') ? 'selected' : ''}} value="Lunes">Lunes</option>
                                <option {{($contract && $contract->day_breack == 'Martes') ? 'selected' : ''}} value="Martes">Martes</option>
                                <option {{($contract && $contract->day_breack == 'Miercoles') ? 'selected' : ''}} value="Miercoles">Miercoles</option>
                                <option {{($contract && $contract->day_breack == 'Jueves') ? 'selected' : ''}} value="Jueves">Jueves</option>
                                <option {{($contract && $contract->day_breack == 'Viernes') ? 'selected' : ''}} value="Viernes">Viernes</option>
                                <option {{($contract && $contract->day_breack == 'Sabado') ? 'selected' : ''}} value="Sabado">Sabado</option>
                                <option {{($contract && $contract->day_breack == 'Domingo') ? 'selected' : ''}} value="Domingo">Domingo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="contract">Contrato</label>
                            @if ($id->register && $contract)
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <span class="mailbox-attachment-icon" id="icon">
                                            <div id="type">
                                                <i class="fa fa-file-pdf"></i>
                                            </div>
                                        </span>
                                        <div class="mailbox-attachment-info">
                                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Contrato</p>
                                            <span class="mailbox-attachment-size">
                                                {{ $contract->file->size }}
                                                <a target="_black" href="/storage/contratos/{{$contract->file->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
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
            $('#contract').change(function() {
                $('#label_contract').addClass('text-aqua');
            });
            $('#img-signature').change(function() {
                $('#label-signature').addClass('text-aqua');
            });
            $('#img-signature').change(function() {
                readImage(this);
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

        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + input.name).attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

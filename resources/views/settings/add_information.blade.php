@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Información personal <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Información personal</li>
    </ol>
</section>
<section class="content">
     
    <div class="row">
        @include('settings.include.menu')
        <div class="col-md-8 col-ms-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
        
                    <h3 class="box-title">Información personal</h3>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('add_information_update') }}" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="age">Edad</label>
                            <input type="number" name="age" value="{{auth()->user()->register->age ?? old('age')}}" id="age" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status">Estado civil</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option disabled selected></option>
                                <option {{(auth()->user()->register->marital_status) == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                <option {{(auth()->user()->register->marital_status) == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                <option {{(auth()->user()->register->marital_status) == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                <option {{(auth()->user()->register->marital_status) == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="place_residence">Lugar de residencia</label>
                            <input type="text" name="place_residence" value="{{auth()->user()->register->place_residence ?? old('place_residence')}}" id="place_residence" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="neighborhood">Barrio</label>
                            <input type="text" name="neighborhood" value="{{auth()->user()->register->neighborhood ?? old('neighborhood')}}" id="neighborhood" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="date_birth">Fecha de nacimiento</label>
                            <input type="date" name="date_birth" value="{{auth()->user()->register->date_birth ?? old('date_birth')}}" id="date_birth" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="nationality">Nacionalidad</label>
                            <input type="text" name="nationality" value="{{auth()->user()->register->nationality ?? old('nationality')}}" id="nationality" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergency_contact">Contacto de emergencia</label>
                            <input type="text" name="emergency_contact" value="{{ auth()->user()->register->emergency_contact ?? old('emergency_contact') }}" id="emergency_contact" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergency_contact_number">Número de contacto de emergencia</label>
                            <input type="text" name="emergency_contact_number" value="{{ auth()->user()->register->emergency_contact_number ?? old('emergency_contact_number') }}" id="emergency_contact_number" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eps">EPS</label>
                            <input type="text" name="eps" value="{{ auth()->user()->register->eps ?? old('eps') }}" id="eps" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="arl">ARL</label>
                            <input type="text" name="arl" value="{{ auth()->user()->register->arl ?? old('arl') }}" id="arl" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pension">Pensión</label>
                            <input type="text" name="pension" value="{{ auth()->user()->register->pension ?? old('pension') }}" id="pension" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rh">RH</label>
                            <input type="text" name="rh" value="{{ auth()->user()->register->rh ?? old('rh') }}" id="rh" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="weight">Peso</label>
                            <input type="text" name="weight" value="{{ auth()->user()->register->weight ?? old('weight') }}" id="weight" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="height">Estatura</label>
                            <input type="text" name="height" value="{{ auth()->user()->register->height ?? old('height') }}" id="height" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="shirt_size">Talla camisa</label>
                            <input type="text" name="shirt_size" value="{{ auth()->user()->register->shirt_size ?? old('shirt_size') }}" id="shirt_size" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pant_size">Talla pantalón</label>
                            <input type="text" name="pant_size" value="{{ auth()->user()->register->pant_size ?? old('pant_size') }}" id="pant_size" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="shoe_size">Talla calzado</label>
                            <input type="text" name="shoe_size" value="{{ auth()->user()->register->shoe_size ?? old('shoe_size') }}" id="shoe_size" class="form-control">
                        </div>
                        <hr>
                    </div>
                    <h4>Información bancaria</h4>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="type_bank_account">Tipo de cuenta</label>
                            <input type="text" name="type_bank_account" id="type_bank_account" class="form-control" value="{{ auth()->user()->register->type_bank_account ?? old('type_bank_account') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bank_account">Número cuenta</label>
                            <input type="text" name="bank_account" id="bank_account" class="form-control" value="{{ auth()->user()->register->bank_account ?? old('bank_account') }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send">Actualizar</button>
                </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
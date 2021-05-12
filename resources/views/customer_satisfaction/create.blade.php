@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Evaluación de satisfación del cliente</div>
                <form method="POST" action="{{route('satisfaction_store',$customer_satisfaction->id)}}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="token" value="{{$customer_satisfaction->token}}">
                    <input type="hidden" name="customer_id" value="{{$customer_satisfaction->customer_id}}">
                    <div class="card-body">
                        <p>Estimado cliente:</p>
                        <p>Su opinión es fundamental para el proceso de mejoramiento continuo de nuestra empresa.  Por ello, le solicitamos nos colabore diligenciando el siguiente cuestionario, el cual nos permitirá conocer la situación real en la prestación de los servicios de nuestra empresa.</p>
                        <p>Para la calificación de los servicios prestados por ENERGITELCO S. A. S., seleccione la opción más representativa para cada uno de los aspectos considerados, según su criterio, teniendo en cuenta la siguiente escala de valores:</p>
                        <p>1.  Inaceptable     2.  Deficiente    3.  Aceptable     4.  Bueno      5. Excelente </p>
                        <p><small>Todo campo con <span class="text-danger">*</span> es <b>obligatorio.</b></small></p>

                        <div class="center">
                            {{-- name company --}}
                            <div class="form-group">
                                <label for="name_company">Nombre de la empresa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name_company" value="{{$customer_satisfaction->customer->name}}" id="name_company">
                            </div>
                            {{-- official --}}
                            <div class="form-group">
                                <label for="official">Función del entrevistado <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="official" value="{{old("official")}}" id="official">
                            </div>
                            {{-- position_official --}}
                            <div class="form-group">
                                <label for="position_official">Cargo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="position_official" value="{{old("position_official")}}" id="position_official">
                            </div>
                            {{-- dependence --}}
                            <div class="form-group">
                                <label for="dependence">Dependencia <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="dependence" value="{{old("dependence")}}" id="dependence">
                            </div>
                            {{-- date --}}
                            <div class="form-group">
                                <label for="date">Fecha <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" value="{{old("date")}}" id="date">
                            </div>
                            {{-- period --}}
                            <div class="form-group">
                                <label for="period">Periodo evaluado <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="period" value="{{old("period")}}" id="period">
                            </div>
                            <hr>
                            <h4>EL SERVICIO ENTREGADO</h4>
                            <p>ASPECTOS A CALIFICAR:</p>
                            {{-- period --}}
                            <p><label for="period">1. Trato recibido por los funcionarios asignados a la prestación del servicio.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 1) ? 'checked' : ''}} id="item_1_1" value="1">
                                <label class="form-check-label" for="item_1_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 2) ? 'checked' : ''}} id="item_1_2" value="2">
                                <label class="form-check-label" for="item_1_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 3) ? 'checked' : ''}} id="item_1_3" value="3">
                                <label class="form-check-label" for="item_1_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 4) ? 'checked' : ''}} id="item_1_4" value="4">
                                <label class="form-check-label" for="item_1_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_1" {{(old('item_1') == 5) ? 'checked' : ''}} id="item_1_5" value="5">
                                <label class="form-check-label" for="item_1_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">2. Presentación personal del funcionario que presta el servicio</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 1) ? 'checked' : ''}} id="item_2_1" value="1">
                                <label class="form-check-label" for="item_2_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 2) ? 'checked' : ''}} id="item_2_2" value="2">
                                <label class="form-check-label" for="item_2_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 3) ? 'checked' : ''}} id="item_2_3" value="3">
                                <label class="form-check-label" for="item_2_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 4) ? 'checked' : ''}} id="item_2_4" value="4">
                                <label class="form-check-label" for="item_2_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_2" {{(old('item_2') == 5) ? 'checked' : ''}} id="item_2_5" value="5">
                                <label class="form-check-label" for="item_2_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">3. Comportamiento general durante la realización de las obras.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 1) ? 'checked' : ''}} id="item_3_1" value="1">
                                <label class="form-check-label" for="item_3_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 2) ? 'checked' : ''}} id="item_3_2" value="2">
                                <label class="form-check-label" for="item_3_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 3) ? 'checked' : ''}} id="item_3_3" value="3">
                                <label class="form-check-label" for="item_3_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 4) ? 'checked' : ''}} id="item_3_4" value="4">
                                <label class="form-check-label" for="item_3_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_3" {{(old('item_3') == 5) ? 'checked' : ''}} id="item_3_5" value="5">
                                <label class="form-check-label" for="item_3_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">4. Conocimiento de los trabajos que realiza el personal asignado.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 1) ? 'checked' : ''}} id="item_4_1" value="1">
                                <label class="form-check-label" for="item_4_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 2) ? 'checked' : ''}} id="item_4_2" value="2">
                                <label class="form-check-label" for="item_4_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 3) ? 'checked' : ''}} id="item_4_3" value="3">
                                <label class="form-check-label" for="item_4_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 4) ? 'checked' : ''}} id="item_4_4" value="4">
                                <label class="form-check-label" for="item_4_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_4" {{(old('item_4') == 5) ? 'checked' : ''}} id="item_4_5" value="5">
                                <label class="form-check-label" for="item_4_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">5. Comunicación con los funcionarios que manejan el contrato.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 1) ? 'checked' : ''}} id="item_5_1" value="1">
                                <label class="form-check-label" for="item_5_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 2) ? 'checked' : ''}} id="item_5_2" value="2">
                                <label class="form-check-label" for="item_5_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 3) ? 'checked' : ''}} id="item_5_3" value="3">
                                <label class="form-check-label" for="item_5_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 4) ? 'checked' : ''}} id="item_5_4" value="4">
                                <label class="form-check-label" for="item_5_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_5" {{(old('item_5') == 5) ? 'checked' : ''}} id="item_5_5" value="5">
                                <label class="form-check-label" for="item_5_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">6. Atención oportuna a los requerimientos del cliente</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 1) ? 'checked' : ''}} id="item_6_1" value="1">
                                <label class="form-check-label" for="item_6_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 2) ? 'checked' : ''}} id="item_6_2" value="2">
                                <label class="form-check-label" for="item_6_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 3) ? 'checked' : ''}} id="item_6_3" value="3">
                                <label class="form-check-label" for="item_6_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 4) ? 'checked' : ''}} id="item_6_4" value="4">
                                <label class="form-check-label" for="item_6_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_6" {{(old('item_6') == 5) ? 'checked' : ''}} id="item_6_5" value="5">
                                <label class="form-check-label" for="item_6_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">7. Cumplimiento en la entrega de las obras y de los informes respectivos.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 1) ? 'checked' : ''}} id="item_7_1" value="1">
                                <label class="form-check-label" for="item_7_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 2) ? 'checked' : ''}} id="item_7_2" value="2">
                                <label class="form-check-label" for="item_7_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 3) ? 'checked' : ''}} id="item_7_3" value="3">
                                <label class="form-check-label" for="item_7_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 4) ? 'checked' : ''}} id="item_7_4" value="4">
                                <label class="form-check-label" for="item_7_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_7" {{(old('item_7') == 5) ? 'checked' : ''}} id="item_7_5" value="5">
                                <label class="form-check-label" for="item_7_5">5. Excelente</label>
                            </div>
                            <hr>
                            <p><label for="period">8. Cumplimiento de normas ambientales y de seguridad ocupacional.</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_8" {{(old('item_8') == 1) ? 'checked' : ''}} id="item_8_1" value="1">
                                <label class="form-check-label" for="item_8_1">1. Inaceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_8" {{(old('item_8') == 2) ? 'checked' : ''}} id="item_8_2" value="2">
                                <label class="form-check-label" for="item_8_2">2. Deficiente</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_8" {{(old('item_8') == 3) ? 'checked' : ''}} id="item_8_3" value="3">
                                <label class="form-check-label" for="item_8_3">3. Aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_8" {{(old('item_8') == 4) ? 'checked' : ''}} id="item_8_4" value="4">
                                <label class="form-check-label" for="item_8_4">4. Bueno</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="item_8" {{(old('item_8') == 5) ? 'checked' : ''}} id="item_8_5" value="5">
                                <label class="form-check-label" for="item_8_5">5. Excelente</label>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="comments">Observaciones y sugerencias</label>
                                <textarea name="comments" id="comments" cols="30" rows="3" class="form-control">{{old('comments')}}</textarea>
                            </div>
                            <p class="text-muted text-center">Nuestro mejor premio es la satisfación de nuestros clientes.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
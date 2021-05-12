@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Evaluación de proveedor</div>
                <form method="POST" action="{{route('supplier_evaluation_store_provider',$supplier->token)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="provider_id" value="{{$supplier->provider_id}}">
                    <div class="card-body">
                        <p>Estimado proveedor:</p>
                        <br>
                        <p><strong>Calificación:</strong></p>
                        <p>1.  Inaceptable     2.  Deficiente    3.  Aceptable     4.  Bueno      5. Excelente     NA: No aplica</p>
                        <br>
                        <p><strong>Calificación promedio (%): </strong></p>
                        <p>Un proveedor se cataloga como bueno si obtiene una calificación mayor o igual a 70%. Si está por debajo de este porcentaje, se le invita a desarrollar en plan de mejora para los aspectos que inciden en la baja calificación. Los proveedores con calificación superior a un 85% del máximo posible, tienen prioridad para ser tenidos en cuenta en el próximo periodo.</p>
                        <br>
                        {{-- <p><small>Todo campo con  es <b>obligatorio.</b></small></p> --}}

                        <div class="center">
                            {{-- provider --}}
                            <div class="form-group">
                                <label for="provider_type">Proveedor: </label>
                                <input type="email" class="form-control" name="provider_type" value="{{$supplier->provider->name}}" readonly id="provider_type">
                            </div>
                            {{-- products --}}
                            <div class="form-group">
                                <label for="product">Producto(s) o servicio(s): </label>
                                <input type="text" class="form-control" name="product" value="{{old("product")}}" id="product">
                            </div>
                            {{-- date --}}
                            <div class="form-group">
                                <label for="date">Fecha </label>
                                <input type="date" class="form-control" name="date" value="{{old("date") ?? now()->format('Y-m-d')}}" id="date">
                            </div>
                            {{-- period --}}
                            <div class="form-group">
                                <label for="period">Periodo evaluado </label>
                                <input type="text" class="form-control" name="period" value="{{old("period")}}" id="period">
                            </div>
                            <hr>
                            @php
                                $i = 0;
                            @endphp
                            <h5>Autualizar documentación</h5>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. RUT</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="RUT">
                            </div>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. Certificado de Cámara y Comercio</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado de Cámara y Comercio">
                            </div>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. Certificado de evaluación SST</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado de evaluación SST">
                            </div>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. Certificaciones de Calidad o similares</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificaciones de Calidad o similares">
                            </div>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. Certificación de Parafiscales por contador o revisor fiscal</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificación de Parafiscales por contador o revisor fiscal">
                            </div>
                            <div class="form-group">
                                <label for="file_{{ ++$i }}">{{ $i }}. Presentación de ofertas materiales o servicios de la compañía</label>
                                <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                <input type="hidden" name="file_name[{{ $i }}]" id="" value="Presentación de ofertas materiales o servicios de la compañía">
                            </div>
                            @if ($supplier->provider->type_id == 1)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificado de calidad, fabricación y garantía materiales que nos vende</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado de calidad, fabricación y garantía materiales que nos vende">
                                </div>
                            @endif
                            @if ($supplier->provider->type_id == 8)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Liquidación seguridad social</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Liquidación seguridad social">
                                </div>
                            @endif
                            @if ($supplier->provider->type_id == 7)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificaciones y pruebas de los elementos de seguridad que nos venden</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificaciones y pruebas de los elementos de seguridad que nos venden">
                                </div>
                            @endif
                            @if ($supplier->provider->type_id == 6)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificado de calibración de equipos</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado de calibración de equipos">
                                </div>
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificado médicos laborales</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado médicos laborales">
                                </div>
                            @endif
                            @if ($supplier->provider->type_id == 5)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificado del ministerio para trabajo en alturas</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificado del ministerio para trabajo en alturas">
                                </div>
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Permiso Sena para escuela de Alturas</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Permiso Sena para escuela de Alturas">
                                </div>
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificación de Instructores a utilizar</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Certificación de Instructores a utilizar">
                                </div>
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Matriz de riesgos del campo de entrenamiento</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Matriz de riesgos del campo de entrenamiento">
                                </div>
                            @endif
                            @if ($supplier->provider->type_id == 3)
                                <div class="form-group">
                                    <label for="file_{{ ++$i }}">{{ $i }}. Certificados de experiencia y licencia para el oficio</label>
                                    <label for="file_{{ $i }}" id="file_label_{{ $i }}" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                    <input type="file" name="file[{{ $i }}]" class="d-none file-input" id="file_{{ $i }}">
                                    <input type="hidden" name="file_name[{{ $i }}]" id="" value="Ofertas y servicios (brochure">
                                </div>
                            @endif
                            <hr>
                            <h5>ASPECTOS A CALIFICAR:</h5>
                            {{-- aspects --}}
                            @include('supplier_evaluation.include.'.$supplier->provider->type_id)
                            @if ($supplier->provider->type_id != 7 || $supplier->provider->type_id != 8)
                            <hr>
                            <p><label>Su valoración obtenida en la autoevaluación realizada en el año, según resolución 0312 de 2019 es:</label></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="autovalue" {{(old('autovalue') == 'Crítico') ? 'checked' : ''}} id="autovalue_1" value="Crítico">
                                <label class="form-check-label" for="autovalue_1">Crítico</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="autovalue" {{(old('autovalue') == 'Moderadamente aceptable') ? 'checked' : ''}} id="autovalue_2" value="Moderadamente aceptable">
                                <label class="form-check-label" for="autovalue_2">Moderadamente aceptable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="autovalue" {{(old('autovalue') == 'Aceptable') ? 'checked' : ''}} id="autovalue_3" value="Aceptable">
                                <label class="form-check-label" for="autovalue_3">Aceptable</label>
                            </div>
                            @endif
                            <hr>
                            <div class="form-group">
                                <label for="observations">Observaciones</label>
                                <textarea name="observations" id="observations" cols="30" rows="3" class="form-control">{{old('observations')}}</textarea>
                            </div>
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


@section('js')
<script>
    $(document).ready(function() {
        $('.file-input').change(function (){
            let id = this.id.split('_')[this.id.split('_').length - 1];
            $('#file_label_'+id).addClass('text-primary');
        });
    });
</script>
@endsection
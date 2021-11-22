@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar entrevista <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Entrevistas</a></li>
        <li class="active">Editar entrevista</li>
    </ol>
</section>
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Entrevista</div>
            <div class="box-tools"><a href="{{route('interview')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <form action="{{route('interview_update',$id->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="box-body">
            <h4>Información general</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" value="{{$id->register->name}}" id="name" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="document">Número de documento</label>
                                <input type="text" name="document" value="{{$id->register->document}}" id="document" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="tel">Teléfono</label>
                                <input type="text" name="tel" value="{{ $id->tel }}" id="tel" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="email">Correo eletrónico</label>
                                <input type="text" name="email" value="{{$id->register->email}}" id="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" value="{{$id->register->address}}" id="address" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="age">Edad</label>
                                <input type="number" name="age" value="{{$id->register->age}}" id="age" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="marital_status">Estado civil</label>
                                <select name="marital_status" id="marital_status" class="form-control">
                                    <option disabled selected></option>
                                    <option {{($id->register->marital_status) == 'Soltero' ? 'selected' : ''}} value="Soltero">Soltero</option>
                                    <option {{($id->register->marital_status) == 'Casado' ? 'selected' : ''}} value="Casado">Casado</option>
                                    <option {{($id->register->marital_status) == 'Viudo' ? 'selected' : ''}} value="Viudo">Viudo</option>
                                    <option {{($id->register->marital_status) == 'Unión libre' ? 'selected' : ''}} value="Unión libre">Union libre</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="position_aspires_id">Cargo al que aspira</label>
                                <select name="position_aspires_id" id="position_aspires_id" class="form-control">
                                    <option selected disabled></option>
                                    @foreach ($positions as $position)
                                        <option {{($id->register->position_id) == $position->id ? 'selected' : ''}} value="{{$position->id}}">{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="place_residence">Lugar de residencia</label>
                                <input type="text" name="place_residence" value="{{old('place_residence')}}" id="place_residence" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="neighborhood">Barrio</label>
                                <input type="text" name="neighborhood" value="{{old('neighborhood')}}" id="neighborhood" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="date_birth">Fecha de nacimiento</label>
                                <input type="date" name="date_birth" value="{{old('date_birth')}}" id="date_birth" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nationality">Nacionalidad</label>
                                <input type="text" name="nationality" value="{{old('nationality')}}" id="nationality" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <strong>Foto</strong>
                    <div class="form-group text-center">
                        <img src="{{ '/img/interview/'.$id->register->photo }}" style="border-radius: 50%" alt="$id->register->photo" id="blah" width="250px">
                        <label for="photo" id="label_photo" class="form-control text-center"><i class="fa fa-upload"></i></label>
                        <input type="file" accept="image/*" name="photo" value="{{old('photo')}}" id="photo" class="hide">
                    </div>
                </div>
            </div>
            <hr>
            <h4>Preguntas al entrevistador</h4>
            <div class="form-group">
                <label for="item_1">1. ¿Qué estudios ha realizado?</label>
                <textarea name="item_1" id="item_1" rows="2" cols="10" class="form-control">{{($id->item_1)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_2">2. ¿Cuál ha sido su experiencia laboral?</label>
                <textarea name="item_2" id="item_2" rows="2" cols="5" class="form-control">{{($id->item_2)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_3">3. ¿Qué tipo de funciones realizaba en su último trabajo?</label>
                <textarea name="item_3" id="item_3" rows="2" cols="5" class="form-control">{{($id->item_3)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_4">4. ¿Sufre de vértigo?</label>
                <textarea name="item_4" id="item_4" rows="2" cols="5" class="form-control">{{($id->item_4)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_5">5. ¿Le tiene miedo a la energía?</label>
                <textarea name="item_5" id="item_5" rows="2" cols="5" class="form-control">{{($id->item_5)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_6">6. ¿Ha realizado el curso sobre el Retie?</label>
                <textarea name="item_6" id="item_6" rows="2" cols="5" class="form-control">{{($id->item_6)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_7">7. ¿Ha realizado cursos de energía? ¿Cuáles?</label>
                <textarea name="item_7" id="item_7" rows="2" cols="5" class="form-control">{{($id->item_7)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_8">8. ¿Ha realizado cursos de telecomunicaciones? ¿Cuáles?</label>
                <textarea name="item_8" id="item_8" rows="2" cols="5" class="form-control">{{($id->item_8)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_9">9. ¿Tiene curso de trabajo en alturas?</label>
                <textarea name="item_9" id="item_9" rows="2" cols="5" class="form-control">{{($id->item_9)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_10">10. ¿Qué piensa de los trabajos en los que haya que viajar?</label>
                <textarea name="item_10" id="item_10" rows="2" cols="5" class="form-control">{{($id->item_10)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_11">11. ¿Tiene licencia de conducción?</label>
                <textarea name="item_11" id="item_11" rows="2" cols="5" class="form-control">{{($id->item_11)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_12">12. ¿Por qué crees que deberíamos contratarte?</label>
                <textarea name="item_12" id="item_12" rows="2" cols="5" class="form-control">{{($id->item_12)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_13">13. ¿Por qué salió de su último trabajo?</label>
                <textarea name="item_13" id="item_13" rows="2" cols="5" class="form-control">{{($id->item_13)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_14">14. ¿Qué tiene usted para ofrecerle a esta organización?</label>
                <textarea name="item_14" id="item_14" rows="2" cols="5" class="form-control">{{($id->item_14)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_15">15. ¿Cuál es su aspiración salarial?</label>
                <textarea name="item_15" id="item_15" rows="2" cols="5" class="form-control">{{($id->item_15)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_16">16. ¿Trabaja bien con otras personas? Dé un ejemplo.</label>
                <textarea name="item_16" id="item_16" rows="2" cols="5" class="form-control">{{($id->item_16)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_17">17. ¿Se considera usted una persona que sabe seguir instrucciones? Dé un ejemplo</label>
                <textarea name="item_17" id="item_17" rows="2" cols="5" class="form-control">{{($id->item_17)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_18">18. ¿Se considera una persona organizada? ¿Por qué?</label>
                <textarea name="item_18" id="item_18" rows="2" cols="5" class="form-control">{{($id->item_18)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_19">19. ¿Dígame una meta personal que quiere lograr?</label>
                <textarea name="item_19" id="item_19" rows="2" cols="5" class="form-control">{{($id->item_19)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_20">20. ¿Se considera y es usted una persona totalmente honesta?</label>
                <textarea name="item_20" id="item_20" rows="2" cols="5" class="form-control">{{($id->item_20)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_21">21. ¿Cree usted que es capaz de trabajar bajo presión?</label>
                <textarea name="item_21" id="item_21" rows="2" cols="5" class="form-control">{{($id->item_21)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_22">22. ¿Es usted una persona comprometida con su trabajo?</label>
                <textarea name="item_22" id="item_22" rows="2" cols="5" class="form-control">{{($id->item_22)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="item_23">23. ¿Está usted de acuerdo con el salario estipulado por la empresa para el cargo al que está aspirando?</label>
                <textarea name="item_23" id="item_23" rows="2" cols="5" class="form-control">{{($id->item_23)}}</textarea>
            </div>
            <hr>
            <div class="form-group">
                <label for="observations">Observaciones</label>
                <textarea name="observations" id="observations" cols="30" rows="5" class="form-control">{{($id->observations)}}</textarea>
            </div>
            <hr>
            <h4>Validación de referencias laborales</h4>
            @foreach ($id->references as $reference)    
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="company_r">Empresa</label><input type="text" name="company_r[]" value="{{($reference->company_r)}}" id="company_r" class="form-control"></div>
                    <div class="col-md-4"><label for="date_r">Fecha</label><input type="date" name="date_r[]" value="{{($reference->date_r)}}" id="date_r" class="form-control"></div>
                    <div class="col-md-4"><label for="name_r">Persona</label><input type="text" name="name_r[]" value="{{($reference->name_r)}}" id="name_r" class="form-control"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"><label for="service_time_r">Tiempo de servicio</label><input type="text" name="service_time_r[]" value="{{($reference->service_time_r)}}" id="service_time_r" class="form-control"></div>
                    <div class="col-md-4"><label for="concept_r">Concepto</label><input type="text" name="concept_r[]" value="{{($reference->concept_r)}}" id="concept_r" class="form-control"></div>
                    <div class="col-md-4"><label for="recommend">¿Lo recomienda?</label><input type="text" name="recommend[]" value="{{($reference->recommend)}}" id="recommend[]" class="form-control"></div>
                </div>
                <hr>
            @endforeach
            </div>
            <br>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-primary">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>
    function readImage (input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#photo').change(function (){
            readImage(this);
            $('#label_photo').addClass('text-aqua');
        });
    });
</script>
@endsection
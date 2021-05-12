@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mostrar entrevista <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Lista de entrevistas</a></li>
        <li class="active">Mostrar entrevista</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">Entrevista</div>
            <div class="box-tools">
                <a href="{{route('interview')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>Información general</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Nombre</b></p>
                            <p>{{$id->register->name}}</p>  
                        </div>
                        <div class="col-md-3">
                            <p><b>Número de documento</b></p>
                            <p>{{$id->register->document}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Teléfono</b></p>
                            <p>{{$id->register->tel}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Correo electrónico</b></p>
                            <p>{{$id->register->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Dirección</b></p>
                            <p>{{$id->register->address}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Edad</b></p>
                            <p>{{$id->register->age}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Estado civil</b></p>
                            <p>{{$id->register->marital_status}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Cargo al que aspira</b></p>
                            <p>{{$id->register->position->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Lugar de residencia</b></p>
                            <p>{{$id->register->place_residence}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Barrio</b></p>
                            <p>{{$id->register->neighborhood}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Fecha de nacimiento</b></p>
                            <p>{{$id->register->date_birth}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Nacionalidad</b></p>
                            <p>{{$id->register->nationality}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="/img/interview/{{$id->register->photo}}" class="img-fluid img-thumbnail" style="border-radius: 50%" alt="{{$id->photo}}" >
                </div>
            </div>
            <hr>
            <h4>Preguntas al entrevistador</h4>
            <hr>
            <p>1. ¿Qué estudios ha realizado?</p>
            <p>{{$id->item_1}}</p>
            <hr>
            <p>2. ¿Cuál ha sido su experiencia laboral?</p>
            <p>{{$id->item_2}}</p>
            <hr>
            <p>3. ¿Qué tipo de funciones realizaba en su último trabajo?</p>
            <p>{{$id->item_3}}</p>
            <hr>
            <p>4. ¿Sufre de vértigo?</p>
            <p>{{$id->item_4}}</p>
            <hr>
            <p>5. ¿Le tiene miedo a la energía?</p>
            <p>{{$id->item_5}}</p>
            <hr>
            <p>6. ¿Ha realizado el curso sobre el Retie?</p>
            <p>{{$id->item_6}}</p>
            <hr>
            <p>7. ¿Ha realizado cursos de energía? ¿Cuáles?</p>
            <p>{{$id->item_7}}</p>
            <hr>
            <p>8. ¿Ha realizado cursos de telecomunicaciones? ¿Cuáles?</p>
            <p>{{$id->item_8}}</p>
            <hr>
            <p>9. ¿Tiene curso de trabajo en alturas?</p>
            <p>{{$id->item_9}}</p>
            <hr>
            <p>10. ¿Qué piensa de los trabajos en los que haya que viajar?</p>
            <p>{{$id->item_10}}</p>
            <hr>
            <p>11. ¿Tiene licencia de conducción?</p>
            <p>{{$id->item_11}}</p>
            <hr>
            <p>12. ¿Por qué crees que deberíamos contratarte?</p>
            <p>{{$id->item_12}}</p>
            <hr>
            <p>13. ¿Por qué salió de su último trabajo?</p>
            <p>{{$id->item_13}}</p>
            <hr>
            <p>14. ¿Qué tiene usted para ofrecerle a esta organización?</p>
            <p>{{$id->item_14}}</p>
            <hr>
            <p>15. ¿Cuál es su aspiración salarial?</p>
            <p>{{$id->item_15}}</p>
            <hr>
            <p>16. ¿Trabaja bien con otras personas? Dé un ejemplo?</p>
            <p>{{$id->item_16}}</p>
            <hr>
            <p>17. ¿Se considera usted una persona que sabe seguir instrucciones? Dé un ejemplo?</p>
            <p>{{$id->item_17}}</p>
            <hr>
            <p>18. ¿Se considera una persona organizada? ¿Por qué?</p>
            <p>{{$id->item_18}}</p>
            <hr>
            <p>19. ¿Dígame una meta personal que quiere lograr?</p>
            <p>{{$id->item_19}}</p>
            <hr>
            <p>20. ¿Se considera y es usted una persona totalmente honesta?</p>
            <p>{{$id->item_20}}</p>
            <hr>
            <p>21. ¿Cree usted que es capaz de trabajar bajo presión?</p>
            <p>{{$id->item_21}}</p>
            <hr>
            <p>22. ¿Es usted una persona comprometida con su trabajo?</p>
            <p>{{$id->item_22}}</p>
            <hr>
            <p>23. ¿Está usted de acuerdo con el salario estipulado por la empresa para el cargo al que está aspirando?</p>
            <p>{{$id->item_23}}</p>
            <hr>
            <p>Observaciones</p>
            <p>{{$id->observations}}</p>
            <hr>
            <h4>Validación de referencias laborales</h4>
            <hr>
            @foreach ($id->references as $item)
                <div class="row">
                    <div class="col-md-4">
                        <p>Empresa</p>
                        <p>{{$item->company_r}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Fecha</p>
                        <p>{{$item->date_r}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Persona</p>
                        <p>{{$item->name_r}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Tiempo de servicio</p>
                        <p>{{$item->service_time_r}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Concepto</p>
                        <p>{{$item->concept_r}}</p>
                    </div>
                    <div class="col-md-4">
                        <p>¿Lo recomienda?</p>
                        <p>{{$item->recommend}}</p>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        Firmado electrónicamente por el auditor o coordinador
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->responsable->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->responsable->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->responsable->name}}</strong> en rol de {{$id->responsable->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                        @if ($id->approver)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$id->approver->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$id->approver->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$id->approver->name}}</strong> en rol de {{$id->approver->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            @if (Auth::user()->hasPermissionTo('Aprobar entrevistas') && $id->state == 0)
            <a class="btn btn-sm btn-primary" href="{{ route('interview_approve',$id->id) }}"
                onclick="event.preventDefault();
                            document.getElementById('interview_approve').submit();">
                Aprobar
            </a>
            <a class="btn btn-sm btn-danger" href="{{ route('interview_not_approve',$id->id) }}"
                onclick="event.preventDefault();
                            document.getElementById('interview_not_approve').submit();">
                No aprobar
            </a>
            
            <form id="interview_approve" action="{{ route('interview_approve',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            <form id="interview_not_approve" action="{{ route('interview_not_approve',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            @endif
        </div>
    </div>
</section>
@endsection
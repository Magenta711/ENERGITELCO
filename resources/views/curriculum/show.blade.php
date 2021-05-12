@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Mostrar hoja de vida <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">hojas de vida</a></li>
        <li class="active">Mostrar hoja de vida</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
            <div class="box-tools">
                <a href="{{route('curriculums')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>A) Documentación para ingreso del trabajador</h4>
            <h5><b>Información del usuario</b></h5>
            <div class="row">
                <div class="col-md-4">
                    <p><b>Nombre</b></p>
                    <p>{{$id->register->name}}</p>  
                </div>
                <div class="col-md-4">
                    <p><b>Correo electrónico</b></p>
                    <p>{{$id->register->email}}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Número de documento</b></p>
                    <p>{{$id->register->document}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p><b>Dirección</b></p>
                    <p>{{$id->register->address}}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Edad</b></p>
                    <p>{{$id->register->age}}</p>
                </div>
                <div class="col-md-4">
                    <p><b>Estado civil</b></p>
                    <p>{{$id->register->marital_status}}</p>
                </div>
            </div>
            <hr>
            <h5>Archivos</h5>
            @php
                $i = 1;
            @endphp
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Hoja de vida','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificados de estudio (BACHILLERATO, TECNICO, CURSOS Y/O ESTUDIOS SUPERIORES)','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Fotocopia de cédula','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Fotocopia de libreta militar','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Fotocopia de la tarjeta profecional o de la matrícula profesional conte','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Fotocopia de licencia de condución','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Foto fondo blanco, traje formal','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la procuraduria','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la policia nacional','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Dos referencias laborales','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Dos referencias personales','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de revisión en el SIMIT','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Carta de su actual fondo de pensiones (Si aplica)','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Carta de su actual fondo de EPS (Si aplica)','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de apertura de cuenta de Bancolombia','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Concepto de examenes médicos ocupacionales','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Concepto de examenes sustancias psicoactivas','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Afiliación a la ARL','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Afiliación a la EPS','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Afiliación a AFP','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Afiliación a cesantías','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Afiliación a caja de compensación','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de curso de trabajo seguro en alturas','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de coordinador de trabajo en alturas','id' => $id->register->curriculum])
            <hr>
            @include('curriculum.include.show_file',['num'=>$i++,'label'=>'Certificado de curso de virtual de 50 horas sobre SST','id' => $id->register->curriculum])
            <hr>
            @if ($id->register && $id->register->contracts)
                <div class="row">
                    @foreach ($id->register->contracts as $contract)
                        @include('curriculum.include.signature_contract',['sema' => 1])
                    @endforeach
                </div>
                <hr>
            @endif
            <hr>
            @foreach ($documents as $item)
                @include('curriculum.include.signature',['item' => $item, 'sema' => 1])
                <hr>
            @endforeach
            <h4>B) Declaración sobre familiares que laboren con claro y otros</h4>
            <div class="form-group">
                <label for="has_familiary">¿Tiene el trabajador familiares que trabajen con Claro? Si la respuesta anterior es positiva relacione lo siguiente:</label>
                <p>{{($id->has_familiary == '1') ? 'Si' : 'No' }}</p>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nombre</label>
                        <p>{{$id->name_r}}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="parent">Parentesco</label>
                        <p>{{$id->parent}}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="position_id_r">Cargo</label>
                        <p>{{($id->position) ? $id->position->name : ''}}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="has_limitation">¿Tiene o ha tenido alguna limitación osteomuscular? (Relacionada con los músculos, los huesos, los tendones, los ligamentos, las articulaciones y los cartílagos)</label>
                <p>{{($id->has_limitation == '1') ? 'Si' : 'No'}}</p>
            </div>
            <hr>
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
            @if ($id->state == 'Sin aprobar' && Auth::user()->hasPermissionTo('Aprobar hojas de vida'))
                <a class="btn btn-sm btn-primary" href="{{ route('curriculum_approve',$id->id) }}"
                onclick="event.preventDefault();
                            document.getElementById('curriculum_approve').submit();">
                Aprobar
            </a>
            <a class="btn btn-sm btn-danger" href="{{ route('curriculum_not_approve',$id->id) }}"
                onclick="event.preventDefault();
                            document.getElementById('curriculum_not_approve').submit();">
                No aprobar
            </a>
            
            <form id="curriculum_approve" action="{{ route('curriculum_approve',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            <form id="curriculum_not_approve" action="{{ route('curriculum_not_approve',$id->id) }}" method="POST" style="display: none;">
                @csrf
                @method('PUT')
            </form>
            @endif
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/show_file.js')}}"></script>
@endsection
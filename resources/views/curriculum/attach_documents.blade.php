@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Adjunto de documentos</div>
                    <form method="POST" action="{{ route('curriculum_attach',$id->id) }}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="center">
                                <h4>Información general</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Nombre completo</label>
                                        <input type="text" name="name" value="{{ $id->register->name ?? old('name') }}" id="name" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emergency_contact">Contacto de emergencia</label>
                                        <input type="text" name="emergency_contact" value="{{ $id->register->emergency_contact ?? old('emergency_contact') }}" id="emergency_contact" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emergency_contact_number">Número de contacto de emergencia</label>
                                        <input type="text" name="emergency_contact_number" value="{{ $id->register->emergency_contact_number ?? old('emergency_contact_number') }}" id="emergency_contact_number" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="eps">EPS</label>
                                        <input type="text" name="eps" value="{{ $id->register->eps ?? old('eps') }}" id="eps" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pension">Pensión</label>
                                        <input type="text" name="pension" value="{{ $id->register->pension ?? old('pension') }}" id="pension" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="rh">RH</label>
                                        <input type="text" name="rh" value="{{ $id->register->rh ?? old('rh') }}" id="rh" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="shirt_size">Talla camisa</label>
                                        <input type="text" name="shirt_size" value="{{ $id->register->shirt_size ?? old('shirt_size') }}" id="shirt_size" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pant_size">Talla pantalón</label>
                                        <input type="text" name="pant_size" value="{{ $id->register->pant_size ?? old('pant_size') }}" id="pant_size" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="shoe_size">Talla calzado</label>
                                        <input type="text" name="shoe_size" value="{{ $id->register->shoe_size ?? old('shoe_size') }}" id="shoe_size" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="height">Estatura</label>
                                        <input type="text" name="height" value="{{ $id->register->height ?? old('height') }}" id="height" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="weight">Peso</label>
                                        <input type="text" name="weight" value="{{ $id->register->weight ?? old('weight') }}" id="weight" class="form-control">
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_save" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Guardar datos</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro que solo desea guardar?
                                                <small>Luego podra entrear al mismo link a modificar datos</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <input name="buttom" type="submit" class="btn btn-primary" value="Guardar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_send" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Enviar información</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro que desea enviar la información?
                                                <small>Este link quedará deshabilitado para su uso</small>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <input name="buttom" type="submit" class="btn btn-primary" value="Enviar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </form>
                    <hr>
                    <h4>A) Documentación para ingreso del trabajador</h4>
                    @include('curriculum.include.upload',['num'=>1,'label'=>'Hoja de vida'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>2,'label'=>'Certificados de estudio (BACHILLERATO, TÉCNICO,
                    CURSOS Y/O ESTUDIOS SUPERIORES)'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>3,'label'=>'Fotocopia de cédula'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>4,'label'=>'Fotocopia de libreta militar'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>5,'label'=>'Fotocopia de la tarjeta profecional o de la matrícula profesional conte'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>6,'label'=>'Fotocopia de licencia de condución','hasDate'=>true])
                    <hr>
                    @include('curriculum.include.upload',['num'=>7,'label'=>'Foto 3*4, fondo blanco, traje formal (carnet)'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>8,'label'=>'Certificado de antecedentes emitido por la procuraduría'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>9,'label'=>'Certificado de antecedentes emitido por la policia nacional'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>10,'label'=>'Dos referencias laborales'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>11,'label'=>'Dos referencias personales'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>12,'label'=>'Certificado de revisión en el SIMIT'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>13,'label'=>'Carta de su actual fondo de pensiones (Si aplica)'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>14,'label'=>'Carta de su actual fondo de EPS (Si aplica)'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>15,'label'=>'Certificado de apertura de cuenta de Bancolombia'])
                    <hr>
                    @include('curriculum.include.upload',['num'=>16,'label'=>'Certificado de curso de trabajo seguro en alturas','hasDate'=>true])
                    <hr>
                    @include('curriculum.include.upload',['num'=>17,'label'=>'Certificado de coordinador de trabajo en alturas'])
                </div>
            </div>
            <div class="card-footer">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_save">Guardar</button>
                        <input type="submit" value="Enviar" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_send">
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/upload.js') }}" defer></script>
@endsection

@section('css')
    <style>
        .mailbox-attachment-info {
            padding: 10px;
            background: #f4f4f4;
        }
        .mailbox-attachment-icon {
            text-align: center;
            font-size: 65px;
            color: #666;
            padding: 20px 10px;
            display: block;
        }
        .mailbox-attachment-icon.has-img {
            padding: 0;
        }
        .mailbox-attachment-name {
            font-weight: bold;
            color: #666;
        }
        .mailbox-attachment-size {
            color: #999;
            font-size: 12px;
        }
        .fa-file-pdf:before {
            content: "\f1c1";
        }
        .hide {
            display: none;
        }
    </style>
@endsection
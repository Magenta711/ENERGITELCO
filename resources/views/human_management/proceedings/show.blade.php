@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Ver actas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Actas</a></li>
        <li class="active">Ver actas</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ver acta</h3>
                <div class="box-tools">
                    {{-- @can($text_permission_create) --}}
                        <a href="{{route('proceeding')}}" class="btn btn-sm btn-primary">Volver</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="box-body">
                <h4>Asistentes</h4>
                @php
                    $i = 0;
                    $requireSinger = false;
                @endphp
                @foreach ($id->users as $user)
                    @if ($i < $id->assistant)
                        <div id="origen_assistants" class="row">
                            <div class="col-sm-4">
                                <label for="assistants_id_0">Cedula</label>
                                <p>{{$user->cedula}}</p>
                            </div>
                            <div class="col-sm-4">
                                <label for="assistants_name_0">Nombre</label>
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="col-sm-4">
                                <label for="assistants_position_0">Cargo</label>
                                <p>{{$user->position->name}}</p>
                            </div>
                        </div>
                    @endif
                    @php
                        if ($user->id == auth()->id()) {
                            $requireSinger = true;
                        }
                        $i++;
                    @endphp
                @endforeach
                <hr>
                <h4>Invitatos</h4>
                @php
                    $i = 0;
                    $total = $id->assistant + $id->guest;
                @endphp
                @foreach ($id->users as $user)
                    @if ($i >= $id->assistant && $i < $total)
                        <div id="origen_guest" class="row">
                            <div class="col-sm-4">
                                <label for="assistants_id_0">Cedula</label>
                                <p>{{$user->cedula}}</p>
                            </div>
                            <div class="col-sm-4">
                                <label for="assistants_name_0">Nombre</label>
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="col-sm-4">
                                <label for="assistants_position_0">Cargo</label>
                                <p>{{$user->position->name}}</p>
                            </div>
                        </div>
                    @endif
                    @php
                        $i++;
                    @endphp    
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">Ciudad</label>
                            <p>{{$id->city}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <p>{{$id->date}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="time_start">Hora de inicio</label>
                            <p>{{$id->time_start}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="time_end">Hora final</label>
                            <p>{{$id->time_end}}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Lugar</label>
                            <p>{{$id->place}}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="affair">Motivo</label>
                            <p>{{$id->affair}}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    {!! $id->theme !!}
                </div>
                <hr>
                <div class="form-group">
                    {!!$id->development!!}
                </div>
                <hr>
                <div id="destino_commitment">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Funcionario</th>
                                <th>Compromiso</th>
                                <th>Fecha de ejecución</th>
                            </tr>
                            <tr>
                                @foreach ($id->commitments as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->commitment}}</td>
                                    <td>{{$item->date_execution}}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    @foreach ($id->signaturebles as $user)
                    @php
                        if ($user->id == auth()->id())
                            $requireSinger = false;
                    @endphp
                        <div class="col-md-4">
                            <h6>Firmado electrónicamente por asistente</h6>
                            <div class="row">
                                <div class="col-md-6"><strong>Nombre: </strong>{{$user->name}}</div>
                                <div class="col-md-6"><strong>Cédula: </strong>{{$user->cedula}}</div>
                            </div>
                            <p>Solicitud aprobada y firmada electrónicamente por <strong>{{$user->name}}</strong> en rol de {{$user->getRoleNames()[0]}} Energitelco, con conocimiento de funciones y contenido del presente documento. Se cumple Ley 527 de 1999 y Decreto 19 de 2012</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                @if ($requireSinger)
                <form action="{{route('proceeding_signature',$id->id)}}" method="POST">
                    @csrf
                    @method('patch')
                    <button class="btn btn-sm btn-primary">Firmar</button>
                </form>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('css')
{{-- wysihtml5-supported --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
@endsection

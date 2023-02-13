@php
    function getLastRevission()
    {
    }
@endphp



@extends('lte.layouts')
@section('content')
    <section class="content-header">
        <h1>
            REVISIÓN DE ASIGNACIÓNES DE PERSONAL
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Ejecución de obras</a></li>
            <li class="active">Revisión de asignación</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <form action="{{ route('review_personal_store') }}" method="post">
                @csrf

                <input type="hidden" value="{{ $user->id }}" name="id_user">
                <input type="hidden" value="{{ auth()->user()->id }}" name="id_revisor">
                <div class="box-header">
                    <h3 class="box-title">Lista de revisión de Kits</h3>
                    <div class="box-tools">
                        <a href="{{ route('kits_review') }}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serial">Asignado</label>
                                {{-- <p>{{$user->name}}</p> --}}
                                <input type="text" readonly name="name1" value="{{ $user->name }}"
                                    class="form-control controlName" id="nombre1" placeholder="Nombre">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha revisión</label>
                                <input type="date" name="date_review" value="" class="form-control controlName"
                                    id="date_review">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_id">Revisor</label>
                                {{-- <p>{{ auth()->user()->name }}</p>   --}}
                                <input type="text" readonly name="" value="{{ auth()->user()->name }}"
                                    class="form-control controlName" id="user_id" placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                    @php
                        $incre_kit = 0;
                    @endphp
                    @foreach ($user->assigment_kits as $assigments)
                        <input type="hidden" readonly name="kit_id[{{ $incre_kit }}]"
                            value="{{ $assigments->kit_asignado->id }}">
                        <div class="panel box box">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion"
                                        href="#collapse_{{ $assigments->id }}">
                                        {{ $assigments->kit_asignado->nombre }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_{{ $assigments->id }}" class="panel-collapse collapse">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Responsable del kit</label>
                                        <input type="text" readonly name="name[{{ $incre_kit }}]"
                                            value="{{ $assigments->kit_asignado->responsable->name }}"
                                            class="form-control controlName" id="name" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date">Fecha de asignación</label>
                                        {{-- <p>{{$assigments->created_at->format('Y--d')}}</p> --}}
                                        <input type="date" value="{{ $assigments->created_at->format('Y-m-d') }}"
                                            id="date" class="form-control controlName" disabled>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <div class="box-body">
                                    <hr>
                                    <h3>Implementos Obligatorios</h3>

                                    @php
                                        $incre_tool_kit = 0;
                                    @endphp
                                    @foreach ($assigments->kit_asignado->tools as $tool)
                                        <input type="hidden" readonly
                                            name="herramienta_id[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                            value="{{ $tool->id }}">
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-4 mb-3">
                                                <Strong>Implemento</Strong><br>
                                                {{-- <p>{{ $tool->nombre }}</p> --}}
                                                <input type="text"
                                                    name="item[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="item_{{ $incre_tool_kit }}" value="{{ $tool->nombre }}"
                                                    class="form-control tools_name" disabled>
                                            </div>
                                            <div class="col-md-1 col-sm-4">
                                                <label for="amount_{{ $incre_tool_kit }}">Cantidad</label>
                                                {{-- <p>{{ $tool->cantidad}}</p> --}}
                                                <input type="text"
                                                    name="amount[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="amount_{{ $incre_tool_kit }}" value="{{ $tool->cantidad }}"
                                                    class="form-control tools_amount" disabled>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <label for="marca_{{ $incre_tool_kit }}">Marca</label>
                                                {{-- <p>{{ $tool->marca}}</p> --}}
                                                <input type="text"
                                                    name="marca[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="marca_{{ $incre_tool_kit }}" value="{{ $tool->marca }}"
                                                    class="form-control tools_branch" disabled>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <label for="status_tools">Estado</label>
                                                <select name="status_tools[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="status_tools" class="form-control selectorkits">
                                                    <option value="tool_state_1">Mal Estado</option>
                                                    <option value="tool_state_2">Buen Estado</option>
                                                    <option value="tool_state_3">Reemplazado</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12 mb-1">
                                                <label for="observacion_{{ $incre_tool_kit }}">Observaciones
                                                    (Historial)
                                                </label>
                                                {{-- <p>{{ $tool->Observaciones}}</p> --}}
                                                <textarea name="observacion_tool[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="observacion_{{ $incre_tool_kit }}" cols="30" rows="2" class="form-control tools_observation">{{ $tool->Observaciones }}</textarea>
                                            </div>
                                        </div>
                                        @php
                                            $incre_tool_kit++;
                                        @endphp
                                    @endforeach
                                    @php
                                        $incre_tool_kit = 0;
                                    @endphp
                                    <hr>
                                    <h3>Implementos extras</h3>
                                    @foreach ($assigments->extra as $tool_add)
                                        <input type="hidden" readonly
                                            name="herramienta_extra_id[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                            value="{{ $tool_add->id }}">
                                        <div class="form-group row">
                                            <div class="col-md-2 col-sm-4 mb-3">
                                                <Strong>Implemento</Strong><br>
                                                {{-- <p>{{ $tool_add->nombre }}</p> --}}
                                                <input type="text"
                                                    name="item[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="item_${ item }" value="{{ $tool_add->nombre }}"
                                                    class="form-control tools_name" disabled>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <label for="amount_{{ $incre_tool_kit }}">Cantidad</label>
                                                {{-- <p>{{ $tool_add->cantidad}}</p> --}}
                                                <input type="number"
                                                    name="amount[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    value="{{ $tool_add->cantidad }}" id="amount_{{ $incre_tool_kit }}"
                                                    class="form-control tools_amount" disabled>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <label for="marca_{{ $incre_tool_kit }}">Marca</label>
                                                {{-- <p>{{ $tool_add->marca}}</p> --}}
                                                <input type="text"
                                                    name="marca[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="marca_{{ $incre_tool_kit }}" value="{{ $tool_add->marca }}"
                                                    class="form-control tools_branch" disabled>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <label for="status_tools">Estado</label>
                                                <select name="status_tools_add[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="status_tools" class="form-control selectorkits">
                                                    <option value="value1" default>Mal Estado</option>
                                                    <option value="value2" selected>Buen Estado</option>
                                                    <option value="value3">Reemplazado</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-12 mb-1">
                                                <label for="observacion_{{ $incre_tool_kit }}">Observaciones
                                                    (Historial)
                                                </label>
                                                <textarea name="observacion_extra[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                    id="observacion_{{ $incre_tool_kit }}" cols="30" rows="2" class="form-control tools_observation">{{$tool_add->Observaciones }}</textarea>
                                                {{-- <textarea name="observacion[{{ $incre_kit }}][{{$incre_tool_kit}}]" id="observacion_{{$incre_tool_kit}}" cols="30" rows="2" class="form-control tools_observation">{{$tool_add->Observaciones}}</textarea>                                 --}}
                                            </div>
                                        </div>
                                        @php
                                            $incre_tool_kit++;
                                        @endphp
                                    @endforeach
                                    <hr>
                                    @if (isset($assigments->kit_asignado->review_kits))
                                        {{-- <div class="row"> --}}
                                            <div class="md">
                                                {{-- {{dd($assigments->kit_asignado->review_kits)}} --}}
                                                <div class="col-md-6">
                                                    @foreach ($assigments->kit_asignado->review_kits as $review_kit)
                                                        <div class="form-group row">
                                                            <p>-{{ $review_kit->comentario }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        {{-- </div> --}}
                                    @endif
                                    <div class="row">
                                        <div class="md">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="commentary">Comentarios, observaciones o descripción
                                                        general del Kit(Historial)</label>
                                                    <p></p>
                                                    <textarea name="commentary[{{ $incre_kit }}]" id="commentary" cols="30" rows="2"
                                                        class="form-control tools_observation"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $incre_kit++;
                        @endphp
                    @endforeach
                    <input type="submit" class="btn btn-sm btn-info btn-send">
                </div>
            </form>
        </div>
    </section>
@endsection

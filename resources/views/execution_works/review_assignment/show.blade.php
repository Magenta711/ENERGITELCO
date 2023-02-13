@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        ASIGNACIÓN DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Ver Kits</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <form action="{{ route('review_personal_store') }}" method="post">
            @csrf
            <div class="box-header">
                <h3 class="box-title">Lista de kits asignados</h3>
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
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_review">Fecha revisión</label>
                            {{-- <input type="date" id="date_review" name="date_review" value="{{ $review_tools->fecha_revision}}" class="form-control controlName" readonly> --}}
                                <p>{{ isset($review_tools->fecha_revision) ? $review_tools->fecha_revision : "" }} </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user_id">Revisor</label>
                            <p>{{ isset( $review_tools->revisor->name) ? $review_tools->fecha_revision : "" }}</p>
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
                                        <p>{{ $assigments->kit_asignado->responsable->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date">Fecha de asignación</label>
                                    {{-- <p>{{$assigments->created_at->format('Y--d')}}</p> --}}
                                        <p>{{ $assigments->created_at->format('Y-m-d') }}</p>
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
                                                <p>{{ $tool->nombre }}</p>
                                        </div>
                                        <div class="col-md-1 col-sm-4">
                                            <label for="amount_{{ $incre_tool_kit }}">Cantidad</label>
                                            <p>{{ $tool->cantidad}}</p>
                                            {{-- <input type="text"
                                                name="amount[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="amount_{{ $incre_tool_kit }}" value="{{ $tool->cantidad }}"
                                                class="form-control tools_amount" disabled> --}}
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="marca_{{ $incre_tool_kit }}">Marca</label>
                                            <p>{{ $tool->marca}}</p>
                                            {{-- <input type="text"
                                                name="marca[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="marca_{{ $incre_tool_kit }}" value="{{ $tool->marca }}"
                                                class="form-control tools_branch" disabled> --}}
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
                                                id="observacion_{{ $incre_tool_kit }}" cols="30" rows="2" class="form-control tools_observation" disabled>{{ $tool->Observaciones }}</textarea>
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
                                            <input type="hidden"
                                                name="item[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="item_${ item }" value="{{ $tool_add->nombre }}"
                                                class="form-control tools_name" disabled>
                                                <p>{{ $tool_add->nombre }}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="amount_{{ $incre_tool_kit }}">Cantidad</label>
                                            {{-- <p>{{ $tool_add->cantidad}}</p> --}}
                                            <input type="hidden"
                                                name="amount[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                value="{{ $tool_add->cantidad }}" id="amount_{{ $incre_tool_kit }}"
                                                class="form-control tools_amount" disabled>
                                                <p>{{ $tool_add->cantidad }}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="marca_{{ $incre_tool_kit }}">Marca</label>
                                            {{-- <p>{{ $tool_add->marca}}</p> --}}
                                            <input type="hidden"
                                                name="marca[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="marca_{{ $incre_tool_kit }}" value="{{ $tool_add->marca }}"
                                                class="form-control tools_branch" disabled >
                                                <p>{{ $tool_add->marca }}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="status_tools">Estado</label>
                                            <select name="status_tools_add[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="status_tools" class="form-control selectorkits">
                                                <option value="Mal Estado" default>Mal Estado</option>
                                                <option value="Buen Estado" selected>Buen Estado</option>
                                                <option value="Reemplazado">Reemplazado</option>
                                            </select>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 col-sm-12 mb-1">
                                            <label for="observacion_{{ $incre_tool_kit }}">Observaciones
                                                (Historial)
                                            </label>
                                            <textarea name="observacion_extra[{{ $incre_kit }}][{{ $incre_tool_kit }}]"
                                                id="observacion_{{ $incre_tool_kit }}" cols="30" rows="2" class="form-control tools_observation" disabled>{{ $tool_add->Observaciones }}</textarea>
                                            {{-- <textarea name="observacion[{{ $incre_kit }}][{{$incre_tool_kit}}]" id="observacion_{{$incre_tool_kit}}" cols="30" rows="2" class="form-control tools_observation">{{$tool_add->Observaciones}}</textarea>                                 --}}
                                        </div>
                                    </div>
                                    @php
                                        $incre_tool_kit++;
                                    @endphp
                                @endforeach
                                <hr>
                                @if (isset($assigments->kit_asignado->review_kits))
                                <h4>Historial:</h4>
                                    {{-- <div class="row"> --}}
                                        <div class="md">
                                            {{-- {{dd($assigments->kit_asignado->review_kits)}} --}}
                                            <div class="col-md-6 col-sm-4">
                                                @foreach ($assigments->kit_asignado->review_kits as $review_kit)
                                                    <div class="form-group row">
                                                        <p>-{{ $review_kit->comentario }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    {{-- </div> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                    @php
                        $incre_kit++;
                    @endphp
                @endforeach
            </div>
        </form>
    </div>
</section>
@endsection

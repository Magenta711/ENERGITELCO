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
    <div class="row">
        <form action="{{ route('kits_assignment_update', $id->id)}}" method="post" id="form">
            @csrf
            {{method_field('PATCH')}}
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ver Kits</h3>
                        <div class="box-tools">
                            {{-- <a href="{{route('kits_edit',$id->id)}}" class="btn btn-sm btn-success btn-send">Editar</a> --}}
                            <a href="{{route('kits_assigment')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serial">Código</label>
                                    <input type="text" value="{{$id->kit_asignado->codigo}}" id="" name="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nombre del Kit</label>
                                    <input type="text" value="{{$id->kit_asignado->nombre}}" id="" name="" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user_id">Encargado</label>
                                    <input type="text" value="{{$id->responsable->name }}" id="" name="" class="form-control" disabled>
                                </div>
                            </div>
                            {{-- @foreach (  as ) --}}
                            {{-- @endforeach --}}
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="serial">Asignado</label>
                                    <input type="text" value="{{$id->asignado->name}}" id="" name="" class="form-control" disabled></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Fecha de asignación</label>
                                    <input type="text" value="{{$id->asignado->created_at}}" id="" name=""class="form-control" disabled></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user_id">Fecha de revisión</label>
                                    <input type="text" value="{{$id->kit_asignado->updated_at }}"  id="" name="" class="form-control" disabled></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="commentary">Comentarios, observaciones o descripción (Historial)</label>
                                    <p></p>
                                        <textarea name="observaciones" id="observacion_${item}" cols="30" rows="2" class="form-control tools_observation"></textarea>
                                </div>
                            </div>
                            {{-- @foreach (  as ) --}}
                            {{-- @endforeach --}}
                        </div>
                        <hr>
                        {{-- {{dd($id->kit_asignado->tools)}} --}}
                        <h3>Implementos Obligatorios:</h3>
                        <hr>
                        @foreach ($id->kit_asignado->tools as $tool)
                        <div class="form-group row">
                            <div class="col-md-2 col-sm-4 mb-3">
                                <Strong>Implemento</Strong><br>
                                <p>{{ $tool->nombre }}</p>
                            </div>
                            <div class="col-md-2 col-sm-4">
                                <label for="amount_${item}">Cantidad</label>
                                <p>{{ $tool->cantidad}}</p>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <label for="marca_${item}">Marca</label>
                                <p>{{ $tool->marca}}</p>
                            </div>
                            <div class="col-md-5 col-sm-12 mb-1">
                                <label for="observacion_${item}">Observaciones</label>
                                <p>{{ $tool->Observaciones}}</p>
                            </div>
                        </div>
                        @endforeach
                    <hr>
                    <h3>Implementos Extras:</h3>
                    <hr>
                    <div id="list_tools">
                        @if (old('item'))
                            @for ($i = 0; $i < count(old('item')); $i++)
                                <input type="hidden" name="item_id[{{$i}}]" value="{{old('item_id')[$i]}}" class="tools_id">
                                <div class="form-group row">
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <Strong>Implemento {{$i + 1}}</Strong><br>
                                        <input type="text" class="form-control tools_name" id="item_{{$i}}" name="item[{{$i}}]" value="{{ old('item')[$i] }}" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label for="amount_{{$i}}">Cantidad</label>
                                        <input type="number" class="form-control tools_amount" id="amount_{{$i}}" name="amount[{{$i}}]" value="{{ old('amount')[$i] }}" required>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <label for="marca_{{$i}}">Marca</label>
                                        <input type="text" class="form-control tools_branch" id="marca_{{$i}}" name="marca[{{$i}}]" value="{{ old('marca')[$i] }}">
                                    </div>
                                    <div class="col-md-5 col-sm-12 mb-1">
                                        <label for="observacion_{{$i}}">Observaciones</label>
                                        <textarea name="observacion[{{$i}}]" id="observacion_{{$i}}" cols="30" rows="2" class="form-control tools_observation">{{old('observacion')[$i]}}</textarea>
                                    </div>
                                </div>
                            @endfor
                        @else
                            @php
                                $i=0;
                            @endphp
                            @foreach ($id->extra as $tool_add)
                                <input type="hidden" name="item_id[{{$i}}]" value="{{$tool_add->id}}" class="tools_id">
                                <div class="form-group row">
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <Strong>Implemento {{$i + 1}}</Strong><br>
                                        <input type="text" class="form-control tools_name" id="item_{{$i}}" name="item[{{$i}}]" value="{{ $tool_add->nombre }}" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label for="amount_{{$i}}">Cantidad</label>
                                        <input type="number" class="form-control tools_amount" id="amount_{{$i}}" name="amount[{{$i}}]" value="{{ $tool_add->cantidad}}" required>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <label for="marca_{{$i}}">Marca</label>
                                        <input type="text" class="form-control tools_branch" id="marca_{{$i}}" name="marca[{{$i}}]" value="{{ $tool_add->marca}}">
                                    </div>
                                    <div class="col-md-5 col-sm-12 mb-1">
                                        <label for="observacion_{{$i}}">Observaciones</label>
                                        <textarea name="observacion[{{$i}}]" id="observacion_{{$i}}" cols="30" rows="2" class="form-control tools_observation">{{$tool_add->Observaciones}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">

                    </div>
                    <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i class="fa fa-plus"></i> Agregar</button>
                        <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i class="fa fa-minus"></i> Eliminar</button>
                    </div>
                    </div>
                    <div class="box-footer">
                        {{-- <input type="submit" value="enviar"> --}}
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Guardar cambios</button>
                        <!-- modal -->
                        <div class="modal fade new_documento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title">Confirmar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Está seguro que desea editar este Kit.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-sm btn-success" id="send" >Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



</section>
@endsection


@section('js')
    <script>
        let num_tools = {{ old('item') ? count(old('item')) : count($id->extra) }}
        let tools_values = []

        $('#send').click(function () {
            if (!validateForm()){
                $('.new_documento').modal('hide');
                Swal.fire({
                    title: '<strong>Alerta!</strong>',
                    icon: 'error',
                    html: 'Todos los campos de Implementos y la Cantidad son obligatorios'
                })
                return
            }

            $('.loader').show();
            $('#form').submit();
        })

        function validateForm() {
            return validateTools('.tools_name') && validateTools('.tools_amount')
        }

        function validateTools(className) {
            tools = $(className)
            if (tools.length) {
                for (let i = 0; i < tools.length; i++) {
                    if(!$(tools[i]).val())
                        return false
                }
            }else {
                return false
            }
            return true
        }

        $('#amount_tools').blur(function () {
            num_tools = $(this).val()
            updateTool();
        });

        function infoUser(element){
            let user_id = element.value;
            let user_name = $( '#name' + user_id ).val()
            let user_role = $( '#cargo' + user_id ).val()

            $('#nombre1').val(user_name);
            $('#rol1').val(user_role);
        }

        $('#btn_plus_tools').click(function () {
            num_tools++;
            console.log('num_tools',num_tools);
            updateTool();
        })

        $('#btn_minus_tools').click(function () {
            if (num_tools == 0) {
                return
            }
            num_tools--;
            updateTool();
        })

        function updateTool() {
            let html_tools = '';
            saveValuesToolsOld();
            for (let i = 1; i <= num_tools; i++) {
                value = tools_values[i - 1] ? tools_values[i - 1] : defaulValue();
                html_tools += generateItemTool(i,value);
            }
            $('#list_tools').html(html_tools);
        }

        function generateItemTool(item,value){
            return `
                <input type="hidden" name="item_id[${item}]" value="${value.id || 0}" id="item_id_${ item }" class="tools_id">
                <div class="form-group row">
                    <div class="col-md-2 col-sm-4 mb-3">
                        <Strong>Implemento ${item}</Strong><br>
                        <input type="text" name="item[${item}]" id="item_${ item }" value="${value.name}" class="form-control tools_name" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="amount_${item}">Cantidad</label>
                        <input type="number" name="amount[${item}]" value="${value.amount}" id="amount_${item}" class="form-control tools_amount" required>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <label for="marca_${item}">Marca</label>
                        <input type="text" name="marca[${item}]" id="marca_${item}" value="${value.branch}" class="form-control tools_branch">
                    </div>
                    <div class="col-md-5 col-sm-12 mb-1">
                        <label for="observacion_${item}">Observaciones</label>
                        <textarea name="observacion[${item}]" id="observacion_${item}" cols="30" rows="2" class="form-control tools_observation">${value.observation}</textarea>
                    </div>
                </div>
                <hr>
            `;
        }

        function saveValuesToolsOld(){
            let id = $('.tools_id');
            let names = $('.tools_name');
            let amounts = $('.tools_amount');
            let branchs = $('.tools_branch');
            let observations = $('.tools_observation');
            tools_values = []
            for (let i = 0; i < names.length; i++) {

                tools_values.push({
                    id : ids[i].value,
                    name : names[i].value,
                    amount : amounts[i].value,
                    branch : branchs[i].value,
                    observation : observations[i].value,
                })
            }

            console.log('tools_values',tools_values);
        }

        function defaulValue() {
            return {
                id: 0,
                name : '',
                amount : '',
                branch : '',
                observation : '',
            }
        }

    </script>
@endsection

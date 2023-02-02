@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Edición DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Editar Kits</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form action="{{ route('kits_update_all', $id->token)}}" method="post">
            @csrf
            @method('PUT')
            {{-- @method('PATCH') --}}
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Editar todos los Kits</h3>
                        <div class="box-tools">
                            <a href="{{route('kits')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Código</label>
                                    <input type="text" name="" id="codigo" value="{{$id->codigo}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="namekit">Nombre del nuevo Kit {{count($id->tools)}}</label>
                                    <input type="text" name="nombre" value="{{old('nombre', $id->nombre)}}" id="namekit" class="form-control">
                                 </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div  id="list_tools">
                            @if (old('item'))
        
                                @for ($i = 1; $i <= count(old('item')); $i++)
                                    <div class="form-group row">
                                        <div class="col-md-2 col-sm-4 mb-3">
                                            <Strong>Implemento {{$i}}</Strong><br>
                                            <input type="text" name="item[{{$i}}]" id="item_{{$i}}" value="{{ old('item')[$i] }}" class="form-control tools_name" required >
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="amount">Cantidad</label>
                                            
                                            <input type="text" name="amount[{{$i}}]" id="amount_{{$i}}" value="{{ old('amount')[$i] }}" class="form-control tools_amount" required>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="marca">Marca</label>
                                            <input type="text" name="marca[{{$i}}]" id="marca_{{$i}}" value="{{ old('marca')[$i] }}" class="form-control tools_branch">
                                        </div>
                                        <div class="col-md-5 col-sm-12 mb-1">
                                            <label for="observacion">Observaciones</label>
                                            <input type="text" name="observacion[{{$i}}]" id="observacion_{{$i}}" value="{{ old('observacion')[$i] }}" class="form-control tools_observation">
                                        </div>
                                    </div>
                                    <hr>
                                @endfor
                            @else
                                @php
                                    $i=0;
                                @endphp
                                @foreach ($id->tools as $tool)
                                    @php
                                        $i++;
                                    @endphp
                                    <div class="form-group row">
                                        <div class="col-md-2 col-sm-4 mb-3">
                                            <Strong>Implemento {{$i}}</Strong><br>
                                            <input type="text" name="item[{{$i}}]" id="item_{{$i}}" value="{{ $tool->nombre }}" class="form-control tools_name" required >
                                        </div>
                                        <div class="col-md-2 col-sm-4">
                                            <label for="amount">Cantidad</label>
                                            
                                            <input type="text" name="amount[{{$i}}]" id="amount_{{$i}}" value="{{ $tool->cantidad }}" class="form-control tools_amount" required>
                                        </div>
                                        <div class="col-md-3 col-sm-4">
                                            <label for="marca">Marca</label>
                                            <input type="text" name="marca[{{$i}}]" id="marca_{{$i}}" value="{{ $tool->marca }}" class="form-control tools_branch">
                                        </div>
                                        <div class="col-md-5 col-sm-12 mb-1">
                                            <label for="observacion">Observaciones</label>
                                            <input type="text" name="observaciones[{{$i}}]" id="observacion_{{$i}}" value="{{ $tool->Observaciones }}" class="form-control tools_observation">
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                    
                               
                            @endif

                        </div>
                    
                    <div class="row">
                        <div class="col-sm-12 align-self-end">
                            <button type="button" class="btn btn-sm btn-danger pull-right ml-2" id="btn_minus_tools"><i class="fa fa-minus"></i> Eliminar</button>
                            <button type="button" class="btn btn-sm btn-info pull-right mr-2" id="btn_plus_tools"><i class="fa fa-plus"></i> Agregar</button>
                        </div>
                        <div class="col-sm-12 align-self-end">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Guardar Cambios</button>
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
                                        <p>Está seguro que desea editar todos los Kits.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-sm btn-success btn-send" id="send" >Guardar</button>
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
        let num_tools = {{old('item') ? count(old('item')) : count($id->tools)}}
        let tools_values = []
        
      
        // function infoUser(element){
        //     let user_id = element.value;
        //     let user_name = $( '#name' + user_id ).val()
        //     let user_role = $( '#cargo' + user_id ).val()

        //     $('#nombre1').val(user_name);
        //     $('#rol1').val(user_role);
        // }
        
        $('#btn_plus_tools').click(function () {
            num_tools++;
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
                        <textarea name="observacion[${item}]" id="observacion_${item}" cols="30" rows="2" class="form-control tools_observation" value="Buen estado">${value.observation}</textarea>
                    </div>
                </div>
                <hr>
            `;
        }

        function saveValuesToolsOld(){
            let names = $('.tools_name');
            let amounts = $('.tools_amount');
            let branchs = $('.tools_branch');
            let observations = $('.tools_observation');
            tools_values = []
            for (let i = 0; i < names.length; i++) {
                
                tools_values.push({
                    name : names[i].value,
                    amount : amounts[i].value,
                    branch : branchs[i].value,
                    observation : observations[i].value,
                })
            }
        }

        function defaulValue() {
            return {
                name : '',
                amount : '',
                branch : '',
                observation : '',
            }
        }
    </script>
@endsection
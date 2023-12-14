@extends('lte.layouts')
@section('content')
    <section class="content-header">
        <h1>
            ASIGNACIÓN DE KITS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Ejecución de obras</a></li>
            <li class="active">Asignación de Kits</li>
        </ol>
    </section>

    @foreach ($usuarios as $usuario)
        <input type="hidden" disabled value="{{ $usuario->name }}" id="name{{ $usuario->id }}">
        <input type="hidden" disabled value="{{ $usuario->position->name }}" id="cargo{{ $usuario->id }}">
    @endforeach

    <section class="content">
        <div class="box">
            <form action="{{ route('kits_store') }}" method="post" enctype="multipart/form-data" autocomplete="off"
                id="form">
                @csrf
                <div class="box-header">
                    <h3 class="box-title">Creación de Kits</h3>
                    <div class="box-tools">
                        <a href="{{ route('kits') }}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <div class="box-body">

                    <p><small>Todo campo con <span class="text-danger">*</span> es <b>obligatorio.</b></small></p>

                    <h4>Encargado</h4>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="cedula1"><span class="text-danger">*</span> Número de documento</label>
                            <select onchange="infoUser(this)" name="responsable_id" id="cedula1"
                                class="form-control selectCedula">
                                <option value="" readonly selected></option>
                                @foreach ($usuarios as $usuario)
                                    <option {{ old('responsable_id') == $usuario->id ? 'selected' : '' }}
                                        value="{{ $usuario->id }}">{!! $usuario->cedula . '&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;' . $usuario->name !!} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="nombre1">Nombre completo funcionario</label>
                            <input type="text" readonly name="name1" value="{{ old('name1') }}"
                                class="form-control controlName" id="nombre1" placeholder="Nombre">
                        </div>
                        <div class="col-sm-4">
                            <label for="rol1">Rol autorizado</label>
                            <input type="text" readonly name="rol1" value="{{ old('rol1') }}"
                                class="form-control controlRol" id="rol1" placeholder="Rol">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="namekit"><span class="text-danger">*</span> Nombre del nuevo Kit</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" id="namekit"
                                class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="cantidad"><span class="text-danger">*</span> Cantidad</label>
                            <input type="number" name="cantidad" value="{{ old('cantidad') }}" id="cantidad"
                                class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label for="amount_tools"><span class="text-danger">*</span> Catidad de herramientas</label>
                            <input type="number" name="cantidad_herramientas" id="amount_tools" class="form-control"
                                value="{{ old('cantidad_herramientas') }}">
                        </div>
                    </div>
                    <hr>



                    <h4>Implementos obligatorios para el Kit:</h4>

                    <div id="list_tools">
                        @if (old('item'))
                            @for ($i = 0; $i < count(old('item')); $i++)
                                <div class="form-group row">
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <Strong><span class="text-danger">*</span> Implemento
                                            {{ $i }}</Strong><br>
                                        <input type="text" name="item[{{ $i }}]"
                                            id="item_{{ $i }}" value="{{ old('item')[$i] }}"
                                            class="form-control tools_name" required>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <label for="amount"><span class="text-danger">*</span> Cantidad</label>

                                        <input type="text" name="amount[{{ $i }}]"
                                            id="amount_{{ $i }}" value="{{ old('amount')[$i] }}"
                                            class="form-control tools_amount" required>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <label for="marca">Marca</label>
                                        <input type="text" name="marca[{{ $i }}]"
                                            id="marca_{{ $i }}" value="{{ old('marca')[$i] }}"
                                            class="form-control tools_branch">
                                    </div>
                                    <div class="col-md-5 col-sm-12 mb-1">
                                        <label for="observacion">Observaciones</label>
                                        <input type="text" name="observacion[{{ $i }}]"
                                            id="observacion_{{ $i }}" value="{{ old('observacion')[$i] }}"
                                            class="form-control tools_observation">
                                    </div>
                                </div>
                                <hr>
                            @endfor
                        @endif
                    </div>

                    <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">

                    </div>
                    <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-sm btn-info " id="btn_plus_tools"><i
                                class="fa fa-plus"></i> Agregar</button>
                        <button type="button" class="btn btn-sm btn-danger" id="btn_minus_tools"><i
                                class="fa fa-minus"></i> Eliminar</button>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target=".new_documento">Crear</button>
                    <!-- modal -->
                    <div class="modal fade new_documento" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Confirmar</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Está seguro que desea guardar este Kit.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-danger pull-left"
                                        data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-sm btn-success" id="send">Guardar</button>
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
        let num_tools = {{ old('item') ? count(old('item')) : 0 }}
        let tools_values = []

        $('#send').click(function() {
            if ($('.tools_name').length == 0) {
                console.log('holaa')
                Swal.fire({
                    title: '<strong>Alerta!</strong>',
                    icon: 'error',
                    html: 'El kit debe contener implementos obligatorios'
                })
                return
            } else if (!validateForm()) {
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
                    if (!$(tools[i]).val())
                        return false
                }
            } else {
                return false
            }
            return true
        }

        $('#amount_tools').blur(function() {
            num_tools = $(this).val()
            updateTool();
        });

        function infoUser(element) {
            let user_id = element.value;
            let user_name = $('#name' + user_id).val()
            let user_role = $('#cargo' + user_id).val()

            $('#nombre1').val(user_name);
            $('#rol1').val(user_role);
        }

        $('#btn_plus_tools').click(function() {
            num_tools++;
            $('#amount_tools').val(num_tools)
            updateTool();
        })

        $('#btn_minus_tools').click(function() {
            if (num_tools == 0) {
                return
            }
            num_tools--;
            $('#amount_tools').val(num_tools)
            updateTool();
        })

        function updateTool() {
            let html_tools = '';
            saveValuesToolsOld();
            for (let i = 0; i < num_tools; i++) {
                value = tools_values[i] ? tools_values[i] : defaulValue();
                html_tools += generateItemTool(i, value);
            }
            $('#list_tools').html(html_tools);
        }

        function generateItemTool(item, value) {
            return `
                <div class="form-group row">
                    <div class="col-md-2 col-sm-4 mb-3">
                        <Strong><span class="text-danger">*</span> Implemento ${item + 1}</Strong><br>
                        <input type="text" name="item[${item}]" id="item_${ item }" value="${value.name}" class="form-control tools_name" required>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <label for="amount_${item}"><span class="text-danger">*</span> Cantidad</label>
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

        function saveValuesToolsOld() {
            let names = $('.tools_name');
            let amounts = $('.tools_amount');
            let branchs = $('.tools_branch');
            let observations = $('.tools_observation');
            tools_values = []
            for (let i = 0; i < names.length; i++) {

                tools_values.push({
                    name: names[i].value,
                    amount: amounts[i].value,
                    branch: branchs[i].value,
                    observation: observations[i].value,
                })
            }

            console.log('tools_values', tools_values);
        }

        function defaulValue() {
            return {
                name: '',
                amount: '',
                branch: '',
                observation: '',
            }
        }
    </script>
@endsection

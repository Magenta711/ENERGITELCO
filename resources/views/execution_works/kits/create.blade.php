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

<section class="content">
    <div class="box">
        <form action="{{ route('kits_store') }}" method="post" enctype="multipart/form-data" autocomplete="off" id="form">
            @csrf
            <div class="box-header">
                <h3 class="box-title">Creación de Kits</h3>
                <div class="box-tools">
                    {{-- @can('Crear inventario de herramientas') --}}
                        <a href="{{route('kits')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="box-body">
                @include('execution_works.kits.include.form_create')
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Crear</button>
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
                                <p>Está seguro que desea guardar este Kit.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-sm btn-success" id="send" >Guardar</button>
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
        let num_tools = {{old('item') ? count(old('item')) : 0}}
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
                        <textarea name="observacion[${item}]" id="observacion_${item}" cols="30" rows="2" class="form-control tools_observation">${value.observation}</textarea>
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

            console.log('tools_values',tools_values);
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
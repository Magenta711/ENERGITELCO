@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento proyecto mintic <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li class="active">Crear</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title">Crear mantenimiento</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_maintenance', $id->id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{ route('mintic_maintenance_store', $id->id) }}" method="POST">
                @method('POST')
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type_format">Tipo de formato</label>
                                <select name="type_format" id="type_format" class="form-control">
                                    <option selected disabled></option>
                                    <option value="Mantenimiento correctivo">Mantenimiento correctivo</option>
                                    <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="num">N° de caso</label>
                                <input type="text" value="{{ old('num') }}" name="num" id="num"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Fecha</label>
                                <input type="date" value="{{ old('date') }}" name="date" id="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="collaborating_company">Empresa colaboradora</label>
                                <input type="text" value="{{ old('collaborating_company') }}"
                                    name="collaborating_company" id="collaborating_company" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Información general</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <input type="text" name="department" id="department" value="{{ $id->dep }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="municpality">Municipio</label>
                                <input type="text" name="municpality" id="municpality" value="{{ $id->mun }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="population">Centro poblado</label>
                                <input type="text" name="population" id="population" value="{{ $id->population }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Sede institución o caso especial</label>
                                <input type="text" name="name" id="name" value="{{ $id->name }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Id de beneficiario</label>
                                <input type="text" name="code" id="code" value="{{ $id->code }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_name">Nombre del responsable <small>(Responsable de la institución
                                        educativa / autoridad competente)</small></label>
                                <input type="text" name="responsable_name" id="responsable_name"
                                    value="{{ $id->rector_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_number">Número de contacto</small></label>
                                <input type="text" name="responsable_number" id="responsable_number"
                                    value="{{ $id->rector_number }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="responsable_email">Correo electrónico</small></label>
                                <input type="email" value="{{ old('responsable_email') }}" name="responsable_email"
                                    id="responsable_email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="prevent_block" style="display: none">
                        <h3>Actividades de mantenimiento preventivo</h3>
                        <div class="table-responsable">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>SAP</td>
                                        <td>Descripción</td>
                                        <td>SI</td>
                                        <td>NO</td>
                                        <td>N/A</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->sap }}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                                            <td>{!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->description }}{!! $activity->type == 1 ? '</b>' : '' !!}
                                            </td>
                                            <td><input type="radio" name="activity_status[{{ $activity->id }}]"
                                                    value="SI"></td>
                                            <td><input type="radio" checked name="activity_status[{{ $activity->id }}]"
                                                    value="NO"></td>
                                            <td><input type="radio" name="activity_status[{{ $activity->id }}]"
                                                    value="N/A"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                    <h3>Descripción de la falla / Hallazgos</h3>
                    <div class="form-group">
                        <textarea value="{{ old('fault_description') }}" name="fault_description" id="fault_description" cols="30"
                            rows="3" class="form-control"></textarea>
                    </div>
                    <h3>Declaración</h3>
                    <hr>
                    <h4>Datos de quien repara el servicio en el centro digital</h4>
                    {{-- Datos de quien recibe el centro digital (rector, docente, autoridad competente) --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_id">Funcionario</label>
                                <select name="receives_id" id="receives_id" class="form-control">
                                    <option value="" disabled selected></option>
                                    @foreach ($users as $usuario)
                                        <option {{ old('receives_id') == $usuario->id ? 'selected' : '' }}
                                            value="{{ $usuario->id }}">{!! $usuario->cedula . '&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;' . $usuario->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_name">Nombres y apellidos</label>
                                <input type="text" value="{{ old('receives_name') }}" name="receives_name"
                                    id="receives_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_position">Cargo</label>
                                <input type="text" value="{{ old('receives_position') }}" name="receives_position"
                                    id="receives_position" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_cc">Número de cédula</label>
                                <input type="text" value="{{ old('receives_cc') }}" name="receives_cc"
                                    id="receives_cc" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_tel">Número de teléfono o celular</label>
                                <input type="text" value="{{ old('receives_tel') }}" name="receives_tel"
                                    id="receives_tel" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receives_mail">Correo electrónico</label>
                                <input type="text" value="{{ old('receives_mail') }}" name="receives_mail"
                                    id="receives_mail" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h4>Datos del ingeniero de soporte NOC</h4>
                    {{-- Datos de quien repara el servicio en el centro digital --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_name">Nombres y apellidos</label>
                                <input type="text" value="{{ old('repair_name') }}" name="repair_name"
                                    id="repair_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="repair_position">Cargo</label>
                                <input type="text" value="{{ old('repair_position') }}" name="repair_position"
                                    id="repair_position" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ticket">Ticket, Si aplica</label>
                                <input type="text" value="{{ old('ticket') }}" name="ticket" id="ticket"
                                    class="form-control">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_cc">Número de cédula</label>
                       <input type="text" value="{{old('repair_cc')}}" name="repair_cc" id="repair_cc" class="form-control">
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_tel">Número de teléfono o celular</label>
                       <input type="text" value="{{old('repair_tel')}}" name="repair_tel" id="repair_tel" class="form-control">
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="form-group">
                       <label for="repair_mail">Correo electrónico</label>
                       <input type="text" value="{{old('repair_mail')}}" name="repair_mail" id="repair_mail" class="form-control">
                   </div>
               </div> --}}
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/$theme/bower_components/select2/dist/css/select2.min.css") }}">
@endsection

@section('js')
    <script src="{{ asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset('js/project/mintic/maintence/create.js') }}"></script>
@endsection

@section('js')
    <script>
        let num_tools = {{old('item') ? count(old('item')) : 0}}
        let tools_values = []

        // function validateForm() {
        //     return validateTools('.tools_name') && validateTools('.tools_amount')
        // }

        // function validateTools(className) {
        //     tools = $(className)
        //     if (tools.length) {
        //         for (let i = 0; i < tools.length; i++) {
        //             if(!$(tools[i]).val())
        //                 return false
        //         }
        //     }else {
        //         return false
        //     }
        //     return true
        // }

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

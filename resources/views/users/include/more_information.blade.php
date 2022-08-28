
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#information" data-toggle="tab">Información</a></li>
            <li><a href="#curriculim" data-toggle="tab">Hoja de vida</a></li>
            {{-- <li><a href="#interview" data-toggle="tab">Entrevista</a></li> --}}
            <li><a href="#attention_call" data-toggle="tab">Llamados de atención</a></li>
            @if ($id->state == 0)
                <li><a href="#settlement" data-toggle="tab">Liquidación</a></li>
            @endif
            <li><a href="#forms" data-toggle="tab">Formatos</a></li>
            @if ($id->minor_box)
                <li><a href="#historyMinorBox" data-toggle="tab">Historial caja menor</a></li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="information">
                @can('Ver toda la información de usuarios')
                    
                    <h4>Información general</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Nombre</b></p>
                            <p>{{$id->name}}</p>  
                        </div>
                        <div class="col-md-3">
                            <p><b>Número de documento</b></p>
                            <p>{{$id->cedula}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Teléfono</b></p>
                            <p>{{$id->telefono}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Correo electrónico</b></p>
                            <p>{{$id->email}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Dirección</b></p>
                            <p>{{$id->direccion}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Fecha de nacimiento</b></p>
                            <p>{{$id->register ? $id->register->date_birth : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Edad</b></p>
                            <p>{{$id->register ? $id->register->age : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Estado civil</b></p>
                            <p>{{$id->register ? $id->register->marital_status : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Lugar de residencia</b></p>
                            <p>{{$id->register ? $id->register->place_residence : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Barrio</b></p>
                            <p>{{$id->register ? $id->register->neighborhood : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Nacionalidad</b></p>
                            <p>{{$id->register ? $id->register->nationality : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Información de médica</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Pensión</b></p>
                            <p>{{$id->register ? $id->register->pension : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>EPS</b></p>
                            <p>{{$id->register ? $id->register->eps : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>ARL</b></p>
                            <p>{{$id->register ? $id->register->arl : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>RH</b></p>
                            <p>{{$id->register ? $id->register->rh : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Medidas</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Estatura</b></p>
                            <p>{{$id->register ? $id->register->height : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Peso</b></p>
                            <p>{{$id->register ? $id->register->weight : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Talla camisa</b></p>
                            <p>{{$id->register ? $id->register->shirt_size : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Talla pantalón</b></p>
                            <p>{{$id->register ? $id->register->pant_size : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Talla calzado</b></p>
                            <p>{{$id->register ? $id->register->shoe_size : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Información de contrato</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Cargo</b></p>
                            <p>{{$id->position->name}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Fecha de contrato</b></p>
                            <p>{{$id->register && $id->register->hasContract() ? $id->register->hasContract()->start_date : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Tipo de contrato</b></p>
                            <p>{{$id->register && $id->register->hasContract() ? $id->register->hasContract()->type_contract : 'N/A'}}</p>
                        </div>
                        @if ($id->register && $id->register->hasContract() && $id->register->hasContract()->type_contract == 'Definido')
                        <div class="col-md-3">
                            <p><b>Meses de contrato</b></p>
                            <p>{{$id->register && $id->register->hasContract() ? $id->register->hasContract()->months : 'N/A'}}</p>
                        </div>
                        @endif
                        <div class="col-md-3">
                            <p><b>Día de descanso</b></p>
                            <p>{{$id->register && $id->register->hasContract() ? $id->register->hasContract()->day_breack : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Información de contacto de emergencia</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Contacto de emergencia</b></p>
                            <p>{{$id->register ? $id->register->emergency_contact : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Número de contacto de emergencia</b></p>
                            <p>{{$id->register ? $id->register->emergency_contact_number : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    @if ($id->signature)
                    <h4>Firma física</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="img-signature" style="cursor: pointer"
                                    enctype="multipart/form-data">
                                    <picture>
                                        <img src="{{route('uploads',$id->signature)}}" class="img-fluid img-thumbnail"
                                            id="blah" alt="{{ $id->signature }}">
                                    </picture>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    @endif
                    <hr>
                    <h4>Información bancaria</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <p><b>Tipo de cuenta</b></p>
                            <p>{{$id->register ? $id->register->type_bank_account : 'N/A'}}</p>
                        </div>
                        <div class="col-md-3">
                            <p><b>Número de cuenta</b></p>
                            <p>{{$id->register ? $id->register->bank_account : 'N/A'}}</p>
                        </div>
                    </div>
                    <hr>
                    @if ($id->register && $id->register->contracts)
                        <div class="row">
                            @foreach ($id->register->contracts as $contract)
                                @if ($contract->status == 1)
                                    @include('curriculum.include.signature_contract',['sema' => 1])
                                @endif
                            @endforeach
                        </div>
                        <hr>
                    @endif
                @endcan
                @cannot('Ver toda la información de usuarios')
                    No tienes permiso para esta vista
                @endcannot
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="curriculim">
                @can('Ver hojas de vida')
                    @if ($id->register && $id->register->curriculum)
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
                    @foreach ($documents as $item)
                        @include('curriculum.include.signature',['item' => $item, 'sema' => 1])
                        <hr>
                    @endforeach
                    @else
                        <small>No cuenta con hoja de vida en el sistema</small>
                    @endif
                    
                @endcan
                @cannot('Ver hojas de vida')
                    No tienes permiso para esta vista
                @endcannot
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="interview">
                @can('Lista de llamados de atención')
                    @include('attention_call.include.table',['attention_calls' => $id->attention_call])
                @endcan
                @cannot('Lista de llamados de atención')
                    No tienes permiso para esta vista 
                @endcannot
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="attention_call">
                @can('Lista de llamados de atención')
                    @include('attention_call.include.table',['attention_calls' => $id->attention_call])
                @endcan
                @cannot('Lista de llamados de atención')
                    No tienes permiso para esta vista
                @endcannot
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="forms">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><a href="#tab_7-2" data-toggle="tab">Solicitud de permiso laboral o notificación de incapacidad médica<span class="label label-primary">{{count($id->works7)}}</span></a></li>
                        <li><a href="#tab_6-2" data-toggle="tab">Lista de verificación para el mantenimiento de los computadores<span class="label label-primary">{{count($id->works6)}}</span></a></li>
                        <li><a href="#tab_5-2" data-toggle="tab">Entrega de dotación personal<span class="label label-primary">{{count($id->works5)}}</span></a></li>
                        <li><a href="#tab_4-2" data-toggle="tab">Revisión y asignación de herramientas<span class="label label-primary">{{count($id->works4)}}</span></a></li>
                        <li><a href="#ta_3-2"b data-toggle="tab">Inspección detallada de vehículos<span class="label label-primary">{{count($id->works3)}}</span></a></li>
                        <li><a href="#tab_2-2" data-toggle="tab">Inspección y protección contra caídas<span class="label label-primary">{{count($id->works2)}}</span></a></li>
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">Permisos de trabajo<span class="label label-primary">{{count($id->works1)}}</span></a></li>
                        <li class="pull-left header"></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            @can('Consultar permisos de trabajo')
                                <div class="table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works1 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('work_permit_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar permisos de trabajo')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2-2">
                            @can('Consultar inspecciones de equipos de protección contra caídas')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works2 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('fall_protection_equipment_inspection_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar inspecciones de equipos de protección contra caídas')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3-2">
                            @can('Consultar inspecciones detalladas de vehículos')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works3 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('detailed_inspection_vehicles_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar inspecciones detalladas de vehículos')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_4-2">
                            @can('Consultar revisión y asignación de herramientas')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works4 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('detailed_inspection_vehicles_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar revisión y asignación de herramientas')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_5-2">
                            @can('Consultar entrega de dotación personal')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works5 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('delivery_staffing_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar entrega de dotación personal')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_6-2">
                            @can('Consultar listas de verificación para el mantenimiento de los computadores')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works6 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('checklist_computer_maintenance_show',[6,$trabajo->id])}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar listas de verificación para el mantenimiento de los computadores')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_7-2">
                            @can('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica')
                                <div class="box-body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Código del formulario</th>
                                                <th scope="col">Responsable del Trabajo</th>
                                                <th scope="col">Fecha de la solicitud</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($id->works7 as $trabajo)
                                                    <tr class="{{($id->getRoleNames()[0] == 'Administrador' || $trabajo->coordinador == $id->id) ? 'table-active' : ''}}">
                                                        <th>{{$trabajo->codigo_formulario}}-{{ $trabajo->id }}</th>
                                                        <td>{{$trabajo->responsableAcargo->name}}</td>
                                                        <td>{{ $trabajo->created_at }}</td>
                                                        <td>
                                                            <a href="{{route('work_permits_notifications_medical_incapacity_show',$trabajo->id)}}" class="btn btn-sm btn-success">Ver</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endcan
                            @cannot('Consultar solicitud de permisos laborales o notificaciones de incapacidad médica')
                                No tienes permiso para esta vista
                            @endcannot
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
            <!-- /.tab-pane -->
            @if ($id->state == 0)
                <div class="tab-pane" id="settlement">
                    <h3>Adjuntos</h3>
                    <div class="row">
                        {{-- Letters --}}
                        @if ($id->register && $id->register->letters)
                            @foreach ($id->register->letters as $item)
                                @if ($item->status == 1)
                                    <div class="col-md-3">
                                        <span class="mailbox-attachment-icon" id="icon">
                                            <div id="type">
                                                <i class="fa fa-file-pdf"></i>
                                            </div>
                                        </span>
                                        <div class="mailbox-attachment-info">
                                            <p class="mailbox-attachment-name"><i class="fa fa-paperclip"></i><span style="overflow-wrap: break-word;" id="name">{{$item->file->name}}</span></p>
                                            <span class="mailbox-attachment-size">
                                                {{$item->file->size}}
                                                <span id="size"></span>
                                                <a target="_black" href="/storage/end_work/{{$item->file->name}}" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            @endif
            @if ($id->minor_box)
                <div class="tab-pane" id="historyMinorBox">
                    <h3>Historial de caja menor</h3>
                    <p>{!! str_replace("\n", '</br>', addslashes($id->minor_box->history)) !!}</p>
                </div>
            @endif
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
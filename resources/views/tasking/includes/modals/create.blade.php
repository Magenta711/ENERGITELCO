<div class="modal fade" id="create-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Crear programación</h4>
            </div>
            <form action="{{route('tasking_store')}}" method="post">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="date_start">Fecha de salida</label>
                                <input type="datetime-local" name="date_start" id="date_start" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="users">Funcionarios</label>
                                <select name="users[]" id="users" disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($users as $user)
                                        <option id="option_user_{{$user->id}}" data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipality">Municipio</label>
                                <select name="municipality" id="municipality" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option data-select2-id="ANTIOQUIA" value="ANTIOQUIA">ANTIOQUIA</option>
                                    <option data-select2-id="CALDAS" value="CALDAS">CALDAS</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="department">Departamento</label>
                                <select name="department" id="department" disabled class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ABEJORRAL" value="ABEJORRAL">ABEJORRAL</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ABRIAQUÍ" value="ABRIAQUÍ">ABRIAQUÍ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ALEJANDRÍA" value="ALEJANDRÍA">ALEJANDRÍA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="AMAGA" value="AMAGA">AMAGA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="AMALFI" value="AMALFI">AMALFI</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ANDES" value="ANDES">ANDES</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ANGOSTURA" value="ANGOSTURA">ANGOSTURA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ANORI" value="ANORI">ANORI</option>
                                    <option class="option-department CALDAS" data-select2-id="ARANZAZU" value="ARANZAZU">ARANZAZU</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ARBOLETES" value="ARBOLETES">ARBOLETES</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ARGELIA" value="ARGELIA">ARGELIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="BARBOSA" value="BARBOSA">BARBOSA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="BETULIA" value="BETULIA">BETULIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="BRICEÑO" value="BRICEÑO">BRICEÑO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="BURITICÁ" value="BURITICÁ">BURITICÁ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="CACERES" value="CACERES">CACERES</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="CAMPAMENTO" value="CAMPAMENTO">CAMPAMENTO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="CAÑASGORDAS" value="CAÑASGORDAS">CAÑASGORDAS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="CARMEN DE VIVORAL" value="CARMEN DE VIVORAL">CARMEN DE VIVORAL</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="CAROLINA" value="CAROLINA">CAROLINA</option>
                                    <option class="option-department CALDAS" data-select2-id="Chinchina" value="Chinchina">Chinchina</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="DABEIDA" value="DABEIDA">DABEIDA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="DON_MATIAS" value="DON MATIAS">DON MATIAS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="EL_BAGRE" value="EL BAGRE">EL BAGRE</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="EL_CARMEN_DE_VIBORAL" value="EL CARMEN DE VIBORAL">EL CARMEN DE VIBORAL</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="EL_PEÑOL" value="EL PEÑOL">EL PEÑOL</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ENTRERRIOS" value="ENTRERRIOS">ENTRERRIOS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ENVIGADO" value="ENVIGADO">ENVIGADO</option>
                                    <option class="option-department CALDAS" data-select2-id="FILADELFIA" value="FILADELFIA">FILADELFIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="FREDONIA" value="FREDONIA">FREDONIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="FRONTINO" value="FRONTINO">FRONTINO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="GOMEZ PLATA" value="GOMEZ PLATA">GOMEZ PLATA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="GRANADA" value="GRANADA">GRANADA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="GUADALUPE" value="GUADALUPE">GUADALUPE</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="GUARNE" value="GUARNE">GUARNE</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="GUATAPÉ" value="GUATAPÉ">GUATAPÉ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="HISPANIA" value="HISPANIA">HISPANIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ITUANGO" value="ITUANGO">ITUANGO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="JARDÍN" value="JARDÍN">JARDÍN</option>
                                    <option class="option-department CALDAS" data-select2-id="LA_DORADA" value="LA DORADA">LA DORADA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="LA_PINTADA" value="LA PINTADA">LA PINTADA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="LA_UNIÓN" value="LA UNIÓN">LA UNIÓN</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="LIBORINA" value="LIBORINA">LIBORINA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MACEO" value="MACEO">MACEO</option>
                                    <option class="option-department CALDAS" data-select2-id="MANIZALES" value="MANIZALES">MANIZALES</option>
                                    <option class="option-department CALDAS" data-select2-id="MANZANARES" value="MANZANARES">MANZANARES</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MARINILLA" value="MARINILLA">MARINILLA</option>
                                    <option class="option-department CALDAS" data-select2-id="MARQUETALIA" value="MARQUETALIA">MARQUETALIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MEDELLÍN" value="MEDELLÍN">MEDELLÍN</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MONTEBELLO" value="MONTEBELLO">MONTEBELLO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MURINDÓ" value="MURINDÓ">MURINDÓ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="MUTATÁ" value="MUTATÁ">MUTATÁ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="NECOCLÍ" value="NECOCLÍ">NECOCLÍ</option>
                                    <option class="option-department CALDAS" data-select2-id="NEIRA" value="NEIRA">NEIRA</option>
                                    <option class="option-department CALDAS" data-select2-id="PACORA" value="PACORA">PACORA</option>
                                    <option class="option-department CALDAS" data-select2-id="PENSILVANIA" value="PENSILVANIA">PENSILVANIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="PEQUE" value="PEQUE">PEQUE</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="PUERTO_TRIUNFO" value="PUERTO TRIUNFO">PUERTO TRIUNFO</option>
                                    <option class="option-department CALDAS" data-select2-id="RIOSUCIO" value="RIOSUCIO">RIOSUCIO</option>
                                    <option class="option-department CALDAS" data-select2-id="RISARALDA" value="RISARALDA">RISARALDA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SABANALARGA" value="SABANALARGA">SABANALARGA</option>
                                    <option class="option-department CALDAS" data-select2-id="SALAMINA" value="SALAMINA">SALAMINA</option>
                                    <option class="option-department CALDAS" data-select2-id="SAMANÁ" value="SAMANÁ">SAMANÁ</option>
                                    <option class="option-department CALDAS" data-select2-id="SAN_ANDRES_DE_CUERQUIA" value="SAN ANDRES DE CUERQUIA">SAN ANDRES DE CUERQUIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SAN_JOSÉ" value="SAN JOSÉ">SAN JOSÉ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SAN_PEDRO" value="SAN PEDRO">SAN PEDRO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SAN_PEDRO_DE_LOS_MILAGROS" value="SAN PEDRO DE LOS MILAGROS">SAN PEDRO DE LOS MILAGROS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SANTA_ROSA_DE_OSOS" value="SANTA ROSA DE OSOS">SANTA ROSA DE OSOS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SONSÓN" value="SONSÓN">SONSÓN</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="SOPETRÁN" value="SOPETRÁN">SOPETRÁN</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="TAMESIS" value="TAMESIS">TAMESIS</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="TARAZÁ" value="TARAZÁ">TARAZÁ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="TOLEDO" value="TOLEDO">TOLEDO</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="VALDIVIA" value="VALDIVIA">VALDIVIA</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="VEGACHÍ" value="VEGACHÍ">VEGACHÍ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="YALÁ" value="YALÁ">YALÁ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="YARUMAL" value="YARUMAL">YARUMAL</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="YOLOMBÓ" value="YOLOMBÓ">YOLOMBÓ</option>
                                    <option class="option-department ANTIOQUIA" data-select2-id="ZARAGOZA" value="ZARAGOZA">ZARAGOZA</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="project">Proyecto</label>
                                <select name="project" id="project" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el proyecto" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option data-select2-id="MINTIC_ESTUDIO_DE_CAMPO" value="MINTIC ESTUDIO DE CAMPO">MINTIC ESTUDIO DE CAMPO</option>
                                    <option data-select2-id="MINTIC_INSTALACIÓN" value="MINTIC INSTALACIÓN">MINTIC INSTALACIÓN</option>
                                    <option data-select2-id="MINTIC_SOPORTE" value="MINTIC SOPORTE">MINTIC SOPORTE</option>
                                    <option data-select2-id="RUTAS_DE_TX" value="RUTAS DE TX">RUTAS DE TX</option>
                                    <option data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">DESMONTES ENLACES MW</option>
                                    <option data-select2-id="INSTALACIÓN_ENLACES_MW" value="INSTALACIÓN ENLACES MW">INSTALACIÓN ENLACES MW</option>
                                    <option data-select2-id="DESMONTES_ESTACIÓN_BASE" value="DESMONTES ESTACIÓN BASE">DESMONTES ESTACIÓN BASE</option>
                                    <option data-select2-id="INSTALACIÓN_ESTACIÓN_BASE" value="INSTALACIÓN ESTACIÓN BASE">INSTALACIÓN ESTACIÓN BASE</option>
                                    <option data-select2-id="MIGRACIONES value="MIGRACIONES">MIGRACIONES</option>
                                    <option data-select2-id="SOLUCIONES_2G" value="SOLUCIONES 2G, 3G O 4G">SOLUCIONES 2G, 3G O 4G</option>
                                    <option data-select2-id="OBRAS_CIVILES_MENORES" value="OBRAS CIVILES MENORES">OBRAS CIVILES MENORES</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="eb">Estación base</label>
                                <select name="eb" id="eb" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona la estación base" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    @foreach ($mintics as $mintic)
                                        <option class="project-mintic" data-select2-id="{{$mintic->id}}" value="{{$mintic->id}}">{{$mintic->name}}</option>
                                    @endforeach
                                    @foreach ($works as $work)
                                        @if ($work->nombre_eb)
                                            <option style="display:none" class="project-works" data-select2-id="{{$work->id}}" value="{{$work->id}}">{{$work->nombre_eb}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles">Vehículos</label>
                                <select name="vehicles[]" id="vehicles" disabled class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un vehículos" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                    @foreach ($vehicles as $vehicle)
                                        <option id="option_vehicle_{{$vehicle->id}}" data-select2-id="{{$vehicle->id}}" value="{{$vehicle->id}}">{{$vehicle->plate}} - {{$vehicle->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Disposición</label>
                                <br>
                                <label for="am"><input type="checkbox" name="am" id="am" value="1"> AM</label> <label for="pm"><input type="checkbox" name="pm" id="pm" value="1"> PM</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"><i class="fa fa-align-left"></i> Descripción</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <label for="activities"><i class="fa fa-list"></i> Actividades</label>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <button type="button" class="btn btn-sm btn-secundary" id="add-activities"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="destino-activities">
                                <input type="text" name="activities[]" id="activities" class="form-control" style="margin-bottom: 5px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentaries"><i class="fa fa-align-left"></i> Comentarios</label>
                            <textarea name="commentaries" id="commentaries" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="report"><i class="fa fa-align-left"></i> Reporte de cierre</label>
                            <textarea name="report" id="report" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#equipment-modal">
                            <i class="fa fa-hdd"></i> Equipos
                        </button>
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#consumables-modal">
                            <i class="fa fa-plug"></i> Consumibles
                        </button>
                        <div class="modal fade" id="equipment-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                            </select>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>/</th>
                                                        <th>Seriral</th>
                                                        <th>Nombre</th>
                                                        <th>Marcar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($equipments as $item)
                                                        <tr>
                                                            <td><input type="checkbox" name="equipment[{{$item->id}}]" id="equipment_{{$item->id}}" value="{{$item->id}}"></td>
                                                            <td>{{$item->serial}}</td>
                                                            <td>{{$item->item}}</td>
                                                            <td>{{$item->brand }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                            </select>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>/</th>
                                                        <th>Nombre</th>
                                                        <th>Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($consumables as $item)
                                                        <tr>
                                                            <td><input type="checkbox" name="consumable[{{$item->id}}]" id="consumable_{{$item->id}}" value="{{$item->id}}"></td>
                                                            <td>{{$item->item}} {{$item->type}}</td>
                                                            <td>
                                                                <div class="col-md-9" style="padding-right: 2px;">
                                                                    <input type="number" class="form-control" name="amount[{{$item->id}}]" value="0">
                                                                </div>
                                                                <div class="col-md-3" style="padding-left: 2px">
                                                                    / {{$item->amount}}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <button class="btn btn-sm btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>
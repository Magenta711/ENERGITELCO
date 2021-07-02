<div class="modal fade" id="edit-modal-{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="createTask" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar programación</h4>
            </div>
            <form action="{{route('tasking_update',$item->id)}}" method="post">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="date_start-edit">Fecha de salida</label>
                                <input type="datetime-local" name="date_start" id="date_start-edit" class="form-control" value="{{date('Y-m-d',strtotime($item->date_start))}}T{{date('h:i',strtotime($item->date_start))}}">
                            </div>
                            <div class="col-md-4">
                                <label for="users-edit">Funcionarios</label>
                                <select name="users[]" id="users-edit" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un funcionario" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    @foreach ($users as $user)
                                        <option id="option_user-edit_{{$user->id}}" {{ selected($item->users,$user->id) ? 'selected' : '' }} data-select2-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipality-edit">Municipio</label>
                                <select name="municipality" id="municipality-edit" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el municipio" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                    <option {{$item->municipality}} disabled selected></option>
                                    <option {{$item->municipality == 'ANTIOQUIA' ? 'selected' : ''}} data-select2-id="ANTIOQUIA" value="ANTIOQUIA">ANTIOQUIA</option>
                                    <option {{$item->municipality == 'CALDAS' ? 'selected' : ''}} data-select2-id="CALDAS" value="CALDAS">CALDAS</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="department-edit">Departamento</label>
                                <select name="department" id="department-edit" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el departamento" style="width: 100%;" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option {{$item->department == 'ABEJORRAL' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ABEJORRAL" value="ABEJORRAL">ABEJORRAL</option>
                                    <option {{$item->department == 'ABRIAQUÍ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ABRIAQUÍ" value="ABRIAQUÍ">ABRIAQUÍ</option>
                                    <option {{$item->department == 'ALEJANDRÍA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ALEJANDRÍA" value="ALEJANDRÍA">ALEJANDRÍA</option>
                                    <option {{$item->department == 'AMAGA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="AMAGA" value="AMAGA">AMAGA</option>
                                    <option {{$item->department == 'AMALFI' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="AMALFI" value="AMALFI">AMALFI</option>
                                    <option {{$item->department == 'ANDES' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ANDES" value="ANDES">ANDES</option>
                                    <option {{$item->department == 'ANGOSTURA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ANGOSTURA" value="ANGOSTURA">ANGOSTURA</option>
                                    <option {{$item->department == 'ANORI' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ANORI" value="ANORI">ANORI</option>
                                    <option {{$item->department == 'ARANZAZU' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="ARANZAZU" value="ARANZAZU">ARANZAZU</option>
                                    <option {{$item->department == 'ARBOLETES' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ARBOLETES" value="ARBOLETES">ARBOLETES</option>
                                    <option {{$item->department == 'ARGELIA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ARGELIA" value="ARGELIA">ARGELIA</option>
                                    <option {{$item->department == 'BARBOSA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="BARBOSA" value="BARBOSA">BARBOSA</option>
                                    <option {{$item->department == 'BETULIA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="BETULIA" value="BETULIA">BETULIA</option>
                                    <option {{$item->department == 'BRICEÑO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="BRICEÑO" value="BRICEÑO">BRICEÑO</option>
                                    <option {{$item->department == 'BURITICÁ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="BURITICÁ" value="BURITICÁ">BURITICÁ</option>
                                    <option {{$item->department == 'CACERES' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="CACERES" value="CACERES">CACERES</option>
                                    <option {{$item->department == 'CAMPAMENTO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="CAMPAMENTO" value="CAMPAMENTO">CAMPAMENTO</option>
                                    <option {{$item->department == 'CAÑASGORDAS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="CAÑASGORDAS" value="CAÑASGORDAS">CAÑASGORDAS</option>
                                    <option {{$item->department == 'CARMEN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="CARMEN DE VIVORAL" value="CARMEN DE VIVORAL">CARMEN DE VIVORAL</option>
                                    <option {{$item->department == 'CAROLINA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="CAROLINA" value="CAROLINA">CAROLINA</option>
                                    <option {{$item->department == 'Chinchina' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="Chinchina" value="Chinchina">Chinchina</option>
                                    <option {{$item->department == 'DABEIDA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="DABEIDA" value="DABEIDA">DABEIDA</option>
                                    <option {{$item->department == 'DON MATIAS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="DON_MATIAS" value="DON MATIAS">DON MATIAS</option>
                                    <option {{$item->department == 'EL BAGRE' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="EL_BAGRE" value="EL BAGRE">EL BAGRE</option>
                                    <option {{$item->department == 'EL CARMEN DE VIBORAL' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="EL_CARMEN_DE_VIBORAL" value="EL CARMEN DE VIBORAL">EL CARMEN DE VIBORAL</option>
                                    <option {{$item->department == 'EL PEÑOL' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="EL_PEÑOL" value="EL PEÑOL">EL PEÑOL</option>
                                    <option {{$item->department == 'ENTRERRIOS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ENTRERRIOS" value="ENTRERRIOS">ENTRERRIOS</option>
                                    <option {{$item->department == 'ENVIGADO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ENVIGADO" value="ENVIGADO">ENVIGADO</option>
                                    <option {{$item->department == 'FILADELFIA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="FILADELFIA" value="FILADELFIA">FILADELFIA</option>
                                    <option {{$item->department == 'FREDONIA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="FREDONIA" value="FREDONIA">FREDONIA</option>
                                    <option {{$item->department == 'FRONTINO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="FRONTINO" value="FRONTINO">FRONTINO</option>
                                    <option {{$item->department == 'GOMEZ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="GOMEZ PLATA" value="GOMEZ PLATA">GOMEZ PLATA</option>
                                    <option {{$item->department == 'GRANADA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="GRANADA" value="GRANADA">GRANADA</option>
                                    <option {{$item->department == 'GUADALUPE' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="GUADALUPE" value="GUADALUPE">GUADALUPE</option>
                                    <option {{$item->department == 'GUARNE' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="GUARNE" value="GUARNE">GUARNE</option>
                                    <option {{$item->department == 'GUATAPÉ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="GUATAPÉ" value="GUATAPÉ">GUATAPÉ</option>
                                    <option {{$item->department == 'HISPANIA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="HISPANIA" value="HISPANIA">HISPANIA</option>
                                    <option {{$item->department == 'ITUANGO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ITUANGO" value="ITUANGO">ITUANGO</option>
                                    <option {{$item->department == 'JARDÍN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="JARDÍN" value="JARDÍN">JARDÍN</option>
                                    <option {{$item->department == 'LA DORADA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="LA_DORADA" value="LA DORADA">LA DORADA</option>
                                    <option {{$item->department == 'LA PINTADA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="LA_PINTADA" value="LA PINTADA">LA PINTADA</option>
                                    <option {{$item->department == 'LA UNIÓN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="LA_UNIÓN" value="LA UNIÓN">LA UNIÓN</option>
                                    <option {{$item->department == 'LIBORINA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="LIBORINA" value="LIBORINA">LIBORINA</option>
                                    <option {{$item->department == 'MACEO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MACEO" value="MACEO">MACEO</option>
                                    <option {{$item->department == 'MANIZALES' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="MANIZALES" value="MANIZALES">MANIZALES</option>
                                    <option {{$item->department == 'MANZANARES' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="MANZANARES" value="MANZANARES">MANZANARES</option>
                                    <option {{$item->department == 'MARINILLA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MARINILLA" value="MARINILLA">MARINILLA</option>
                                    <option {{$item->department == 'MARQUETALIA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="MARQUETALIA" value="MARQUETALIA">MARQUETALIA</option>
                                    <option {{$item->department == 'MEDELLÍN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MEDELLÍN" value="MEDELLÍN">MEDELLÍN</option>
                                    <option {{$item->department == 'MONTEBELLO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MONTEBELLO" value="MONTEBELLO">MONTEBELLO</option>
                                    <option {{$item->department == 'MURINDÓ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MURINDÓ" value="MURINDÓ">MURINDÓ</option>
                                    <option {{$item->department == 'MUTATÁ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="MUTATÁ" value="MUTATÁ">MUTATÁ</option>
                                    <option {{$item->department == 'NECOCLÍ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="NECOCLÍ" value="NECOCLÍ">NECOCLÍ</option>
                                    <option {{$item->department == 'NEIRA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="NEIRA" value="NEIRA">NEIRA</option>
                                    <option {{$item->department == 'PACORA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="PACORA" value="PACORA">PACORA</option>
                                    <option {{$item->department == 'PENSILVANIA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="PENSILVANIA" value="PENSILVANIA">PENSILVANIA</option>
                                    <option {{$item->department == 'PEQUE' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="PEQUE" value="PEQUE">PEQUE</option>
                                    <option {{$item->department == 'PUERTO TRIUNFO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="PUERTO_TRIUNFO" value="PUERTO TRIUNFO">PUERTO TRIUNFO</option>
                                    <option {{$item->department == 'RIOSUCIO' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="RIOSUCIO" value="RIOSUCIO">RIOSUCIO</option>
                                    <option {{$item->department == 'RISARALDA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="RISARALDA" value="RISARALDA">RISARALDA</option>
                                    <option {{$item->department == 'SABANALARGA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SABANALARGA" value="SABANALARGA">SABANALARGA</option>
                                    <option {{$item->department == 'SALAMINA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="SALAMINA" value="SALAMINA">SALAMINA</option>
                                    <option {{$item->department == 'SAMANÁ' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="SAMANÁ" value="SAMANÁ">SAMANÁ</option>
                                    <option {{$item->department == 'SAN ANDRES DE CUERQUIA' ? 'selected' : ''}} class="option-department CALDAS" data-select2-id="SAN_ANDRES_DE_CUERQUIA" value="SAN ANDRES DE CUERQUIA">SAN ANDRES DE CUERQUIA</option>
                                    <option {{$item->department == 'SAN JOSÉ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SAN_JOSÉ" value="SAN JOSÉ">SAN JOSÉ</option>
                                    <option {{$item->department == 'SAN PEDRO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SAN_PEDRO" value="SAN PEDRO">SAN PEDRO</option>
                                    <option {{$item->department == 'SAN PEDRO DE LOS MILAGROS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SAN_PEDRO_DE_LOS_MILAGROS" value="SAN PEDRO DE LOS MILAGROS">SAN PEDRO DE LOS MILAGROS</option>
                                    <option {{$item->department == 'SANTA ROSA DE OSOS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SANTA_ROSA_DE_OSOS" value="SANTA ROSA DE OSOS">SANTA ROSA DE OSOS</option>
                                    <option {{$item->department == 'SONSÓN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SONSÓN" value="SONSÓN">SONSÓN</option>
                                    <option {{$item->department == 'SOPETRÁN' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="SOPETRÁN" value="SOPETRÁN">SOPETRÁN</option>
                                    <option {{$item->department == 'TAMESIS' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="TAMESIS" value="TAMESIS">TAMESIS</option>
                                    <option {{$item->department == 'TARAZÁ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="TARAZÁ" value="TARAZÁ">TARAZÁ</option>
                                    <option {{$item->department == 'TOLEDO' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="TOLEDO" value="TOLEDO">TOLEDO</option>
                                    <option {{$item->department == 'VALDIVIA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="VALDIVIA" value="VALDIVIA">VALDIVIA</option>
                                    <option {{$item->department == 'VEGACHÍ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="VEGACHÍ" value="VEGACHÍ">VEGACHÍ</option>
                                    <option {{$item->department == 'YALÁ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="YALÁ" value="YALÁ">YALÁ</option>
                                    <option {{$item->department == 'YARUMAL' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="YARUMAL" value="YARUMAL">YARUMAL</option>
                                    <option {{$item->department == 'YOLOMBÓ' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="YOLOMBÓ" value="YOLOMBÓ">YOLOMBÓ</option>
                                    <option {{$item->department == 'ZARAGOZA' ? 'selected' : ''}} class="option-department ANTIOQUIA" data-select2-id="ZARAGOZA" value="ZARAGOZA">ZARAGOZA</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="-edit">Proyecto</label>
                                <select name="project" id="project-edit" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona el proyecto" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    <option {{$item->project == 'MINTIC ESTUDIO DE CAMPO' ? 'selected' : '' }} data-select2-id="MINTIC_ESTUDIO_DE_CAMPO" value="MINTIC ESTUDIO DE CAMPO">MINTIC ESTUDIO DE CAMPO</option>
                                    <option {{$item->project == 'MINTIC INSTALACIÓN' ? 'selected' : '' }} data-select2-id="MINTIC_INSTALACIÓN" value="MINTIC INSTALACIÓN">MINTIC INSTALACIÓN</option>
                                    <option {{$item->project == 'MINTIC MANTANIMIENTO' ? 'selected' : '' }} data-select2-id="MINTIC_MANTANIMIENTO" value="MINTIC MANTANIMIENTO">MINTIC MANTANIMIENTO</option>
                                    <option {{$item->project == 'RUTAS DE TX' ? 'selected' : '' }} data-select2-id="RUTAS_DE_TX" value="RUTAS DE TX">RUTAS DE TX</option>
                                    <option {{$item->project == 'DESMONTES ENLACES MW' ? 'selected' : '' }} data-select2-id="DESMONTES_ENLACES_MW" value="DESMONTES ENLACES MW">DESMONTES ENLACES MW</option>
                                    <option {{$item->project == 'INSTALACIÓN ENLACES MW' ? 'selected' : '' }} data-select2-id="INSTALACIÓN_ENLACES_MW" value="INSTALACIÓN ENLACES MW">INSTALACIÓN ENLACES MW</option>
                                    <option {{$item->project == 'DESMONTES ESTACIÓN BASE' ? 'selected' : '' }} data-select2-id="DESMONTES_ESTACIÓN_BASE" value="DESMONTES ESTACIÓN BASE">DESMONTES ESTACIÓN BASE</option>
                                    <option {{$item->project == 'INSTALACIÓN ESTACIÓN BASE' ? 'selected' : '' }} data-select2-id="INSTALACIÓN_ESTACIÓN_BASE" value="INSTALACIÓN ESTACIÓN BASE">INSTALACIÓN ESTACIÓN BASE</option>
                                    <option {{$item->project == 'MIGRACIONES' ? 'selected' : '' }} data-select2-id="MIGRACIONES" value="MIGRACIONES">MIGRACIONES</option>
                                    <option {{$item->project == 'SOLUCIONES 2G' ? 'selected' : '' }} data-select2-id="SOLUCIONES_2G,_3G_O_4G" value="SOLUCIONES 2G, 3G O 4G">SOLUCIONES 2G, 3G O 4G</option>
                                    <option {{$item->project == 'OBRAS CIVILES MENORES' ? 'selected' : '' }} data-select2-id="OBRAS_CIVILES_MENORES" value="OBRAS CIVILES MENORES">OBRAS CIVILES MENORES</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="eb-edit">Estación base</label>
                                <select name="eb" id="eb-edit" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecciona la estación base" style="width: 100%;" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                    <option disabled selected></option>
                                    @foreach ($mintics as $mintic)
                                        <option {{$item->eb->projectble_type == 'App\Models\project\Mintic\Mintic_School' && $item->eb->projectble_id == $mintic->id ? 'selected' : '' }} class="project-mintic" data-select2-id="{{$mintic->id}}" value="{{$mintic->id}}">{{$mintic->name}}</option>
                                    @endforeach
                                    @foreach ($works as $work)
                                        @if ($work->nombre_eb)
                                            <option style="display:none" class="project-works" data-select2-id="{{$work->id}}" value="{{$work->id}}">{{$work->nombre_eb}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="vehicles-edit">Vehículos</label>
                                <select name="vehicles[]" id="vehicles-edit" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecciona un vehículos" style="width: 100%;" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                    @foreach ($vehicles as $vehicle)
                                        <option {{ selected($item->vehicles,$vehicle->id) ? 'selected' : '' }}  id="option_vehicle_{{$vehicle->id}}" data-select2-id="{{$vehicle->id}}" value="{{$vehicle->id}}">{{$vehicle->plate}} - {{$vehicle->brand}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Disposición</label>
                                <br>
                                <label for="am-edit"><input type="checkbox" name="am" id="am-edit" value="1" {{$item->am ? 'checked' : ''}}> AM</label> <label for="pm-edit"><input type="checkbox" name="pm" id="pm-edit" value="1" {{$item->pm ? 'checked' : ''}}> PM</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description-edit"><i class="fa fa-align-left"></i> Descripción</label>
                            <textarea name="description" id="description-edit" cols="30" rows="3" class="form-control">{{$item->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10">
                                    <label for="activities"><i class="fa fa-list"></i> Actividades</label>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <button type="button" class="btn btn-sm btn-secundary" id="add-activities-edit"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div id="destino-activities">
                                @forelse($item->activities as $activity)
                                    <input type="text" name="activities[]" id="activities-edit-{{$activity->id}}" class="form-control" style="margin-bottom: 5px" value="{{$activity->text}}">
                                @empty
                                    <input type="text" name="activities[]" id="activities-edit-{{$activity->id}}" class="form-control" style="margin-bottom: 5px">
                                @endforelse
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="commentaries-edit"><i class="fa fa-align-left"></i> Comentarios</label>
                            <textarea name="commentaries" id="commentaries-edit" cols="30" rows="3" class="form-control">{{$item->commentaries}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="report-edit"><i class="fa fa-align-left"></i> Reporte de cierre</label>
                            <textarea name="report" id="report-edit" cols="30" rows="3" class="form-control">{{$item->report}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#equipment-edit-{{$item->id}}-modal">
                            <i class="fa fa-hdd"></i> Equipos
                        </button>
                        <button type="button" class="btn btn-sm btn-block btn-secundary text-left open-modal-inv" style="text-align: left !important" data-toggle="modal" data-target="#consumables-edit-{{$item->id}}-modal">
                            <i class="fa fa-plug"></i> Consumibles
                        </button>
                        <div class="modal fade" id="equipment-edit-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipos</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
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
                                                    @foreach ($equipments as $equiment)
                                                        <tr>
                                                            <td><input type="checkbox" name="equipment[{{$equiment->id}}]" id="equipment-edit_{{$equiment->id}}" value="{{$equiment->id}}"></td>
                                                            <td>{{$equiment->serial}}</td>
                                                            <td>{{$equiment->item}}</td>
                                                            <td>{{$equiment->brand }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="consumables-edit-{{$item->id}}-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Consumibles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <select name="inv_user" class="form-control inv_user">
                                                <option selected disabled>Selecciona el usuario para asignar bodega</option>
                                                @foreach ($item->users as $user)
                                                    <option {{$user->id == $item->user_inv ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
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
                                                    @foreach ($consumables as $consumable)
                                                        @php
                                                            $hasCosumable = $item->consumables ? hasConsumable($item->consumables,$consumable->id,'App\Models\project\Mintic\inventory\invMinticConsumable') : false;
                                                        @endphp
                                                        <tr>
                                                            <td><input type="checkbox" name="consumable[{{$consumable->id}}]" id="consumable-edit_{{$consumable->id}}" value="{{$consumable->id}}" {{$hasCosumable ? 'checked' : ''}}></td>
                                                            <td>{{$consumable->item}} {{$consumable->type}}</td>
                                                            <td>
                                                                <div class="col-md-9" style="padding-right: 2px;">
                                                                    <input type="number" class="form-control" name="amount[{{$item->id}}]" value="{{$hasCosumable ? $hasCosumable->amount : 0}}">
                                                                </div>
                                                                <div class="col-md-3" style="padding-left: 2px">
                                                                    / {{$consumable->amount + ($hasCosumable->amount ?? 0)}}
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
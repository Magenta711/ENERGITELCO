@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar proyecto de desmonte <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Desmontes</a></li>
        <li class="active">Editar desmontes</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Editar proyecto de desmonte</div>
            <div class="box-tools">
                <a href="{{route('clearings')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{ route('clearings_update',$id->id) }}" method="post" autocomplete="off" id="form_send" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="box-body">
            <h4>1. Información general</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Fecha de ejecución</label>
                        <input type="date" name="date" id="date" value="{{ $id->date }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_ot">ID/OT instalación</label>
                        <input type="text" name="id_ot" id="id_ot" value="{{ $id->id_ot }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ot_rr">OT RR</label>
                        <input type="text" name="ot_rr" id="ot_rr" value="{{ $id->ot_rr }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="region">Región</label>
                        <input type="text" name="region" id="region" value="{{ $id->region }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_a">Estación A</label>
                        <input type="text" name="estation_a" id="estation_a" value="{{ $id->estation_a }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_b">Estación B</label>
                        <input type="text" name="estation_b" id="estation_b" value="{{ $id->estation_b }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_radion">Marca radio</label>
                        <input type="text" name="brand_radion" id="brand_radion" value="{{ $id->brand_radion }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" name="model" id="model" value="{{ $id->model }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="banda">Banda</label>
                        <input type="text" name="banda" id="banda" value="{{ $id->banda }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sud_banda">Sub_banda</label>
                        <input type="text" name="sud_banda" id="sud_banda" value="{{ $id->sud_banda }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="concept_technical">Concepto técnico HW</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ ($id->concept_technical == 'Estado funcinal') ? 'checked' : '' }} name="concept_technical" id="concept_technical1" value="Estado funcinal">
                            <label class="form-check-label" for="concept_technical1">
                                Estado funcional
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ ($id->concept_technical == 'Obsoleto') ? 'checked' : '' }} name="concept_technical" id="concept_technical2" value="Obsoleto">
                            <label class="form-check-label" for="concept_technical2">
                                Obsoleto
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="concept_fisico">Concepto físico HW</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ ($id->concept_fisico == 'Buen estado') ? 'checked' : '' }} name="concept_fisico" id="concept_fisico1" value="Buen estado">
                            <label class="form-check-label" for="concept_fisico1">
                                Buen estado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{ ($id->concept_fisico == 'Mal estado') ? 'checked' : '' }} name="concept_fisico" id="concept_fisico2" value="Mal estado">
                            <label class="form-check-label" for="concept_fisico2">
                                Mal estado
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lat">Latitud</label>
                        <input type="text" id="lat" name="lat" value="{{ $id->lat }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="long">Longitud</label>
                        <input type="text" id="long" name="long" value="{{ $id->long }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="height">Altitud</label>
                        <input type="text" id="height" name="height" value="{{ $id->height }}" class="form-control">
                    </div>
                </div>
                <input type="text" name="value_send" id="value_send" class="hide">
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <h3>Estación A</h3>
                <hr>
                @php
                    $i = 1;
                @endphp
                <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C24' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Pantallazo de niveles dBs',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C25',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Pantallazo de alarmas',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                <h3>3. Registro fotográfico antes</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto indoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C12',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto outdoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                {{-- @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena'
                ])
                <hr> --}}
                @include('projects.clearings.includes.upload',[
                    'place' => 'C13' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto torres sin antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto mástil'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C15' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto PDB abierto sin acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB abierto'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB cerrado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C14',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'e',
                    'label'=>'Foto de rack mw'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de busbar sin tierra desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete sin idu desmontada'
                ])
                <hr>


                <h3>4. Registro fotográfico equipos desinstalados</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 1 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 2 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO vertical desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO horizontal desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto RG desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G19',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'J19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>5,
                    'label'=>'Foto conectores de energía'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'K19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>6,
                    'label'=>'Otros accesorios'
                ])
                <hr>
                



                <h3>6. Registro fotográfico después</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G13' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto torres con antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E19',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G14',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete con idu desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G15' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto con acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G12' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de estación base después'
                ])
                <hr>
                <h3>7. Inventario</h3>
                <hr>
                <div id="destino_a">
                    @foreach ($id->inventories as $item)
                        @if ($item->station == 'a')
                            <div class="origen" id="origen_a">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name_element_a_1">Nombre del elemento</label>
                                            <input type="text" name="name_element[]" value="{{ $item->name_element }}" id="name_element_a_1" class="form-control">
                                            <input type="hidden" name="estation[]" id="estation_a_{{$item->id}}" value="a">
                                            <input type="hidden" name="inv_id[]" id="inv_id_a_{{$item->id}}" value="{{$item->id}}" class="inv_id">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="code_material_a_{{$item->id}}">Codigo material</label>
                                            <input type="text" name="code_material[]" value="{{ $item->code_material }}" id="code_material_a_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="serial_part_a_{{$item->id}}">Serial/numero parte</label>
                                            <input type="text" name="serial_part[]" value="{{ $item->serial_part }}" id="serial_part_a_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="type_active_a_{{$item->id}}">Tipo de activo</label>
                                            <input type="text" name="type_active[]" value="{{ $item->type_active }}" id="type_active_a_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if ($item->file)
                                                <img src="/storage/upload/clearing/{{$item->file->name}}" width="35%" alt="Attachment">
                                            @endif
                                            <label for="file_a_{{$item->id}}" class="form-control text-center" id="label_file_{{$item->id}}"><i class="fa fa-upload"></i></label>
                                            <input type="file" accept="image/*" name="file[]" id="file_a_{{$item->id}}" class="file_input hide">
                                        </div>
                                    </div>
                                </div>
                                {{-- @include('projects.clearings.includes.upload',['num' => $i++,'it'=>'a','label'=>'Fotos de la estacion base']) --}}
                                <hr>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-link add_element"  id="add_element_a"><i class="fa fa-plus"></i> Agregar equipo</button>
            </div>
            <div class="col-md-6">
                <h3>Estación B</h3>
                <hr>
                <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G24' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Pantallazo de niveles dBs',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G25' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Pantallazo de alarmas',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                <h3>3. Registro fotográfico antes</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto indoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E12',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto outdoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                {{-- @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena'
                ])
                <hr> --}}
                @include('projects.clearings.includes.upload',[
                    'place' => 'E13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto torres sin antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto mástil'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto sin acomedidas desmontadas'
                    ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB abierto'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB cerrado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E14' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'e',
                    'label'=>'Foto de rack mw'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de busbar sin tierra desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete sin idu desmontada'
                ])
                <hr>

                <h3>4. Registro fotográfico equipos desinstalados</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 1 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 2 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO vertical desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO horizontal desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto RG desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'J20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>5,
                    'label'=>'Foto conectores de energía'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'K20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>6,
                    'label'=>'Otros accesorios'
                ])
                <hr>
                <h3>5. Registro fotográfico después</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto torres con antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I14',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete con idu desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto con acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I12' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de estación base después'
                ])
                <hr>
                <h3>7. Inventario</h3>
                <hr>
                <div id="destino_b">
                    @foreach ($id->inventories as $item)
                        @if ($item->station == 'b')
                            <div class="origen" id="origen_b">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name_element_b_{{$item->id}}">Nombre del elemento</label>
                                            <input type="text" name="name_element[]" value="{{ $item->name_element }}" id="name_element_b_{{$item->id}}" class="form-control">
                                            <input type="hidden" name="estation[]" id="estation_b_{{$item->id}}" value="b">
                                            <input type="hidden" name="inv_id[]" id="inv_id_b_{{$item->id}}" value="{{$item->id}}" class="inv_id">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="code_material_b_{{$item->id}}">Codigo material</label>
                                            <input type="text" name="code_material[]" value="{{ $item->code_material }}" id="code_material_b_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="serial_part_b_{{$item->id}}">Serial/numero parte</label>
                                            <input type="text" name="serial_part[]" value="{{ $item->serial_part }}" id="serial_part_b_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="type_active_b_{{$item->id}}">Tipo de activo</label>
                                            <input type="text" name="type_active[]" value="{{ $item->type_active }}" id="type_active_b_{{$item->id}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if ($item->file)
                                                <img src="/storage/upload/clearing/{{$item->file->name}}" width="35%" alt="{{$item->file->name}}">
                                            @endif
                                            <label for="file_b_{{$item->id}}" class="form-control text-center" id="label_file_{{$item->id}}"><i class="fa fa-upload"></i></label>
                                            <input type="file" accept="image/*" name="file[]" id="file_b_{{$item->id}}" class="file_input hide">
                                        </div>
                                    </div>
                                </div>
                                {{-- @include('projects.clearings.includes.upload',['num' => $i++,'it'=>'b','label'=>'Fotos de la estacion base']) --}}
                                <hr>
                            </div>
                        @endif
                    @endforeach
                </div>
            <button type="button" class="btn btn-sm btn-link add_element"  id="add_element_b"><i class="fa fa-plus"></i> Agregar equipo</button>
        </div>
        <hr>
        </div>
        <hr>
        <h3>Información referente de las actividades referentes a la gestión y recepción de la infraestructura</h3>
        <div class="row">
            <div class="col-md-6">
                @include('projects.clearings.includes.upload',[
                    'place' => 'B32' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Captura pantalla correo NOC TX o CHG gestión cerrado'
                ])
            </div>
            <div class="col-md-6">
                @include('projects.clearings.includes.upload',[
                    'place' => 'G32' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Captura pantalla aceptación site owner'
                ])
            </div>
        </div>
        <div class="box-footer">
            <button onclick="document.getElementById('value_send').value = 'Firmar';document.getElementById('form_send').submit();" class="btn btn-sm btn-primary btn-send">Enviar y firmar</button>
            <button onclick="document.getElementById('value_send').value = 'Guardar';document.getElementById('form_send').submit();" class="btn btn-sm btn-success btn-send">Guardar</button>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{asset('js/project/clearing/edit.js')}}"></script>
@endsection
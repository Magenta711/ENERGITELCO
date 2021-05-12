@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Ver proyecto de desmonte <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Desmontes</a></li>
        <li class="active">Ver desmontes</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Ver proyecto de desmonte</div>
            <div class="box-tools">
                <a href="{{route('clearings')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <h4>1. Información general</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Fecha de ejecución</label>
                        <p>{{ $id->date }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_ot">ID/OT instalación</label>
                        <p>{{ $id->id_ot }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ot_rr">OT RR</label>
                        <p>{{ $id->ot_rr }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="region">Región</label>
                        <p>{{ $id->region }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_a">Estación A</label>
                        <p>{{ $id->estation_a }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_b">Estación B</label>
                        <p>{{ $id->estation_b }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_radion">Marca radio</label>
                        <p>{{ $id->brand_radion }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <p>{{ $id->model }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="banda">Banda</label>
                        <p>{{ $id->banda }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sud_banda">Sub_banda</label>
                        <p>{{ $id->sud_banda }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="concept_technical">Concepto técnico HW</label>
                        <p>{{ $id->concept_technical }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="concept_fisico">Concepto físico HW</label>
                        <p>{{ $id->concept_fisico }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    
            <h3>Estación A</h3>
                <hr>
                @php
                    $i = 1;
                @endphp
                <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C24' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Pantallazo de niveles dBs',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C25',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Pantallazo de alarmas',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                <h3>3. Registro fotográfico antes</h3>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto indoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C12',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto outdoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                {{-- @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena'
                ])
                <hr> --}}
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C13' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto torres sin antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto mástil'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C15' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto PDB abierto sin acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB abierto'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB cerrado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C14',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'e',
                    'label'=>'Foto de rack mw'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de busbar sin tierra desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete sin idu desmontada'
                ])
                <hr>


                <h3>4. Registro fotográfico equipos desinstalados</h3>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 1 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 2 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO vertical desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO horizontal desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto RG desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G19',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'J19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>5,
                    'label'=>'Foto conectores de energía'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'K19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>6,
                    'label'=>'Otros accesorios'
                ])
                <hr>
                



                <h3>6. Registro fotográfico después</h3>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G13' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto torres con antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C19' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E19',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G14',
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete con idu desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G15' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto con acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G12' ,
                    'ltt' => 'a',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de estación base después'
                ])
                <hr>
                <h3>6. Inventario</h3>
                @php
                    $i = 1;
                @endphp
                @foreach ($id->inventories as $item)
                    @if ($item->station == 'a')
                        <div class="row">
                            <div class="col-md-1">
                                <label for="">Número</label>
                                <p>{{ $i }}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name_element_a_1">Nombre del elemento</label>
                                    <p>{{ $item->name_element }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code_material_a_1">Código material</label>
                                    <p>{{ $item->code_material }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="serial_part_a_1">Serial/número parte</label>
                                    <p>{{ $item->serial_part }}</p>
                                </div>
                            </div>
                            @if ($item->file)
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="/storage/upload/clearing/{{$item->file->name}}" width="100%" alt="Attachment">
                                </div>
                            </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-6">
                <h3>Estación B</h3>
                <hr>
                <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G24' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Pantallazo de niveles dBs',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G25' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Pantallazo de alarmas',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                <h3>3. Registro fotográfico antes</h3>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto indoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E12',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto outdoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                {{-- @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena'
                ])
                <hr> --}}
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto torres sin antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto mástil'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto sin acomedidas desmontadas'
                    ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB abierto'
                ])
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB cerrado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E14' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'e',
                    'label'=>'Foto de rack mw'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de busbar sin tierra desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete sin idu desmontada'
                ])
                <hr>

                <h3>4. Registro fotográfico equipos desinstalados</h3>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 1 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 2 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO vertical desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO horizontal desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto RG desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'G20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'J20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>5,
                    'label'=>'Foto conectores de energía'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'K20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>6,
                    'label'=>'Otros accesorios'
                ])
                <hr>
                <h3>5. Registro fotográfico después</h3>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto torres con antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'C20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'E20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I14',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete con idu desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto con acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload_show',[
                    'place' => 'I12' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de estación base después'
                ])
                <hr>
                    <h3>6. Inventario</h3>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($id->inventories as $item)
                        @if ($item->station == 'b')
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="">Número</label>
                                    <p>{{ $i }}</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name_element_a_1">Nombre del elemento</label>
                                        <p>{{ $item->name_element }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="code_material_a_1">Código material</label>
                                        <p>{{ $item->code_material }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="serial_part_a_1">Serial/número parte</label>
                                        <p>{{ $item->serial_part }}</p>
                                    </div>
                                </div>
                                @if ($item->file)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/upload/clearing/{{$item->file->name}}" width="100%" alt="Attachment">
                                    </div>
                                </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <hr>
            <h3>Información referente de las actividades referentes a la gestión y recepción de la infraestructura</h3>
            <div class="row">
                <div class="col-md-6">
                    @include('projects.clearings.includes.upload_show',[
                        'place' => 'B32' ,
                        'ltt' => 'a',
                        'num' => $i++,
                        'it'=>'a',
                        'label'=>'Captura pantalla correo NOC TX o CHG gestión cerrado'
                    ])
                </div>
                <div class="col-md-6">
                    @include('projects.clearings.includes.upload_show',[
                        'place' => 'G32' ,
                        'ltt' => 'a',
                        'num' => $i++,
                        'it'=>'b',
                        'label'=>'Captura pantalla aceptación site owner'
                    ])
                </div>
            </div>
        </div>
        <div class="box-footer">
            @if ($id->status == 0)
                @can('Aprobar proyectos de desmonte')
                    <button class="btn btn-sm btn-primary" onclick="aprobar()">Aprobar y firmar</button>
                    <button class="btn btn-sm btn-danger" onclick="no_aprobar()">No aprobar</button>
                @endcan
                @endif
            {{-- @if ($id->status == 1) --}}
                <a href="{{ route('clearings_export',$id->id) }}" class="btn btn-sm btn-danger">Exportar</a>
            {{-- @endif --}}
        </div>
    </div>
</section>

<form id="form_approval" action="{{ route('clearings_approval',$id->id) }}" method="POST" style="form_dis;">
    @csrf
    @method('PUT')
    {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
</form>
<form id="form_no_approval" action="{{ route('clearings_not_approval',$id->id) }}" method="POST" style="display: none;">
    @csrf
    @method('PUT')
    {{-- <textarea name="observaciones_jefe" id="observaciones_jefe_2" class="hide" cols="30" rows="3">{{old('observaciones_jefe')}}</textarea> --}}
</form>

@endsection
@section('js')
    <script>
    function aprobar() {
        event.preventDefault();
        // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
        document.getElementById('form_approval').submit();
    }
    function no_aprobar() {
        event.preventDefault();
        // document.getElementById('observaciones_jefe_2').value=document.getElementById('observaciones_jefe').value;
        document.getElementById('form_no_approval').submit();
    }
    </script>
@endsection
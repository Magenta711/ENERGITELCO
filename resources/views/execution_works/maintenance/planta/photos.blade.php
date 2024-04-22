@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento <small>SMU</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">SMU</a></li>
            <li class="active">Mantenimiento</li>
        </ol>
    </section>
    <div class="hide">
        <input type="hidden" value="{{ $id }}" id="data_id">
        <input type="hidden" value="{{ $item->id }}" id="data_item">
        <input type="hidden" id="url"
            value="project/maintenance/smu/plant/{{ $id }}/{{ $item->id }}/upload"
            data-url="/project/maintenance/smu/plant/{{ $id }}/{{ $item->id }}/upload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto SMU</div>
                <div class="box-tools">
                    <a href="{{ route('plant_index', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                @php
                    $i = 0;
                @endphp
                <h3>REGISTRO FOTOGRÁFICO</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="date_before">Fecha de toma de fotos del Antes</label>
                            <input type="date" name="date_before" id="date_before" class="form-control" value="18/03/2024">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hour_before_init">Hora del inicio de toma de las fotos del Antes</label>
                            <input type="time" name="hour_before_init" id="hour_before_init" class="form-control" value="10:00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hour_before_end">Hora del fin de toma de las fotos del Antes</label>
                            <input type="time" name="hour_before_end" id="hour_before_end" class="form-control" value="12:00">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button id="rang_hours_before" class="btn btn-success form_control btn-before">Establecer</button>
                        </div>
                    </div>
                </div>
                <h4>5. FORMATO FOTOGRÁFICO</h4>
                <h3>SISTEMA LUBRICACIÓN DE PLANTA ELÉCTRICA</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1', # Lado, Antes: 1 o Despues: 2 o Otros: 3, 4, 5
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => '1', # consecutivo del archivo real
                        'label' => 'Alarmas activas que impidan el arranque y puesta en servicio', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B167', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Nivel de aceite de la planta está dentro de las marcas Max y Min',
                        'description' =>'',
                        'place' => 'F167',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Juntas del motor de la planta',
                        'description' =>'',
                        'place' => 'J167',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Empaque y Retenedores de Carter',
                        'description' =>'',
                        'place' => 'B181',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Estado Pera o sensor de Aceite',
                        'description' =>'',
                        'place' => 'F181',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Presión de Aceite Kg/Cm2 o PSI(Indicar lectura)',
                        'description' =>'',
                        'place' => 'J181',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Evidencia de de Diluido o contaminacion.',
                        'description' =>'',
                        'place' => 'B195',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Existencia de Fugas',
                        'description' =>'',
                        'place' => 'F195',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Presion de aceite a la temperatura de operación',
                        'description' =>'',
                        'place' => 'J195',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>SISTEMA DE COMBUSTIBLE DE PLANTA ELECTRICA</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Conexiones de combustible (adecuadas y no prese+A52:E66ntan fugas) (FOTO 1)',
                        'description' =>'FOTO 1',
                        'place' => 'A210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1-2',
                        'label' => 'Conexiones de combustible (adecuadas y no prese+A52:E66ntan fugas) (FOTO 2)',
                        'description' =>'FOTO 2',
                        'place' => 'C210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Abrazaderas (FOTO 1)',
                        'description' =>'',
                        'place' => 'E210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2-2',
                        'label' => 'Abrazaderas (FOTO 2)',
                        'description' =>'',
                        'place' => 'G210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Tanques de combustible (anclados adecuadamente) (FOTO 1)',
                        'description' =>'',
                        'place' => 'I210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3-2',
                        'label' => 'Tanques de combustible (anclados adecuadamente) (FOTO 2)' ,
                        'description' =>'',
                        'place' => 'J210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3-3',
                        'label' => 'Tanques de combustible (anclados adecuadamente) (FOTO 3)',
                        'description' =>'',
                        'place' => 'K210',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Cantidad de contaminación por agua otros materiales extraños así como su calidad (densidad especifica).',
                        'description' =>'',
                        'place' => 'B224',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'las líneas de suministro de combustible de BAJA presión por: fugas, condición y seguridad (FOTO 1)',
                        'description' =>'',
                        'place' => 'E224',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5-2',
                        'label' => 'las líneas de suministro de combustible de BAJA presión por: fugas, condición y seguridad (FOTO 2)',
                        'description' =>'',
                        'place' => 'G224',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Las líneas de combustible del motor, bomba y filtros por fugas, condición y seguridad',
                        'description' =>'',
                        'place' => 'J224',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'las líneas de suministro de combustible de ALTA presión por fugas, condición y seguridad (FOTO 1)',
                        'description' =>'',
                        'place' => 'A238',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7-2',
                        'label' => 'las líneas de suministro de combustible de ALTA presión por fugas, condición y seguridad (FOTO 2)',
                        'description' =>'',
                        'place' => 'C238',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Revisar y registrar la presión de combustible',
                        'description' =>'',
                        'place' => 'F238',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'la restricción de combustible de entrada',
                        'description' =>'',
                        'place' => 'J238',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10',
                        'label' => 'Mangueras (FOTO 1)',
                        'description' =>'',
                        'place' => 'A252',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10-2',
                        'label' => 'Mangueras (FOTO 2)',
                        'description' =>'',
                        'place' => 'C252',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '11',
                        'label' => 'Resultado de Limpieza.',
                        'description' =>'',
                        'place' => 'F252',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '12',
                        'label' => 'Bomba de Inyección',
                        'description' =>'',
                        'place' => 'J266',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '13',
                        'label' => 'Bomba de Transferencia',
                        'description' =>'',
                        'place' => 'B266',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '14',
                        'label' => 'Nivel Combustible',
                        'description' =>'',
                        'place' => 'F266',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '15',
                        'label' => 'Estado válvulas de drenaje tanques (libres de objetos y se accionan facilimente)',
                        'description' =>'',
                        'place' => 'J266',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <H3>SISTEMA DE ASPIRACION</H3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Inspecciona las condiciones de las tomas de aire y los ductos y su correcta operación (FOTO 1)',
                        'description' =>'',
                        'place' => 'A281',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1-2',
                        'label' => 'Inspecciona las condiciones de las tomas de aire y los ductos y su correcta operación (FOTO 2)',
                        'description' =>'',
                        'place' => 'C281',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Revisa los filtros de aire por condición y seguridad, apretar las abrazadoras y los soportes como lo requieran (FOTO 1)',
                        'description' =>'',
                        'place' => 'E281',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2-2',
                        'label' => 'Revisa los filtros de aire por condición y seguridad, apretar las abrazadoras y los soportes como lo requieran (FOTO 2)',
                        'description' =>'',
                        'place' => 'G281',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Inspección de salida de turbocargador (de existir), boquilla y tubos por condiciones y seguridad',
                        'description' =>'',
                        'place' => 'J281',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => ' Dar servicio a los respiradores del carter y drenaje de la caja de aire como se requiera',
                        'description' =>'',
                        'place' => 'B295',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Revisar y registrar la restricción de aire de admisión',
                        'description' =>'',
                        'place' => 'F295',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Revisar y registrar la restricción de aire de admisión',
                        'description' =>'',
                        'place' => 'J295',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <H3>SISTEMA REFRIGERACIÓN DE PLANTA ELECTRICA</H3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Bomba de agua',
                        'description' =>'',
                        'place' => 'B310',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Revisar el nivel de refrigerante, rellenar como se requiera (FOTO 1)',
                        'description' =>'',
                        'place' => 'E310',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2-2',
                        'label' => 'Revisar el nivel de refrigerante, rellenar como se requiera (FOTO 2)',
                        'description' =>'',
                        'place' => 'G310',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Realizar la prueba de presión y revisar posibles fugas',
                        'description' =>'',
                        'place' => 'J310',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Revisar la banda de la polea del ventilador por condiciones y tensión adecuada y ajustar o remplazar si es necesario',
                        'description' =>'',
                        'place' => 'B324',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Revisar las mangueras y tubos de refrigerante por condiciones adecuadas y seguridad',
                        'description' =>'',
                        'place' => 'F324',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Revisar el panal del radiador por arreglo y limpieza, condiciones y seguridad',
                        'description' =>'',
                        'place' => 'J324',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Revisar los rodamientos de la polea del ventilador y la polea loca, y Revisar las condiciones y seguridad de los alojamientos, soportes y tensores',
                        'description' =>'',
                        'place' => 'B338',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Inspeccionar las aspas del ventilador, guardas y soporte por condiciones de seguridad, apretar los sujetadores',
                        'description' =>'',
                        'place' => 'F338',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Estado de Termostato',
                        'description' =>'',
                        'place' => 'J338',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10',
                        'label' => 'Nivel de Refrigerante',
                        'description' =>'',
                        'place' => 'B352',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '11',
                        'label' => 'Revisar y registrar la temperatura del refrigerante bajo condiciones de operación',
                        'description' =>'',
                        'place' => 'F352',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '12',
                        'label' => 'Sensor de nivel de Refrigerante',
                        'description' =>'',
                        'place' => 'J352',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '13',
                        'label' => 'Precalentador',
                        'description' =>'',
                        'place' => 'B366',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '14',
                        'label' => 'Sensor de temperatura',
                        'description' =>'',
                        'place' => 'F366',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '15',
                        'label' => 'Estado de ventilador',
                        'description' =>'',
                        'place' => 'J366',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>SISTEMA DE ESCAPE Y ADMISIÓN PLANTA ELECTRICA</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Multiple de Escape',
                        'description' =>'',
                        'place' => 'B381',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Revisar los tubos de escape y sus conexiones donde sean accesibles, apretar sujetadores y tornillos de brindas',
                        'description' =>'',
                        'place' => 'F381',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Turboalimentador',
                        'description' =>'',
                        'place' => 'J381',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Revisar los soportes del silenciador, operar sus drenajes',
                        'description' =>'',
                        'place' => 'B395',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Tuberia de Escape Exhosto (FOTO 1)',
                        'description' =>'',
                        'place' => 'E395',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5-2',
                        'label' => 'Tuberia de Escape Exhosto (FOTO 2)',
                        'description' =>'',
                        'place' => 'G395',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Templetes Sistema de Escape (ajustados y sin signos de oxidación) (FOTO 1)',
                        'description' =>'',
                        'place' => 'I395',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6-2',
                        'label' => 'Templetes Sistema de Escape (ajustados y sin signos de oxidación) (FOTO 2)',
                        'description' =>'',
                        'place' => 'K395',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Mangueras del Turboalimentador',
                        'description' =>'',
                        'place' => 'B409',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Estado tubería del filtro de aire. (FOTO 1)',
                        'description' =>'',
                        'place' => 'E409',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8-2',
                        'label' => 'Estado tubería del filtro de aire. (FOTO 2)',
                        'description' =>'',
                        'place' => 'G409',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Adicional Sistema de Escape',
                        'description' =>'',
                        'place' => 'J409',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>SISTEMA ELECTRICO DE MOTOR OTROS COMPONENTES DEL ELECTROGENO PARA OPERAR</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Revisar los cables de la marcha del motor, alambres y conectores por condición y seguridad (FOTO 1)',
                        'description' =>'',
                        'place' => 'A424',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1-2',
                        'label' => 'Revisar los cables de la marcha del motor, alambres y conectores por condición y seguridad (FOTO 2)',
                        'description' =>'',
                        'place' => 'C424',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Revisar y registrar el voltaje de flotación de las baterías de arranque y nivel de electrolito (FOTO 1)',
                        'description' =>'',
                        'place' => 'E424',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2-2',
                        'label' => 'Revisar y registrar el voltaje de flotación de las baterías de arranque y nivel de electrolito (FOTO 2)',
                        'description' =>'',
                        'place' => 'G424',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => ' Revisar el cargador de baterías por operación y salida Bornes de Bateria',
                        'description' =>'',
                        'place' => 'J424',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Revisar registrar la corriente de funcionamiento de la marcha',
                        'description' =>'',
                        'place' => 'B438',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Revisar los controles eléctricos, terminales de sensores',
                        'description' =>'',
                        'place' => 'F438',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Revisar la operación del pre-calentador del agua, termostatos de control y el contactor de desconexión de presión de aceite',
                        'description' =>'',
                        'place' => 'J438',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Probar todos los dispositivos de protección del motor (FOTO 1)',
                        'description' =>'',
                        'place' => 'A452',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7-2',
                        'label' => 'Probar todos los dispositivos de protección del motor (FOTO 2)',
                        'description' =>'',
                        'place' => 'C452',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Alternador y Correas',
                        'description' =>'',
                        'place' => 'F452',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Motor de Arranque',
                        'description' =>'',
                        'place' => 'J452',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10',
                        'label' => 'Arnes o cableado de control (FOTO 1)',
                        'description' =>'',
                        'place' => 'A466',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10-2',
                        'label' => 'Arnes o cableado de control (FOTO 2)',
                        'description' =>'',
                        'place' => 'C466',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '11',
                        'label' => 'Tarjeta de Control',
                        'description' =>'',
                        'place' => 'F466',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '12',
                        'label' => 'Elementos de Medición',
                        'description' =>'',
                        'place' => 'J466',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '13',
                        'label' => 'Magnetic-Pickup',
                        'description' =>'',
                        'place' => 'B480',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '14',
                        'label' => 'AVR Generador',
                        'description' =>'',
                        'place' => 'F480',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '15',
                        'label' => 'Totalizador Planta Y DIMENSIONAMIENTO',
                        'description' =>'',
                        'place' => 'J480',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '16',
                        'label' => 'Test De Lamparas, Leds Y Pilotos',
                        'description' =>'',
                        'place' => 'B494',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '17',
                        'label' => 'Fusibles y Protecciones',
                        'description' =>'',
                        'place' => 'E494',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '17-2',
                        'label' => 'Fusibles y Protecciones (FOTO 2)',
                        'description' =>'',
                        'place' => 'G494',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '18',
                        'label' => 'Tarjeta De Control De Velocidad',
                        'description' =>'',
                        'place' => 'J494',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '19',
                        'label' => 'Sensores y Manometros',
                        'description' =>'',
                        'place' => 'B508',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '20',
                        'label' => 'Batería Actual',
                        'description' =>'',
                        'place' => 'F508',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>GENERADOR (MECANICO / ELECTRICO)</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => ' Revisar y verificar los pernos de anclaje (FOTO 1)',
                        'description' =>'',
                        'place' => 'A523',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1-2',
                        'label' => 'Revisar y verificar los pernos de anclaje (FOTO 2)',
                        'description' =>'',
                        'place' => 'C523',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Revisar los tornillos del acoplamiento flexible',
                        'description' =>'',
                        'place' => 'F523',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Revisar las guardas del ventilador por condiciones y seguridad',
                        'description' =>'',
                        'place' => 'J523',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Revisar la pantalla de la toma de aire por limpieza de las líneas, condiciones y seguridad (FOTO 1)',
                        'description' =>'',
                        'place537' => 'A',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4-2',
                        'label' => 'Revisar la pantalla de la toma de aire por limpieza de las líneas, condiciones y seguridad (FOTO 2)',
                        'description' =>'',
                        'place' => 'C537',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Revisar rodamientos',
                        'description' =>'',
                        'place' => 'F537',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Revisar las conexiones mecánicas por apriete, condiciones y seguridad (FOTO 1)',
                        'description' =>'',
                        'place' => 'I537',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6-2',
                        'label' => 'Revisar las conexiones mecánicas por apriete, condiciones y seguridad (FOTO 2)',
                        'description' =>'',
                        'place' => 'K537',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Revisar y registrar el voltaje residual, en vacío y con carga',
                        'description' =>'',
                        'place' => 'B551',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Revisar el ensamble del excitador, estator y campos por limpieza de las líneas e integridad física',
                        'description' =>'',
                        'place' => 'F551',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Revisar las terminales de cables y alambres en el generador por condición y seguridad',
                        'description' =>'',
                        'place' => 'J551',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10',
                        'label' => 'Revisar el rectificador rotativo y el supresor de onda por condición, conexiones y apriete del montaje',
                        'description' =>'',
                        'place' => 'B565',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '11',
                        'label' => 'Revisar el extremo del alojamiento de la campana por limpieza de líneas e interferencia de dispositivos con ensamble rotativos',
                        'description' =>'',
                        'place' => 'F565',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '12',
                        'label' => 'Probar los dispositivos de protección del generador',
                        'description' =>'',
                        'place' => 'J565',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <H3>MÓDULO DE CONTROL</H3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Verificar la operación de los controles de encendido automático y control remoto',
                        'description' =>'',
                        'place' => 'B580',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Verificar la operación y calibración de los instrumentos del generador y el motor (FOTO 1)',
                        'description' =>'',
                        'place' => 'E580',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2-2',
                        'label' => 'Verificar la operación y calibración de los instrumentos del generador y el motor (FOTO 2)',
                        'description' =>'',
                        'place' => 'G580',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Verificar la operación del equipo de generación indicadores asociados, luces y alarmas',
                        'description' =>'',
                        'place' => 'J580',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Revisar y ajustar como se requiera para real control de potencia real y reactiva sincronizada',
                        'description' =>'',
                        'place' => 'B594',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Revisar y ajustar como se requiera la frecuencia y el voltaje del sistema',
                        'description' =>'',
                        'place' => 'F594',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>TRANSFERENCIA AUTOMATICA</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Estado del Tablero Metalico (Gabinete o Cofre) Y Puerta.',
                        'description' =>'',
                        'place' => 'B609   ',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Terminales de Conductores',
                        'description' =>'',
                        'place' => 'F609   ',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Cableado (estado y organización)',
                        'description' =>'',
                        'place' => 'J609',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Contactores Principales',
                        'description' =>'',
                        'place' => 'B623',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Vigilantes de Tensión',
                        'description' =>'',
                        'place' => 'F623',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Totalizador',
                        'description' =>'',
                        'place' => 'J623',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '7',
                        'label' => 'Temporizadores',
                        'description' =>'',
                        'place' => 'B637',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '8',
                        'label' => 'Relevos',
                        'description' =>'',
                        'place' => 'F637',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '9',
                        'label' => 'Pilotos',
                        'description' =>'',
                        'place' => 'J637',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '10',
                        'label' => 'Contactos Auxiliares',
                        'description' =>'',
                        'place' => 'B651',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '11',
                        'label' => 'Tarjeta de Control',
                        'description' =>'',
                        'place' => 'F651',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '12',
                        'label' => 'Display y Modulo de Comunicación.',
                        'description' =>'',
                        'place' => 'J651',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '13',
                        'label' => 'Proteccion sobretensiones y Transientes',
                        'description' =>'',
                        'place' => 'B665',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    <h3>TRANSFERENCIA AUTOMATICA</h3>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Funcionamiento de la Planta en Vacio.',
                        'description' =>'',
                        'place' => 'B680',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Funcionamiento de la Planta con Carga',
                        'description' =>'',
                        'place' => 'F680',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Transferencia automatica entre Red Comercial y Planta (y viceversa)',
                        'description' =>'',
                        'place' => 'J680',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Funcionamiento de planta forzada desde transferencia (Manual)',
                        'description' =>'',
                        'place' => 'B',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                </div>
            </div>
        </section>
    @endsection

    @section('js')
        <script src="{{ asset('js/moment/moment.js') }}" defer></script>
        <script src="{{ asset('js/project/mintic/water_marker/maintenance.js') }}"></script>
    @endsection

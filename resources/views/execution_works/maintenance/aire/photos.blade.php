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
            value="project/maintenance/smu/air/{{ $id }}/{{ $item->id }}/upload"
            data-url="/project/maintenance/smu/air/{{ $id }}/{{ $item->id }}/upload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto SMU</div>
                <div class="box-tools">
                    <a href="{{ route('air_index', $id) }}" class="btn btn-sm btn-primary">Volver</a>
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
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1', # Lado, Antes: 1 o Despues: 2 o Otros: 3, 4, 5
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'CONDENSADORA POS MANTENIMIENTO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B86', # la celda en el excel
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
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'EVAPORADORA POS MANTENIMIENTO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'G86', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'FILTROS POS MANTENIMIENTO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'K86', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'PANORAMICA UNIDAD CONDENSADORA', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B100', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'PANORAMICA UNIDAD MANEJADORA', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'G100', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'PANORAMICA COMPRESOR', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'K100', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'PANORAMICA DEL AIRE ACONDICIONADO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B114', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'MOTOR Y ASPA CONDENSADORA', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'G114', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'TEMPERATURA AIRE DE ENTRADA', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B114', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'TEMPERATURA AIRE DE SALIDA', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B128', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'TEMPERATURA SALON', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'G128', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'TERMOSTATO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'K128', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'AJUSTES MECANICOS Y ELECTRICOS', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'B142', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'AJUSTES MECANICOS Y ELECTRICOS', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'G142    ', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item, # el registro
                        'num' => $i++, # Consetivo de la archivo identado
                        'size_letter' => 20, #Tamaño de la foto y por defecto 20
                        'it' => $i, # consecutivo del archivo real
                        'label' => 'SERIAL DEL ELEMENTO', #Nombre del archivo a adjuntar
                        'description' =>'', #Descripción
                        'place' => 'K142', # la celda en el excel
                        'accept' => 'image/*', # tipo de archivo
                        'date_edit' => true, # fecha para marca de agua
                        'delete' => true, #permite eliminar foto
                        'sin' => false #Sin marca de agua
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

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
            value="project/maintenance/smu/land/{{ $id }}/{{ $item->id }}/upload"
            data-url="/project/maintenance/smu/land/{{ $id }}/{{ $item->id }}/upload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto SMU</div>
                <div class="box-tools">
                    <a href="{{ route('land_index', $id) }}" class="btn btn-sm btn-primary">Volver</a>
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
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => $i,
                        'label' => 'PARARRAYOS',
                        'description' =>'',
                        'place' => 'B62',
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
                        'it' => $i,
                        'label' => 'BAJANTE DE PARARAYOS TORRE',
                        'description' =>'',
                        'place' => 'F62',
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
                        'it' => $i,
                        'label' => 'SPT DE POWER',
                        'description' =>'',
                        'place' => 'J62',
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
                        'it' => $i,
                        'label' => 'PROTECCIONES CONTRA SOBRE TENSIONES DSP',
                        'description' =>'',
                        'place' => 'B76',
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
                        'it' => $i,
                        'label' => 'BAJANTE DE TORRE - FOTO(1)',
                        'description' =>'',
                        'place' => 'E76',
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
                        'it' => $i,
                        'label' => 'BAJANTE DE TORRE - FOTO(2)',
                        'description' =>'',
                        'place' => 'F76',
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
                        'it' => $i,
                        'label' => 'BAJANTE DE TORRE - FOTO(3)',
                        'description' =>'',
                        'place' => 'G76',
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
                        'it' => $i,
                        'label' => 'ELECTRODO No.1',
                        'description' =>'',
                        'place' => 'J76',
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
                        'it' => $i,
                        'label' => 'ELECTRODO No.2',
                        'description' =>'',
                        'place' => 'B90',
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
                        'it' => $i,
                        'label' => 'ELECTRODO No.3',
                        'description' =>'',
                        'place' => 'F90',
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
                        'it' => $i,
                        'label' => 'ELECTRODO No.4',
                        'description' =>'',
                        'place' => 'J90',
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
                        'it' => $i,
                        'label' => 'SPT PLANTA ELECTRICA',
                        'description' =>'',
                        'place' => 'B104',
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
                        'it' => $i,
                        'label' => 'SPT CUARTO DE EQUIPOS',
                        'description' =>'',
                        'place' => 'F104',
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
                        'it' => $i,
                        'label' => 'SPT EN CUARTO DE TRANSFERENCIA',
                        'description' =>'',
                        'place' => 'J104',
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
                        'it' => $i,
                        'label' => 'BAJANTE DE CONCERTINA',
                        'description' =>'',
                        'place' => 'B118',
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
                        'it' => $i,
                        'label' => 'PUESTA A TIERRA EQUIPOS DE ACCESO',
                        'description' =>'',
                        'place' => 'F118',
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
                        'it' => $i,
                        'label' => 'PUESTA A TIERRA DE ESTRUCTURAS METALICAS',
                        'description' =>'',
                        'place' => 'J118',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.1',
                        'description' =>'',
                        'place' => 'B132',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.2',
                        'description' =>'',
                        'place' => 'F132',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.3',
                        'description' =>'',
                        'place' => 'J132',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.4',
                        'description' =>'',
                        'place' => 'B146',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.5',
                        'description' =>'',
                        'place' => 'F146',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.6',
                        'description' =>'',
                        'place' => 'J146',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.7',
                        'description' =>'',
                        'place' => 'B160',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.8',
                        'description' =>'',
                        'place' => 'F160',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.9',
                        'description' =>'',
                        'place' => 'J160',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.10',
                        'description' =>'',
                        'place' => 'B174',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.11',
                        'description' =>'',
                        'place' => 'F174',
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
                        'it' => $i,
                        'label' => 'LECTURA DE TELUROMETRO No.12',
                        'description' =>'',
                        'place' => 'J174',
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

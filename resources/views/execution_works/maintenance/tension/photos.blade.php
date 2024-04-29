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
            value="project/maintenance/smu/strain/{{ $id }}/{{ $item->id }}/upload"
            data-url="/project/maintenance/smu/strain/{{ $id }}/{{ $item->id }}/upload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto SMU</div>
                <div class="box-tools">
                    <a href="{{ route('strain_index', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                @php
                    $i = 0;
                @endphp
                <h3>REGISTRO FOTOGRÁFICO</h3>
                <h4>FIRMA DE FUNCIONARIOS</h4>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => 1000,
                    'size_letter' => 20,
                    'it' => 0.1,
                    'label' => 'FIRMA DEL TECNICO',
                    'description' =>'Las firmas deben ser fondo blanco png, si el tamaño es muy grande deberán ser ordenadas en el archivo',
                    'place' => 'B172',
                    'accept' => 'image/*',
                    'date_edit' => false,
                    'delete' => true,
                    'sin' => false
                ])
                <hr>
                <h4>FIRMA DE FUNCIONARIOS</h4>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => 1001,
                    'size_letter' => 20,
                    'it' => 0.1,
                    'label' => 'FIRMA DEL REVISOR',
                    'description' =>'Las firmas deben ser fondo blanco png, si el tamaño es muy grande deberán ser ordenadas en el archivo',
                    'place' => 'E172',
                    'accept' => 'image/*',
                    'date_edit' => false,
                    'delete' => true,
                    'sin' => false
                ])
                <hr>
                {{-- <div class="row">
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
                </div> --}}
                <h4>5. FORMATO FOTOGRÁFICO</h4>

                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => $i,
                        'label' => 'PANORAMICA DEL TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'B50',
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
                        'label' => 'PANORAMICA DEL CORTACIRCUITOS',
                        'description' =>'',
                        'place' => 'F50',
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
                        'label' => 'PANORAMICA DEL TGD',
                        'description' =>'',
                        'place' => 'J50',
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
                        'label' => 'AISLADORES DEL TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'B64',
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
                        'label' => 'PARARRAYOS DEL TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'F64',
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
                        'label' => 'CUBA DEL TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'J64',
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
                        'label' => 'CORTACIRCUITOS DE ARRANQUE',
                        'description' =>'',
                        'place' => 'B78',
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
                        'label' => 'PLACA DEL TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'F78',
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
                        'label' => 'POSTE',
                        'description' =>'',
                        'place' => 'J78',
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
                        'label' => 'BAJANTE DE SPT',
                        'description' =>'',
                        'place' => 'B92',
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
                        'label' => 'SPT TRANSFORMADOR',
                        'description' =>'',
                        'place' => 'F92',
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
                        'label' => 'CATENARIA MT Aprox. 300 mts',
                        'description' =>'',
                        'place' => 'J92',
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
                        'label' => 'INSTALACION BT',
                        'description' =>'',
                        'place' => 'B106',
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
                        'label' => 'PANORAMICA DE LA TRANSFERENCIA',
                        'description' =>'',
                        'place' => 'F106',
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
                        'label' => 'PANORAMICA DEL MEDIDOR',
                        'description' =>'',
                        'place' => 'J106',
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
                        'label' => 'MEDICION DE TENSION R-S',
                        'description' =>'',
                        'place' => 'B120',
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
                        'label' => 'MEDICION DE TENSION S-T',
                        'description' =>'',
                        'place' => 'F120',
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
                        'label' => 'MEDICION DE TENSION R-T',
                        'description' =>'',
                        'place' => 'J120',
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
                        'label' => 'MEDICION DE CORRIENTE FASE R',
                        'description' =>'',
                        'place' => 'B134',
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
                        'label' => 'MEDICION DE CORRIENTE FASE S',
                        'description' =>'',
                        'place' => 'F134',
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
                        'label' => 'MEDICION DE CORRIENTE FASE T',
                        'description' =>'',
                        'place' => 'J134',
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
                        'label' => 'MEDICION DE TENSION FASE R Y NEUTRO',
                        'description' =>'',
                        'place' => 'B148',
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
                        'label' => 'MEDICION DE TENSION FASE S Y NEUTRO',
                        'description' =>'',
                        'place' => 'F148',
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
                        'label' => 'MEDICION DE TENSION FASE T Y NEUTRO',
                        'description' =>'',
                        'place' => 'J148',
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

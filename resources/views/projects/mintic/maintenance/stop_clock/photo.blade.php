@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Parada de reloj proyecto mintic <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li><a href="#">Mantenimiento</a></li>
            <li class="active">Parada de reloj</li>
        </ol>
    </section>
    <div class="hide">
        <input type="hidden" value="{{ $id }}" id="data_id">
        <input type="hidden" value="{{ $item->id }}" id="data_item">
        <input type="hidden" id="url"
            value="project/mintic/maintenance/{{ $id }}/stop_clock/{{ $item->id }}/approve"
            data-url="/project/mintic/maintenance/{{ $id }}/stop_clock/{{ $item->id }}/upload">
    </div>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_clock_stop', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                @php
                    $i = 1;
                @endphp
                <h3>EVIDENCIAS PARADA DE RELOJ 1</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => '1ra parada',
                    'accept' => 'image/*',
                    'place' => 'B12',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '2',
                    'label' => '1ra parada',
                    'accept' => 'image/*',
                    'place' => 'G12',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '3',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => '1ra parada',
                    'accept' => 'image/*',
                    'place' => 'L12',
                    'date_edit' => true,
                ])
                <hr>
                <h3>EVIDENCIAS PARADA DE RELOJ 2</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => '2da parada',
                    'accept' => 'image/*',
                    'place' => 'B29',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '2',
                    'label' => '2da parada',
                    'accept' => 'image/*',
                    'place' => 'G29',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '3',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => '2da parada',
                    'accept' => 'image/*',
                    'place' => 'L29',
                    'date_edit' => true,
                ])
                <hr>
                <h3>EVIDENCIAS PARADA DE RELOJ 3</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => '3ra parada',
                    'accept' => 'image/*',
                    'place' => 'B46',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '2',
                    'label' => '3ra parada',
                    'accept' => 'image/*',
                    'place' => 'G46',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '3',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => '3ra parada',
                    'accept' => 'image/*',
                    'place' => 'L46',
                    'date_edit' => true,
                ])
                <hr>
                <h3>EVIDENCIAS PARADA DE RELOJ 1</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => '4ta parada',
                    'accept' => 'image/*',
                    'place' => 'B63',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '2',
                    'label' => '4ta parada',
                    'accept' => 'image/*',
                    'place' => 'G63',
                    'date_edit' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '3',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => '4ta parada',
                    'accept' => 'image/*',
                    'place' => 'L63',
                    'date_edit' => true,
                ])
                <hr>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/project/mintic/water_marker/maintenance.js') }}"></script>
@endsection

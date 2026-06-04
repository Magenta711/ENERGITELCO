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
            value="project/maintenance/smu/operation/{{ $id }}/{{ $item->id }}/upload"
            data-url="/project/maintenance/smu/operation/{{ $id }}/{{ $item->id }}/upload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto SMU</div>
                <div class="box-tools">
                    <a href="{{ route('operation_index', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">

                @php
                    $i = 0;
                @endphp
                <h3>REGISTRO FOTOGRÁFICO</h3>
                <form action="{{ route('operation_cantidad_photos',[$id,$item->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="numPhoto">Cantidad de fotos</label>
                            <input type="number" name="numPhoto" class="form-control" id="numPhoto" value="{{ $item->cantidad_fotos }}">
                        </div>
                        <button class="btn btn-success" id="btnPhoto">Agregar</button>
                    </div>
                </div>
                </form>
                <hr>
                @php
                $k=23;
                @endphp
                <form action="{{ route('operation_descripcion_photos',[$id,$item->id]) }}" id="operation_descripcion_photos" method="POST">
                    @method('PUT')
                    @csrf
                    @for ($j = 1; $j <= ($item->cantidad_fotos); $j++)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description[{{ $j }}]">Descripción Foto #{{ $j }}</label>
                                        <textarea name="description[{{ $j }}]" id="description[{{ $j }}]" cols="10" rows="1" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        @php
                        $kl=5;
                            if ($j % 2 == 0) {
                                $b='H';
                            } else {
                                $b='B';
                                $k=$k+15;
                            }

                        @endphp
                        @foreach ($item->files as $items)
                            @if ($items->description=='1. FOTO '.$kl)
                                <p>{{ $items->commentary }}</p>
                            @endif
                        @endforeach
                        {{-- <p>{{ $item->files->description == '1. FOTO '.$kl ? }}</p> --}}
                        <div class="photos">
                                @include('projects.mintic.includes.upload', [
                                    'ltt' => '1',
                                    'id' => $item,
                                    'num' => $i++,
                                    'size_letter' => 20,
                                    'it' => $i,
                                    'label' => 'FOTO '.$i,
                                    'description' =>'',
                                    'place' => $b.$k,
                                    'accept' => 'image/*',
                                    'date_edit' => false,
                                    'delete' => true,
                                    'sin' => false
                                ])
                        </div>
                        <hr>
                    @endfor
                </form>
                @php
                    $p=0;
                    $p=23+(($item->cantidad_fotos)/2)*15+26;
                @endphp
                <div class="transport">
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '0',
                        'label' => 'FOTO DE TRANSPORTE',
                        'description' =>'',
                        'place' => 'J'.$p,
                        'accept' => 'image/*',
                        'date_edit' => false,
                        'delete' => true,
                        'sin' => false
                    ])
                    <hr>
                </div>

                <button id="btnEnviarFormulario" class="btn btn-primary">Guardar descripciones</button>
            </div>
        </section>
    @endsection

    @section('js')
        <script src="{{ asset('js/moment/moment.js') }}" defer></script>
        <script src="{{ asset('js/project/mintic/water_marker/maintenance.js') }}"></script>

        <script>
            $(document).ready(function(){
                let cant = $('#numPhoto').val();
                if(cant==0){
                    $('.transport').hide();
                }else{
                    $('.transport').show();
                }

                $('#btnEnviarFormulario').on('click', function() {
                    $('#operation_descripcion_photos').submit();
                });
            });
        </script>
    @endsection

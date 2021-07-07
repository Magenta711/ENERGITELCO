@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto de desmonte <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Desmontes</a></li>
        <li class="active">Crear desmontes</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Crear proyecto de desmonte</div>
            <div class="box-tools">
                @can('Crear proyectos')
                <a href="{{route('clearings')}}" class="btn btn-sm btn-primary">Volver</a>
                @endcan
            </div>
        </div>
        <form action="{{ route('clearings_store') }}" method="post" autocomplete="off">
            @csrf
        <div class="box-body">
            <h4>1. Información general</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Fecha de ejecución</label>
                        <input type="date" name="date" id="date" value="{{ now()->format('Y-m-d') }}" readonly class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_ot">ID/OT instalación</label>
                        <input type="text" name="id_ot" id="id_ot" value="{{ old('id_ot') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ot_rr">OT RR</label>
                        <input type="text" name="ot_rr" id="ot_rr" value="{{ old('ot_rr') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="region">Región</label>
                        <input type="text" name="region" id="region" value="{{ old('region') ?? 'Noroccidente' }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_a">Estación A</label>
                        <input type="text" name="estation_a" id="estation_a" value="{{ old('estation_a') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estation_b">Estación B</label>
                        <input type="text" name="estation_b" id="estation_b" value="{{ old('estation_b') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="brand_radion">Marca radio</label>
                        <input type="text" name="brand_radion" id="brand_radion" value="{{ old('brand_radion') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" name="model" id="model" value="{{ old('model') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="banda">Banda</label>
                        <input type="text" name="banda" id="banda" value="{{ old('banda') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sud_banda">Sub_banda</label>
                        <input type="text" name="sud_banda" id="sud_banda" value="{{ old('sud_banda') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="concept_technical">Concepto técnico HW</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{(old('concept_technical') == 'Estado funcinal') ? 'checked' : '' }} name="concept_technical" id="concept_technical1" value="Estado funcinal">
                            <label class="form-check-label" for="concept_technical1">
                                Estado funcional
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{(old('concept_technical') == 'Obsoleto') ? 'checked' : '' }} name="concept_technical" id="concept_technical2" value="Obsoleto">
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
                            <input class="form-check-input" type="radio" {{(old('concept_fisico') == 'Buen estado') ? 'checked' : '' }} name="concept_fisico" id="concept_fisico1" value="Buen estado">
                            <label class="form-check-label" for="concept_fisico1">
                                Buen estado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" {{(old('concept_fisico') == 'Mal estado') ? 'checked' : '' }} name="concept_fisico" id="concept_fisico2" value="Mal estado">
                            <label class="form-check-label" for="concept_fisico2">
                                Mal estado
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lat">Latitud</label>
                        <input type="text" id="lat" name="lat" value="{{ old('lat') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="long">Longitud</label>
                        <input type="text" id="long" name="long" value="{{ old('long') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="height">Altitud</label>
                        <input type="text" id="height" name="height" value="{{ old('height') }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-success">Continuar</button>
        </div>
        </form>
    </div>
</section>
@endsection
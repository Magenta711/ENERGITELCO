@extends('lte.layouts')

@php
    function getFormula($hasFormula)
    {
        $formula = explode(' ',$hasFormula);
        for ($i=0; $i < count($formula); $i++) { 
            echo '<div class="col-sm-2 text-center">';
            $ok = false;
            if ($formula[$i] == '*') {
                echo "<label>Operador</label><br>*";
                $ok = true;
            }
            if ($formula[$i] == '/') {
                echo "<label>Operador</label><br>/";
                $ok = true;
            }
            if ($formula[$i] == '-') {
                echo "<label>Operador</label><br>-";
                $ok = true;
            }
            if ($formula[$i] == '+') {
                echo "<label>Operador</label><br>+";
                $ok = true;
            }
            if ($formula[$i] == '(') {
                echo "<label>Operador</label><br>(";
                $ok = true;
            }
            if ($formula[$i] == ')') {
                echo "<label>Operador</label><br>)";
                $ok = true;
            }
            if (is_numeric($formula[$i])) {
                echo "<label>Valor</label><br>".$formula[$i];
                $ok = true;
            }
            if (!$ok) {
                echo '<label class="text-left" for="'.$formula[$i].'">'.implode(' ',explode('_',$formula[$i])).'</label><input type="number" class="form-control input-formula" placeholder="'.$formula[$i].'" id="'.$formula[$i].'">';
            }
            echo '</div>';
        }
    }
@endphp

@section('content')
<section class="content-header">
    <h1>
        Seguimiento indicador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Dirección</a></li>
        <li><a href="#">Indicadores</a></li>
        <li class="active">Seguimiento indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">{{ $id->name }}</div>
            <div class="box-tools">
                <a href="{{route('indicators')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <form action="{{route('indicators_tracing_save',$id->id)}}" method="post" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <p>{{ $id->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formula">Formula</label>
                            <p>{{ $id->formula }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="periodicity">Peridicidad</label>
                            <p>{{ $id->periodicity }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="goal">Meta</label>
                            <p>{{ $id->goal }} %</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="process_id">Proceso</label>
                            <p>{{ $id->process_id }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="analysis">Análisis</label>
                    <p>{{ $id->analysis }}</p>
                </div>
                <hr>
                <h4>Fechas de cortes</h4>
                <div class="row" id="destino_breack">
                    @foreach ($id->months as $item)
                        @if ($item->type == 1)
                            <div class="origen_breack col-sm-3" id="origen_breack">
                                <div class="form-group">
                                    {{ $item->getDateBreack() }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                @if (!$id->isAuto)
                    <input type="hidden" id="hasFormula" value="{{ $id->hasFormula }}">
                <div class="row">
                    {{ getFormula($id->hasFormula) }}
                </div>
                <input type="hidden" name="value" id="value">
                <p id="preview_form"></p>
                @endif
                
            </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-success">Guardar</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/indicators/tracing.js') }}"></script>
@endsection
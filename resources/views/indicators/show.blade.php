@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Informe de indicador
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Dirección</a></li>
        <li><a href="#"> Indicadores</a></li>
        <li class="active">Informe de indicadores</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Informe de calculo de indicador {{ $id->name }}</div>
            <div class="box-tools">
                <a href="{{route('indicators')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Inidicador</strong>
                        </div>
                        <div class="col-sm-6">
                            {{ $id->name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Fórmula</strong>
                        </div>
                        <div class="col-sm-6">
                            {{ $id->formula }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Proceso</strong>
                        </div>
                        <div class="col-sm-6">
                            {{ $id->process_id }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Frecuencia de medición</strong>
                        </div>
                        <div class="col-sm-6">
                            {{ $id->periodicity }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>Meta (%)</strong>
                        </div>
                        <div class="col-sm-6">
                            {{ $id->goal }} %
                            <input type="hidden" value="{{ $id->goal }}" id="goal_value">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-5 text-center">
                    @foreach ($id->registers as $item)
                        <input type="hidden" value="{{ $item->value }}" class="values">
                        <input type="hidden" value="{{ $item->cut }}" class="cuts">
                        <input type="hidden" value="{{ $item->goal }}" class="goals">
                    @endforeach
                    <label class="label label-success">Gráfica</label>
                    @if (count($id->registers))
                        <div id="line-chart" style="height: 250px;"></div>
                    @else
                        <p class="text-left text-muted"><small>No hay registros para graficar</small></p>
                    @endif
                </div>
            </div>
            <hr>
            <h4>Análisis</h4>
            <p>{!! str_replace("\n", '</br>', addslashes($id->analysis)) !!}</p>
            <hr>
            <h4>Planes de acción</h4>
            <div class="table-responsive table-hover">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
    <!-- Morris chart -->
    {{-- <link rel="stylesheet" href="bower_components/morris.js/morris.css"> --}}
    <script>
        let values = $('.values');
        let goals = $('.goals');
        let cuts = $('.cuts');
        let goal = 70;
        var data = new Array();
        for (let i = 0; i < values.length; i++) {
            data[i] = { y: cuts[i].value, a: goals[i].value, b: values[i].value};
        }

        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Meta %', 'Resultado'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray','red']
        };
        config.element = 'line-chart';
        Morris.Line(config);
    </script>
@endsection
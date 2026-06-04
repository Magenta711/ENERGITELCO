@extends('lte.layouts')

@section('content')
    {{-- <div class="container">
        <h3 class="text-center">KW/H ACUMULADOS MES A MES</h3>
  <div id="bar-chart" style="position: absolute; top: 0; left: 0; right: 0;"></div>
  <div id="line-chart" style="position: absolute; top: 0; left: 0; right: 0;"></div>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <script>
        $(function() {
            var data = @json($retorno);
            console.log(data);

            new Morris.Bar({
                element: 'bar-chart',
                data: data,
                xkey: 'mes',
                ykeys: ['kw'],
                labels: ['KW/H Mensual Acumulado'],
                barColors: ['#c0392b'],
                xLabelAngle: 60,
                hideHover: 'auto',
                resize: true,
                parseTime: false
            });

            new Morris.Line({
                element: 'line-chart',
                data: data,
                xkey: 'mes',
                ykeys: ['cop'],
                labels: ['COP Mensual Acumulado'],
                lineColors: ['#27ae60'],
                lineWidth: 2,
                pointSize: 3,
                fillOpacity: 0,
                smooth: true,
                resize: true,
                parseTime: false
            });
        });
    </script> --}}

    
@endsection

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pre-Cotización</title>
    <style>
        /* Fuente compatible con DomPDF */
        @font-face {
            font-family: 'DejaVuSans';
            src: local('DejaVu Sans'), local('DejaVuSans');
        }

        body {
            font-family: DejaVuSans, sans-serif;
            font-size: 9pt;
            margin: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 2px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        h2 {
            font-size: 12pt;
        }

        /* Evita que partes de la tabla se corten */
        table,
        tr,
        td {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    @php
        function excelToPosition($coord)
        {
            // Separar columna (letras) y fila (números)
            $column = strtoupper(preg_replace('/[0-9]/', '', $coord)); // "C"
            $row = intval(preg_replace('/[^0-9]/', '', $coord)); // 3

            // Convertir columna a índice numérico (A=0, B=1, C=2, ...)
            $colIndex = 0;
            $letters = str_split($column);
            foreach ($letters as $i => $letter) {
                $colIndex = $colIndex * 26 + (ord($letter) - 64);
            }
            $colIndex--; // para empezar desde 0

            // Ajustar escalas según tamaño del PDF
            $colWidth = 90; // ancho estimado por columna
            $rowHeight = 23; // alto estimado por fila
            $left = $colIndex * $colWidth;
            $top = 20 + $row * $rowHeight;

            return "top: {$top}px; left: {$left}px;";
        }

        $coordenadas = [
            1 => ['top' => '100px', 'left' => '40px'], //Servicios
            2 => ['top' => '500px', 'left' => '40px'], //Mapa
            3 => ['top' => '100px', 'left' => '750px'], //Grafica 1
            4 => ['top' => '500px', 'left' => '750px'], //Grafica 2
            5 => ['top' => '50px', 'left' => '70px'], //Grafica 3
        ];

        $posicion = 0;

    @endphp

    <div style="position: relative; width: 100%; min-height: 100vh; page-break-after: always;">
        @foreach ($files as $file)
            @if ($file['place'] == 1)
                @include('energy.quoteSystem.tablas.partial.image', ['file' => $file])
            @endif
        @endforeach
        {{-- Tabla 1 --}}
        @include('energy.quoteSystem.tablas.tabla1')
    </div>
    <div style="position: relative; width: 100%; min-height: 100vh; page-break-after: always;">
        @foreach ($files as $file)
            @if ($file['place'] == 2)
                @include('energy.quoteSystem.tablas.partial.image', ['file' => $file])
            @endif
        @endforeach
        {{-- Tabla 1 --}}
        @include('energy.quoteSystem.tablas.tabla2')
    </div>
    <div style="position: relative; width: 100%; min-height: 100vh; page-break-after: always;">
        @foreach ($files as $item => $file)
            @if ($file['place'] == 3)
                @php
                    $posicion++;
                @endphp
                @include('energy.quoteSystem.tablas.partial.image2', ['file' => $file])
            @endif
        @endforeach
        {{-- Tabla 1 --}}
        @include('energy.quoteSystem.tablas.tabla3')
    </div>
    <div style="position: relative; width: 100%; min-height: 100vh;">
        {{-- Tabla 4 --}}
        @foreach ($files as $item => $file)
            @if ($file['place'] == 4)
                @php
                    $posicion=5;
                @endphp
                @include('energy.quoteSystem.tablas.partial.image2', ['file' => $file])
            @endif
        @endforeach
        @include('energy.quoteSystem.tablas.tabla4')
    </div>
</body>

</html>

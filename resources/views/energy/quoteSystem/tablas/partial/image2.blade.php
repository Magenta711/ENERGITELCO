@php
    $position = $coordenadas[$posicion] ?? 'top: 0px; left: 0px;';
    $base64 = base64_encode(file_get_contents($file['path']));
    $ext = pathinfo($file['path'], PATHINFO_EXTENSION);
@endphp

<img src="data:image/{{ $ext }};base64,{{ $base64 }}"
     style="position: absolute;  top: {{ $coordenadas[$posicion]['top'] }}; left: {{ $coordenadas[$posicion]['left'] }};;
            height: {{ $file['height'] ?? 100 }}px;">

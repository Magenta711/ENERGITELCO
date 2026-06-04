@php
    $position = excelToPosition($file['coordinates']);
    $base64 = base64_encode(file_get_contents($file['path']));
    $ext = pathinfo($file['path'], PATHINFO_EXTENSION);
@endphp

<img src="data:image/{{ $ext }};base64,{{ $base64 }}"
     style="position: absolute; {{ $position }};
            height: {{ $file['height'] ?? 100 }}px;">

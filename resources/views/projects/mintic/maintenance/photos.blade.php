@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Mantenimiento <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Proyectos</a></li>
            <li><a href="#">Mintic</a></li>
            <li class="active">Mantenimiento</li>
        </ol>
    </section>
    <div class="hide">
        <input type="hidden" value="{{ $id }}" id="data_id">
        <input type="hidden" value="{{ $item->id }}" id="data_item">
        <input type="hidden" id="url"
            value="project/mintic/maintenance/{{ $id }}/stop_clock/{{ $item->id }}/approve"
            data-url="/project/mintic/maintenance/{{ $id }}/{{ $item->id }}/updload">
    </div>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title"> proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{ route('mintic_maintenance', $id) }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                @php
                    $i = 1;
                @endphp
                <h3>REGISTRO FOTOGRÁFICO ANTES</h3>
                <h4>5. FORMATO FOTOGRÁFICO</h4>
                @if ($item->type_format == 'Mantenimiento correctivo')
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Coordenadas geográficas',
                        'description' =>
                            'Captura de las coordenadas geográficas arrjadas por GPS con mínimo 5 cifras decimales',
                        'place' => 'B12',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                @endif
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Equipos wifi interior',
                    'description' => 'Registro fotográfico de Access Point Interior',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'G12' : 'B12',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Equipos de wifi exterior 1 (AP 1)',
                    'description' => 'Registro fotográfico del Access Point Externo 1',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'L12' : 'G12',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Equipos de wifi exterior 2 (AP 2)',
                    'description' => 'Registro fotográfico del Access Point Externo 2',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B29' : 'L12',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @if ($item->type_format == 'Mantenimiento correctivo')
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Equipos de computo de la sede conectados a internet',
                        'description' =>
                            'Registro fotográfico de los equipos de computo de la sede conectados al punto de acceso inalámbrico WIFI interior del centro digital (MINTIC), con acceso a internet (ejemplo ping a una pagina o servidor, navegación en paginas como las de un diario digital nacional, donde se evidencie la fechas, entre otras); sugerencia evidenciar que se esta conectado a la señal wifi del Centro Digital.',
                        'place' => 'G29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' =>
                            'Dipositivo móvil conectado al punto de acceso inalámbrico exterior del centro digital',
                        'description' =>
                            'Registro fotográfico o captura de pantalla de un equipo móvil conectado a la red wifi exterior del centro digital (<b>MINTIC_CONECTA</b>), collage de imágenes donde se evidencie contexto y la segunda evidencie la navegación',
                        'place' => 'L29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                @endif
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Señaletica exterior',
                    'description' => 'Registro fotográfico de la señaletica exterior',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B46' : 'B80',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Señaletica interior',
                    'description' => 'Registro fotográfico de la señaletica interior',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'G46' : 'L63',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @if ($item->type_format == 'Mantenimiento correctivo')
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Solución de respaldo (4 horas) Si aplica',
                        'description' =>
                            'Registro fotográfico de la solución de respaldo, Aplica siempre y cuendo no se instale una solución alternativa <b>Gabinete abierto</b>',
                        'place' => 'G46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                @endif
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'PRINT de sercidor trirada con evento creado a UPS',
                    'description' =>
                        'Se debe crear un evento en la UPS entrar al servidor TRIARA y tomar el print de pantalla buscando IP de la UPS  (Servidor de prueba <a target="_blank" href="https://mintictsps.triara.co:9090/#/monitoring/events">https://mintictsps.triara.co:9090/#/monitoring/events</a> Usuario: <b>implementa_mintic</b> Contraseña: <b>Impl3m3nt@2o2!</b>)',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B63' : 'B97',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Medición eléctrica 1',
                    'description' => 'Fase - Neutro',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'G63' : 'G80',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Medición eléctrica 1.2',
                    'description' => 'Fase - Tierra',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Medición eléctrica 1.3',
                    'description' => 'Neutro - Tierra',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Medición eléctrica 2',
                    'description' => 'Bacteria',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'L63' : 'L80',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Navegación AP INDOOR',
                    'description' => 'Navegación equipos de computo conectados al AP Indoor (<b>MINTIC</b>)
                                                                                                                <ul>
                                                                                                                    <li>ping www.google.com /n 100</li>
                                                                                                                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                                                                                                                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                                                                                                                </ul>',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B80' : 'G97',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Navegación AP OUTDOOR',
                    'description' => 'Navegación equipos de computo conectados al AP Outdoor (<b>MINTIC_CONECTA</b>)
                                                                                                                <ul>
                                                                                                                    <li>ping <a target="_blank" href="https://www.faceboock.com">www.faceboock.com</a> /n 100</li>
                                                                                                                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                                                                                                                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                                                                                                                </ul>',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'G80' : 'L97',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Prueba de velocidad',
                    'description' => 'Navegación equipos de computo velocidad.
                                                                                                                <ul>
                                                                                                                    <li>Realizar test de velocidad en la página: <a target="_blank" href="https://www.nperf.com/es/">https://www.nperf.com/es/</a>/</li>
                                                                                                                    <li>Realizar test de velocidad en la página: <a target="_blank" href="https://testmy.net/">https://testmy.net/</a>/</li>
                                                                                                                </ul>',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'L80' : 'B114',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Conectividad portal cautivo',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B97' : 'G114',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Bloqueo de páginas',
                    'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                                                                                                                <ul>
                                                                                                                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                </ul>',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'G97' : 'L114',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Bloquedo de páginas',
                    'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                                                                                                                <ul>
                                                                                                                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                </ul>',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'L97' : 'B131',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '1',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Medida de la tierra',
                    'place' => $item->type_format == 'Mantenimiento correctivo' ? 'B97' : 'G114',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @if ($item->type_format == 'Mantenimiento preventivo')
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'RACK METALICO SI APLICA',
                        'place' => 'B29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'UPS SI APLICA',
                        'place' => 'G29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'BATERIA SI APLICA',
                        'place' => 'L29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'KIT PANEL SOLARX4 FOTOVOLTAICO SI APLICA',
                        'place' => 'B46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'CONTROLADOR SI APLICA',
                        'place' => 'G46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'INVERSOR PST-600-48 MODULO SOLAR SAMLX SI APLICA',
                        'place' => 'L46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'POSTE 3MTS SOPORTE PANEL SOLAR SI PLICA',
                        'place' => 'B63',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'RADIO SUSCRIPTOR SI APLICA',
                        'place' => 'G63',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '1',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'KIT SATELITAL SI APLICA',
                        'place' => 'G131',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                @endif
                <div class="form-group">
                    <label for="">Observaciones</label>
                    <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                @if ($item->type_format == 'Mantenimiento correctivo')
                    <hr>
                    <h3>REGISTRO FOTOGRÁFICO DESPÚES</h3>
                    <h4>5. FORMATO FOTOGRÁFICO</h4>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Coordenadas geográficas',
                        'description' =>
                            'Captura de las coordenadas geográficas arrjadas por GPS con mínimo 5 cifras decimales',
                        'place' => 'B12',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Equipos wifi interior',
                        'description' => 'Registro fotográfico de Access Point Interior',
                        'place' => 'G12',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '1',
                        'label' => 'Equipos de wifi exterior 1 (AP 1)',
                        'description' => 'Registro fotográfico del Access Point Externo 1',
                        'place' => 'L12',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Equipos de wifi exterior 2 (AP 2)',
                        'description' => 'Registro fotográfico del Access Point Externo 2',
                        'place' => 'B29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' => 'Equipos de computo de la sede conectados a internet',
                        'description' =>
                            'Registro fotográfico de los equipos de computo de la sede conectados al punto de acceso inalámbrico WIFI interior del centro digital (<b>MINTIC</b>), con acceso a internet (ejemplo ping a una pagina o servidor, navegación en paginas como las de un diario digital nacional, donde se evidencie la fechas, entre otras); sugerencia evidenciar que se esta conectado a la señal wifi del Centro Digital.',
                        'place' => 'G29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '2',
                        'label' =>
                            'Dipositivo móvil conectado al punto de acceso inalámbrico exterior del centro digital',
                        'description' =>
                            'Registro fotográfico o captura de pantalla de un equipo móvil conectado a la red wifi exterior del centro digital (<b>MINTIC_CONECTA</b>), collage de imágenes donde se evidencie contexto y la segunda evidencie la navegación',
                        'place' => 'L29',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Señaletica exterior',
                        'description' => 'Registro fotográfico de la señaletica exterior',
                        'place' => 'B46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Solución de respaldo (4 horas) Si aplica',
                        'description' =>
                            'Registro fotográfico de la solución de respaldo, Aplica siempre y cuendo no se instale una solución alternativa <b>Gabinete abierto</b>',
                        'place' => 'L46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '3',
                        'label' => 'Señaletica interior',
                        'description' => 'Registro fotográfico de la señaletica interior',
                        'place' => 'L46',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'PRINT de sercidor trirada con evento creado a UPS',
                        'description' =>
                            'Se debe crear un evento en la UPS entrar al servidor TRIARA y tomar el print de pantalla buscando IP de la UPS (Servidor de prueba <a target="_blank" href="https://mintictsps.triara.co:9090/#/monitoring/events">https://mintictsps.triara.co:9090/#/monitoring/events</a> Usuario: <b>implementa_mintic</b> Contraseña: <b>Impl3m3nt@2o2!</b>)',
                        'place' => 'B63',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Medición eléctrica 1',
                        'description' => 'Neutro Fase',
                        'place' => 'G63',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Medición eléctrica 1.2',
                        'description' => 'Fase - Tierra',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Medición eléctrica 1.3',
                        'description' => 'Neutro - Tierra',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '4',
                        'label' => 'Medición eléctrica 2',
                        'description' => 'Bacteria',
                        'place' => 'L63',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Navegación AP INDOOR',
                        'description' => 'Navegación equipos de computo conectados al AP Indoor (<b>MINTIC</b>)
                                                                                                                                            <ul>
                                                                                                                                                <li>ping www.google.com /n 100</li>
                                                                                                                                                <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                                                                                                                                                <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                                                                                                                                            </ul>',
                        'place' => 'B80',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Navegación AP OUTDOOR',
                        'description' => 'Navegación equipos de computo conectados al AP Outdoor (<b>MINTIC_CONECTA</b>)
                                                                                                                                            <ul>
                                                                                                                                                <li>ping <a target="_blank" href="https://www.faceboock.com">www.faceboock.com</a> /n 100</li>
                                                                                                                                                <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                                                                                                                                                <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                                                                                                                                            </ul>',
                        'place' => 'G80',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '5',
                        'label' => 'Pruba de velocidad',
                        'description' => 'Navegación equipos de computo velocidad.
                                                                                                                                            <ul>
                                                                                                                                                <li>Realizar test de velocidad en la página: <a target="_blank" href="https://www.nperf.com/es/">https://www.nperf.com/es/</a>/</li>
                                                                                                                                                <li>Realizar test de velocidad en la página: <a target="_blank" href="https://testmy.net/">https://testmy.net/</a>/</li>
                                                                                                                                            </ul>',
                        'place' => 'L80',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Conectividad portal cautivo',
                        'place' => 'B97',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Bloqueo de páginas',
                        'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                                                                                                                                            <ul>
                                                                                                                                                <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                                                <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                                            </ul>',
                        'place' => 'G97',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <hr>
                    @include('projects.mintic.includes.upload', [
                        'ltt' => '2',
                        'id' => $item,
                        'num' => $i++,
                        'size_letter' => 20,
                        'it' => '6',
                        'label' => 'Bloquedo de páginas',
                        'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                                                                                                                                            <ul>
                                                                                                                                                <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                                                <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                                                                                                                                            </ul>',
                        'place' => 'L97',
                        'accept' => 'image/*',
                        'date_edit' => true,
                        'delete' => true,
                    ])
                    <div class="form-group">
                        @include('projects.mintic.includes.upload', [
                            'ltt' => '2',
                            'id' => $item,
                            'num' => $i++,
                            'size_letter' => 20,
                            'it' => '6',
                            'label' => 'Medida de la tierra',
                            'place' => 'B97',
                            'accept' => 'image/*',
                            'date_edit' => true,
                            'delete' => true,
                        ])
                        <hr>
                        <label for="">Observaciones</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                @endif
                <h3>AUTOGESTIÓN</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Troncalizar servicio',
                    'description' =>
                        'Troncalizar el servicio conectando el PC directamente al radio en el CD (Vlan e IP de servicio)<br>export en winbox encuentra la IP y el ID-VLan',
                    'accept' => 'image/*',
                    'place' => 'XXX',
                    'write' => 'No',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '2',
                    'label' => 'Performance radio',
                    'description' =>
                        'Conectado en el radio, ejecutar prueba de performance contra  radio de la BTS, Recuerten que el valor es aprox. 75 - 25<br>Tools->Wireless Link Test',
                    'place' => 'XXX',
                    'write' => 'No',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => 'Prueba de velocidad en la AP indoor',
                    'description' => 'La prueba corre en la Indoor y debe entregar valor igual o superior al contrato (hay valores minimos), comprobar que las 3APs esten operativos
                                                                                                                    <b>system ssh 172.28.10.100 user=admin</b><br> 
                                                                                                                    <b>admin</b><br><br>
                                                                                                                    AP interior se identifica (20667-ZGYO167-AP-INT)
                                                                                                                    Servidores:<br>
                                                                                                                    <b>speedtest etsi http://172.25.133.10 40 10 1</b><br>
                                                                                                                    <b>speedtest etsi http://172.28.103.2 40 10 1</b><br>
                                                                                                                    <b>speedtest etsi http://172.28.103.6 40 10 1</b><br>
                                                                                                
                                                                                                                    Para los servicios que están instalados por terceros o satelitales se debe correr los siguientes comandos:<br>
                                                                                                                    <b>speedtest etsi http://181.49.90.144 40 10 1</b><br>
                                                                                                                    <b>speedtest etsi http://181.49.90.145 40 10 1</b><br>
                                                                                                                    <b>speedtest etsi http://181.49.90.146 40 10 1</b>',
                    'place' => 'XXX',
                    'write' => 'No',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '4',
                    'place' => 'XXX',
                    'write' => 'No',
                    'label' => 'Modos de TX en radio CD',
                    'description' => 'Configuration->Network',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '5',
                    'place' => 'XXX',
                    'write' => 'No',
                    'label' => 'Modos de TX en mikrotik',
                    'description' => 'Interfaces->WAN->Ethernet',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '6',
                    'place' => 'XXX',
                    'write' => 'No',
                    'label' => 'Validación de errores en mikrotic',
                    'description' =>
                        'Verificacion de errores entre el Mikrotik y los AP, si el valor es mayor a 0 y continua incrementando se debe validar modos de TX o el cableado entre los dispositivos<br>Interfaces->WAN->Rx Stats',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '7',
                    'place' => 'XXX',
                    'write' => 'No',
                    'label' => 'Validación de errores en mikrotic 2',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                <h3>EVIDENCIAS PARADA DE RELOJ</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => '1ra parada',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
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
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '3',
                    'label' => '3ra parada',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '4',
                    'label' => '4ta parada',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
                <h3>OTRAS</h3>
                @include('projects.mintic.includes.upload', [
                    'ltt' => '2',
                    'id' => $item,
                    'num' => $i++,
                    'size_letter' => 20,
                    'it' => '1',
                    'label' => 'Fachada de la escuela',
                    'accept' => 'image/*',
                    'date_edit' => true,
                    'delete' => true,
                ])
                <hr>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/project/mintic/water_marker/maintenance.js') }}"></script>
@endsection

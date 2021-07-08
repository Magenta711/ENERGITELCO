@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        TSS v3 proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">TSS v3</li>
    </ol>
</section>
<div class="hide">
    <input type="hidden" value="{{$id}}" id="data_id">
    <input type="hidden" value="{{$item->id}}" id="data_item">
</div>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
                <a href="{{route('mintic_maintenance',$id)}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            @php
                $i = 1;
            @endphp
            <h3>REGISTRO FOTOGRÁFICO ANTES</h3>
            <h4>5. FORMATO FOTOGRÁFICO</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Coordenas geográficas',
                'description' => 'Captura de las coordenadas geográficas arrjadas por GPS con mínimo 5 cifras decimales',
                'place' => 'B12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos wifi interior',
                'description' => 'Registro fotográfico de Access Point Interior',
                'place' => 'G12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos de wifi exterior 1 (AP 1)',
                'description' => 'Registro fotográfico del Access Point Externo 1',
                'place' => 'L12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos de wifi exterior 2 (AP 2)',
                'description' => 'Registro fotográfico del Access Point Externo 2',
                'place' => 'B29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos de computo de la sede conectados a internet',
                'description' => 'Registro fotográfico de los equipos de computo de la sede conectados al punto de acceso inalámbrico WIFI interior del centro digital, con acceso a internet (ejemplo ping a una pagina o servidor, navegación en paginas como las de un diario digital nacional, donde se evidencie la fechas, entre otras); sugerencia evidenciar que se esta conectado a la señal wifi del Centro Digital.',
                'place' => 'G29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Dipositivo móvil conectado al punto de acceso inalámbrico exterior del centro digital',
                'description' => 'Registro fotográfico o captura de pantalla de un equipo móvil conectado a la red wifi exterior del centro digital, collage de imágenes donde se evidencie contexto y la segunda evidencie la navegación',
                'place' => 'L29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Señaletica exterior',
                'description' => 'Registro fotográfico de la señaletica exterior',
                'place' => 'B46',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Solución de respaldo (4 horas) Si aplica',
                'description' => 'Registro fotográfico de la solución de respaldo, Aplica siempre y cuendo no se instale una solución alternativa',
                'place' => 'G46',
                'accept' => 'image/*'
                ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Señaletica interior',
                'description' => 'Registro fotográfico de la señaletica interior',
                'place' => 'L46',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'PRINT de sercidor trirada con evento creado a UPS',
                'description' => 'Se debe crear un evento en la UPS entrar al servidor TRIARA y tomar el print de pantalla (<a target="_blank" href="https://mintictsps.triara.co:9090/">https://mintictsps.triara.co:9090/</a>)',
                'place' => 'B63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Medición eléctrica 1',
                'description' => 'Si existen variaciones o irregularidades en el suministro eléctrico se debe describir en el campo #3 3. DESCRIIPCIÓN DE LA FALLA',
                'place' => 'G63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Medición eléctrica 2',
                'description' => 'Si existen variaciones o irregularidades en el suministro eléctrico se debe describir en el campo #3 3. DESCRIIPCIÓN DE LA FALLA',
                'place' => 'L63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Navegación AP INDOOR',
                'description' => 'Navegación equipos de computo conectados al AP Indoor
                <ul>
                    <li>ping www.google.com /n 100</li>
                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                </ul>',
                'place' => 'B80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Navegación AP OUTDOOR',
                'description' => 'Navegación equipos de computo conectados al AP Outdoor
                <ul>
                    <li>ping <a target="_blank" href="https://www.faceboock.com">www.faceboock.com</a> /n 100</li>
                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                </ul>',
                'place' => 'G80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Pruba de velocidad',
                'description' => 'Navegación equipos de computo velocidad.
                <ul>
                    <li>Realizar test de velocidad en la página: <a target="_blank" href="https://www.claro.com.co/personas/servicios/servicios-moviles/internet-movil/test-de-velocidad">https://www.claro.com.co/personas/servicios/servicios-moviles/internet-movil/test-de-velocidad</a>/</li>
                </ul>',
                'place' => 'L80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Conectividad portal cautivo',
                'place' => 'B97',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Bloqueo de páginas',
                'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                <ul>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                </ul>',
                'place' => 'G97',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Bloquedo de páginas',
                'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                <ul>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                </ul>',
                'place' => 'L97',
                'accept' => 'image/*'
            ])
            <hr>
            <div class="form-group">
                <label for="">Observaciones</label>
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>

            <hr>
            <h3>REGISTRO FOTOGRÁFICO DESPÚES</h3>
            <h4>5. FORMATO FOTOGRÁFICO</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Coordenas geográficas',
                'description' => 'Captura de las coordenadas geográficas arrjadas por GPS con mínimo 5 cifras decimales',
                'place' => 'B12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos wifi interior',
                'description' => 'Registro fotográfico de Access Point Interior',
                'place' => 'G12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'1',
                'label' => 'Equipos de wifi exterior 1 (AP 1)',
                'description' => 'Registro fotográfico del Access Point Externo 1',
                'place' => 'L12',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'2',
                'label' => 'Equipos de wifi exterior 2 (AP 2)',
                'description' => 'Registro fotográfico del Access Point Externo 2',
                'place' => 'B29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'2',
                'label' => 'Equipos de computo de la sede conectados a internet',
                'description' => 'Registro fotográfico de los equipos de computo de la sede conectados al punto de acceso inalámbrico WIFI interior del centro digital, con acceso a internet (ejemplo ping a una pagina o servidor, navegación en paginas como las de un diario digital nacional, donde se evidencie la fechas, entre otras); sugerencia evidenciar que se esta conectado a la señal wifi del Centro Digital.',
                'place' => 'G29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'2',
                'label' => 'Dipositivo móvil conectado al punto de acceso inalámbrico exterior del centro digital',
                'description' => 'Registro fotográfico o captura de pantalla de un equipo móvil conectado a la red wifi exterior del centro digital, collage de imágenes donde se evidencie contexto y la segunda evidencie la navegación',
                'place' => 'L29',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'3',
                'label' => 'Señaletica exterior',
                'description' => 'Registro fotográfico de la señaletica exterior',
                'place' => 'B46',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'3',
                'label' => 'Solución de respaldo (4 horas) Si aplica',
                'description' => 'Registro fotográfico de la solución de respaldo, Aplica siempre y cuendo no se instale una solución alternativa',
                'place' => 'G46',
                'accept' => 'image/*'
                ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'3',
                'label' => 'Señaletica interior',
                'description' => 'Registro fotográfico de la señaletica interior',
                'place' => 'L46',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'4',
                'label' => 'PRINT de sercidor trirada con evento creado a UPS',
                'description' => 'Se debe crear un evento en la UPS entrar al servidor TRIARA y tomar el print de pantalla (<a target="_blank" href="https://mintictsps.triara.co:9090/">https://mintictsps.triara.co:9090/</a>)',
                'place' => 'B63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'4',
                'label' => 'Medición eléctrica 1',
                'description' => 'Si existen variaciones o irregularidades en el suministro eléctrico se debe describir en el campo #3 3. DESCRIIPCIÓN DE LA FALLA',
                'place' => 'G63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'4',
                'label' => 'Medición eléctrica 2',
                'description' => 'Si existen variaciones o irregularidades en el suministro eléctrico se debe describir en el campo #3 3. DESCRIIPCIÓN DE LA FALLA',
                'place' => 'L63',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'5',
                'label' => 'Navegación AP INDOOR',
                'description' => 'Navegación equipos de computo conectados al AP Indoor
                <ul>
                    <li>ping www.google.com /n 100</li>
                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                </ul>',
                'place' => 'B80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'5',
                'label' => 'Navegación AP OUTDOOR',
                'description' => 'Navegación equipos de computo conectados al AP Outdoor
                <ul>
                    <li>ping <a target="_blank" href="https://www.faceboock.com">www.faceboock.com</a> /n 100</li>
                    <li><a target="_blank" href="https://www.whatismyip.com/my-ip-information/?iref=homegb">https://www.whatismyip.com/my-ip-information/?iref=homegb</a></li>
                    <li><a target="_blank" href="http://horalegal.inm.gov.co/">http://horalegal.inm.gov.co</a></li>
                </ul>',
                'place' => 'G80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'5',
                'label' => 'Pruba de velocidad',
                'description' => 'Navegación equipos de computo velocidad.
                <ul>
                    <li>Realizar test de velocidad en la página: <a target="_blank" href="https://www.claro.com.co/personas/servicios/servicios-moviles/internet-movil/test-de-velocidad">https://www.claro.com.co/personas/servicios/servicios-moviles/internet-movil/test-de-velocidad</a>/</li>
                </ul>',
                'place' => 'L80',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'6',
                'label' => 'Conectividad portal cautivo',
                'place' => 'B97',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'6',
                'label' => 'Bloqueo de páginas',
                'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                <ul>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                </ul>',
                'place' => 'G97',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'id' => $item,
                'num' => $i++,
                'it'=>'6',
                'label' => 'Bloquedo de páginas',
                'description' => 'Bloqueo de paginas pornografía: tomar  2 URL de la lista, ejemplo
                <ul>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                    <li><a target="_blank" href="http://furl.telmexla.net.co/dignidad.php">http://furl.telmexla.net.co/dignidad.php</a></li>
                </ul>',
                'place' => 'L97',
                'accept' => 'image/*'
            ])
            <hr>
            <div class="form-group">
                <label for="">Observaciones</label>
                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/water_marker/maintenance.js')}}"></script>
@endsection
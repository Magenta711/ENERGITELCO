@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        Editar proyecto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">Editar</li>
    </ol>
</section>
<section class="content">
     
    <div class="box">
        <div class="box-header">
            <div class="box-title"> proyecto MINTIC</div>
            <div class="box-tools">
            </div>
        </div>
        <div class="box-body">
            @php
            $i = 1;
            @endphp
            <h4>FORMATO NOTIFICACIÓN DE LA INSTALACIÓN DE CENTROS DIGITALES</h4>
            <h5>Registro fotográfico</h5>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label'=>'COORDENADAS GEOGRÁFICAS',
                'description' => 'Captura de las coordenadas geográficas arrojadas por GPS con mínimo 5 cifras decimales',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label'=>'EQUIPOS WIFI INTERIOR',
                'description' => 'Registro fotográfico de Access Point Interno',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'3',
                'label'=>'EQUIPOS WIFI EXTERIOR 1 (AP 1)',
                'description'=>'Registro fotográfico de Access Point Externo AP1',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'4',
                'label'=>'EQUIPOS WIFI EXTERIOR 2 (AP 2)',
                'description'=>'Registro fotográfico de Access Point Externo AP2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'5',
                'label'=>'EQUIPOS DE COMPUTO DE LA SEDE CONECTADOS A INTERNET',
                'description'=>'Registro fotográfico de los equipos de cómputo de la sede conectados al punto de acceso inalámbrico WIFI interior del centro digital, con acceso a internet (ejemplo ping a una página o servidor, navegación en páginas como las de un diario digital nacional, donde se evidencie las fechas, entre otras); sugerencia evidenciar que se está conectado a la señal wifi del Centro Digital.',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'6',
                'label'=>'DISPOSITIVO MÓVIL CONECTADO AL PUNTO DE ACCESO INALÁMBRICO EXTERIOR DEL CENTRO DIGITAL',
                'description' => 'Registro fotográfico o captura de pantalla de un equipo móvil conectado a la red wifi exterior del centro digital, collage de imágenes donde se evidencie contexto y la segunda evidencie la navegación',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'7',
                'label'=>'SOCIALIZACIÓN COMUNIDAD ALEDAÑA',
                'description'=>'Registro fotográfico de la socialización de la Comunidad aledaña',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'8',
                'label'=>'SOCIALIZACIÓN ENCARGADOS DE LA INSTITUCIÓN PUBLICA',
                'description'=>'Registro fotográfico de la socialización a los Encargados de la Institución Pública',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'9',
                'label'=>'SEÑALÉTICA INTERIOR',
                'description'=>'Registro fotográfico de la señalización interior',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'10',
                'label'=>'SEÑALÉTICA EXTERIOR',
                'description'=>'Registro fotográfico de la señalización exterior',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'11',
                'label'=>'Foto TDG existente abierto',
                'description'=>'Si existe',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'12',
                'label'=>'SOLUCIÓN DE RESPALDO (4 HORAS) SI APLICA',
                'description'=>'Registro fotográfico de la solución de respaldo, Aplica siempre y cuando no se instale una solución alternativa',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'13',
                'label'=>'SOLUCIÓN ALTERNATIVA DE ENERGÍA SI APLICA',
                'description'=>'Registro fotográfico de Solución Alternativa de Energía aplica para los sitios donde se instala, para el caso de uso de paneles solares realizar collage de imágenes que evidencien los equipos ',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'14',
                'label'=>'COBERTURA WIFI AP INTERIOR',
                'description'=>'Registro fotográfico de la cobertura wifi del access point Interior AP Interior',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'15',
                'label'=>'COBERTURA WIFI AP  EXTERIOR',
                'description'=>'Registro fotográfico de la cobertura wifi del access point exterior AP1 y AP 2, si los AP están instalados en zonas diferentes hacer un collage de imágenes',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'16',
                'label'=>'FOTOCOPIA DE DOCUMENTO DE IDENTIFICACIÓN',
                'description'=>'Fotocopia de la Cedula de quien atiende la visita',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'17',
                'label'=>'VIDEO OMNIDIRECCIONAL (360°), ÁREA CUBIERTA POR EL PUNTO DE ACCESO INALÁMBRICO WIFI INTERIOR (eje horizontal)',
                'description'=>'Video omnidireccional de la cobertura del access point interior, la duración del video es de mínimo 30 segundos, tener en cuenta una altura que permita observar la zona de cobertura',
                'accept' => 'video/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'18',
                'label'=>'VIDEO OMNIDIRECCIONAL (360°), ÁREA CUBIERTA POR EL PUNTO DE ACCESO INALÁMBRICO WIFI EXTERIOR AP 1 O AP1 Y AP2 (eje horizontal)',
                'description'=>'Video omnidireccional de la cobertura del access point exterior, la duración del video es de mínimo 30 segundos, tener en cuenta una altura que permita observar la zona de cobertura',
                'accept' => 'video/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'19',
                'label'=>'VIDEO OMNIDIRECCIONAL (360°), ÁREA CUBIERTA POR EL PUNTO DE ACCESO INALÁMBRICO WIFI EXTERIOR  AP 2 (eje horizontal) SI APLICA',
                'description'=>'Video omnidireccional de la cobertura del access point exterior, la duración del video es de mínimo 30 segundos, tener en cuenta una altura que permita observar la zona de cobertura',
                'accept' => 'video/*'
            ])
            <hr>




            <h5>1. Registro socialización</h5>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'1',
                'label'=>'Llegada al centro poblado, alcaldía. Entrega de USB y video. FOTO',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'2',
                'label'=>'Al finalizar la instalación, entrega de video al rector y estudiantes, comunidad aledaña se le entregan volantes. FOTO',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'3',
                'label'=>'Listado de nombres para ambos casos. Foto Socialización',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'4',
                'label'=>'Listado de nombres para ambos casos. Foto Capacitación',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'5',
                'label'=>'Formato volante',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '2',
                'num' => $i++,
                'it'=>'6',
                'label'=>'Otros',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '22',
                'num' => $i++,
                'it'=>'6',
                'label'=>'Otros',
                'accept' => 'image/*'
            ])
            <hr>




            <h4>PRUEBAS EN SITIO</h4>
            <h5>ANEXOS VISITA DE CAMPO</h5>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'1',
                'label'=>'Registro Fotográfico Access Point existentes',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'2',
                'label'=>'Registro Fotográfico de señalética del centro digital exterior',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'2',
                'label'=>'Registro Fotográfico de señalética del centro digital interior',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'3',
                'label'=>'Registro Fotográfico o pantallazo de ingreso a portal cautivo (usuario nuevo), que contenga nombre del centro poblado, Municipio donde está instalado el, centro digital',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'4',
                'label'=>'Registro Fotográfico equipos indoor. (conectividad)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'4',
                'label'=>'Registro Fotográfico equipos ottdoor. (conectividad)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'5',
                'label'=>'Registro Fotográfico solución para conectividad (antena radio enlace, antena satelital o solución de fibra óptica)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'6',
                'label'=>'Registro Fotográfico o pantallazo Coordenadas de ubicación del sitio (GPS)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Registro Fotográfico o pantallazo de ingreso a portal cautivo (usuario nuevo), que contenga nombre del centro poblado, Municipio y Sede Educativa donde está instalado el centro digital.',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Registro Fotográfico o pantallazo de ingreso a portal cautivo (usuario recurrente, es decir inicio de una nueva sesión del mismo usuario), para validar la experiencia del usuario.',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'8',
                'label'=>'Registro Fotográfico o pantallazos de las pruebas para verificar concurrencia de mínimo 10 usuarios',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'9',
                'label'=>'Registro Fotográfico de mediciones de voltaje en tablero secundario (especificados en el formato de visita).',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'10',
                'label'=>'Registro Fotográfico de medición del voltaje en el tablero entre Neutro y tierra (< ó = 1 Voltio)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'11',
                'label'=>'Registro Fotográfico o pantallazo de la potencia de -75 dBm',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'12',
                'label'=>'Registro Fotográfico del sistema de respaldo aplica solo para solución eléctrica interconectada',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'13',
                'label'=>'Registro Fotográfico de la solución de energía alternativa. (Si aplica)',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'14',
                'label'=>'Registro fotográfico del Inventario',
                'energy_measurement' => '2',
                'accept' => 'image/*'
            ])



            <h4>Otros</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'1',
                'label'=>'Formato de notificación de instalación del contratista',
                'accept' => '.xlsx,.xls'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'1',
                'label'=>'PDF listado de nombres de socialización',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'2',
                'label'=>'PDF listado de nombres de capacitación',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'3',
                'label'=>'Acta de instalación',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'4',
                'label'=>'Diagrama de zona de influencia',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'5',
                'label'=>'Carta de autorización',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '4',
                'num' => $i++,
                'it'=>'6',
                'label'=>'Inventario equipos',
                'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 1 app Wifi Analizer',
                'description' => 'Vista Calificación del canal 2.4 GHz',
                'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 2 app Wifi Analizer',
                'description' => 'Vista Gráfico de Canal 2.4 GHz',
                'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 3 app Wifi Analizer',
                'description' => 'Vista Gráfico de Tiempo 2.4 GHz',
                'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 4 app Wifi Analizer',
                'description' => 'Vista Calificación de Canal 5 GHz',
                'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 5 app Wifi Analizer',
                'description' => 'Vista Gráfico de Canal 5 GHz',
                'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
                'ltt' => '3',
                'num' => $i++,
                'it'=>'7',
                'label'=>'Pantallazo 6 app Wifi Analizer',
                'description' => 'Vista Gráfico de Tiempo 5 GHz',
                'accept' => 'image/*'
            ])
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/install.js')}}"></script>
@endsection
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
            <h4>1. Registro fotográfico</h4>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Foto posible ubicación de equipos tecnología de acceso',
            'description' => 'Fibra óptica, microondas, terrestre, red 4G, satelital, entre otros',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'2',
            'label'=>'Foto de dos terminales encendidos',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Foto factura de energía',
            'description'=>'Si cuenta con energía eléctrica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Foto contador donde se evidencie el serial del mismo y sellos del contador de operador de red',
            'description'=>'Si cuenta con energía eléctrica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Foto acometidas eléctricas del sitio',
            'description'=>'Si cuenta con energía eléctrica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Foto 1 aula de computo',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Foto 2 aula de computo',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'5',
            'label'=>'Foto de la fachada de la institución con GPS',
            'description'=>'Coordenadas decimales legibles',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Foto Rack de comunicaciones tapas abiertas',
            'description'=>'Si existe',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'7',
            'label'=>'Foto de TDG existente abierto o cuchilla existente',
            'description'=>'Si existe',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'8',
            'label'=>'Foto TDG existente abierto',
            'description'=>'Si existe',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'9',
            'label'=>'Foto de medición eléctrica en TDG FASE - NEUTRO',
            'energy_measurement' => 'FASE - NEUTRO',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'9',
            'label'=>'Foto de medición eléctrica en TDG FASE - TIERRA',
            'energy_measurement' => 'FASE - TIERRA',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'9',
            'label'=>'Foto de medición eléctrica en TDG NEUTRO - TIERRA',
            'energy_measurement' => 'NEUTRO - TIERRA',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'10',
            'label'=>'Foto de posible ubicación donde se instalará AP Wifi Interior',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'11',
            'label'=>'Foto de posible ubicación donde se instalará AP Wifi Exterior',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'12',
            'label'=>'Foto de posible sitio de instalación de mastil para AP Wifi Exterior',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'12',
            'label'=>'Foto de posible sitio de antena para conectividad satelital o terrestres',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'13',
            'label'=>'Foto del área de cobertura wifi exterior',
            'description' => 'Panorámica 360°',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'13',
            'label'=>'Foto del área de cobertura wifi exterior',
            'description' => 'Foto 0°',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'13',
            'label'=>'Foto del área de cobertura wifi exterior',
            'description' => 'Foto 90°',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '4',
            'num' => $i++,
            'it'=>'13',
            'label'=>'Foto del área de cobertura wifi exterior',
            'description' => 'Foto 180°',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '5',
            'num' => $i++,
            'it'=>'13',
            'label'=>'Foto del área de cobertura wifi exterior',
            'description' => 'Foto 270°',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'14',
            'label'=>'Foto de la infraestructura existente en el área de cobertura',
            'description' => 'Postes, torres, mastiles, etc',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'15',
            'label'=>'Foto de la posible ubicación del aviso de identificación exterior',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'16',
            'label'=>'Video omnidireccional (360 grados) punto de acceso inalámbrico wifi interior',
            'description'=>'duración mínima de 30 segundos.',
            'accept' => 'video/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'17',
            'label'=>'video omnidireccional (360 grados) punto de acceso inalámbrico wifi exterior',
            'description'=>'duración mínima de 30 segundos.',
            'accept' => 'video/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '1',
            'num' => $i++,
            'it'=>'18',
            'label'=>'Foto posibles obstáculos cercanos a la zona de cobertura del wifi exterior',
            'description'=>'Obstáculos por ejemplo de edificios, etc.',
            'accept' => 'image/*'
            ])
            <hr>
            <h4>2. Registro foto grafico TSS</h4>
            <h5>FOTOS UBICACIÓN SUGERIDA INSTALACIÓN RADIO (IDU)</h5>
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Foto panorámica del sitio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'2',
            'label'=>'Ubicación sugerida del radio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Recorrido cable de alimentación radio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Recorrido cable IF',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'5',
            'label'=>'Recorrido cable de servicio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Aterrizaje de radio',
            'accept' => 'image/*'
            ])
            <hr>
            <h5>FOTOS ANTENA Y LÍNEA DE VISTA</h5>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Ubicación propuesta de la antena',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'2',
            'label'=>'Recorrido cable IF Radio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Recorrido cable IF al Radio',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Línea de vista sitio remoto A',
            'size' => 'org',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'5',
            'label'=>'Aterrizaje cable IF',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Foto mastil existente',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Foto pararrayos existente',
            'accept' => 'image/*'
            ])
            <hr>
            <h5>FOTOS DEL SITIO</h5>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Cuarto de equipos',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'2',
            'label'=>'Foto rack o gabinete existente',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Foto aire acondicionado',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Rectificador',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'5',
            'label'=>'UPS',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '2',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Planta eléctrica',
            'description' => 'Si aplica',
            'accept' => 'image/*'
            ])
            <hr>
            <h4>3. Documentos</h4>
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Plano arquitectónico',
            'description'=>'mano alzada o foto',
            'accept' => 'image/*,application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Escaneo de formato de estudio de campo información',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'4',
            'label'=>'Escaneo de diagrama de influencia',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'5',
            'label'=>'Escaneo de esquema de instalación',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'6',
            'label'=>'Escaneo de acta de compromiso',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'7',
            'label'=>'Escaneo de acta de fuerza mayor',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'8',
            'label'=>'Escaneo de carta de autorización',
            'accept' => 'application/pdf'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'9',
            'label'=>'Formato digital del Estudio de Campo',
            'description' => 'Excel',
            'accept' => '.xlsx,.xls'
            ])
            <hr>
            <h4>Adicionales</h4>
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 1 app Wifi Analizer',
            'description' => 'Vista Calificación del canal 2.4 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 2 app Wifi Analizer',
            'description' => 'Vista Gráfico de Canal 2.4 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 3 app Wifi Analizer',
            'description' => 'Vista Gráfico de Tiempo 2.4 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 4 app Wifi Analizer',
            'description' => 'Vista Calificación de Canal 5 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 5 app Wifi Analizer',
            'description' => 'Vista Gráfico de Canal 5 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'1',
            'label'=>'Pantallazo 6 app Wifi Analizer',
            'description' => 'Vista Gráfico de Tiempo 5 GHz',
            'accept' => 'image/*'
            ])
            @include('projects.mintic.includes.upload',[
            'ltt' => '3',
            'num' => $i++,
            'it'=>'2',
            'label'=>'Pantallazo recorrido Google Maps',
            'description'=>'Desde la cabecera municipal hasta el sitio con las coordenadas',
            'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
            'ltt' => '4',
            'num' => $i++,
            'it'=>'3',
            'label'=>'Foto del técnico en la institución educativa',
            'description' => 'Con overol, chaqueta y gorra de claro',
            'accept' => 'image/*'
            ])
        </div>
        <div class="box-body">
            <h3>FORMATO VERIFICACION LÍNEA DE VISTA</h3>
            <p>EVIDENCIA FOTOGRÁFICA<br>(Foto o fotos  de la institución a la BTS)</p>
            <p>Fotos tomadas desde la escuela hacia la estación base Claro</p>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista de CD a EB',
                'size' => 'org',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista de CD a EB con zoom máximo',
                'size' => 'org',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista con brújula, azimut',
                'size' => 'org',
                'accept' => 'image/*'
            ])
            <hr>
            <p>EVIDENCIA FOTOGRÁFICA<br>(Foto o fotos de la BTS al centro digital)</p>
            <p>Fotos tomadas desde la estación base Claro hacia la escuela</p>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label' => 'Línea de vista desde la altura donde se instalará la antena',
                'size' => 'org',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label' => 'Línea de vista desde la altura donde se instalará la antena con zoom máximo',
                'size' => 'org',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label' => 'Lugar donde se instalará la antena, foto con brújula donde se vea el azimut a la escuela',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'3',
                'label' => 'Objetos que puedan estar bloqueando  la línea de vista como árboles y edificios, especificar la altura.',
                'accept' => 'image/*'
            ])
            <hr>
            <h3>FORMATO TSS V.3</h3>
            <h4>Entrada al sitio</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Fotos de la entrada a la escuela y foto de la entrada de la EB',
                'accept' => 'image/*'
            ])
            <hr>
            <h4>CONDICIONES DE CERRAMIENTO</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label' => 'Foto desde la torre a una altura baja donde se aprecie el cerramiento de la EB',
                'accept' => 'image/*'
            ])
            <hr>
            <h4>ESPACIO DISPONIBLE DC</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'3',
                'label' => 'Fotos del PDB',
                'accept' => 'image/*'
            ])
            <hr>
            <h4>ESPACION DISPONIBLE AC</h4>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'4',
                'label' => 'Foto del TDG DE LA EB Y FOTO MEDIDA AC EN TOMA',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'5',
                'label' => 'Fotos general de la estación base',
                'description' => 'Varias fotos de los equipos y las zonas en la EB',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'6',
                'label' => 'Fotos patas de la torre',
                'description' => 'Fotos de todas las patas de la torre',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'7',
                'label' => 'Caras de la torre desde piso',
                'description' => 'Fotos de todas las caras de la torre desde piso',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'8',
                'label' => 'Ubicación sugerida instalación del radio',
                'description' => 'Fotos del gabinete de microondas donde se encuentra el radio o el alcatel donde se conectara el servicio',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'9',
                'label' => 'Recorrido cable de alimentación radio',
                'description' => 'Foto del recorrido del TDG o toma AC hasta el radio',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'10',
                'label' => 'Recorrido cable de IF (PISO)',
                'description' => 'Fotos del recorrido del cable que va del radio hasta la antena MW, pero solo a nivel de piso',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'11',
                'label' => 'Fotos de baterías existentes',
                'description' => 'Fotos del power entero, foto de las baterías, foto de los rectificadores…',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'12',
                'label' => 'Fotos de planta (si aplica)',
                'description' => 'Si la EB tiene planta, tomar varias fotos',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'13',
                'label' => 'Fotos barraje de tierra radio',
                'description' => 'Foto del aterrizaje del radio',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'14',
                'label' => 'Recorrido tierra radio (si aplica)',
                'description' => 'Fotos del recorrido del aterrizaje del radio',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'15',
                'label' => 'Posible ubicación de antena microondas hacia centro digital',
                'description' => 'Foto del lugar donde se instalará la antena MW',
                'accept' => 'image/*'
            ])
            <hr>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/water_marker/upload.js')}}"></script>
@endsection
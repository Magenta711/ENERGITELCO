@extends('lte.layouts')
 
@section('content')
<section class="content-header">
    <h1>
        TSS v3 proyeto mintic <small>MINTIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li><a href="#">Mintic</a></li>
        <li class="active">TSS v3</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
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
            <h3>FORMATO VERIFICACION LÍNEA DE VISTA</h3>
            <p>EVIDENCIA FOTOGRÁFICA<br>(Foto o fotos  de la institución a la BTS)</p>
            <p>Fotos tomadas desde la escuela hacia la estación base Claro</p>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista de CD a EB',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista de CD a EB con zoom máximo',
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'1',
                'label' => 'Línea de vista con brújula, azimut',
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
                'accept' => 'image/*'
            ])
            <hr>
            @include('projects.mintic.includes.upload',[
                'ltt' => '1',
                'num' => $i++,
                'it'=>'2',
                'label' => 'Línea de vista desde la altura donde se instalará la antena con zoom máximo',
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
    <script src="{{asset('js/project/mintic/water_marker/tss.js')}}"></script>
@endsection
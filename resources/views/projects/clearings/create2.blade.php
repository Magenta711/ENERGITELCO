@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Crear proyecto de desmonte <small>Gestion de proyectos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Desmontes</a></li>
        <li class="active">Crear desmontes</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="box">
        <div class="box-header">
            <div class="box-title">Crear proyecto de desmonte</div>
            <div class="box-tools">
                <a href="{{route('clearings')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
            <h3>Estación A</h3>
            <hr>
            @php
                $i = 1;
            @endphp
            <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
            @include('projects.clearings.includes.upload',[
                'place' => 'C24' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'a',
                'label'=>'Pantallazo de niveles dBs',
                'description' => 'Antes de apagar radio y desmontar'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'C25',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Pantallazo de alarmas',
                'description' => 'Antes de apagar radio y desmontar'
            ])
            <hr>
            <h3>3. Registro fotográfico antes</h3>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'a',
                'label'=>'Foto indoor estación base',
                'description'=>'Sitio limpio'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'C12',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'a',
                'label'=>'Foto outdoor estación base',
                'description'=>'Sitio limpio'
            ])
            <hr>
            {{-- @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto antena'
            ])
            <hr> --}}
            @include('projects.clearings.includes.upload',[
                'place' => 'C13' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto torres sin antena desmontada',
                'description'=>'Sitio limpio'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto ODU'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto mástil'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'c',
                'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'C15' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'d',
                'label'=>'Foto PDB abierto sin acomedidas desmontadas'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'d',
                'label'=>'Foto de PDB abierto'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'d',
                'label'=>'Foto de PDB cerrado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'C14',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'e',
                'label'=>'Foto de rack mw'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'d',
                'label'=>'Foto de busbar sin tierra desmontada'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto rack o gabinete sin idu desmontada'
            ])
            <hr>
     
     
            <h3>4. Registro fotográfico equipos desinstalados</h3>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>1,
                'label'=>'Placa antena 1 desmontada'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>1,
                'label'=>'Placa antena 2 desmontada'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>2,
                'label'=>'Placa ODU MAIN vertical desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>2,
                'label'=>'Placa ODU STAN BY vertical desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>2,
                'label'=>'Placa ODU MAIN horizontal desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>2,
                'label'=>'Placa ODU STAN BY horizontal desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'I19' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>3,
                'label'=>'Foto HYBRIDO vertical desinstalado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>3,
                'label'=>'Foto HYBRIDO horizontal desinstalado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>3,
                'label'=>'Foto RG desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'G19',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>3,
                'label'=>'Foto IDU vertical desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'ltt' => 'a',
                'num' => $i++,
                'it'=>3,
                'label'=>'Foto IDU horizontal desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'J19' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>5,
                'label'=>'Foto conectores de energía'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'K19' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>6,
                'label'=>'Otros accesorios'
            ])
            <hr>
            
     
     
     
            <h3>6. Registro fotográfico después</h3>
            @include('projects.clearings.includes.upload',[
                'place' => 'G13' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'a',
                'label'=>'Foto torres con antena desmontada',
                'description'=>'Sitio limpio'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'C19' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto antena desmontada'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'E19',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto ODU desmontado'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'G14',
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Foto rack o gabinete con idu desmontada'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'G15' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'c',
                'label'=>'Foto PDB abierto con acomedidas desmontadas'
            ])
            <hr>
            @include('projects.clearings.includes.upload',[
                'place' => 'G12' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'d',
                'label'=>'Foto de estación base después'
            ])
            <hr>
                </div>
            

            <div class="col-md-6">
            <h3>Estación B</h3>
            <hr>
            <h3>2. Capturas de pantalla antes de apagado y ejecución del desmonte</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G24' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Pantallazo de niveles dBs',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G25' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Pantallazo de alarmas',
                    'description' => 'Antes de apagar radio y desmontar'
                ])
                <hr>
                <h3>3. Registro fotográfico antes</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto indoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E12',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto outdoor estación base',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                {{-- @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena'
                ])
                <hr> --}}
                @include('projects.clearings.includes.upload',[
                    'place' => 'E13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto torres sin antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto mástil'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto de cuarto de equipos, shelter, rack, gabinete o donde esta instalada la IDU'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto sin acomedidas desmontadas'
                    ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB abierto'
                ])
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de PDB cerrado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E14' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'e',
                    'label'=>'Foto de rack mw'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de busbar sin tierra desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete sin idu desmontada'
                ])
                <hr>

                <h3>4. Registro fotográfico equipos desinstalados</h3>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 1 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>1,
                    'label'=>'Placa antena 2 desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU MAIN horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>2,
                    'label'=>'Placa ODU STAN BY horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO vertical desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto HYBRIDO horizontal desinstalado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto RG desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'G20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU vertical desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>3,
                    'label'=>'Foto IDU horizontal desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'J20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>5,
                    'label'=>'Foto conectores de energía'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'K20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>6,
                    'label'=>'Otros accesorios'
                ])
                <hr>
                <h3>5. Registro fotográfico después</h3>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I13' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'a',
                    'label'=>'Foto torres con antena desmontada',
                    'description'=>'Sitio limpio'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'C20' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto antena desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'E20',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto ODU desmontado'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I14',
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'b',
                    'label'=>'Foto rack o gabinete con idu desmontada'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I15' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'c',
                    'label'=>'Foto PDB abierto con acomedidas desmontadas'
                ])
                <hr>
                @include('projects.clearings.includes.upload',[
                    'place' => 'I12' ,
                    'ltt' => 'b',
                    'num' => $i++,
                    'it'=>'d',
                    'label'=>'Foto de estación base después'
                ])
                <hr>
            </div>
        </div>
        <hr>
    <h3>Información referente de las actividades referentes a la gestión y recepción de la infraestructura</h3>
    <div class="row">
        <div class="col-md-6">
            @include('projects.clearings.includes.upload',[
                'place' => 'B32' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'a',
                'label'=>'Captura pantalla correo NOC TX o CHG gestión cerrado'
            ])
        </div>
        <div class="col-md-6">
            @include('projects.clearings.includes.upload',[
                'place' => 'G32' ,
                'ltt' => 'a',
                'num' => $i++,
                'it'=>'b',
                'label'=>'Captura pantalla aceptación site owner'
            ])
        </div>
    </div>
        </div>

        <form action="{{ route('clearings_store2',$id->id) }}" method="post">
            @csrf
        <div class="box-footer">
            <button class="btn btn-sm btn-primary" id="send">Continuar</button>
        </div>
        </form>
    </div>
</section>
@endsection
@section('js')
    <script src="{{asset('js/project/clearing/upload.js')}}"></script>
@endsection
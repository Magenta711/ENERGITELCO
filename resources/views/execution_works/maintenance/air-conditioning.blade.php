
@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        AIRES ACONDICIONADOS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Mantenimientos</li>
    </ol>
</section>
<SECTION class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de mantenimientos preventivos y rutinarios</h3>
            <div class="box-tools">


                    <a href="{{route('kits_assignment_assginment')}}" class="btn btn-sm btn-primary btn-send">Mantenimiento Preventivo</a>

                    <a href="" class="btn btn-sm btn-warning btn-send">Mantenimiento Rutinario</a>
            </div>
        </div>
        <div class="box-body">

        </div>
    </div>
</section>
</SECTION>
@endsection

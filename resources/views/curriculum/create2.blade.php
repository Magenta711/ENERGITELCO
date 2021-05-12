@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nueva hoja de vida <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">hojas de vida</a></li>
        <li class="active">Crear hoja de vida</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
        </div>
        <div class="box-body">
            <h4>A) Documentación para ingreso del trabajador</h4>
            @php
                $i = 1;
            @endphp
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Hoja de vida'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificados de estudio (BACHILLERATO, TECNICO, CURSOS Y/O ESTUDIOS SUPERIORES)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de cédula','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de libreta militar'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de libreta militar o de la matrícula profesional conte'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Fotocopia de licencia de condución','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Foto fondo blanco, traje formal'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la procuraduria'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de antecedentes emitido por la policia nacional'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Dos referencias laborales'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Dos referencias personales'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de revisión en el SIMIT'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Carta de su actual fondo de pensiones (Si aplica)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Carta de su actual fondo de EPS (Si aplica)'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de apertura de cuenta de Bancolombia'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Concepto de examenes médicos ocupacionales','hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Concepto de examenes sustancias psicoactivas'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a la ARL'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a la EPS'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a AFP'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a cesantías'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Afiliación a caja de compensación'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de curso de trabajo seguro en alturas', 'hasDate' => true])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de coordinador de trabajo en alturas'])
            <hr>
            @include('curriculum.include.upload',['num'=>$i++,'label'=>'Certificado de curso de virtual de 50 horas sobre SST','hasDate' => true])
        </div>
        <div class="box-footer">
            <form action="{{route('curriculum_store2',$id->id)}}" method="POST">
                @csrf
                <button class="btn btn-sm btn-primary">Continuar</button>
            </form>
        </div>

    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/upload.js')}}"></script>
@endsection
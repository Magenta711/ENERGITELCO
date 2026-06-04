@extends('lte.layouts')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Firma de documentos <small> Hoja de vida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Hojas de vida</a></li>
        <li class="active">Firma de documentos</li>
    </ol>
</section>
<section class="content">
     
    {{-- Content main --}}
    <div class="box">
        <div class="box-header">
            <div class="box-title">Hoja de vida</div>
            <div class="box-tools"><a href="{{route('curriculums')}}" class="btn btn-sm btn-primary">Volver</a></div>
        </div>
        <div class="box-body">
            @php
                $i = 1;
            @endphp
            @if ($id->register && $id->register->contracts)
            <div class="row">
                @foreach ($id->register->contracts as $contract)
                    @include('curriculum.include.signature_contract',['sema' => 0])
                @endforeach
            </div>
                <hr>
            @endif
            @if ($id->register)
                @foreach ($documents as $item)
                    @include('curriculum.include.signature',['item' => $item, 'sema' => 0])
                    <hr>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{asset('js/upload.js')}}"></script>
@endsection
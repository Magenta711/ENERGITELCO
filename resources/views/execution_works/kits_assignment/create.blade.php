@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        ASIGNACIÓN DE KITS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Asignación de Kits</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <form action="{{ route('kits_assignment_create') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="box-body">
            
            @csrf
            <div class="box-group" id="accordion">
                @include('execution_works.kits.include.form_create')
            </div>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".new_documento">Crear</button>
        </div>
        </form>
    </div>
</section>



@endsection


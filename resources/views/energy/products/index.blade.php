@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Energía Solar <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Productos</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Productos</div>
                    <div class="box-tools">
                        {{-- @can('Disparar evaluación de desempeño') --}}
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Editar valores de cotización</button>
                   {{-- @endcan --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

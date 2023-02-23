@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
       ASIGNACIÓN DE TRABAJOS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Ejecución de obras</a></li>
        <li class="active">Asignación de trabajos</li>
    </ol>
</section>

<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">AGENDAMIENTO</h3>
            <div class="box-tools">
                {{-- @can('Digitar formulario de Revisión y asignación de herramientas') --}}
                    <a href="{{route('work_assignment_create')}}" class="btn btn-sm btn-success">Crear</a>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th scope="col">OT</th>
                            <th scope="col">TITULO</th>
                            <th scope="col">CLR ID MINTIC</th>
                            <th scope="col">ID BENEFICIARIO</th>
                            <th scope="col">MUNICIPIO</th>
                            <th scope="col">FUNCIONARIO</th>
                            <th scope="col"></th>
                            <th scope="col">FRANJA</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

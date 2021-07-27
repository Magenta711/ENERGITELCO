@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lecciones aprendidas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Administración del sistema</a></li>
        <li><a href="#">Lecciones aprendidas</a></li>
        <li class="active">Test de entrada</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de preguntas de entrada</h3>
                    <div class="box-tools">
                        @can('Crear computadores al inventario')
                            <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_create">Crear</button>
                            @include('learned_lessons.test.includes.modals.create')
                        @endcan
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pregunta</th>
                                    <th>Respuestas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testings as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->question}}</td>
                                        <td>{{$item->answers ? count($item->answers) : 0}}</td>
                                        <td>
                                            @can('Ver computadores del inventario')
                                                <button type="button" class="btn btn-sm btn-success pl-4 pr-4" data-toggle="modal" data-target="#modal_show_{{$item->id}}">Ver</button>
                                                @include('learned_lessons.test.includes.modals.show')
                                            @endcan
                                            @can('Editar computadores del inventario')
                                                <button type="button" class="btn btn-sm btn-primary pl-4 pr-4" data-toggle="modal" data-target="#modal_edit_{{$item->id}}">Editar</button>
                                                @include('learned_lessons.test.includes.modals.edit')
                                            @endcan
                                            @can('Editar computadores del inventario')
                                                <button type="button" class="btn btn-sm btn-warning pl-4 pr-4" data-toggle="modal" data-target="#modal_answers_{{$item->id}}">Respuestas</button>
                                                @include('learned_lessons.test.includes.modals.answers')
                                            @endcan
                                            @can('Eliminar computadores del inventario')
                                                <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$item->id}}">Eliminar</button>
                                                @include('learned_lessons.test.includes.modals.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection

@section('js')
    <script>
        incre = 0;
        $('#add-answer').click(function () {
            incre++;
            let newElement = $("#origen-option").clone().appendTo("#destino-option");
            newElement.children().children('.input_radio').attr('name','answer['+incre+']');
            newElement.children().children('.form-control').attr('name','text_answer['+incre+']');
            newElement.children().children('button').click(function () {
                $(this).parent().parent().remove();
            })
        });
        $('.add-answer').click(function () {
            let id = this.id.split("-")[this.id.split("-").length - 1];
            let incre = ($("#destino-option-edit-"+id).children()).length;
            let newElement = $("#origen-option-edit-"+id).clone().appendTo("#destino-option-edit-"+id);
            newElement.children().children('.input_radio').attr('name','answer['+incre+']');
            newElement.children().children('.form-control').attr('name','text_answer['+incre+']');
            newElement.children().children('button').click(function () {
                $(this).parent().parent().remove();
            })
        });
    </script>
@endsection
@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Usuarios <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">Lista de usuarios</div>
                    <div class="box-tools">
                        @can('Disparar evaluación de desempeño')
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target=".performance_evaluation">Evaluación de desempeño</button>
                        @endcan
                        @can('Realizar llamados de atención a trabajadores')
                            <a class="btn btn-sm btn-warning btn-send" href="{{ route('attention_call_create') }}">Llamado de atención</a>
                        @endcan
                        @can('Exportar usuarios a excel')
                        <a href="{{route('user_export')}}" class="btn btn-sm btn-primary">Exportar</a>
                        @endcan
                        @can('Crear usuarios')
                            <a href="{{route('user_create')}}" class="btn btn-sm btn-success btn-send">Crear</a>
                        @endcan
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_user" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">24/7</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">24/7</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users.include.modals.delete')
    @include('users.include.modals.evaluation')
</section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            url = 'users/list';
            table_id = '#table_user';

            columns = [
                {data : "id"},
                {data : "cedula"},
                {data : "name"},
                {data : "email"},
                {data : "telefono"},
                {data : "position.name"},
                {
                    render: function ( data, type, row, meta ) {
                        return row.b24_7 == 1 ? '<i class="fa fa-check">' : '<i class="fa fa-times">';
                    }
                },
                {
                    render: function ( data, type, row, meta ) {
                        return row.state == 1 ? 'Activo' : 'Inactivo';
                    }
                },
                {
                    render: function ( data, type, row, meta ) {
                        return '@can("Ver usuarios") <a class="btn  btn-sm btn-success btn-send" href="users/show/'+row.id+'">Ver</a> @endcan @can("Editar usuarios") <a class="btn btn-sm btn-primary btn-send" href="users/'+row.id+'/edit">Editar</a> @endcan @can('Eliminar usuarios') <button type="button" class="btn btn-sm btn-danger btn-delete">Eliminar</button> @endcan @can("Terminar contratación de usuarios") <a href="user/end_work/presend/'+row.id+'" class="btn btn-sm btn-warning btn-send">Terminar</a> @endcan';
                    }
                }
            ];

            dataTableCrete(url,columns,table_id);
        })
        
        function initFnTable(table) {
            $('.btn-delete').click(function () {
                let row = table.row( $(this).parent().parent() );
                let data2 = row.data();
                // $('#delete-id').val(data.id);
                $('#delete-name').text(data2.name);
                $('#delete-modal').modal();
                $('#delete-submit').click(function (e) {
                    let form = $("#deleteForm")[0];
                    let data = new FormData(form);
                    $.ajax({
                        type:'POST',
                        url:'/users/'+data2.id,
                        data:data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 1000000,
                        beforeSend: function(){
                        },
                        success:function(data){
                            row.remove().draw();
                            $('#delete-modal').modal('hide');
                        },
                        error: function (error) {
                            console.log('error-->',error);
                        }
                    });
                });
            });
        }
    </script>
@endsection
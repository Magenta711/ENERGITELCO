@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            MINTIC <small>Gestion de proyectos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">MINTIC</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Lista de proyectos MINTIC</div>
                <div class="box-tools">
                    @can('Crear proyectos de MINTIC')
                        <a href="{{ route('mintic_create') }}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_minitc" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id beneficiario</th>
                                <th>Nombre del proyecto</th>
                                <th>Lugar</th>
                                <th>Fecha modificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar proyecto</h4>
                        </div>
                        <div class="modal-body">
                            <p>¿Está seguro de eliminar el proyecto <span id="delete-name"></span>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="button" id="delete-submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        
    </section>
@endsection

@section('css')
    <style>
        .dropdown-menu {
            right: 0;
            left: auto;
            width: 200px;
        }
        .dropdown-item{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
        }
        .dropdown-item:hover{
            background: rgb(0,0,0,0.05);
            color: #444444;
        }
        .dropdown-menu>button{
            color: #444444;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            padding: 10px;
            white-space: nowrap;
            border-bottom: none;
            overflow: hidden;
            text-overflow: ellipsis;
            border: none;
            background: #fff;
            width: 100%;
            text-align: left;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            url = '/project/mintic/ec/list';
            table_id = '#table_minitc';

            columns = [
                {data : "id"},
                {data : "code"},
                {
                    render: function ( data, type, row, meta ) {
                        return row.con_sede == '0' || row.con_sede == null ? row.name : row.con_sede+' '+row.name;
                    }
                },
                {
                    render: function ( data, type, row, meta ) {
                        return row.dep+' - '+row.mun;
                    }
                },
                {data : "updated_at"},
                {
                    render: function ( data, type, row, meta ) {
                        return '<div class="dropdown"><button class="btn btn-default btn-xs pull-right dropdown-toggle" type="button" id="dropdownMenuButton-'+row.id+'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton-'+row.id+'">    @can("Ver proyectos de MINTIC")        <a class="dropdown-item" href="/project/mintic/ec/show/'+row.id+'">Ver</a>    @endcan    @can("Editar proyectos de MINTIC")        <a class="dropdown-item" href="/project/mintic/ec/'+row.id+'/edit">Editar</a>    @endcan    @can("Adjuntar y ver fotos de proyectos mintic")        <a class="dropdown-item" href="/project/mintic/ec/'+row.id+'">Estudio de campo</a>    @endcan    @can("Adjuntar y ver fotos de proyectos mintic")        <a class="dropdown-item" href="/project/mintic/install/'+row.id+'">Intalación</a>    @endcan    @can("Adjuntar y ver fotos de proyectos mintic")        <a class="dropdown-item" href="/project/mintic/tss/'+row.id+'">TSS V3</a>    @endcan    @can("Ver implementación proyectos de MINTIC")        <a class="dropdown-item" href="/project/mintic/add/'+row.id+'">Implementaciones</a>    @endcan    {{-- @can("Adjuntar y ver fotos de proyectos mintic") --}}        <a class="dropdown-item" href="/project/mintic/maintenance/'+row.id+'">Mantenimiento</a>    {{-- @endcan --}}    @can("Eliminar proyectos de MINTIC")        <button class="dropdown-item btn-delete" data-toggle="modal" data-target="#modal_delete_'+row.id+'">Eliminar</button>    @endcan</div> </div>';
                    }
                }
            ];

            dataTableCrete(url,columns,table_id);
        })
        
        function initFnTable(table) {
            $('.btn-delete').click(function () {
                let row = table.row( $(this).parent().parent().parent() );
                let data2 = row.data();
                $('#delete-name').text(data2.name);
                $('#delete-modal').modal();
                $('#delete-submit').click(function (e) {
                    let form = $("#deleteForm")[0];
                    let data = new FormData(form);
                    $.ajax({
                        type:'POST',
                        url:'/project/mintic/ec/'+data2.id,
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

{{-- 100071 --}}
@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-23 PERMISOS DE TRABAJO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Permisos de trabajo</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Lista de permisos de trabajo</h3>
            <div class="box-tools">
                <a href="{{ route('work_permit') }}" class="btn btn-sm btn-primary">Volver</a>
                @can('Digitar formulario de Permisos de trabajo')
                    <a href="{{route('work_permit_create')}}" class="btn btn-sm btn-success">Crear</a>
                @endcan
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive table-hover">
                <table id="table_user" class="table table-striped table-bordered" data-page-length='15'>
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Código</th>
                            {{-- <th scope="col">Responsable</th> --}}
                            <th scope="col">Funcionarios</th>
                            {{-- <th scope="col">Aprobador</th> --}}
                            <th scope="col">Vehículo</th>
                            <th scope="col">Estación base</th>
                            <th scope="col">Permiso de acturas</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tfoot>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Código</th>
                            {{-- <th scope="col">Responsable</th> --}}
                            <th scope="col">Funcionarios</th>
                            {{-- <th scope="col">Aprobador</th> --}}
                            <th scope="col">Vehículo</th>
                            <th scope="col">Estación base</th>
                            <th scope="col">Permiso de acturas</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="deleteForm">
            @csrf
            @method('DELETE')
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLongTitle">Eliminar permiso de trabajo</h4>
        </div>
        <div class="modal-body">
            <p>¿Está seguro de eliminar el permiso de trabajo <span id="delete-name"></span>?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-sm btn-danger" id="delete-submit">Eliminar</button>
        </div>
        </form>
    </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            url = 'http://energitelco.test/human_management/work_permit/list';
            table_id = '#table_user';

            columns = [
                {data : "id"},
                {
                    render: function ( data, type, row, meta ) {
                        return row.codigo_formulario+"-"+row.id;
                    }
                },
                // {
                //     render: function ( data, type, row, meta ) {
                //         return row?.responsableAcargo?.name;
                //     }
                // },
                {
                    render: function ( data, type, row, meta ) {
                        let list = ''
                        if (row.users) {
                            for (let user of row.users) {
                                list += `- ${user.name} <br>`
                            }
                        }
                        return list;
                    }
                },
                // {
                //     render: function ( data, type, row, meta ) {
                //         return row?.coordinadorAcargo?.name;
                //     }
                // },
                {
                    render: function ( data, type, row, meta ) {
                        if (row.vehicle)
                            return row.vehicle.plate
                        else if(row.placa_vehiculo)
                            return row.placa_vehiculo
                        return "N/A"
                    }
                },
                {data : "nombre_eb"},
                {data : "max_altura"},
                {data : "created_at"},
                {
                    render: function ( data, type, row, meta ) {
                        if (row.register && row.register.state == 2) {
                            return 'Proceso de terminación'
                        }
                        return `
                            <small class="label ${row.estado == 'Sin aprobar' ? 'bg-green' : (row.estado == 'Aprobado' ? 'bg-blue' : 'bg-red') }">
                                ${row.estado }
                            </small>
                        `;
                    }
                },
                {
                    render: function ( data, type, row, meta ) {
                        let btnTermination = row.register && row.register.state == 2;
                        let idUser = {{Auth::user()->id}};

                        return `
                            @can('Consultar permisos de trabajo')
                                <a href="human_management/work_permit/show/${row.id}" class="btn btn-sm btn-success">Ver</a>
                            @endcan
                            ${row.estado == 'Aprobado' ?
                                `@can('Descargar PDF de permisos de trabajo')
                                    <a href="human_management/work_permit/download/${row.id}" class="btn btn-warning btn-sm">Descargar</a>
                                @endcan` : ''
                            }
                            @can('Eliminar formato de permisos de trabajo')
                                <button type="button" class="btn btn-sm my-1 btn-danger btn-delete">Eliminar</button>
                            @endcan
                        `;
                    }
                }
            ];

            dataTableCrete(url,columns,table_id);


        })
        // document.addEventListener('DOMContentLoaded', function () {
        //     $.ajax({
        //         type:'GET',
        //         url:'http://energitelco.test/human_management/work_permit/list',
        //         cache: false,
        //         success:function(response){
        //             console.log('response',response);
        //         },
        //         error: function (error) {
        //             console.log('error-->',error);
        //         }
        //     })
        // });

        function initFnTable(table) {
            $('.btn-delete').click(function () {
                // let row = table.row( $(this).parent().parent() );
                // let data2 = row.data();
                // // $('#delete-id').val(data.id);
                // $('#delete-name').text(data2.id);
                // $('#delete-modal').modal();
                // $('#delete-submit').click(function (e) {
                //     let form = $("#deleteForm")[0];
                //     let data = new FormData(form);
                //     $.ajax({
                //         type:'POST',
                //         url:'/users/'+data2.id,
                //         data:data,
                //         processData: false,
                //         contentType: false,
                //         cache: false,
                //         timeout: 1000000,
                //         beforeSend: function(){
                //         },
                //         success:function(data){
                //             row.remove().draw();
                //             $('#delete-modal').modal('hide');
                //         },
                //         error: function (error) {
                //             console.log('error-->',error);
                //         }
                //     });
                // });
            });
        }
    </script>
@endsection

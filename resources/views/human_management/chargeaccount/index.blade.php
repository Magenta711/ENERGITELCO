@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        CUENTAS DE COBROS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li class="active">Lista de cuenta de cobro</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de cuentas de cobros</h3>
                <div class="box-tools">
                    @can('Generar cuenta de cobro abierta')
                        <a href="{{route('chargeaccount_generate')}}" class="btn btn-sm btn-warning">Generar</a>
                    @endcan
                    @can('Crear cuenta de cobro')
                        <a href="{{route('chargeaccount_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">A quien debe</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chargeAccounts as $chargeAccount)
                                <tr>
                                    <td>{{$chargeAccount->id}}</td>
                                    <td>{{$chargeAccount->user ? $chargeAccount->user->name : 'Invitado' }}</td>
                                    <td>{{$chargeAccount->approve ? $chargeAccount->approve->name : '' }}</td>
                                    <td>{{$chargeAccount->name }}</td>
                                    <td>$ {{number_format($chargeAccount->value,2,',','.') }}</td>
                                    <td>{{$chargeAccount->token ? 'Invitado' : 'Funcionario' }}</td>
                                    <td>{{($chargeAccount->status == 0) ? 'Sin aprobar' : (($chargeAccount->status == 1) ? 'Aprobado' : (($chargeAccount->status == 2) ? 'No aprobado' : 'Sin respuesta' )) }}</td>
                                    <td>{{$chargeAccount->created_at }}</td>
                                    <td>
                                        @can('Ver cuenta de cobro')
                                            <a href="{{route('chargeaccount_show',$chargeAccount->id)}}" class="btn btn-sm btn-primary">Ver</a>
                                        @endcan
                                        @can('Generar cuenta de cobro abierta')    
                                            @if ($chargeAccount->status == 3)
                                                <button class="btn btn-sm btn-warning" onclick="copy_url({{$chargeAccount->id}})">Copiar ruta</button>
                                                <input type="text" style="display: none" value="{{route('chargeaccount_create',$chargeAccount->token)}}" id="url_{{$chargeAccount->id}}">
                                            @endif
                                        @endcan
                                        {{-- <a href="{{route('chargeaccount_donwload',$chargeAccount->id)}}" class="btn btn-sm btn-warning">Descargar</a> --}}
                                        @can('Eliminar cuenta de cobro')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_delete_{{$chargeAccount->id}}">Eliminar</button>
                                            <div class="modal fade" id="modal_delete_{{$chargeAccount->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('chargeaccount_delete',$chargeAccount->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="exampleModalLongTitle">Eliminar cuenta de cobro</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>¿Está seguro de eliminar el comprobante de pago {{$chargeAccount->id}}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function copy_url(item){
            $('#url_'+item).show().select();
            document.execCommand("copy");
            $('#url_'+item).hide();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'Vinculo copiado al portapapeles'
            })
        }
    </script>
@endsection
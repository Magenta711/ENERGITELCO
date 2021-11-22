@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        H-FR-14 REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Gestión humana</a></li>
        <li><a href="#"> Formatos</a></li>
        <li class="active">Reporte de novedades de nomina y horas extras</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de reportes de novedades de nomina y horas extras</h3>
                <div class="box-tools">
                    @can('Digitar reporte de novedades de nómina y horas extras')
                        <a href="{{route('payroll_overtime_news_report_create')}}" class="btn btn-sm btn-success">Crear</a>
                    @endcan
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Código</th>
                                <th scope="col">Responsable</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payrolls as $payroll)
                            <tr>
                                <th scope="row">{{ $payroll->id }}</th>
                                <th scope="row">{{ $payroll->codigo_formulario ? $payroll->codigo_formulario.'-'.$payroll->id : 'N/A' }}</th>
                                <td>{{ ($payroll->responsableAcargo) ? $payroll->responsableAcargo->name : ''}}</td>
                                <td>{{ ($payroll->estado != 'Sin aprobar' && $payroll->coordinadorAcargo) ? $payroll->coordinadorAcargo->name : ''}}</td>
                                <td>{{ $payroll->created_at }}</td>
                                <td>
                                    <small class="label {{($payroll->estado == 'Sin aprobar') ? 'bg-green' : (($payroll->estado == 'Aprobado') ? 'bg-blue' : 'bg-red') }}">{{$payroll->estado}}</small>
                                </td>
                                <td>
                                    @can('Consultar reporte de novedades de nómina y horas extras')
                                        <a href="{{route('payroll_overtime_news_report_show',$payroll->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @if ($payroll->estado != 'Aprobado')
                                        @can('Editar reporte de novedades de nómina y horas extras')
                                            <a href="{{route('payroll_overtime_news_report_edit',$payroll->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @endcan
                                    @endif
                                    @if ($payroll->estado == 'Aprobado')
                                        @can('Descargar lista de pago de reporte de novedades de nómina y horas extras')
                                            <a href="{{route("payroll_overtime_news_report_download",$payroll->id)}}" class="btn btn-warning btn-sm">Descargar</a>
                                            <a href="{{route("payroll_overtime_news_report_export2",$payroll->id)}}" class="btn bg-purple btn-sm">Exportar</a>
                                        @endcan
                                    @endif
                                    @if ($payroll->estado != 'Aprobado')
                                        @can('Aprobar reporte de novedades de nómina y horas extras')
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_{{$payroll->id}}">Eliminar</button>
                                            <div class="modal fade" id="delete_{{$payroll->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title">Eliminar formato</h4>
                                                        </div>
                                                        <form action="{{route('payroll_overtime_news_report_delete',$payroll->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                            <div class="modal-body">
                                                                <p>¿Está seguro que desa eliminar el formato?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan
                                    @endif
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
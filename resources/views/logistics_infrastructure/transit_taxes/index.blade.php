@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        MULTAS DE TRÁNSITO
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"> Logistica e infraestrutura</a></li>
        <li class="active">Multas de tránsito</li>
    </ol>
</section>
<section class="content">
     
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de cortes de reporte de comparendos y fotomultas e histórico de los mismos</h3>
                <div class="box-tools">
                    {{-- <a href="{{route('transit_taxes_create')}}" class="btn btn-sm btn-success">Crear</a> --}}
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de fin</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transit_taxes as $transit_taxe)
                            <tr>
                                <th scope="row">{{ $transit_taxe->id }}</th>
                                <td>{{ $transit_taxe->start_date }}</td>
                                <td>{{ $transit_taxe->end_date }}</td>
                                <td>
                                    @if ($transit_taxe->start_date < now()->format('Y-m-d') && $transit_taxe->end_date > now()->format('Y-m-d'))
                                        {{ $transit_taxe->status == 1 ? 'Gestionando' : 'Sin gestionar' }}
                                    @else
                                        {{ $transit_taxe->status == 1 ? 'Cerrado' : 'Sin gestión' }}
                                    @endif
                                </td>
                                <td>
                                    @can('Ver cortes de multas')
                                        <a href="{{route('transit_taxes_show',$transit_taxe->id)}}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                    @if ($transit_taxe->start_date <= now()->format('Y-m-d') && $transit_taxe->end_date >= now()->format('Y-m-d'))
                                        @can('Editar cortes de multas')
                                            <a href="{{route('transit_taxes_edit',$transit_taxe->id)}}" class="btn btn-sm btn-primary">Editar</a>
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
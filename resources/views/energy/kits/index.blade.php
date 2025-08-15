@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Kits Solares</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title text-center">Kits Solares</div>
                        <div class="box-tools">
                            @can('Crear Productos')
                                <a class="btn btn-success btn-send" href="{{ route('energy_kits.create') }}">Agregar
                                    Kit</a>
                                <a class="btn btn-warning" data-toggle="modal" data-target=".offer-modal-lg">Modal de oferta
                                    principal</a>
                            @endcan
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="table-responsive table-hover">
                                <table id="table_index" class="table table-striped table-bordered text-center"
                                    data-page-length='15'>
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Cantidad de Kits</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kits as $kit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kit->name }}</td>
                                                <td>{{ $kit->type }}</td>
                                                <td>${{ number_format($kit->price, 2) }}</td>
                                                <td>{{ $kit->CountTypes($kit->type) }}</td>
                                                <td>
                                                    @can('Ver Productos')
                                                        <a class="btn btn-success"
                                                            href="{{ route('energy_kits.show', $kit->type) }}"> <i
                                                                class="fa fa-eye"></i></a>
                                                    @endcan
                                                    @can('Editar Productos')
                                                        <a class="btn btn-warning"
                                                            href="{{ route('energy_kits.edit', $kit->type) }}"><i
                                                                class="fa fa-edit"></i></a>
                                                    @endcan
                                                    <form action="{{ route('energy_kits.destroy_all', $kit->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('¿Estás seguro de eliminar este kit?')"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
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
        </div>
        @if ($kit)

            @include('energy.kits.includes.offer-modal')
        @endif
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
    <script src="{{asset("js/project/mintic/create.js")}}"></script>
    <script>
        $(document).on('change', '.kit', function() {
            const id = $(this).val();
            if (id) {
                const id = $(this).val();
                $.get('/energy/kits/get_info/' + id, function(data) {
                    $('#name').html(data.name);
                    $('#type').html(data.type);
                    $('#serie').html(data.serie);
                    $('#potencia_dia').html(data.potencia_dia);
                    $('#potencia_nominal').html(data.potencia_nominal);
                    $('#voltaje').html(data.voltaje);
                    $('#price').html(data.price);
                    $('#warranty').html(data.warranty);
                    $('#description').html(data.description);
                    $('#description_input').val('');
                    $('#start_date').val('');
                    $('#end_date').val('');
                });
            }
        })
    </script>
@endsection

@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li>Kits Solares</li>
            <li class="active">Ver</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">
            <div class="box-header">
                <div class="box-title"> Equipo Solar</div>
                <div class="box-tools">
                    <a href="{{ route('energy_products') }}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <p>{{ $kit->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">Tipo del Kit*</label>
                            <p>{{ $kit->type }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="serie">Serie</label>
                            <p>{{ $kit->serie }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Características:</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="potencia_dia">Potencia generada al día:</label>
                            <p>{{ $kit->caracteristics['potencia_dia'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="potencia_nominal">Potencia nominal del kit solar:</label>
                            <p>{{ $kit->caracteristics['potencia_nominal'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="voltaje">Voltaje del kit solar:</label>
                            <p>{{ $kit->caracteristics['voltaje'] }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price">Precio*</label>
                            <p>{{ $kit->price }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="warranty">Garantía</label>
                            <p>{{ $kit->warranty }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="desription">Descripción*</label>
                            <p>{{ $kit->description }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="products">Productos incluidos en el kit:</label>
                            <ul class="list-group">
                                @foreach ($products as $product)
                                    <div class="row">
                                        <div class="col-md-4 v-justify-content-center">
                                            <div class="img text-center"
                                                style="height: 200px;overflow: hidden; display: flex;flex-direction: column;justify-content: center;">
                                                @foreach ($product->files as $items)
                                                    <img id="img" src="/storage/energy/{{ $items->name }}"
                                                        alt="Attachment"
                                                        style="max-width: 50%; height: auto; display: block;  margin: 0 auto 10px auto;">
                                                @endforeach
                                            </div>
                                            <div class="text-center">
                                                <b>{{ $product->type }} - {{ $product->model }}<br>Cantidad
                                                    ({{ $product->cantidad }})</b>
                                            </div>
                                        </div>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <h4><b>Lista de Kits</b></h4>
                <div class="table-responsive table-hover">
                    <table id="table_index" class="table table-striped table-bordered text-center" data-page-length='15'>
                        <thead>
                            <tr>
                                <th class="text-center">COD</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kitsGroup as $kit)
                                <tr>
                                    <td>{{ $kit->cod_kit }}</td>
                                    <td>{{ $kit->name }}</td>
                                    <td>{{ $kit->type }}</td>
                                    <td>{{ $kit->status == 1 ? 'Disponible' : ($kit->status === 2 ? 'No disponible' : ($kit->status ==  3 ? 'Vendido' : 'Sin estado')) }}</td>
                                    <td>
                                        {{-- @can('Ver Productos')
                                            <a class="btn btn-success" href="{{ route('energy_kits.show', $kit->type) }}"> <i
                                                    class="fa fa-eye"></i></a>
                                        @endcan
                                        @can('Editar Productos')
                                            <a class="btn btn-primary btn-xs" href="">Editar</a>
                                        @endcan
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                onclick="return confirm('¿Estás seguro de eliminar este kit?')">Eliminar</button>
                                        </form> --}}
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

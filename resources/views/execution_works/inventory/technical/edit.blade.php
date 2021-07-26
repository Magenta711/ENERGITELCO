@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Bodegas de técnicos <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Ejecución de obras</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Herramientas</a></li>
        <li class="active">Usuario</li>
        <li class="active">Editar</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de técnicos con sus bodegas</h3>
                    <div class="box-tools">
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('inventary_technical_update',$id)}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Detalle</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $item)
                                    @if ($item->stock)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->inventaryble->serial}} {{$item->inventaryble->serial ? '-' : ''}} {{$item->inventaryble->item}} - {{$item->inventaryble->brand}} {{$item->inventaryble->type}}</td>
                                            <td>{{$item->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment' ? 'Equipo' : 'Consumible'}}</td>
                                            <td><input type="number" name="amount[{{$item->id}}]" class="form-control input-amount" id="{{$item->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment' ? 'amount-equipment' : 'amount-consumable'}}" value="{{$item->stock}}"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </ul>
</section>
@endsection


@section('js')
    <script>
        $('.input-amount').blur(function () {
            if (this.id == 'amount-equipment') {
                if (this.value > 1) {
                    $(this).val(1);
                }
            }
        });
    </script>
@endsection
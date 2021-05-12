@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Ejecución de implementación <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Proyectos</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Ejecución de implementación proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{route('mintic_add_consumables',$id)}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('mintic_add_consumables_save',[$id,$item->id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Quien recivió</label>
                                <p>{{$item->user->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Quien entregó</label>
                                <p>{{$item->responsable->name}}</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($item->details as $detail)
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="product_1">Producto</label>
                                    @if ($detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticConsumable')
                                        <p>Consumable</p>
                                    @endif
                                    @if ($detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticEquipment')
                                        <p>Equipo</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="description_1">Detalle</label>
                                    <p>{{$detail->productable->item}} - {{$detail->productable->type}}</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="spent">Gastado</label>
                                    <input type="number" name="spent[]" class="form-control spent" value="{{$detail->spent}}" id="spent_1">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">
                        Enviar y firmar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/add_user.js')}}"></script>
@endsection
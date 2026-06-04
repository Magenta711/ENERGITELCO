@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Editar implementación <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Proyectos</li>
        </ol>
    </section>
    <div class="hide">
        <select name="description[]" id="items_equipment" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($equipments as $equipment)
                <option class="optionItems equipment_opt_{{$equipment->id}}" value="{{ $equipment->id }}">{{ $equipment->serial }} {{ $equipment->item }} {{ $equipment->brand }}</option>
            @endforeach
        </select>
        <select name="description[]" id="items_consumable" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($consumables as $consumable)
                <option class="optionItems consumable_opt_{{$consumable->id}}" value="{{ $consumable->id }}">{{ $consumable->item }} - {{ $consumable->type }}</option>
            @endforeach
        </select>
        @foreach ($consumables as $consumable)
            <input type="hide" value="{{$consumable->amount}}" id="amount_product_consumable_{{ $consumable->id }}">
        @endforeach
        <select name="description[]" id="description" class="form-control description_id">
            <option disabled selected></option>
        </select>
    </div>
    <section class="content">
         
        <div class="box">
            <div class="box-header">
                <div class="box-title">Editar implementación proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{route('mintic_add_consumables',$id)}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form action="{{route('mintic_add_consumables_update',[$id,$item->id])}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="num_detail" id="num_detail" value="{{count($item->details)}}">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Quien recive</label>
                                <select name="user_id" id="user_id" class="form-control" {{$item->status != 3 ? 'readonly' : ''}}>
                                    <option selected disabled></option>
                                    @foreach ($users as $user)
                                        <option {{$user->id == $item->user_id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="destino">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($item->details as $detail)
                        @php
                            $i++;
                        @endphp
                            <div class="orgen" id="origen{{ $i != 1 ? '_'.$i : ''}}">
                                <div class="row">
                                    <div class="col-md-2 col-sm-4">
                                        <div class="form-group">
                                            <label for="product_{{$i}}">Producto</label>
                                            <select name="product[]" id="product_{{$i}}" class="form-control product" {{$item->status != 3 ? 'readonly' : ''}}>
                                                <option disabled selected></option>
                                                <option {{$detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticConsumable' ? 'selected' : ''}} value="consumable">Consumible</option>
                                                <option {{$detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticEquipment' ? 'selected' : ''}} value="equipment">Equipo</option>
                                            </select>
                                            <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="form-group">
                                            <label for="description_{{$i}}">Detalle</label>
                                            <div class="destino" id="destino_{{$i}}">
                                                <input type="hidden" name="description_old[]" id="description_old_{{$i}}" value="{{$detail->productable_id}}">
                                                <select name="description[]" id="description_{{$i}}" class="form-control description_id" {{$item->status != 3 ? 'readonly' : ''}}>
                                                    <option disabled selected></option>
                                                </select>
                                            </div>
                                            <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <div class="form-group">
                                            <label for="amount">Entregado</label>
                                            <input type="number" name="amount[]" class="form-control amount" value="{{$detail->amount}}" id="amount_{{$i}}">
                                            <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                                            <span class="help-block" id="message_amount_{{$i}}" style="display: none;">Cantidad no disponible</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <div class="form-group">
                                            <label for="spent">Gastado</label>
                                            <input type="number" name="spent[]" class="form-control spent" value="{{$detail->spent}}" id="spent_{{$i}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <div class="form-group">
                                            <label for="delivered">Devuelto</label>
                                            <input type="number" name="delivered[]" class="form-control delivered" value="{{$detail->delivered}}" id="delivered_{{$i}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        @if ($item->status == 3)
                                        <br>
                                        <i style="cursor: pointer" class="fas fa-trash trash" id="trash_{{$i}}"></i>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    @if ($item->status == 3)
                        <button class="btn btn-sm btn-link" id="clone">
                            <i class="fa fa-plus"></i>
                            Agregar
                        </button>
                    @endif
                    <div class="form-group">
                        <label for="commentary">Comentarios</label>
                        <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{$item->commentary}}</textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/project/mintic/add_user.js')}}"></script>
@endsection
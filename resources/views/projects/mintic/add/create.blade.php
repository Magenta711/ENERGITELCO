@extends('lte.layouts')
 
@section('content')
    <section class="content-header">
        <h1>
            Crear implementación <small>MINTIC</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">Proyectos</li>
        </ol>
    </section>
    <div class="hide">
        <input type="hidden" name="num_detail" id="num_detail" value="{{ old('product') ? count(old('product')) : 1 }}">
        <select name="description[]" id="items_equipment" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($equipments as $item)
                <option class="optionItems equipment_opt_{{$item->id}}" value="{{ $item->id }}">{{ $item->serial }} {{ $item->item }} {{ $item->brand }}</option>
            @endforeach
        </select>
        <select name="description[]" id="items_consumable" class="form-control description_id">
            <option selected disabled></option>
            @foreach ($consumables as $item)
                <option class="optionItems consumable_opt_{{$item->id}}" value="{{ $item->id }}">{{ $item->item }} - {{ $item->type }}</option>
            @endforeach
        </select>
        @foreach ($consumables as $item)
            <input type="hide" value="{{$item->amount}}" id="amount_product_consumable_{{ $item->id }}">
        @endforeach
        <select name="description[]" id="description" class="form-control description_id">
            <option disabled selected></option>
        </select>
    </div>
    <section class="content">
        @include('includes.alerts')
        <div class="box">
            <div class="box-header">
                <div class="box-title">Crear implementación proyecto MINTIC</div>
                <div class="box-tools">
                    <a href="{{route('mintic_add_consumables',$id)}}" class="btn btn-sm btn-primary">Volver</a>
                </div>
            </div>
            <form id="form_mintic" action="{{route('mintic_add_consumables_store',$id)}}" method="post">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Quien recive</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected disabled></option>
                                    @foreach ($users as $user)
                                        <option {{$user->id == old('user_id') ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="destino">
                        @if (old('product'))
                            @for ($i = 0; $i < count(old('product')); $i++)
                                @if (isset(old('product')[$i]) && isset(old('description')[$i]))
                                    <div class="orgen" id="origen">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="product_{{$i}}">Producto</label>
                                                    <select name="product[]" id="product_{{$i}}" class="form-control product">
                                                        <option disabled selected></option>
                                                        <option {{old('product')[$i] == 'consumable' ? 'selected' : '' }} value="consumable">Consumible</option>
                                                        <option {{old('product')[$i] == 'equipment' ? 'selected' : '' }} value="equipment">Equipo</option>
                                                    </select>
                                                    <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="description_{{$i}}">Detalle</label>
                                                    <div class="destino" id="destino_{{$i}}">
                                                        <input type="hidden" name="description_old[]" id="description_old_{{$i}}" value="{{old('description')[$i]}}">
                                                        <select name="description[]" id="description_{{$i}}" class="form-control description_id">
                                                            <option disabled selected></option>
                                                        </select>
                                                    </div>
                                                    <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="amount">Cantidad</label>
                                                    <input type="number" name="amount[]" class="form-control amount" value="{{old('amount')[$i]}}" id="amount_{{$i}}">
                                                    <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                                                    <span class="help-block" id="message_amount_{{$i}}" style="display: none;">Cantidad no disponible</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <br>
                                                <i style="cursor: pointer" class="fas fa-trash trash" id="trash_{{$i}}"></i>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endif
                            @endfor
                        @else
                            <div class="orgen" id="origen">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="product_1">Producto</label>
                                            <select name="product[]" id="product_1" class="form-control product">
                                                <option disabled selected></option>
                                                <option value="consumable">Consumible</option>
                                                <option value="equipment">Equipo</option>
                                            </select>
                                            <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="description_1">Detalle</label>
                                            <div class="destino" id="destino_1">
                                                <select name="description[]" id="description_1" class="form-control description_id">
                                                    <option disabled selected></option>
                                                </select>
                                            </div>
                                            <span class="help-block" style="display: none;">Esté campo es obligatorio</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="amount">Cantidad</label>
                                            <input type="number" name="amount[]" class="form-control amount" value="1" id="amount_1" readonly>
                                            <span class="help-block" id="message_validate" style="display: none;">Este campo es obligatorio</span>
                                            <span class="help-block" id="message_amount_1" style="display: none;">Cantidad no disponible</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <br>
                                        <i style="cursor: pointer" class="fas fa-trash trash" id="trash_1"></i>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-sm btn-link" id="clone">
                        <i class="fa fa-plus"></i>
                        Agregar
                    </button>
                    <div class="form-group">
                        <label for="commentary">Comentarios</label>
                        <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-primary btn-send" id="send">
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
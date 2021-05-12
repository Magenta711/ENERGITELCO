@extends('lte.layouts')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar herramientas <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Logística</a></li>
        <li><a href="#">Inventario</a></li>
        <li><a href="#">Herramientas</a></li>
        <li class="active">Editar herramientas</li>
    </ol>
</section>
{{-- Content main --}}
<section class="content">
    @include('includes.alerts')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Editar herramienta</h3>
                    <div class="box-tools">
                        <a href="{{route('inventory_tools')}}" class="btn btn-sm btn-primary btn-send">Volver</a>
                    </div>
                </div>
                <form action="{{ route('inventory_tools_update',$id->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="serial">Serial</label>
                                <input name="serial" id="serial" value="{{$id->serial}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input name="name" id="name" value="{{$id->name}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="user_id">Funcionario</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option selected value="0">No aplica</option>
                                    @foreach ($users as $user)
                                       <option {{$id->user_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->cedula}} - {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="commentary">Comentarios, observaciones o descripción (Historial)</label>
                                <p>{!! str_replace("\n", '</br>', addslashes($id->commentary)) !!}</p>
                                <textarea name="commentary" id="commentary" cols="30" rows="3" class="form-control">{{old('commentary')}}</textarea>
                            </div>
                        </div>
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

{{-- Se trata de un sistema logistico de prestamo --}}
{{-- Se debe prestar una herramienta --}}
{{-- En otros casos debe estar en estado de bodega --}}
{{-- Estas herramientas presentan un serial por el cual se identifica como unico --}}
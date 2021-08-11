@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Editar rol <small>roles y permisos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Roles</a></li>
        <li class="active">Editar roles</li>
    </ol>
</section>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{ route('roles.index') }}">Volver</a>
                    </div>
                </div>
                <form action="{{route('roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}" {{ $role->id == 1 ? 'readonly' : ''}} placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <strong>Permisos:</strong>
                        <ul class="list-group">
                            @php
                                $category = '';
                            @endphp
                            @foreach($permission as $value)
                                @php
                                    if($category != $value->category){
                                        $category = $value->category;
                                        $categoryText = $category;
                                    }else {
                                        $categoryText = '';
                                    }
                                @endphp
                                @if ($categoryText != '')
                                    <h1 class="text-center">{{ $categoryText }}</h1>
                                @endif
                                <li class="list-group-item {{in_array($value->id, $rolePermissions) ? 'bg-gray' : ''}}" id="item_{{$value->id}}">
                                    <label class="item-permit">
                                        <input type="checkbox" name="permission[]" class="name" value="{{$value->id}}" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                        {{ $value->name }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.item-permit').click(function () {
                let item = $(this).children();
                if (item.is(':checked')) {
                    let item = $(this).parent().addClass('bg-gray');
                }else{
                    let item = $(this).parent().removeClass('bg-gray');
                }
            });
        });
    </script>
@endsection
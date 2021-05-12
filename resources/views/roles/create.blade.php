@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Crear rol <small>roles y permisos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Roles</a></li>
        <li class="active">Crear roles</li>
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
                        <a class="btn btn-sm btn-primary" href="{{ route('roles.index') }}"> Volver</a>
                    </div>
                </div>
                <form action="{{route('roles.store')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
                                            <h2 class="text-center">{{ $categoryText }}</h2>
                                        @endif
                                        <li class="list-group-item">
                                            <label class="item-permit">
                                                <input type="checkbox" name="permission[]" class="name" value="{{$value->id}}">
                                                {{ $value->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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
                    console.log('check');
                    let item = $(this).parent().addClass('bg-gray');
                }else{
                    let item = $(this).parent().removeClass('bg-gray');
                    console.log('no');
                }
            });
        });
    </script>
@endsection
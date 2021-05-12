@extends('lte.layouts')
@section('content')
<section class="content-header">
    <h1>
        Mostrar roles y permisos <small>roles y permisos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="">Roles</a></li>
        <li class="active">Mostrar rol</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">{{$role->name}}</div>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-primary" href="{{ route('roles.index') }}"> Volver</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permisos:</strong>
                                <ul class="list-group">
                                @if(!empty($rolePermissions))
                                    @php
                                        $category = '';
                                    @endphp
                                    @foreach($rolePermissions as $value)
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
                                        <li class="list-group-item">{{ $value->name }}</li>
                                    @endforeach
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
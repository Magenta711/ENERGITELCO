@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Mensajes del sistema <small>Configuraciones</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Configuiraciones</a></li>
        <li class="active">Mensajes del sistema</li>
    </ol>
</section>
<section class="content">
     
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
        
                    <h3 class="box-title">Mensajes del sistema</h3>
                </div>
                    <!-- /.box-header -->
                <form action="{{route('messages_store')}}" method="post">
                    @csrf
                <div class="box-body">
                    @foreach ($messages as $message)
                        <div class="form-gruop">
                            <input type="hidden" name="name[]" value="{{$message->name}}">
                            <label for="" class="control-label col-md-12">{{$message->name}}
                                <textarea name="description[]" id="" cols="30" rows="10" class="form-control">{{$message->description}}</textarea>
                            </label>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button class="btn btn-sm btn-success">Guardar</button>
                </div>
                </form>
            </div>
</section>
@endsection
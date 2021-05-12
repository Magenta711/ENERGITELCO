@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Editar solicitud de empleo <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Solicitudes de empleo</a></li>
        <li class="active">Editar solicitud de empleo</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <form action="{{route('job_application_update',$id->id)}}" method="post">
            @csrf
            @method('PUT')
        <div class="box-header">
            <div class="box-title">Solicitud de empleo</div>
            <div class="box-tools">
                <a href="{{route('job_application')}}" class="btn btn-sm btn-primary">Volver</a>
            </div>
        </div>
        <div class="box-body">
            
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" readonly disabled name="name" value="{{$id->name}}" id="name" placeholder="Nombres y apellidos completos">
                @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            {{-- email --}}
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" readonly disabled name="email" value="{{$id->email}}" id="email" placeholder="example@email.com">
                @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            {{-- tel --}}
            <div class="form-group">
                <label for="tel">Teléfono</label>
                <input type="tel" class="form-control @error('tel') is-invalid @enderror" readonly disabled name="tel" value="{{$id->tel}}" id="tel" placeholder="Teléfono de contacto">
                @error('tel') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            {{-- cargo --}}
            <div class="form-group">
                <label for="position_id">Cargo</label>
                <select class="form-control @error('position_id') is-invalid @enderror" name="position_id" id="position_id">
                    <option selected disabled>Selecciona el cargo al que aspira</option>
                    @foreach ($positions as $position)
                        <option {{($id->position_id == $position->id) ? 'selected' : ''}} value="{{$position->id}}">{{$position->name }}</option>
                    @endforeach
                </select>
                @error('position_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            {{-- comentario --}}
            <div class="form-group">
                <label for="comentary">Comentarios</label>
                <textarea class="form-control @error('comentary') is-invalid @enderror" readonly disabled name="comentary" rows="2" cols="2" id="comentary">{{$id->comentary}}</textarea>
                @error('comentary') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            {{-- hoja de vida --}}
            <div class="form-group">
                <label for="file">Hoja de vida o archivo adjunto</label>
                <a class="form-control" href="/file/work_with_us/{{$id->file}}">{{$id->file}}</a>
                @error('file') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-sm btn-success">Guardar</button>
        </div>
        </form>
    </div>
</section>
@endsection
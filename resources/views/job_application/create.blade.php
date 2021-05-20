@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trabaja con nosotros</div>
                <form method="POST" action="{{route('work_with_us_store')}}" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="center">
                            @csrf
                            {{-- name --}}
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old("name")}}" id="name" placeholder="Nombres y apellidos completos">
                                @error('name') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            {{-- email --}}
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old("email")}}" id="email" placeholder="example@email.com">
                                @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            {{-- tel --}}
                            <div class="form-group">
                                <label for="tel">Teléfono</label>
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{old("tel")}}" id="tel" placeholder="Teléfono de contacto">
                                @error('tel') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            {{-- cargo --}}
                            <div class="form-group">
                                <label for="position_id">Cargo</label>
                                <select class="form-control @error('position_id') is-invalid @enderror" name="position_id" id="position_id">
                                    <option value="">Selecciona el cargo al que aspira</option>
                                    @foreach ($positions as $position)
                                    <option value="{{$position->id}}">{{$position->description }}</option>
                                    @endforeach
                                </select>
                                @error('position_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            {{-- comentario --}}
                            <div class="form-group">
                                <label for="comentary">Comentarios</label>
                                <textarea class="form-control @error('comentary') is-invalid @enderror" name="comentary" rows="2" cols="2" id="comentary">{{old("comentary")}}</textarea>
                                @error('comentary') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            {{-- hoja de vida --}}
                            <div class="form-group">
                                <label for="file">Adjunte la hoja de vida (pdf)</label>
                                <label for="file" class="form-control @error('file') is-invalid @enderror text-center" id="label_file"><i class="fa fa-upload"></i></label>
                                <input type="file" accept=".pdf" class="d-none" name="file" value="{{old("file")}}" id="file">
                                @error('file') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary">Enviar solicitud</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#file').change(function (){
            $('#label_file').addClass('text-primary');
        });
    });
</script>
@endsection
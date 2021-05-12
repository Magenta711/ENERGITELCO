@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Carta de recomendación</div>
                <form method="POST" action="{{route('letter_recommendation_download')}}" autocomplete="off">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="center">
                            @csrf
                            {{-- cedula --}}
                            <div class="form-group">
                                <label for="">Digite el número de cédula</label>
                                <input type="text" name="document" class="form-control @error('document') is-invalid @enderror">
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Recachat --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary">Descargar</button>
                            </div>
                        </div>
                    </div>
                </form>
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
@extends(isset(Auth::user()->id) ? 'lte.layouts' : 'layouts.app2')
@auth
    @section('content')
    <section class="content-header">
        <h1>
            Fomularios
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#"> Formularios</a></li>
            <li class="active">Responder</li>
        </ol>
    </section>
    <section class="content">
        @include('includes.alerts')
        <form action="{{route('answers_store')}}" id="target" autocomplete="off" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box">
            <div class="box-header">
                <div class="box-title">
                    {{$id->name}}
                </div>
            </div>
            <div class="box-body">

@endauth

@guest

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$id->name}}</div> --}}

<section class="signup-section" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-white">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <div class="text-center">
                    <i class="fab fa-wpforms fa-2x mb-2"></i>
                    <h2 class="mb-5">{{ $id->name }}</h2>
                </div>
                <form action="{{route('answers_store')}}" id="target" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="card-body"> --}}
@endguest

            {{-- <div class="mb-3">
                <h3 class="card-title">{{$id->name}}</h3> --}}
                <p class="card-text">{{$id->description}}</p>
                <p>Todo campo con <span class="text-danger">*</span> son requeridos</p>
            {{-- </div> --}}
            <input type="hidden" name="form" value="{{$id->token}}">
            {{-- <input type="hidden" name="user" value="{{$user}}"> --}}
            <hr>
            @foreach ($id->questions as $question)
                <div class="form-group ">
                    <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                    @include('forms.includes.type_controls')
                </div>
            @endforeach
@auth
        </div>
            <div class="box-footer">
                <button class="btn btn-sm btn-primary btn-save">Enviar</button>
            </div>
        </div>
            </form>
        </div>
    </section>
    @endsection
@endauth
@guest
                {{-- </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <button class="btn btn-sm btn-primary btn-save">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div> --}}
                    <button class="btn btn-sm btn-block btn-primary btn-save">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@endguest

@section('js')
    <script src="{{ asset('js/forms/order_create.js') }}" defer></script>
    <script src="{{ asset('js/forms/upload.js') }}" defer></script>
@endsection
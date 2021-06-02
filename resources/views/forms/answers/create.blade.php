@php
    function twodshuffle($array)
    {
        $count = count($array);
        $indi = range(0,$count-1);
        shuffle($indi);
        $newarray = array($count);
        $i = 0;
        foreach ($indi as $index)
        {
            $newarray[$i] = $array[$index];
            $i++;
        }
        return $newarray;
    }
@endphp

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

<section class="signup-section" id="signup" style="padding: 10rem 0 0 0">
    <div class="container" style="background-color: rgb(0,0,0,0.4); padding: 1rem; border-radius: 10px">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-white">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <div class="text-center">
                    <i class="fab fa-wpforms fa-2x mb-2"></i>
                    <h2 class="mb-5">{{ $id->name }}</h2>
                </div>
                <form action="{{route('answers_store')}}" id="target" autocomplete="off" method="post" enctype="multipart/form-data">
                    @csrf
@endguest
                <p class="card-text">{{$id->description}}</p>
                <p>Todo campo con <span class="text-danger">*</span> son requeridos</p>
            <input type="hidden" name="form" value="{{$id->token}}">
            <input type="hidden" name="email" value="{{$email}}">
            <hr>
            @if ($id->sort_randomly)
                @foreach ($id->questions as $question)
                    @if ($question->type != 3)
                        <div class="form-group">
                            <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                            @include('forms.includes.type_controls')
                        </div>
                    @endif
                @endforeach
                    @foreach (twodshuffle($id->questions) as $question)
                        @if ($question->type == 3)
                            <div class="form-group">
                                <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                                @include('forms.includes.type_controls')
                            </div>
                        @endif
                    @endforeach
            @else
             @foreach ($id->questions as $question)
                 <div class="form-group">
                     <label class="label-text" for="input_{{$question->id}}">{{$question->question}} <span class="text-danger">{{ $question->required ? '*' : '' }}</span></label>
                     @include('forms.includes.type_controls')
                 </div>
             @endforeach
            @endif
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
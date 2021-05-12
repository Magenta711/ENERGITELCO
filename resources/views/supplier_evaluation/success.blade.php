@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Evaluación a provedores</div>
                <div class="card-body">
                    @if ($title = Session::get('title'))
                        <h4>{{$title}}</h4>
                    @endif
                    @if ($message = Session::get('success'))
                        <p>{{ $message }}</p>
                    @endif
                    @if ($slogan = Session::get('slogan'))
                        <p class="text-center">{{ $slogan }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <div class="center">
                        <div class="justify-content-center row my-3">
                            <img src="{{asset('img/logo.png')}}" class="img-fluid " alt="Responsive image">
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="input-group col-md-6">
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" data-toggle="tooltip" data-trigger="manual" data-title="La tecla Bloq Mayús está activada">
                                <div class="input-group-append">
                                    <button class="btn" id="show_pass" type="button"><i class="fa fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // var isEdgeChromium = navigator.userAgent.indexOf("Edg") != -1;
            $('[type=password]').keypress(function(e) {
                var password = $(this);
                tooltipVisible = $('.tooltip').is(':visible');
                s = String.fromCharCode(e.which);
                if (password.attr('type') == 'password') {
                    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
                        if (!tooltipVisible)
                            password.tooltip('show');
                    } else {
                        if (tooltipVisible)
                            password.tooltip('hide');
                    }
                }
                password.blur(function(e) {
                    password.tooltip('hide');
                });
            });
            $('#show_pass').click(function (e) {
                e.preventDefault();
                if ($('#password').attr('type') == 'password') {
                    $('#password').attr('type','text');
                    $(this).children('i').addClass('fa-eye-slash').removeClass('fa-eye');
                }else {
                    $('#password').attr('type','password');
                    $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endsection
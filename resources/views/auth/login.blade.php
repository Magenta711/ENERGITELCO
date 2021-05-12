@extends('layouts.app2')

@section('content')
<section class="signup-section" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <i class="far fa-user-circle fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">{{ __('Login') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 @error('email') is-invalid @enderror" name="email" id="email" type="email" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus />

                        @error('email')
                            <span class="invalid-feedback text-white text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <div class="input-group"> --}}
                            <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="{{ __('Password') }}" required autocomplete="current-password" data-toggle="tooltip" data-trigger="manual" data-title="La tecla Bloq Mayús está activada" />
                            {{-- <div class="input-group-append">
                                <button class="btn" id="show_pass" type="button"><i class="fa fa-eye"></i></button> --}}
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="form-group">
                        <div class="form-check text-white text-left">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                </form>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
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
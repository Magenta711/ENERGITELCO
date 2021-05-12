@extends('layouts.app2')

@section('content')
<section class="signup-section" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <i class="fas fa-user-lock fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" name="email" id="email" type="email" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus />
                        
                        @error('email')
                            <span class="invalid-feedback text-white text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                    <button class="btn btn-sm btn-primary btn-block" type="submit">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

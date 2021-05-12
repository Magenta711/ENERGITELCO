@extends('layouts.app2')

@section('content')
<section class="signup-section" id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                {{-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> --}}
                <i class="fas fa-user-lock fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">{{ __('Reset Password') }}</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input class="form-control mr-0 mr-sm-2 mb-3 mb-sm-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button class="btn btn-sm btn-primary btn-block" type="submit">{{ __('Send Password Reset Link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

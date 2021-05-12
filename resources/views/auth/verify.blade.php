@extends('lte.layouts')

@section('content')
<section class="content-header">
    <h1>
        Confirmar correo
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Confirmar correo</a></li>
    </ol>
</section>
<section class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header"><div class="box-title">{{ __('Verify Your Email Address') }}</div></div>
                <div class="box-body">
                    @if (session('resent'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <p>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

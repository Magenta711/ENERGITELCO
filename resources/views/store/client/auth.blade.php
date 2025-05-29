@extends('store.client.main')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="authTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab">Registro</a>
                </li>
            </ul>

            <!-- Forms -->
            <div class="tab-content bg-white p-4 border border-top-0" id="authTabsContent">
                <!-- Login Form -->
                @include('store.client.login')


                <!-- Register Form -->
                @include('store.client.register')
            </div>
        </div>
    </div>
@endsection


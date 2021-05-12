<div class="col-md-4 col-ms-4">
    <div class="box">
        {{-- collapsed-box --}}
        <div class="box-header with-border">
            <div class="box-title">Menú</div>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Minimizar">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{route('profile_edit')}}">Información personal</a>
                </li>
                {{-- <li class="list-group-item">
                    <a href="{{route('add_information')}}">Información adicional</a>
                </li> --}}
                <li class="list-group-item">
                    <a href="{{route('password_edit')}}">Cambiar contraseña</a>
                </li>
                <li class="list-group-item">
                    <a href="{{route('about')}}">Acerca del sistema</a>
                </li>
            </ul>
        </div>
    </div>
</div>

    <div class="box">
        <div class="box-header">
            <div class="box-tools">
                <a href="{{ route('users') }}" class="btn btn-sm btn-primary">
                    Volver
                </a>
            </div>
        </div>

        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/img/{{$id->foto}}" alt="User profile picture">
            <h3 class="profile-username text-center">{{$id->name}}</h3>
            <p class="text-danger text-center">{{ $id->getRoleNames()[0] }}</p>
            <p class="text-muted text-center">{{ ($id->position) ? $id->position->name : $id->position->name}}</p>
            <strong><i class="fa fa-credit-card margin-r-5"></i> Documento de identificacion</strong>

            <p class="text-muted">
                {{ $id->cedula }}
            </p>

            <hr>

            <strong><i class="fa fa-envelope margin-r-5"></i> Correo</strong>

            <p class="text-muted">{{$id->email}}</p>

            <hr>
            
            <strong><i class="fa fa-phone margin-r-5"></i>Teléfono</strong>
            
            <p class="text-muted"> {{$id->telefono}}</p>
            
            <hr>
            
            <strong><i class="fa fa-user margin-r-5"></i> Cargo</strong>
            
            <p class="text-muted"> {{$id->position->name}}</p>
            
            <hr>
            
            <strong><i class="fa fa-chart-area margin-r-5"></i> Área</strong>

            <p class="text-muted"> {{$id->area}}</p>

            <hr>

            <strong><i class="fa fa-chart-area margin-r-5"></i>  Contacto de emergencia</strong>
            <p>{{$id->register ? $id->register->emergency_contact : 'N/A'}}</p>
            
            <hr>

            <strong><i class="fa fa-chart-area margin-r-5"></i>  Número de contacto de emergencia</strong>
            <p>{{$id->register ? $id->register->emergency_contact_number : 'N/A'}}</p>
        </div>
        
        <div class="box-footer text-center">
            @if ($id->state == 1)
                @can('Editar usuarios')
                    <a href="{{ route('user_edit',$id->id)}}" class="btn btn-sm btn-primary">Editar</a>
                @endcan
                @if ($id->register && $id->register->letter1)
                    @can('Eliminar usuarios')
                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$id->id}}">Eliminar</button>
                                                
                        <div class="modal fade" id="modal_delete_{{$id->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('user_destroy',$id->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de eliminar el usuario {{$id->name}}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endcan
                @else
                    @can('Terminar contratación de usuarios')
                        <a href="{{route('user_end_work',$id->id)}}" class="btn btn-sm btn-warning btn-send">Terminar</a>
                    @endcan
                @endif
            @else
            @if (auth()->user()->hasRole('Administrador'))
                <a href="{{route('restore',$id->id)}}" class="btn btn-sm btn-danger">Restaurar</a>
            @endif
            @endif
        </div>
    </div>
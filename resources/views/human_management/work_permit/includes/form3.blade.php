<div class="panel box box-success">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                3. Validación para trabajar
            </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
        <div class="box-body">
            <p>La autorización de este trabajo es personal e intransferible y cubre sólo una solicitud de trabajo. Cambios de turno y/o persona responsable del trabajo, así como en tiempos de ejecución más amplios
            <b>requieren la extensión de la validez del permiso.</b>
                </p>
            <small><strong>NOTA IMPORTANTE:</strong> <i>FIRME EL PRESENTE DOCUMENTO SÓLO SI LAS CONDICIONES QUE POSEE EN SITIO SON APTAS PARA LA REALIZACIÓN DEL TRABAJO, EN CASO CONTRARIO, COMUNIQUE LOS PENDIENTES A SU LÍDER DE SALUD OCUPACIONAL O COORDINADOR (JORGE ORTEGA)</i></small>
            <hr>
            <div class="form-row">
                <div class="col-sm-5">
                    <label for="coordinador">Coordinador</label>
                    <select name="coordinador" id="coordinador" class="form-control">
                        <option value="" selected disabled>Selecciona el coordinador para la aprovación</option>
                        @foreach ($users as $user)
                            @if($user->hasPermissionTo('Aprobar solicitud de Permisos de trabajo') || ($user->hasPermissionTo('Aprobar solicitudes permisos propios') && $user->id == auth()->id()) )
                                <option {{(old('coordinador') == $user->id) ? 'selected' : ''}} value="{{ $user->id }}">{!!$user->cedula.'&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;'.$user->name!!} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
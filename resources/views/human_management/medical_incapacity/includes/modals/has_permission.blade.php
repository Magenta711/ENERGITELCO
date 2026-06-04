<!-- Modal -->
<div class="modal fade" id="hasPermissionModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal_deleteLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Permisos</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>Cedula</tr>
                            <tr>Nombre</tr>
                            <tr>Responsable</tr>
                            <tr>Ultima fecha</tr>
                            <tr>Cantidad</tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->cedula}}</td>
                                    <td>{{$user->name}}</td>
                                    <td id="td_responsable_{{$user->id}}">{{$user->hasPermisisonWork ? $user->hasPermisisonWork->responsable->name : 'N/A' }}</td>
                                    <td id="td_update_{{$user->id}}">{{$user->hasPermisisonWork ? $user->hasPermisisonWork->updated_at : 'N/A' }}</td>
                                    <td><button id="plus_{{$user->id}}" class="btn btn-plus">+</button> <span id="amount_{{$user->id}}">{{$user->hasPermisisonWork ? $user->hasPermisisonWork->amount : '0' }}</span> <button {{(($user->hasPermisisonWork) ? (($user->hasPermisisonWork->amount > 0) ? '' : 'disabled') : 'disabled') }} id="rest_{{$user->id}}" class="btn btn-rest">-</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-sm btn-primary">Eliminar</button>
            </div>
        </div>
    </div>
</div>
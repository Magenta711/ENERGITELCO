<!-- Modal -->
<div class="modal fade" id="modal_users" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modal_deleteLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
          <h4 class="modal-title" id="exampleModalLongTitle">Eliminar formulario</h4>
        </div>
        <div class="modal-body text-left">
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Correo</th>
                      <th>Respuestas</th>
                      <th>Estado</th>
                      @if ($id->from_to_auth || $id->from_to_mail)
                        <th>/</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($id->user_forms as $item)
                          <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{count($item->orders)}}</td>
                              <td>{{$item->status ? 'Inhabilitado' : 'Habilitado' }}</td>
                              @if ($id->from_to_auth || $id->from_to_mail)
                                <td>
                                  @if (!$item->status)
                                    <form action="{{route('forms_resend',$item->id)}}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-primary">Reenviar</button>
                                    </form>
                                  @endif
                                </td>
                              @endif
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
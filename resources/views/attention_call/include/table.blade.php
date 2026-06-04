<div class="table-responsive table-hover">
    <table id="table_index" class="table table-striped table-bordered" data-page-length='15'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Asunto</th>
                <th scope="col">Responsable</th>
                <th scope="col">Receptor</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attention_calls as $call)
            <tr>
                <td>{{$call->id}}</td>
                <td>{{$call->affair}}</td>
                <td>{{$call->responsableCall->name}}</td>
                <td>{{$call->receiverCall->name}}</td>
                <td>
                    <small class="label {{($call->state == 'Sin argumentos') ? 'bg-purple' : (($call->state == 'Sin aprobar') ? 'bg-yellow' : (($call->state == 'Aprobado') ?  'bg-blue ' : 'bg-red' )) }}">{{$call->state}}</small>
                </td>
                <td>{{$call->created_at}}</td>
                <td>
                    @can('Ver llamados de atención')
                    <a href="{{route('attention_call_show',$call->id)}}" class="btn btn-sm btn-success">Ver</a>
                    @endcan
                    @if ($call->receiverCall->id == auth()->id() && $call->state == 'Sin argumentos')
                        @can('Responder llamados de atención')
                            <a href="{{route('called_responder',$call->id)}}" class="btn btn-sm btn-danger">Responder</a>
                        @endcan
                    @endif
                    @can('Editar llamados de atención')
                        @if ($call->state == 'Sin argumentos')
                            <a href="{{route('attention_call_edit',$call->id)}}" class="btn btn-sm btn-primary">Editar</a>    
                        @endif
                    @endcan
                    @can('Eliminar llamados de atención')
                        <button type="button" class="btn btn-sm btn-danger pl-4 pr-4" data-toggle="modal" data-target="#modal_delete_{{$call->id}}">Eliminar</button>
                    
                        <div class="modal fade" id="modal_delete_{{$call->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{route('delete_call',$call->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="exampleModalLongTitle">Eliminar descargo</h4>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro de eliminar el descargo?</p>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
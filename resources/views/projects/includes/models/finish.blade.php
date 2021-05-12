<div class="modal fade" id="modalFinish_{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Finalizar proyecto</h4>
            </div>
            <form action="{{route('finish_project',$project->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="final_percentage" value="{{$percentage}}">
                    <p>Esta seguro de terminar el proyecto</p>
                    <hr>
                    <h4>Entregables</h4>
                    <ul class="list-group">
                       @foreach (entregables($project) as $item)
                       <li class="list-group-item list-group-item-action">
                            <label for="deliverable_{{$item->id}}">{{$item->deliverable}}</label>
                            <span class="label {{ (deliverablesCheck($project->deliverables,$item->id) == 'Listo') ? 'label-success' : 'label-warning' }} badge badge-primary badge-pill">{{ deliverablesCheck($project->deliverables,$item->id)}}</span>
                        </li>
                       @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary">Enviar y firmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalReactivePercentage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Reativar el proyecto</h4>
            </div>
            <form action="{{route('reactive_project',$project->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reactive">¿Ingrese el nuevo porceje permitido?</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="accepted_percentage" id="reactive" value="{{$project->accepted_percentage}}">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary">Enviar y firmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

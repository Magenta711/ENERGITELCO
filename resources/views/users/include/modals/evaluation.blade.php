<div class="modal fade performance_evaluation" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nueva evaluación de desempeño</h4>
            </div>
            <form action="{{route('performance_evaluation_create')}}" method="post">
            @csrf
                <div class="modal-body">
                    <p>¿Desea disparar el envio de la evaluación de desempeño a todos los usuarios activos?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-sm btn-success btn-send">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
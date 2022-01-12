<div class="modal fade" id="newCutModal" tabindex="-1" role="dialog" aria-labelledby="newCutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Generar nuevo corte de pago de bonificaciones técnicas</h4>
            </div>
            <form id="form-general-cut" action="{{ route('bonuses_technical_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <p>¿Está seguro de generar un corte para pago de bonificaciones técnicas?</p>
                    <p><small>Se generar listado de bonificaciones técnicas editable con estado pendientes.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-sm btn-primary btn-send">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>
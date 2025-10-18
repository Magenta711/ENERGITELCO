<div class="modal fade approved-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Atención</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="approveForm" action="{{ route('quote_energy_system.approved', $id->id) }}" method="POST">
                    @csrf
                    <h3 class="text-center"><b>Al aprobar esta cotización se enviará un correo al cliente</b></h3>
                    <input type="hidden" name="chart1" id="chart1">
                    <input type="hidden" name="chart2" id="chart2">
                    <button type="submit" class="btn-submit btn btn-success">Aprobar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade noapproved-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center"><b>Atención</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="NoapproveForm" action="{{ route('quote_energy_system.no_approved', $id->id) }}" method="POST">
                    @csrf
                    <h3 class="text-center"><b>¿Esta seguro de rechazar la cotización?</b></h3>
                    <button type="submit" class="btn-submit btn btn-danger text-right">Rechazar</button>
                </form>
            </div>
        </div>
    </div>
</div>

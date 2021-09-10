<div class="modal fade" id="modal_export" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="{{route('learned_lessons_test_export')}}" method="post">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Exportar reporte de ventas</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="by">Exportar por</label>
                    <select name="by" id="by" class="form-control">
                        <option selected disabled></option>
                        <option value="1">Hoy</option>
                        <option value="2">Día</option>
                        <option value="3">Semana</option>
                        <option value="4">Mes</option>
                        <option value="5">Año</option>
                        <option value="6">Rango</option>
                    </select>
                </div>
                <div class="form-group" style="display: none;" id="div_by_day">
                    <label for="by_day">Por dia</label>
                    <input type="date" name="by_day" id="by_day" class="form-control">
                </div>
                <div class="form-group" style="display: none;" id="div_by_week">
                    <label for="by_week">Por semana</label>
                    <input type="week" name="by_week" id="by_week" class="form-control">
                </div>
                <div class="form-group" style="display: none;" id="div_by_month">
                    <label for="by_month">Por mes</label>
                    <input type="month" name="by_month" id="by_month" class="form-control">
                </div>
                <div class="form-group" style="display: none;" id="div_by_year">
                    <label for="by_year">Por año</label>
                    <input type="number" value="{{now()->format('Y')}}" min="2001" name="by_year" id="by_year" class="form-control">
                </div>
                <div class="form-group" style="display: none;" id="div_by_rango">
                    <label for="by_rango">Por rango</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="start_day">Incio</label>
                            <input type="date" name="start_day" class="form-control" id="start_day">
                        </div>
                        <div class="col-sm-6">
                            <label for="end_date">Final</label>
                            <input type="date" name="end_date" class="form-control" id="end_date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-sm btn-primary">Exportar</button>
            </div>
        </form>
    </div>
    </div>
</div>
<div class="panel box box-primary">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Carta de recomendación
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="form-group">
            <label for="letter1">Detalles</label>
            <textarea name="letter1" id="letter1" cols="3" rows="6" class="form-control">Por medio de la presente se quiere dejar constancia de que el señor(a) {{$id->name}} con Cédula de Ciudadanía número {{$id->cedula}}, trabajó en ENERGITELCO S.A.S desde el {{$date['day']}} de {{$date['month']}} de {{$date['year']}} hasta el {{now()->format('d')}} de {{$date['this_month']}} de {{now()->format('Y')}} como {{$id->position->name}}.</textarea>
        </div>
        <div class="form-group">
            <label for="reason1">Motivo</label>
            <small>(Renuncia del trabajador, Acuerdo entre las partes, Despido por la empresa)</small>
            <textarea name="reason1" id="reason1" cols="3" rows="3" class="form-control"></textarea>
        </div>
    </div>
</div>
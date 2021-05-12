<div class="panel box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                Carta de retiro de cesantías
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="form-group">
            <label for="layoffs">Valor de cesantías</label>
            <input type="text" name="layoffs" id="layoffs" class="form-control">
        </div>
        <div class="form-group">
            <label for="letter4">Detalles</label>
            <textarea name="letter4" id="letter4" cols="6" rows="6" class="form-control">Según el asunto en referencia, me permito autorizar el retiro de las cesantías del señor {{$id->name}} con Cédula de Ciudadanía número {{$id->cedula}}, quien laboró en nuestra compañía ENERGÍA PARA TELECOMUNICACIONES S.A.S, NIT: 900082621-1 desde el {{$date['day']}} de {{$date['month']}} de {{$date['year']}} hasta el {{now()->format('d')}} de {{$date['this_month']}} de {{now()->format('Y')}}. Se autoriza el retiro de las siguientes cesantías por desempleo.</textarea>
        </div>
    </div>
</div>
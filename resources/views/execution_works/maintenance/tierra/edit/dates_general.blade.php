<div class="title text-center">
    <h3>CARACTERISTICAS DE LA MEDICIÓN Y SPT EXISTENTE</h3>
</div>
<hr>
<div class="body">
    <div class="row">
        <div class="col-md-12">
            <h4>INSTRUMENTOS DE MEDICIÓN (TEULORÓMETRO)</h4>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="instrumento[marca]">MARCA</label>
                <input type="text" class="form-control" name="instrumento[marca]" id="instrumento[marca]" value="{{ $dates['instrumento']['marca'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="instrumento[modelo]">MODELO</label>
                <input type="text" class="form-control" name="instrumento[modelo]" id="instrumento[modelo]" value="{{ $dates['instrumento']['modelo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="instrumento[metodo]">METODO DE MEDICIÓN</label>
                <input type="text" class="form-control" name="instrumento[metodo]" id="instrumento[metodo]" value="{{ $dates['instrumento']['metodo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="instrumento[fecha_calibracion]">FECHA DE CALIBRACIÓN</label>
                <input type="text" class="form-control" name="instrumento[fecha_calibracion]" id="instrumento[fecha_calibracion]" value="{{ $dates['instrumento']['fecha_calibracion'] }}">
            </div>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="instrumento[separacion]">SEPARACIÓN ENTRE ELECTRODOS (m)</label>
                <select name="instrumento[separacion]" id="instrumento[separacion]" class="form-control">
                    <option></option>
                    <option {{ $dates['instrumento']['separacion'] == 'Y-Y' ? 'selected' : '' }} value="Y-Y">Y-Y</option>
                    <option {{ $dates['instrumento']['separacion'] == 'Y-DELTA' ? 'selected' : '' }} value="Y-DELTA">Y-DELTA</option>
                    <option {{ $dates['instrumento']['separacion'] == 'DELTA-DELTA' ? 'selected' : '' }} value="DELTA-DELTA">DELTA-DELTA</option>
                    <option {{ $dates['instrumento']['separacion'] == 'DELTA-Y' ? 'selected' : '' }} value="DELTA-Y">DELTA-Y</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="instrumento[material]">MATERIAL DEL CONDUCTOR DEL SPT</label>
                <select name="instrumento[material]" id="instrumento[material]" class="form-control">
                    <option></option>
                    <option {{ $dates['instrumento']['material'] == 'COBRE' ? 'selected' : '' }} value="COBRE">COBRE</option>
                    <option {{ $dates['instrumento']['material'] == 'ALUMINIO' ? 'selected' : '' }} value="ALUMINIO">ALUMINIO</option>
                    <option {{ $dates['instrumento']['material'] == 'ACERO' ? 'selected' : '' }} value="ACERO">ACERO</option>
                    <option {{ $dates['instrumento']['material'] == 'COBRE-ALUMINIO' ? 'selected' : '' }} value="COBRE-ALUMINIO">COBRE-ALUMINIO</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="instrumento[calibre]">CALIBRE CONDUCTOR MALLA DE TIERRA</label>
                <input type="text" class="form-control" name="instrumento[calibre]" id="instrumento[calibre]" value="{{ $dates['instrumento']['calibre'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="instrumento[cajas]">CANTIDAD DE CAJAS DE INSPECCIÓN</label>
                <input type="text" class="form-control" name="instrumento[cajas]" id="instrumento[cajas]" value="{{ $dates['instrumento']['cajas'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="instrumento[pararrayos]">CANTIDAD DE PARARRAYOS.</label>
                <input type="text" class="form-control" name="instrumento[pararrayos]" id="instrumento[pararrayos]" value="{{ $dates['instrumento']['pararrayos'] }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>CARACTERISTICAS DE PROTECCIÓN CONTRA SOBRETENSIONES</h3>
    </div>
    <hr>
        <div class="row">
        <div class="col-md-12">
            <h4>PROTECCIÓN CONTRA SOBRETENSIONES</h4>
        </div>
        @for ($i = 1; $i <= 4; $i++)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="proteccion[{{ $i }}][marca]">MARCA</label>
                    <input type="text" class="form-control" id="proteccion[{{ $i }}][marca]" name="proteccion[{{ $i }}][marca]" value="{{ $dates['proteccion'][ $i ]['marca'] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="proteccion[{{ $i }}][modelo]">MODELO</label>
                    <input type="text" class="form-control" id="proteccion[{{ $i }}][modelo]" name="proteccion[{{ $i }}][modelo]" value="{{ $dates['proteccion'][$i]['modelo'] }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="proteccion[{{ $i }}][tipo]">TIPO</label>
                    {{-- <input type="text" class="form-control" id="proteccion[{{ $i }}][tipo]" name="proteccion[{{ $i }}][tipo]" value="{{ $dates[proteccion][ $i tipo]') }}"> --}}
                    <select name="proteccion[{{ $i }}][tipo]" id="proteccion[{{ $i }}][tipo]" class="form-control">
                        <option></option>
                        <option {{ $dates['proteccion'][$i]['tipo'] == 'MONOFÁSCA' ? 'selected' : ''  }} value="MONOFÁSCA">MONOFÁSCA</option>
                        <option {{ $dates['proteccion'][$i]['tipo'] == 'BIFÁSICA' ? 'selected' : ''  }} value="BIFÁSICA">BIFÁSICA</option>
                        <option {{ $dates['proteccion'][$i]['tipo'] == 'TRIFÁSICA' ? 'selected' : ''  }} value="TRIFÁSICA">TRIFÁSICA</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="proteccion[{{ $i }}][ubicacion]">UBICACIÓN</label>
                    <input type="text" class="form-control" id="proteccion[{{ $i }}][ubicacion]" name="proteccion[{{ $i }}][ubicacion]" value="{{ $dates['proteccion'][ $i ] ['ubicacion'] }}">
                </div>
            </div>
        @endfor
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h4>PARARRAYOS</h4>
        </div>
        @for ($i = 1; $i <= 4; $i++)
        <div class="col-md-3">
            <div class="form-group">
                <label for="pararrayos[{{ $i }}][tipo]">TIPO</label>
                <input type="text" class="form-control" id="pararrayos[{{ $i }}][tipo]" name="pararrayos[{{ $i }}][tipo]" value="{{ $dates['pararrayos'][$i]['tipo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="pararrayos[{{ $i }}][ubicacion]">UBICACIÓN</label>
                <input type="text" class="form-control" id="pararrayos[{{ $i }}][ubicacion]" name="pararrayos[{{ $i }}][ubicacion]" value="{{ $dates['pararrayos'][$i]['ubicacion'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="pararrayos[{{ $i }}][longitud]">LONGITUD BAJANTES</label>
                <input type="text" class="form-control" id="pararrayos[{{ $i }}][longitud]" name="pararrayos[{{ $i }}][longitud]" value="{{ $dates['pararrayos'][$i]['longitud'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="pararrayos[{{ $i }}][bajantes]">BAJANTES UNIDAS CON MALLA DE TIERRA</label>
                {{-- <input type="text" class="form-control" id="pararrayos[{{ $i }}][bajantes]" name="pararrayos[{{ $i }}][bajantes]" value="{{ $dates[pararrayos][bajantes] }}"> --}}
                <select name="pararrayos[{{ $i }}][bajantes]" id="pararrayos[{{ $i }}][bajantes]" class="form-control">
                    <option></option>
                    <option {{ $dates['pararrayos'][$i]['bajantes'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['pararrayos'][$i]['bajantes'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                </select>
            </div>
        </div>
        @endfor
    </div>

</div>

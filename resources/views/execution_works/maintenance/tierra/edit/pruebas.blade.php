@php
    $i=0
@endphp

<div class="title text-center">
    <h3>MEDICIÓN DE RESISTENCIA DE PUESTA A TIERRA</h3>
</div>
<div class="body">
    <div class="row">
        <div class="col-md-2">
            <td class="text-center">PUNTO DE MEDICIÓN</td>
        </div>
        <div class="col-md-2">
            <td class="text-center">TIENE PROTECCIÓN CONTRA SOBRETENSIONES</td>
        </div>
        <div class="col-md-2">
            <td class="text-center">MEDICIÓN 1 RESISTENCIA SPT (Ω)</td>
        </div>
        <div class="col-md-2">
            <td class="text-center">MEDICIÓN 2 RESISTENCIA SPT (Ω)</td>
        </div>
        <div class="col-md-2">
            <td class="text-center">MEDICIÓN 3 RESISTENCIA SPT (Ω)</td>
        </div>
        <div class="col-md-2">
            <td class="text-center">RESISTENCIA SPT PROMEDIO (Ω)</td>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <h6>TABLERO GENERAL TGD </h6>
                <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="TABLERO GENERAL TGD">
            </div>
        </div>
        <div class="col-md-2">
            <div class="fom-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>TRANSFORMADOR/SUBESTACION</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="TRANSFORMADOR/SUBESTACION">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>GRUPO ELECTROGENO</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="GRUPO ELECTROGENO">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>TORRE</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="TORRE">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>SISTEMAS DE RECTIFICACION</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="SISTEMAS DE RECTIFICACION">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>COLECTOR GUIAS DE ONDA</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="COLECTOR GUIAS DE ONDA">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>UPS</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="UPS">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>BATERIAS</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="BATERIAS">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>EQUIPOS ACCESO (BTS, NODEB)</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="EQUIPOS ACCESO (BTS, NODEB)">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
        <div class="col-md-2">
            <h6>SPT</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="SPT">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <div class="col-md-2">
            <h6>OTRO</h6>
            <input type="hidden" class="form-control" name="medicion[{{ ++$i }}][punto]" id="medicion[{{ $i }}][punto]" value="OTRO">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select name="medicion[{{ $i }}][proteccion]" id="medicion[ {{ $i }} ][proteccion]" class="form-control">
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'SI' ? 'selected' : '' }} value="SI">SI</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'NO' ? 'selected' : '' }} value="NO">NO</option>
                    <option {{ $dates['medicion'][$i]['proteccion'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_1]" value="{{ $dates['medicion'][$i]['medicion_1'] }}" id="medicion[{{ $i }}][medicion_1]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_2]" value="{{ $dates['medicion'][$i]['medicion_2'] }}" id="medicion[{{ $i }}][medicion_2]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][medicion_3]" value="{{ $dates['medicion'][$i]['medicion_3'] }}" id="medicion[{{ $i }}][medicion_3]">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control"  name="medicion[{{ $i }}][resistencia]" value="{{ $dates['medicion'][$i]['resistencia'] }}" id="medicion[{{ $i }}][resistencia]">
            </div>
        </div>
        <hr>
    </div>
    <hr>
    <div class="title text-center">
        <h3>MEDICIÓN DE RESISTIVIDAD DEL TERRENO</h3>
    </div>
    <div class="img text-center">
        <img src="{{ asset('img/resistividad.png') }}" alt=""  style="width: 30vh">
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h4 class="text-center"><b>MEDICIÓN 1 (20 mts)</b></h4>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b>MEDICIÓN 2 (40 mts)</b></h4>
        </div>
        <div class="col-md-4">
            <h4 class="text-center"><b>MEDICIÓN 3 (60 mts)</b></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[1][resistencia]">RESISTENCIA (Ω)</label>
                <input type="text" name="medicion_resistencia[1][resistencia]" class="form-control" id="medicion_resistencia[1][resistencia]" value="{{ $dates['medicion_resistencia'][1]['resistencia'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[1][power]">ρ (Ω*m)</label>
                <input type="text" name="medicion_resistencia[1][power]" class="form-control" id="medicion_resistencia[1][power]" value="{{ $dates['medicion_resistencia'][1]['power'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[2][resistencia]">RESISTENCIA (Ω)</label>
                <input type="text" name="medicion_resistencia[2][resistencia]" class="form-control" id="medicion_resistencia[2][resistencia]" value="{{ $dates['medicion_resistencia'][2]['resistencia'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[2][power]">ρ (Ω*m)</label>
                <input type="text" name="medicion_resistencia[2][power]" class="form-control" id="medicion_resistencia[2][power]" value="{{ $dates['medicion_resistencia'][2]['power'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[3][resistencia]">RESISTENCIA (Ω)</label>
                <input type="text" name="medicion_resistencia[3][resistencia]" class="form-control" id="medicion_resistencia[3][resistencia]" value="{{ $dates['medicion_resistencia'][3]['resistencia'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[3][power]">ρ (Ω*m)</label>
                <input type="text" name="medicion_resistencia[3][power]" class="form-control" id="medicion_resistencia[3][power]" value="{{ $dates['medicion_resistencia'][3]['power'] }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">MEDICIÓN PROMEDIO</h4>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[4][resistencia]">RESISTENCIA (Ω)</label>
                <input type="text" name="medicion_resistencia[4][resistencia]" class="form-control" id="medicion_resistencia[4][resistencia]" value="{{ $dates['medicion_resistencia'][4]['resistencia'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label class="text-center" for="medicion_resistencia[4][power]">ρ (Ω*m)</label>
                <input type="text" name="medicion_resistencia[4][power]" class="form-control" id="medicion_resistencia[4][power]" value="{{ $dates['medicion_resistencia'][4]['power'] }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="observaciones">OBSERVACIONES</label>
                <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control">{{ $id->observaciones }}</textarea>
            </div>
        </div>
    </div>
</div>

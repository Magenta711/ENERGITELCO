<div class="title text-center">
    <h3>DATOS GENERALES</h3>
</div>
<hr>
<div class="body">
    @for ($i = 1; $i <= 3; $i++)
    <h4>FORMULARIO DE A.A.{{ $i }}</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][marca]">MARCA</label>
                <select name="aa[{{ $i }}][marca]" id="aa[{{ $i }}][marca]" class="form-control">
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'MARVAR' ? 'selected' : '' }} value="MARVAR">MARVAR</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'BARD' ? 'selected' : '' }} value="BARD">BARD</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'LIEBERT' ? 'selected' : '' }} value="LIEBERT">LIEBERT</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'YORK' ? 'selected' : '' }} value="YORK">YORK</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'TRANE' ? 'selected' : '' }} value="TRANE">TRANE</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'GOODMAN' ? 'selected' : '' }} value="GOODMAN">GOODMAN</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'DAIKIN' ? 'selected' : '' }} value="DAIKIN">DAIKIN</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'LG' ? 'selected' : '' }} value="LG">LG</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'CARRIER' ? 'selected' : '' }} value="CARRIER">CARRIER</option>
                    <option {{ $dates['dates_a_a'][$i]['marca'] == 'CIAC' ? 'selected' : '' }} value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][modelo]">MODELO</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][modelo]" id="aa[{{ $i }}][modelo]" value="{{ $dates['dates_a_a'][$i]['modelo'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][serial]">SERIAL</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][serial]" id="aa[{{ $i }}][serial]" value="{{  $dates['dates_a_a'][$i]['serial']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][id_activo]">ID ACTIVO FIJO</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][id_activo]" id="aa[{{ $i }}][id_activo]" value="{{  $dates['dates_a_a'][$i]['id_activo']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][estado_equipo]">ESTADO DEL EQUIPO</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][estado_equipo]" id="aa[{{ $i }}][estado_equipo]" value="{{  $dates['dates_a_a'][$i]['estado_equipo']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][tipo_aire]">TIPO AIRE</label>
                <select name="aa[{{ $i }}][tipo_aire]" id="aa[{{ $i }}][tipo_aire]" class="form-control">
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'N/A' ? 'selected' :  ''}} value="N/A"></option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Paquete vertical en pared' ? 'selected' :  ''}} value="Paquete vertical en pared">Paquete vertical en pared</option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Paquete Horizontal' ? 'selected' :  ''}} value="Paquete Horizontal.">Paquete Horizontal.</option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Ventana' ? 'selected' :  ''}} value="Ventana">Ventana</option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Split' ? 'selected' :  ''}} value="Split">Split</option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Mini Split' ? 'selected' :  ''}} value="Mini Split">Mini Split</option>
                    <option {{ $dates['dates_a_a'][$i]['tipo_aire'] == 'Unidad de Presición' ? 'selected' :  ''}} value="Unidad de Presición">Unidad de Presición</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][alimentacion_ac]">ALIMENTACIÓN AC</label>
                <select name="aa[{{ $i }}][alimentacion_ac]" id="aa[{{ $i }}][alimentacion_ac]" class="form-control">
                    <option {{ $dates['dates_a_a'][$i]['alimentacion_ac'] == 'N/A' ? 'selected' :  ''}} value="N/A"></option>
                    <option {{ $dates['dates_a_a'][$i]['alimentacion_ac'] == 'Monofásica' ? 'selected' :  ''}} value="Monofásica">Monofásica</option>
                    <option {{ $dates['dates_a_a'][$i]['alimentacion_ac'] == 'Bifásica' ? 'selected' :  ''}} value="Bifásica">Bifásica</option>
                    <option {{ $dates['dates_a_a'][$i]['alimentacion_ac'] == 'Trifásica' ? 'selected' :  ''}} value="Trifásica">Trifásica</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][voltaje_entrada]">VOLTAJE ENTRADA (v)</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][voltaje_entrada]" id="aa[{{ $i }}][voltaje_entrada]" value="{{  $dates['dates_a_a'][$i]['voltaje_entrada']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][corriente]">CORRIENTE (AMP)</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][corriente]" id="aa[{{ $i }}][corriente]" value="{{  $dates['dates_a_a'][$i]['corriente']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][capacidad]">CAPACIDAD BTU</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][capacidad]" id="aa[{{ $i }}][capacidad]" value="{{  $dates['dates_a_a'][$i]['capacidad']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][horometro]">HOROMETRO</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][horometro]" id="aa[{{ $i }}][horometro]" value="{{  $dates['dates_a_a'][$i]['horometro']  }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][gestion_remota]">GESTIÓN REMOTA</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][gestion_remota]" id="aa[{{ $i }}][gestion_remota]" value="{{  $dates['dates_a_a'][$i]['gestion_remota']  }}">
                {{-- <select name="aa[{{ $i }}][gestion_remota]" id="aa[{{ $i }}][gestion_remota]" class="form-control">
                    <option {{ $dates['dates_a_a'][$i]['gestion_remota'] ==  }} value="N/A"></option>
                    <option {{ $dates['dates_a_a'][$i]['gestion_remota'] ==  }} value="null">NADA</option>
                    <option {{ $dates['dates_a_a'][$i]['gestion_remota'] ==  }} value="null"></option>
                    <option {{ $dates['dates_a_a'][$i]['gestion_remota'] ==  }} value="null"></option>
                </select> --}}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[{{ $i }}][cant_compresor]">CANT. COMPRESORES</label>
                <input type="text" class="form-control" name="aa[{{ $i }}][cant_compresor]" id="aa[{{ $i }}][cant_compresor]" value="{{  $dates['dates_a_a'][$i]['cant_compresor']  }}">
            </div>
        </div>
    </div>
    <hr>
    @endfor
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[cuarto_equipo]">TEMPERATURA CUARTO EQUIPO</label>
                <input type="text" class="form-control" name="temp[cuarto_equipo]" id="temp[cuarto_equipo]" value="{{ $dates['temp']['cuarto_equipo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[aa_entrada]">TEMPERATURA AA ENTRADA</label>
                <input type="text" class="form-control" name="temp[aa_entrada]" id="temp[aa_entrada]" value="{{ $dates['temp']['aa_entrada'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[aa_salida]">TEMPERATURA AA SALIDA</label>
                <input type="text" class="form-control" name="temp[aa_salida]" id="temp[aa_salida]" value="{{ $dates['temp']['aa_salida'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[display]">TEMPERATURA DISPLAY</label>
                <input type="text" class="form-control" name="temp[display]" id="temp[display]" value="{{ $dates['temp']['display'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[termostato]">TEMP. TERMOSTATO</label>
                <input type="text" class="form-control" name="temp[termostato]" id="temp[termostato]" value="{{ $dates['temp']['termostato'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[ajuste_termo]">AJUSTE TERMOSTATO</label>
                <input type="text" class="form-control" name="temp[ajuste_termo]" id="temp[ajuste_termo]" value="{{ $dates['temp']['ajuste_termo'] }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[termo_pos]">TEMP. TERMOSTATO POS AJUSTE</label>
                <input type="text" class="form-control" name="temp[termo_pos]" id="temp[termo_pos]" value="{{ $dates['temp']['termo_pos'] }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>UNIDAD CONDENSADORA</h3>
    </div>
    <hr>
    @for ($i = 1; $i <= 3; $i++)
        <h4>FORMULARIO DE COMPRESOR {{ $i }}</h4>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][marca]">MARCA</label>
                    {{-- <input type="text" class="form-control" name="compresor[{{ $i }}][marca]" id="compresor[{{ $i }}][marca]" value="{{ old("compresor[{{ $i }}][marca]") }}"> --}}
                    <select name="compresor[{{ $i }}][marca]" id="compresor[{{ $i }}][marca]" class="form-control">
                        <option {{ $dates['compresor'][$i]['marca'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'MARVAR' ? 'selected' : '' }} value="MARVAR">MARVAR</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'BARD' ? 'selected' : '' }} value="BARD">BARD</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'LIEBERT' ? 'selected' : '' }} value="LIEBERT">LIEBERT</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'YORK' ? 'selected' : '' }} value="YORK">YORK</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'TRANE' ? 'selected' : '' }} value="TRANE">TRANE</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'GOODMAN' ? 'selected' : '' }} value="GOODMAN">GOODMAN</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'DAIKIN' ? 'selected' : '' }} value="DAIKIN">DAIKIN</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'LG' ? 'selected' : '' }} value="LG">LG</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'CARRIER' ? 'selected' : '' }} value="CARRIER">CARRIER</option>
                        <option {{ $dates['compresor'][$i]['marca'] == 'CIAC' ? 'selected' : '' }} value="CIAC">CIAC</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][serial]">SERIAL</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][serial]" id="compresor[{{ $i }}][serial]" value="{{ $dates['compresor'][$i]['serial'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][tipo]">TIPO</label>
                    {{-- <input type="text" class="form-control" name="compresor[{{ $i }}][tipo]" id="compresor[{{ $i }}][tipo]" value="{{ $dates['compresor'][$i]['tipo'] }}"> --}}
                    <select name="compresor[{{ $i }}][tipo]" id="compresor[{{ $i }}][tipo]" class="form-control">
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'N/A' ? 'selected' : '' }} value="N/A"></option>
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'RECIPROCANTE' ? 'selected' : '' }} value="RECIPROCANTE">RECIPROCANTE</option>
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'SCROLL' ? 'selected' : '' }} value="SCROLL">SCROLLTORNILLO</option>
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'TORNILLO' ? 'selected' : '' }} value="TORNILLO">TORNILLO</option>
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'ROTATIVO' ? 'selected' : '' }} value="ROTATIVO">ROTATIVO</option>
                        <option {{ $dates['compresor'][$i]['tipo'] ==  'ROOTS' ? 'selected' : '' }} value="ROOTS">ROOTS</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][refrigerante]">REFRIGERANTE</label>
                    {{-- <input type="text" class="form-control" name="compresor[{{ $i }}][refrigerante]" id="compresor[{{ $i }}][refrigerante]" value="{{ $dates['compresor'][$i]['refrigerante'] }}"> --}}
                    <select name="compresor[{{ $i }}][refrigerante]" id="compresor[{{ $i }}][refrigerante]" class="form-control">
                        <option {{ $dates['compresor'][$i]['refrigerante'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                        <option {{ $dates['compresor'][$i]['refrigerante'] == 'R407' ? 'selected' : '' }} value="R407">R407</option>
                        <option {{ $dates['compresor'][$i]['refrigerante'] == 'R410' ? 'selected' : '' }} value="R410">R410</option>
                        <option {{ $dates['compresor'][$i]['refrigerante'] == 'R22' ? 'selected' : '' }} value="R22">R22</option>
                        <option {{ $dates['compresor'][$i]['refrigerante'] == 'R134A' ? 'selected' : '' }} value="R134A">R134A</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][modelo]">MODELO</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][modelo]" id="compresor[{{ $i }}][modelo]" value="{{ $dates['compresor'][$i]['modelo'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][aislamiento]">AISLAMIENTO (MΩ)</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][aislamiento]" id="compresor[{{ $i }}][aislamiento]" value="{{ $dates['compresor'][$i]['aislamiento'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][presion_succion]">PRESIÓN SUCCIÓN</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][presion_succion]" id="compresor[{{ $i }}][presion_succion]" value="{{ $dates['compresor'][$i]['presion_succion'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][presión_descarga]">PRESIÓN DESCARGA</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][presion_descarga]" id="compresor[{{ $i }}][presion_descarga]" value="{{ $dates['compresor'][$i]['presion_descarga'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][nivel_aceite]">NIVEL DE ACEITE</label>
                    {{-- <input type="text" class="form-control" name="compresor[{{ $i }}][nivel_aceite]" id="compresor[{{ $i }}][nivel_aceite]" value="{{ $dates['compresor'][$i]['nivel_aceite'] }}"> --}}
                    <select name="compresor[{{ $i }}][nivel_aceite]" id="compresor[{{ $i }}][nivel_aceite]" class="form-control">
                        <option {{ $dates['compresor'][$i]['nivel_aceite'] ==  'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                        <option {{ $dates['compresor'][$i]['nivel_aceite'] ==  'OK' ? 'selected' : '' }} value="OK">OK</option>
                        <option {{ $dates['compresor'][$i]['nivel_aceite'] ==  'BAJO' ? 'selected' : '' }} value="BAJO">BAJO</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][vl1]">VL1/VL2/VL3</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][vl1]" id="compresor[{{ $i }}][vl1]" value="{{ $dates['compresor'][$i]['vl1'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="compresor[{{ $i }}][ampl1]">AMPL1/AMPL2/AMPL3</label>
                    <input type="text" class="form-control" name="compresor[{{ $i }}][ampl1]" id="compresor[{{ $i }}][ampl1]" value="{{ $dates['compresor'][$i]['ampl1'] }}">
                </div>
            </div>
        </div>
        <hr>
    @endfor
    <h4>UNIDAD CONDENSADORA</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[marca]">MARCA</label>
                <input type="text" class="form-control" name="unidad[marca]" id="unidad[marca]" value="{{ $dates['unidad']['marca'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[modelo]">MODELO</label>
                <input type="text" class="form-control" name="unidad[modelo]" id="unidad[modelo]" value="{{ $dates['unidad']['modelo'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[serial]">SERIAL</label>
                <input type="text" class="form-control" name="unidad[serial]" id="unidad[serial]" value="{{ $dates['unidad']['serial'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[temp_entrada]">TEMPERATURA ENTRADA</label>
                <input type="text" class="form-control" name="unidad[temp_entrada]" id="unidad[temp_entrada]" value="{{ $dates['unidad']['temp_entrada'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[temp_salida]">TEMPERATURA SALIDA</label>
                <input type="text" class="form-control" name="unidad[temp_salida]" id="unidad[temp_salida]" value="{{ $dates['unidad']['temp_salida'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[diametro_eje]">DIAMETRO EJE</label>
                <input type="text" class="form-control" name="unidad[diametro_eje]" id="unidad[diametro_eje]" value="{{ $dates['unidad']['diametro_eje'] }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[diametro_aspas]">DIAMETRO ASPAS</label>
                <input type="text" class="form-control" name="unidad[diametro_aspas]" id="unidad[diametro_aspas]" value="{{ $dates['unidad']['diametro_aspas'] }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>UNIDAD MANEJADORA</h3>
    </div>
    @for ($i = 1; $i <= 3; $i++)
        <h4>UNIDAD MANEJADORA 1</h4>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][marca]">MARCA</label>
                    {{-- <input type="text" class="form-control" name="manejadora[{{ $i }}][marca]" id="manejadora[{{ $i }}][marca]" value="{{ old("manejadora[{{ $i }}][marca]") }}"> --}}
                    <select name="manejadora[{{ $i }}][marca]" id="manejadora[{{ $i }}][marca]" class="form-control">
                            <option {{ $dates['manejadora'][$i]['marca'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'MARVAR' ? 'selected' : '' }} value="MARVAR">MARVAR</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'BARD' ? 'selected' : '' }} value="BARD">BARD</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'LIEBERT' ? 'selected' : '' }} value="LIEBERT">LIEBERT</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'YORK' ? 'selected' : '' }} value="YORK">YORK</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'TRANE' ? 'selected' : '' }} value="TRANE">TRANE</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'GOODMAN' ? 'selected' : '' }} value="GOODMAN">GOODMAN</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'DAIKIN' ? 'selected' : '' }} value="DAIKIN">DAIKIN</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'LG' ? 'selected' : '' }} value="LG">LG</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'CARRIER' ? 'selected' : '' }} value="CARRIER">CARRIER</option>
                            <option {{ $dates['manejadora'][$i]['marca'] == 'CIAC' ? 'selected' : '' }} value="CIAC">CIAC</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][modelo]">MODELO</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][modelo]" id="manejadora[{{ $i }}][modelo]" value="{{ $dates['manejadora'][$i]['modelo'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][tipo]">TIPO</label>
                    {{-- <input type="text" class="form-control" name="manejadora[{{ $i }}][tipo]" id="manejadora[{{ $i }}][tipo]" value="{{ $dates['manejadora'][$i]['tipo'] }}"> --}}
                    <select name="manejadora[{{ $i }}][tipo]" id="manejadora[{{ $i }}][tipo]" class="form-control">
                        <option {{ $dates['manejadora'][$i]['tipo'] == 'N/A' ? 'selected' : '' }} value="N/A">N/A</option>
                        <option {{ $dates['manejadora'][$i]['tipo'] == 'VERTICAL' ? 'selected' : '' }} value="VERTICAL">VERTICAL</option>
                        <option {{ $dates['manejadora'][$i]['tipo'] == 'HORIZONTAL' ? 'selected' : '' }} value="HORIZONTAL">HORIZONTAL</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][tipo_filtro]">TIPO DE FILTRO</label>
                    {{-- <input type="text" class="form-control" name="manejadora[{{ $i }}][tipo_filtro]" id="manejadora[{{ $i }}][tipo_filtro]" value="{{ $dates['manejadora'][$i]['tipo_filtro'] }}"> --}}
                    <select name="manejadora[{{ $i }}][tipo_filtro]" id="manejadora[{{ $i }}][tipo_filtro]" class="form-control">
                        <option {{ $dates['manejadora'][$i]['tipo_filtro'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                        <option {{ $dates['manejadora'][$i]['tipo_filtro'] == 'LAVABLE' ? 'selected' : '' }} value="LAVABLE">LAVABLE</option>
                        <option {{ $dates['manejadora'][$i]['tipo_filtro'] == 'GUATA' ? 'selected' : '' }} value="GUATA">GUATA</option>
                        <option {{ $dates['manejadora'][$i]['tipo_filtro'] == 'PAPEL' ? 'selected' : '' }} value="PAPEL">PAPEL</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][tipo_correa]">TIPO CORREA</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][tipo_correa]" id="manejadora[{{ $i }}][tipo_correa]" value="{{ $dates['manejadora'][$i]['tipo_correa'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][marca_motor]">MARCA MOTOR</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][marca_motor]" id="manejadora[{{ $i }}][marca_motor]" value="{{ $dates['manejadora'][$i]['marca_motor'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][alimentacion_ac]">ALIMENTACIÓN AC</label>
                    {{-- <input type="text" class="form-control" name="manejadora[{{ $i }}][alimentacion_ac]" id="manejadora[{{ $i }}][alimentacion_ac]" value="{{ $dates['manejadora'][$i]['alimentacion_ac'] }}"> --}}
                    <select name="manejadora[{{ $i }}][alimentacion_ac]" id="manejadora[{{ $i }}][alimentacion_ac]" class="form-control">
                        <option {{ $dates['manejadora'][$i]['alimentacion_ac'] == 'N/A' ? 'selected' : '' }} value="N/A"></option>
                        <option {{ $dates['manejadora'][$i]['alimentacion_ac'] == 'MONOFÁSICA' ? 'selected' : '' }} value="MONOFÁSICA">MONOFÁSICA</option>
                        <option {{ $dates['manejadora'][$i]['alimentacion_ac'] == 'BIFÁSICA' ? 'selected' : '' }} value="BIFÁSICA">BIFÁSICA</option>
                        <option {{ $dates['manejadora'][$i]['alimentacion_ac'] == 'TRIFÁSICA' ? 'selected' : '' }} value="TRIFÁSICA">TRIFÁSICA</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][voltaje_motor]">VOLTAJE DEL MOTOR</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][voltaje_motor]" id="manejadora[{{ $i }}][voltaje_motor]" value="{{ $dates['manejadora'][$i]['voltaje_motor'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][corriente_motor]">CORRIENTE MOTOR</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][corriente_motor]" id="manejadora[{{ $i }}][corriente_motor]" value="{{ $dates['manejadora'][$i]['corriente_motor'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][aislamiento]">AISLAMIENTO (MΩ)</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][aislamiento]" id="manejadora[{{ $i }}][aislamiento]" value="{{ $dates['manejadora'][$i]['aislamiento'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][serial_motor]">SERIAL MOTOR</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][serial_motor]" id="manejadora[{{ $i }}][serial_motor]" value="{{ $dates['manejadora'][$i]['serial_motor'] }}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="manejadora[{{ $i }}][dimensiones]">DIMENSIONES BLOWER</label>
                    <input type="text" class="form-control" name="manejadora[{{ $i }}][dimensiones]" id="manejadora[{{ $i }}][dimensiones]" value="{{ $dates['manejadora'][$i]['dimensiones'] }}">
                </div>
            </div>
        </div>
        <hr>
    @endfor
</div>

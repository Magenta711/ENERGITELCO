<div class="title text-center">
    <h3>DATOS GENERALES</h3>
</div>
<hr>
<div class="body">
    <h4>FORMULARIO DE A.A.1</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][marca]">MARCA</label>
                <select name="aa[1][marca]" id="aa[1][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][modelo]">MODELO</label>
                <input type="text" class="form-control" name="aa[1][modelo]" id="aa[1][modelo]" value="{{old("aa[1][modelo]")}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][serial]">SERIAL</label>
                <input type="text" class="form-control" name="aa[1][serial]" id="aa[1][serial]" value="{{ old("aa[1][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][id_activo]">ID ACTIVO FIJO</label>
                <input type="text" class="form-control" name="aa[1][id_activo]" id="aa[1][id_activo]" value="{{ old("aa[1][id_activo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][estado_equipo]">ESTADO DEL EQUIPO</label>
                <input type="text" class="form-control" name="aa[1][estado_equipo]" id="aa[1][estado_equipo]" value="{{ old("aa[1][estado_equipo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][tipo_aire]">TIPO AIRE</label>
                <select name="aa[1][tipo_aire]" id="aa[1][tipo_aire]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Paquete vertical en pared">Paquete vertical en pared</option>
                    <option value="Paquete Horizontal.">Paquete Horizontal.</option>
                    <option value="Ventana">Ventana</option>
                    <option value="Split">Split</option>
                    <option value="Mini Split">Mini Split</option>
                    <option value="Unidad de Presición">Unidad de Presición</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][alimentacion_ac]">ALIMENTACIÓN AC</label>
                <select name="aa[1][alimentacion_ac]" id="aa[1][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Monofásica">Monofásica</option>
                    <option value="Bifásica">Bifásica</option>
                    <option value="Trifásica">Trifásica</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][voltaje_entrada]">VOLTAJE ENTRADA (v)</label>
                <input type="text" class="form-control" name="aa[1][voltaje_entrada]" id="aa[1][voltaje_entrada]" value="{{ old("aa[1][voltaje_entrada]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][corriente]">CORRIENTE (AMP)</label>
                <input type="text" class="form-control" name="aa[1][corriente]" id="aa[1][corriente]" value="{{ old("aa[1][corriente]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][capacidad]">CAPACIDAD BTU</label>
                <input type="text" class="form-control" name="aa[1][capacidad]" id="aa[1][capacidad]" value="{{ old("aa[1][capacidad]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][horometro]">HOROMETRO</label>
                <input type="text" class="form-control" name="aa[1][horometro]" id="aa[1][horometro]" value="{{ old("aa[1][horometro]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][gestion_remota]">GESTIÓN REMOTA</label>
                <select name="aa[1][gestion_remota]" id="aa[1][gestion_remota]" class="form-control">
                    <option value="N/A"></option>
                    <option value="null">NADA</option>
                    <option value="null"></option>
                    <option value="null"></option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[1][cant_compresor]">CANT. COMPRESORES</label>
                <input type="text" class="form-control" name="aa[1][cant_compresor]" id="aa[1][cant_compresor]" value="{{ old("aa[1][cant_compresor]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>FORMULARIO DE A.A.2</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][marca]">MARCA</label>
                <select name="aa[2][marca]" id="aa[2][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][modelo]">MODELO</label>
                <input type="text" class="form-control" name="aa[2][modelo]" id="aa[2][modelo]" value="{{old("aa[2][modelo]")}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][serial]">SERIAL</label>
                <input type="text" class="form-control" name="aa[2][serial]" id="aa[2][serial]" value="{{ old("aa[2][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][id_activo]">ID ACTIVO FIJO</label>
                <input type="text" class="form-control" name="aa[2][id_activo]" id="aa[2][id_activo]" value="{{ old("aa[2][id_activo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][estado_equipo]">ESTADO DEL EQUIPO</label>
                <input type="text" class="form-control" name="aa[2][estado_equipo]" id="aa[2][estado_equipo]" value="{{ old("aa[2][estado_equipo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][tipo_aire]">TIPO AIRE</label>
                <select name="aa[2][tipo_aire]" id="aa[2][tipo_aire]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Paquete vertical en pared">Paquete vertical en pared</option>
                    <option value="Paquete Horizontal.">Paquete Horizontal.</option>
                    <option value="Ventana">Ventana</option>
                    <option value="Split">Split</option>
                    <option value="Mini Split">Mini Split</option>
                    <option value="Unidad de Presición">Unidad de Presición</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][alimentacion_ac]">ALIMENTACIÓN AC</label>
                <select name="aa[2][alimentacion_ac]" id="aa[2][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Monofásica">Monofásica</option>
                    <option value="Bifásica">Bifásica</option>
                    <option value="Trifásica">Trifásica</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][voltaje_entrada]">VOLTAJE ENTRADA (v)</label>
                <input type="text" class="form-control" name="aa[2][voltaje_entrada]" id="aa[2][voltaje_entrada]" value="{{ old("aa[2][voltaje_entrada]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][corriente]">CORRIENTE (AMP)</label>
                <input type="text" class="form-control" name="aa[2][corriente]" id="aa[2][corriente]" value="{{ old("aa[2][corriente]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][capacidad]">CAPACIDAD BTU</label>
                <input type="text" class="form-control" name="aa[2][capacidad]" id="aa[2][capacidad]" value="{{ old("aa[2][capacidad]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][horometro]">HOROMETRO</label>
                <input type="text" class="form-control" name="aa[2][horometro]" id="aa[2][horometro]" value="{{ old("aa[2][horometro]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][gestion_remota]">GESTIÓN REMOTA</label>
                <select name="aa[2][gestion_remota]" id="aa[2][gestion_remota]" class="form-control">
                    <option value="N/A"></option>
                    <option value="null">NADA</option>
                    <option value="null"></option>
                    <option value="null"></option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[2][cant_compresor]">CANT. COMPRESORES</label>
                <input type="text" class="form-control" name="aa[2][cant_compresor]" id="aa[2][cant_compresor]" value="{{ old("aa[2][cant_compresor]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>FORMULARIO DE A.A.3</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][marca]">MARCA</label>
                <select name="aa[3][marca]" id="aa[3][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][modelo]">MODELO</label>
                <input type="text" class="form-control" name="aa[3][modelo]" id="aa[3][modelo]" value="{{old("aa[3][modelo]")}}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][serial]">SERIAL</label>
                <input type="text" class="form-control" name="aa[3][serial]" id="aa[3][serial]" value="{{ old("aa[3][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][id_activo]">ID ACTIVO FIJO</label>
                <input type="text" class="form-control" name="aa[3][id_activo]" id="aa[3][id_activo]" value="{{ old("aa[3][id_activo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][estado_equipo]">ESTADO DEL EQUIPO</label>
                <input type="text" class="form-control" name="aa[3][estado_equipo]" id="aa[3][estado_equipo]" value="{{ old("aa[3][estado_equipo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][tipo_aire]">TIPO AIRE</label>
                <select name="aa[3][tipo_aire]" id="aa[3][tipo_aire]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Paquete vertical en pared">Paquete vertical en pared</option>
                    <option value="Paquete Horizontal.">Paquete Horizontal.</option>
                    <option value="Ventana">Ventana</option>
                    <option value="Split">Split</option>
                    <option value="Mini Split">Mini Split</option>
                    <option value="Unidad de Presición">Unidad de Presición</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][alimentacion_ac]">ALIMENTACIÓN AC</label>
                <select name="aa[3][alimentacion_ac]" id="aa[3][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="Monofásica">Monofásica</option>
                    <option value="Bifásica">Bifásica</option>
                    <option value="Trifásica">Trifásica</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][voltaje_entrada]">VOLTAJE ENTRADA (v)</label>
                <input type="text" class="form-control" name="aa[3][voltaje_entrada]" id="aa[3][voltaje_entrada]" value="{{ old("aa[3][voltaje_entrada]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][corriente]">CORRIENTE (AMP)</label>
                <input type="text" class="form-control" name="aa[3][corriente]" id="aa[3][corriente]" value="{{ old("aa[3][corriente]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][capacidad]">CAPACIDAD BTU</label>
                <input type="text" class="form-control" name="aa[3][capacidad]" id="aa[3][capacidad]" value="{{ old("aa[3][capacidad]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][horometro]">HOROMETRO</label>
                <input type="text" class="form-control" name="aa[3][horometro]" id="aa[3][horometro]" value="{{ old("aa[3][horometro]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][gestion_remota]">GESTIÓN REMOTA</label>
                <select name="aa[3][gestion_remota]" id="aa[3][gestion_remota]" class="form-control">
                    <option value="N/A"></option>
                    <option value="null">NADA</option>
                    <option value="null"></option>
                    <option value="null"></option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="aa[3][cant_compresor]">CANT. COMPRESORES</label>
                <input type="text" class="form-control" name="aa[3][cant_compresor]" id="aa[3][cant_compresor]" value="{{ old("aa[3][cant_compresor]") }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[cuarto_equipo]">TEMPERATURA CUARTO EQUIPO</label>
                <input type="text" class="form-control" name="temp[cuarto_equipo]" id="temp[cuarto_equipo]" value="{{ old("temp[cuarto_equipo]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[aa_entrada]">TEMPERATURA AA ENTRADA</label>
                <input type="text" class="form-control" name="temp[aa_entrada]" id="temp[aa_entrada]" value="{{ old("temp[aa_entrada]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[aa_salida]">TEMPERATURA AA SALIDA</label>
                <input type="text" class="form-control" name="temp[aa_salida]" id="temp[aa_salida]" value="{{ old("temp[aa_salida]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[display]">TEMPERATURA DISPLAY</label>
                <input type="text" class="form-control" name="temp[display]" id="temp[display]" value="{{ old("temp[display]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[termostato]">TEMP. TERMOSTATO</label>
                <input type="text" class="form-control" name="temp[termostato]" id="temp[termostato]" value="{{ old("temp[termostato]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[ajuste_termo]">AJUSTE TERMOSTATO</label>
                <input type="text" class="form-control" name="temp[ajuste_termo]" id="temp[ajuste_termo]" value="{{ old("temp[ajuste_termo]") }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="temp[termo_pos]">TEMP. TERMOSTATO POS AJUSTE</label>
                <input type="text" class="form-control" name="temp[termo_pos]" id="temp[termo_pos]" value="{{ old("temp[termo_pos]") }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>UNIDAD CONDENSADORA</h3>
    </div>
    <hr>
    <h4>FORMULARIO DE COMPRESOR 1</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="compresor[1][marca]" id="compresor[1][marca]" value="{{ old("compresor[1][marca]") }}"> --}}
                <select name="compresor[1][marca]" id="compresor[1][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][serial]">SERIAL</label>
                <input type="text" class="form-control" name="compresor[1][serial]" id="compresor[1][serial]" value="{{ old("compresor[1][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="compresor[1][tipo]" id="compresor[1][tipo]" value="{{ old("compresor[1][tipo]") }}"> --}}
                <select name="compresor[1][tipo]" id="compresor[1][tipo]" class="form-control">
                    <option value="N/A"></option>
                    <option value="RECIPROCANTE">RECIPROCANTE</option>
                    <option value="SCROLL">SCROLLTORNILLO</option>
                    <option value="TORNILLO">TORNILLO</option>
                    <option value="ROTATIVO">ROTATIVO</option>
                    <option value="ROOTS">ROOTS</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][refrigerante]">REFRIGERANTE</label>
                {{-- <input type="text" class="form-control" name="compresor[1][refrigerante]" id="compresor[1][refrigerante]" value="{{ old("compresor[1][refrigerante]") }}"> --}}
                <select name="compresor[1][refrigerante]" id="compresor[1][refrigerante]" class="form-control">
                    <option value="N/A"></option>
                    <option value="R407">R407</option>
                    <option value="R410">R410</option>
                    <option value="R22">R22</option>
                    <option value="R134A">R134A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][modelo]">MODELO</label>
                <input type="text" class="form-control" name="compresor[1][modelo]" id="compresor[1][modelo]" value="{{ old("compresor[1][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="compresor[1][aislamiento]" id="compresor[1][aislamiento]" value="{{ old("compresor[1][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][presion_succion]">PRESIÓN SUCCIÓN</label>
                <input type="text" class="form-control" name="compresor[1][presion_succion]" id="compresor[1][presion_succion]" value="{{ old("compresor[1][presion_succion]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][presion_descarga]">PRESIÓN DESCARGA</label>
                <input type="text" class="form-control" name="compresor[1][presion_descarga]" id="compresor[1][presion_descarga]" value="{{ old("compresor[1][presion_descarga]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][nivel_aceite]">NIVEL DE ACEITE</label>
                {{-- <input type="text" class="form-control" name="compresor[1][nivel_aceite]" id="compresor[1][nivel_aceite]" value="{{ old("compresor[1][nivel_aceite]") }}"> --}}
                <select name="compresor[1][nivel_aceite]" id="compresor[1][nivel_aceite]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="OK">OK</option>
                    <option value="BAJO">BAJO</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][vl1]">VL1/VL2/VL3</label>
                <input type="text" class="form-control" name="compresor[1][vl1]" id="compresor[1][vl1]" value="{{ old("compresor[1][vl1]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[1][ampl1]">AMPL1/AMPL2/AMPL3</label>
                <input type="text" class="form-control" name="compresor[1][ampl1]" id="compresor[1][ampl1]" value="{{ old("compresor[1][ampl1]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>FORMULARIO DE COMPRESOR 2</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="compresor[2][marca]" id="compresor[2][marca]" value="{{ old("compresor[2][marca]") }}"> --}}
                <select name="compresor[2][marca]" id="compresor[2][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][serial]">SERIAL</label>
                <input type="text" class="form-control" name="compresor[2][serial]" id="compresor[2][serial]" value="{{ old("compresor[2][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="compresor[2][tipo]" id="compresor[2][tipo]" value="{{ old("compresor[2][tipo]") }}"> --}}
                <select name="compresor[2][tipo]" id="compresor[2][tipo]" class="form-control">
                    <option value="N/A"></option>
                    <option value="RECIPROCANTE">RECIPROCANTE</option>
                    <option value="SCROLL">SCROLLTORNILLO</option>
                    <option value="TORNILLO">TORNILLO</option>
                    <option value="ROTATIVO">ROTATIVO</option>
                    <option value="ROOTS">ROOTS</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][refrigerante]">REFRIGERANTE</label>
                {{-- <input type="text" class="form-control" name="compresor[2][refrigerante]" id="compresor[2][refrigerante]" value="{{ old("compresor[2][refrigerante]") }}"> --}}
                <select name="compresor[2][refrigerante]" id="compresor[2][refrigerante]" class="form-control">
                    <option value="N/A"></option>
                    <option value="R407">R407</option>
                    <option value="R410">R410</option>
                    <option value="R22">R22</option>
                    <option value="R134A">R134A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][modelo]">MODELO</label>
                <input type="text" class="form-control" name="compresor[2][modelo]" id="compresor[2][modelo]" value="{{ old("compresor[2][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="compresor[2][aislamiento]" id="compresor[2][aislamiento]" value="{{ old("compresor[2][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][presion_succion]">PRESIÓN SUCCIÓN</label>
                <input type="text" class="form-control" name="compresor[2][presion_succion]" id="compresor[2][presion_succion]" value="{{ old("compresor[2][presion_succion]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][presion_descarga]">PRESIÓN DESCARGA</label>
                <input type="text" class="form-control" name="compresor[2][presion_descarga]" id="compresor[2][presion_descarga]" value="{{ old("compresor[2][presion_descarga]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][nivel_aceite]">NIVEL DE ACEITE</label>
                {{-- <input type="text" class="form-control" name="compresor[2][nivel_aceite]" id="compresor[2][nivel_aceite]" value="{{ old("compresor[2][nivel_aceite]") }}"> --}}
                <select name="compresor[2][nivel_aceite]" id="compresor[2][nivel_aceite]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="OK">OK</option>
                    <option value="BAJO">BAJO</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][vl1]">VL1/VL2/VL3</label>
                <input type="text" class="form-control" name="compresor[2][vl1]" id="compresor[2][vl1]" value="{{ old("compresor[2][vl1]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[2][ampl1]">AMPL1/AMPL2/AMPL3</label>
                <input type="text" class="form-control" name="compresor[2][ampl1]" id="compresor[2][ampl1]" value="{{ old("compresor[2][ampl1]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>FORMULARIO DE COMPRESOR 3</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="compresor[3][marca]" id="compresor[3][marca]" value="{{ old("compresor[3][marca]") }}"> --}}
                <select name="compresor[3][marca]" id="compresor[3][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][serial]">SERIAL</label>
                <input type="text" class="form-control" name="compresor[3][serial]" id="compresor[3][serial]" value="{{ old("compresor[3][serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="compresor[3][tipo]" id="compresor[3][tipo]" value="{{ old("compresor[3][tipo]") }}"> --}}
                <select name="compresor[3][tipo]" id="compresor[3][tipo]" class="form-control">
                    <option value="N/A"></option>
                    <option value="RECIPROCANTE">RECIPROCANTE</option>
                    <option value="SCROLL">SCROLLTORNILLO</option>
                    <option value="TORNILLO">TORNILLO</option>
                    <option value="ROTATIVO">ROTATIVO</option>
                    <option value="ROOTS">ROOTS</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][refrigerante]">REFRIGERANTE</label>
                {{-- <input type="text" class="form-control" name="compresor[3][refrigerante]" id="compresor[3][refrigerante]" value="{{ old("compresor[3][refrigerante]") }}"> --}}
                <select name="compresor[3][refrigerante]" id="compresor[3][refrigerante]" class="form-control">
                    <option value="N/A"></option>
                    <option value="R407">R407</option>
                    <option value="R410">R410</option>
                    <option value="R22">R22</option>
                    <option value="R134A">R134A</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][modelo]">MODELO</label>
                <input type="text" class="form-control" name="compresor[3][modelo]" id="compresor[3][modelo]" value="{{ old("compresor[3][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="compresor[3][aislamiento]" id="compresor[3][aislamiento]" value="{{ old("compresor[3][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][presion_succion]">PRESIÓN SUCCIÓN</label>
                <input type="text" class="form-control" name="compresor[3][presion_succion]" id="compresor[3][presion_succion]" value="{{ old("compresor[3][presion_succion]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][presion_descarga]">PRESIÓN DESCARGA</label>
                <input type="text" class="form-control" name="compresor[3][presion_descarga]" id="compresor[3][presion_descarga]" value="{{ old("compresor[3][presion_descarga]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][nivel_aceite]">NIVEL DE ACEITE</label>
                {{-- <input type="text" class="form-control" name="compresor[3][nivel_aceite]" id="compresor[3][nivel_aceite]" value="{{ old("compresor[3][nivel_aceite]") }}"> --}}
                <select name="compresor[3][nivel_aceite]" id="compresor[3][nivel_aceite]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="OK">OK</option>
                    <option value="BAJO">BAJO</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][vl1]">VL1/VL2/VL3</label>
                <input type="text" class="form-control" name="compresor[3][vl1]" id="compresor[3][vl1]" value="{{ old("compresor[3][vl1]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="compresor[3][ampl1]">AMPL1/AMPL2/AMPL3</label>
                <input type="text" class="form-control" name="compresor[3][ampl1]" id="compresor[3][ampl1]" value="{{ old("compresor[3][ampl1]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>UNIDAD CONDENSADORA</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[marca]">MARCA</label>
                <input type="text" class="form-control" name="unidad[marca]" id="unidad[marca]" value="{{ old("unidad[marca]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[modelo]">MODELO</label>
                <input type="text" class="form-control" name="unidad[modelo]" id="unidad[modelo]" value="{{ old("unidad[modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[serial]">SERIAL</label>
                <input type="text" class="form-control" name="unidad[serial]" id="unidad[serial]" value="{{ old("unidad[serial]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[temp_entrada]">TEMPERATURA ENTRADA</label>
                <input type="text" class="form-control" name="unidad[temp_entrada]" id="unidad[temp_entrada]" value="{{ old("unidad[temp_entrada]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[temp_salida]">TEMPERATURA SALIDA</label>
                <input type="text" class="form-control" name="unidad[temp_salida]" id="unidad[temp_salida]" value="{{ old("unidad[temp_salida]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[diametro_eje]">DIAMETRO EJE</label>
                <input type="text" class="form-control" name="unidad[diametro_eje]" id="unidad[diametro_eje]" value="{{ old("unidad[diametro_eje]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="unidad[diametro_aspas]">DIAMETRO ASPAS</label>
                <input type="text" class="form-control" name="unidad[diametro_aspas]" id="unidad[diametro_aspas]" value="{{ old("unidad[diametro_aspas]") }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>UNIDAD MANJADORA</h3>
    </div>
    <h4>UNIDAD MANEJADORA 1</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="manejadora[1][marca]" id="manejadora[1][marca]" value="{{ old("manejadora[1][marca]") }}"> --}}
                <select name="manejadora[1][marca]" id="manejadora[1][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][modelo]">MODELO</label>
                <input type="text" class="form-control" name="manejadora[1][modelo]" id="manejadora[1][modelo]" value="{{ old("manejadora[1][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="manejadora[1][tipo]" id="manejadora[1][tipo]" value="{{ old("manejadora[1][tipo]") }}"> --}}
                <select name="manejadora[1][tipo]" id="manejadora[1][tipo]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="VERTICAL">VERTICAL</option>
                    <option value="HORIZONTAL">HORIZONTAL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][tipo_filtro]">TIPO DE FILTRO</label>
                {{-- <input type="text" class="form-control" name="manejadora[1][tipo_filtro]" id="manejadora[1][tipo_filtro]" value="{{ old("manejadora[1][tipo_filtro]") }}"> --}}
                <select name="manejadora[1][tipo_filtro]" id="manejadora[1][tipo_filtro]" class="form-control">
                    <option value="N/A"></option>
                    <option value="LAVABLE">LAVABLE</option>
                    <option value="GUATA">GUATA</option>
                    <option value="PAPEL">PAPEL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][tipo_correa]">TIPO CORREA</label>
                <input type="text" class="form-control" name="manejadora[1][tipo_correa]" id="manejadora[1][tipo_correa]" value="{{ old("manejadora[1][tipo_correa]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][marca_motor]">MARCA MOTOR</label>
                <input type="text" class="form-control" name="manejadora[1][marca_motor]" id="manejadora[1][marca_motor]" value="{{ old("manejadora[1][marca_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][alimentacion_ac]">ALIMENTACIÓN AC</label>
                {{-- <input type="text" class="form-control" name="manejadora[1][alimentacion_ac]" id="manejadora[1][alimentacion_ac]" value="{{ old("manejadora[1][alimentacion_ac]") }}"> --}}
                <select name="manejadora[1][alimentacion_ac]" id="manejadora[1][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MONOFÁSICA">MONOFÁSICA</option>
                    <option value="BIFÁSICA">BIFÁSICA</option>
                    <option value="TRIFÁSICA">TRIFÁSICA</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][voltaje_motor]">VOLTAJE DEL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[1][voltaje_motor]" id="manejadora[1][voltaje_motor]" value="{{ old("manejadora[1][voltaje_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][corriente_motor]">CORRIENTE MOTOR</label>
                <input type="text" class="form-control" name="manejadora[1][corriente_motor]" id="manejadora[1][corriente_motor]" value="{{ old("manejadora[1][corriente_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="manejadora[1][aislamiento]" id="manejadora[1][aislamiento]" value="{{ old("manejadora[1][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][serial_motor]">SERIAL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[1][serial_motor]" id="manejadora[1][serial_motor]" value="{{ old("manejadora[1][serial_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[1][dimensiones]">DIMENSIONES BLOWER</label>
                <input type="text" class="form-control" name="manejadora[1][dimensiones]" id="manejadora[1][dimensiones]" value="{{ old("manejadora[1][dimensiones]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>UNIDAD MANEJADORA 1</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="manejadora[2][marca]" id="manejadora[2][marca]" value="{{ old("manejadora[2][marca]") }}"> --}}
                <select name="manejadora[2][marca]" id="manejadora[2][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][modelo]">MODELO</label>
                <input type="text" class="form-control" name="manejadora[2][modelo]" id="manejadora[2][modelo]" value="{{ old("manejadora[2][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="manejadora[2][tipo]" id="manejadora[2][tipo]" value="{{ old("manejadora[2][tipo]") }}"> --}}
                <select name="manejadora[2][tipo]" id="manejadora[2][tipo]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="VERTICAL">VERTICAL</option>
                    <option value="HORIZONTAL">HORIZONTAL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][tipo_filtro]">TIPO DE FILTRO</label>
                {{-- <input type="text" class="form-control" name="manejadora[2][tipo_filtro]" id="manejadora[2][tipo_filtro]" value="{{ old("manejadora[2][tipo_filtro]") }}"> --}}
                <select name="manejadora[2][tipo_filtro]" id="manejadora[2][tipo_filtro]" class="form-control">
                    <option value="N/A"></option>
                    <option value="LAVABLE">LAVABLE</option>
                    <option value="GUATA">GUATA</option>
                    <option value="PAPEL">PAPEL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][tipo_correa]">TIPO CORREA</label>
                <input type="text" class="form-control" name="manejadora[2][tipo_correa]" id="manejadora[2][tipo_correa]" value="{{ old("manejadora[2][tipo_correa]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][marca_motor]">MARCA MOTOR</label>
                <input type="text" class="form-control" name="manejadora[2][marca_motor]" id="manejadora[2][marca_motor]" value="{{ old("manejadora[2][marca_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][alimentacion_ac]">ALIMENTACIÓN AC</label>
                {{-- <input type="text" class="form-control" name="manejadora[2][alimentacion_ac]" id="manejadora[2][alimentacion_ac]" value="{{ old("manejadora[2][alimentacion_ac]") }}"> --}}
                <select name="manejadora[2][alimentacion_ac]" id="manejadora[2][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MONOFÁSICA">MONOFÁSICA</option>
                    <option value="BIFÁSICA">BIFÁSICA</option>
                    <option value="TRIFÁSICA">TRIFÁSICA</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][voltaje_motor]">VOLTAJE DEL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[2][voltaje_motor]" id="manejadora[2][voltaje_motor]" value="{{ old("manejadora[2][voltaje_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][corriente_motor]">CORRIENTE MOTOR</label>
                <input type="text" class="form-control" name="manejadora[2][corriente_motor]" id="manejadora[2][corriente_motor]" value="{{ old("manejadora[2][corriente_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="manejadora[2][aislamiento]" id="manejadora[2][aislamiento]" value="{{ old("manejadora[2][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][serial_motor]">SERIAL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[2][serial_motor]" id="manejadora[2][serial_motor]" value="{{ old("manejadora[2][serial_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[2][dimensiones]">DIMENSIONES BLOWER</label>
                <input type="text" class="form-control" name="manejadora[2][dimensiones]" id="manejadora[2][dimensiones]" value="{{ old("manejadora[2][dimensiones]") }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>UNIDAD MANEJADORA 1</h4>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][marca]">MARCA</label>
                {{-- <input type="text" class="form-control" name="manejadora[3][marca]" id="manejadora[3][marca]" value="{{ old("manejadora[3][marca]") }}"> --}}
                <select name="manejadora[3][marca]" id="manejadora[3][marca]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MARVAR">MARVAR</option>
                    <option value="BARD">BARD</option>
                    <option value="LIEBERT">LIEBERT</option>
                    <option value="YORK">YORK</option>
                    <option value="TRANE">TRANE</option>
                    <option value="GOODMAN">GOODMAN</option>
                    <option value="DAIKIN">DAIKIN</option>
                    <option value="LG">LG</option>
                    <option value="CARRIER">CARRIER</option>
                    <option value="CIAC">CIAC</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][modelo]">MODELO</label>
                <input type="text" class="form-control" name="manejadora[3][modelo]" id="manejadora[3][modelo]" value="{{ old("manejadora[3][modelo]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][tipo]">TIPO</label>
                {{-- <input type="text" class="form-control" name="manejadora[3][tipo]" id="manejadora[3][tipo]" value="{{ old("manejadora[3][tipo]") }}"> --}}
                <select name="manejadora[3][tipo]" id="manejadora[3][tipo]" class="form-control">
                    <option value="N/A">N/A</option>
                    <option value="VERTICAL">VERTICAL</option>
                    <option value="HORIZONTAL">HORIZONTAL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][tipo_filtro]">TIPO DE FILTRO</label>
                {{-- <input type="text" class="form-control" name="manejadora[3][tipo_filtro]" id="manejadora[3][tipo_filtro]" value="{{ old("manejadora[3][tipo_filtro]") }}"> --}}
                <select name="manejadora[3][tipo_filtro]" id="manejadora[3][tipo_filtro]" class="form-control">
                    <option value="N/A"></option>
                    <option value="LAVABLE">LAVABLE</option>
                    <option value="GUATA">GUATA</option>
                    <option value="PAPEL">PAPEL</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][tipo_correa]">TIPO CORREA</label>
                <input type="text" class="form-control" name="manejadora[3][tipo_correa]" id="manejadora[3][tipo_correa]" value="{{ old("manejadora[3][tipo_correa]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][marca_motor]">MARCA MOTOR</label>
                <input type="text" class="form-control" name="manejadora[3][marca_motor]" id="manejadora[3][marca_motor]" value="{{ old("manejadora[3][marca_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][alimentacion_ac]">ALIMENTACIÓN AC</label>
                {{-- <input type="text" class="form-control" name="manejadora[3][alimentacion_ac]" id="manejadora[3][alimentacion_ac]" value="{{ old("manejadora[3][alimentacion_ac]") }}"> --}}
                <select name="manejadora[3][alimentacion_ac]" id="manejadora[3][alimentacion_ac]" class="form-control">
                    <option value="N/A"></option>
                    <option value="MONOFÁSICA">MONOFÁSICA</option>
                    <option value="BIFÁSICA">BIFÁSICA</option>
                    <option value="TRIFÁSICA">TRIFÁSICA</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][voltaje_motor]">VOLTAJE DEL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[3][voltaje_motor]" id="manejadora[3][voltaje_motor]" value="{{ old("manejadora[3][voltaje_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][corriente_motor]">CORRIENTE MOTOR</label>
                <input type="text" class="form-control" name="manejadora[3][corriente_motor]" id="manejadora[3][corriente_motor]" value="{{ old("manejadora[3][corriente_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][aislamiento]">AISLAMIENTO (MΩ)</label>
                <input type="text" class="form-control" name="manejadora[3][aislamiento]" id="manejadora[3][aislamiento]" value="{{ old("manejadora[3][aislamiento]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][serial_motor]">SERIAL MOTOR</label>
                <input type="text" class="form-control" name="manejadora[3][serial_motor]" id="manejadora[3][serial_motor]" value="{{ old("manejadora[3][serial_motor]") }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="manejadora[3][dimensiones]">DIMENSIONES BLOWER</label>
                <input type="text" class="form-control" name="manejadora[3][dimensiones]" id="manejadora[3][dimensiones]" value="{{ old("manejadora[3][dimensiones]") }}">
            </div>
        </div>
    </div>
</div>

<div class="title text-center">
    <h3>RED ELECTRICA EXTERNA</h3>
</div>
<hr>
<div class="body">
    <h4>TRANSFORMADOR</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[tipo]">TIPO S/E</label>
                <select name="transformador[tipo]" id="transformador[tipo]" class="form-control">
                    <option></option>
                    <option value="POSTE">POSTE</option>
                    <option value="ENCAPSULADA">ENCAPSULADA</option>
                    <option value="SUBTERRANEA">SUBTERRANEA</option>
                    <option value="PEDESTA">PEDESTA</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[propietario]">PROPIETARIO</label>
                <select name="transformador[propietario]" id="transformador[propietario]" class="form-control">
                    <option></option>
                    <option value="COMCEL">COMCEL</option>
                    <option value="ELECTRIFICADORA">ELECTRIFICADORA</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[marca]">MARCA</label>
                <input type="text" class="form-control" id="transformador[marca]" name="transformador[marca]" value="{{ old('transformador[marca]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[cantidad_kv]">CAPACIDAD (KVA)</label>
                <input type="text" class="form-control" id="transformador[cantidad_kv]" name="transformador[cantidad_kv]" value="{{ old('transformador[cantidad_kv]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[num_fases]">NUM. FASES</label>
                <select name="transformador[num_fases]" id="transformador[num_fases]" class="form-control">
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[conexion]">CONEXIÓN</label>
                <select name="transformador[conexion]" id="transformador[conexion]" class="form-control">
                    <option></option>
                    <option value="Y-Y">Y-Y</option>
                    <option value="Y-DELTA">Y-DELTA</option>
                    <option value="DELTA-DELTA">DELTA-DELTA</option>
                    <option value="DELTA-Y">DELTA-Y</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[electrificadora]">ELECTRIFICADORA</label>
                <input type="text" class="form-control" id="transformador[electrificadora]" name="transformador[electrificadora]" value="{{ old('transformador[electrificadora]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[primario_nominal]">VOLTAJE PRIMARIO NOMINAL (V)</label>
                <input type="text" class="form-control" id="transformador[primario_nominal]" name="transformador[primario_nominal]" value="{{ old('transformador[primario_nominal]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[secundario_nominal]">VOLTAJE SECUNDARIO NOMINAL (V)</label>
                <input type="text" class="form-control" id="transformador[secundario_nominal]" name="transformador[secundario_nominal]" value="{{ old('transformador[secundario_nominal]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[corriente_secundario_nominal]">CORRIENTE SECUNDARIO NOMINAL (AMP)</label>
                <input type="text" class="form-control" id="transformador[corriente_secundario_nominal]" name="transformador[corriente_secundario_nominal]" value="{{ old('transformador[corriente_secundario_nominal]') }}">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[seccionador]">TIPO DE SECCIONADOR</label>
                <input type="text" class="form-control" id="transformador[seccionador]" name="transformador[seccionador]" value="{{ old('transformador[seccionador]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[referencia]">REFERENCIA SECCIONADOR</label>
                <input type="text" class="form-control" id="transformador[referencia]" name="transformador[referencia]" value="{{ old('transformador[referencia]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[tipo_fusibles]">TIPO DE FUSIBLES</label>
                <input type="text" class="form-control" id="transformador[tipo_fusibles]" name="transformador[tipo_fusibles]" value="{{ old('transformador[tipo_fusibles]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[referencia_fusible]">REFERENCIA FUSIBLES</label>
                <input type="text" class="form-control" id="transformador[referencia_fusible]" name="transformador[referencia_fusible]" value="{{ old('transformador[referencia_fusible]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[capacidad_fusible]">CAPACIDAD FUSIBLES (A)</label>
                <input type="text" class="form-control" id="transformador[capacidad_fusible]" name="transformador[capacidad_fusible]" value="{{ old('transformador[capacidad_fusible]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[tipo_para]">TIPO DE PARARRAYOS</label>
                <input type="text" class="form-control" id="transformador[tipo_para]" name="transformador[tipo_para]" value="{{ old('transformador[tipo_para]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[nivel_proteccion]">NIVEL DE PROTECCIÓN (kV)</label>
                <input type="text" class="form-control" id="transformador[nivel_proteccion]" name="transformador[nivel_proteccion]" value="{{ old('transformador[nivel_proteccion]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[capacidad_proteccion]">CAPACIDAD DE PROTECCIÓN (Amp)</label>
                <input type="text" class="form-control" id="transformador[capacidad_proteccion]" name="transformador[capacidad_proteccion]" value="{{ old('transformador[capacidad_proteccion]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[secundario_medido]">VOLTAJE SECUNDARIO MEDIDO (V)</label>
                <input type="text" class="form-control" id="transformador[secundario_medido]" name="transformador[secundario_medido]" value="{{ old('transformador[secundario_medido]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="transformador[secundario_medido_amp]">CORRIENTE SECUNDARIO MEDIDO (AMP)</label>
                <input type="text" class="form-control" id="transformador[secundario_medido_amp]" name="transformador[secundario_medido_amp]" value="{{ old('transformador[secundario_medido_amp]') }}">
            </div>
        </div>
    </div>
    <hr>
    <h4>MEDIDOR ENERGIA (CONTADOR)</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="contador[numero_cuenta]">NUMERO DE CUENTA</label>
                <input type="text" class="form-control" id="contador[numero_cuenta]" name="contador[numero_cuenta]" value="{{ old('contador[numero_cuenta]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="contador[numero_medidor]">NUMERO DE MEDIDOR</label>
                <input type="text" class="form-control" id="contador[numero_medidor]" name="contador[numero_medidor]" value="{{ old('contador[numero_medidor]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="contador[marca]">MARCA</label>
                <input type="text" class="form-control" id="contador[marca]" name="contador[marca]" value="{{ old('contador[marca]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="contador[tipo]">TIPO</label>
                <select name="contador[tipo]" id="contador[tipo]" class="form-control">
                    <option></option>
                    <option value="DIAL">DIAL</option>
                    <option value="CICLOMETRO">CICLOMETRO</option>
                    <option value="DISPLAY">DISPLAY</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <h4>CONDUCTORES ELECTRICOS MT/BT</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="conductor[calibre_mt]">CALIBRE DE CONDUCTOR MT (AWG)</label>
                <input type="text" class="form-control" id="conductor[calibre_mt]" name="conductor[calibre_mt]" value="{{ old('conductor[calibre_mt]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="conductor[calibre_bt]">CALIBRE CONDUCTOR BT (AWG)</label>
                <input type="text" class="form-control" id="conductor[calibre_bt]" name="conductor[calibre_bt]" value="{{ old('conductor[calibre_bt]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="conductor[canalizacion]">TIPO DE CANALIZACIÓN</label>
                {{-- <input type="text" class="form-control" id="conductor[canalizacion]" name="conductor[canalizacion]" value="{{ old('conductor[canalizacion]') }}"> --}}
                <select name="conductor[canalizacion]" id="conductor[canalizacion]" class="form-control">
                    <option></option>
                    <option value="AEREA">AEREA</option>
                    <option value="SUBTERRANEA">SUBTERRANEA</option>
                    <option value="OTRA">OTRA</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="title text-center">
        <h3>RED ELECTRICA EXTERNA</h3>
    </div>
    <h4>TABLERO GENERAL DE DISTRIBUCIÓN TGD</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[marca_tablero]">MARCA DEL TABLERO</label>
                <input type="text" class="form-control" id="tablero[marca_tablero]" name="tablero[marca_tablero]" value="{{ old('tablero[marca_tablero]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[marca_breakers]">MARCA BREAKERS PPAL</label>
                <input type="text" class="form-control" id="tablero[marca_breakers]" name="tablero[marca_breakers]" value="{{ old('tablero[marca_breakers]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[modelo_breaker]">MODELO BREAKER PPAL</label>
                <input type="text" class="form-control" id="tablero[modelo_breaker]" name="tablero[modelo_breaker]" value="{{ old('tablero[modelo_breaker]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[capacidad_breaker]">CAPACIDAD BREAKER PPAL</label>
                <input type="text" class="form-control" id="tablero[capacidad_breaker]" name="tablero[capacidad_breaker]" value="{{ old('tablero[capacidad_breaker]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[marca_breakers_dist]">MARCA BREAKERS DIST.</label>
                <input type="text" class="form-control" id="tablero[marca_breakers_dist]" name="tablero[marca_breakers_dist]" value="{{ old('tablero[marca_breakers_dist]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[cantidad_breaker_dist]">CANTIDAD BREAKERS DISTRIB.</label>
                <input type="text" class="form-control" id="tablero[cantidad_breaker_dist]" name="tablero[cantidad_breaker_dist]" value="{{ old('tablero[cantidad_breaker_dist]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[capacidad_breakers_dist]">CAPACIDADES BREAKERS DIST.</label>
                <input type="text" class="form-control" id="tablero[capacidad_breakers_dist]" name="tablero[capacidad_breakers_dist]" value="{{ old('tablero[capacidad_breakers_dist]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[corriente_ir]">CORRIENTE FASE
                    IR (A)</label>
                <input type="text" class="form-control" id="tablero[corriente_ir]" name="tablero[corriente_ir]" value="{{ old('tablero[corriente_ir]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[corriente_is]">CORRIENTE FASE
                    IS (A)</label>
                <input type="text" class="form-control" id="tablero[corriente_is]" name="tablero[corriente_is]" value="{{ old('tablero[corriente_is]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[corriente_it]">CORRIENTE FASE
                    IT (A)</label>
                <input type="text" class="form-control" id="tablero[corriente_it]" name="tablero[corriente_it]" value="{{ old('tablero[corriente_it]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[neutro_in]">CORR. NEUTRO
                    IN (A)</label>
                <input type="text" class="form-control" id="tablero[neutro_in]" name="tablero[neutro_in]" value="{{ old('tablero[neutro_in]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[tierra_ict]">CORR. TIERRA
                    IcT (A)</label>
                <input type="text" class="form-control" id="tablero[tierra_ict]" name="tablero[tierra_ict]" value="{{ old('tablero[tierra_ict]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vrs]">VOLTAJE LINEAS
                    VRS (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vrs]" name="tablero[voltaje_vrs]" value="{{ old('tablero[voltaje_vrs]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vst]">VOLTAJE LINEAS
                    VST (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vst]" name="tablero[voltaje_vst]" value="{{ old('tablero[voltaje_vst]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vrt]">VOLTAJE LINEAS
                    VRT (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vrt]" name="tablero[voltaje_vrt]" value="{{ old('tablero[voltaje_vrt]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vrn]">VOLTAJE A NEUTRO
                    VRN (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vrn]" name="tablero[voltaje_vrn]" value="{{ old('tablero[voltaje_vrn]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vsn]">VOLTAJE A NEUTRO
                    VSN (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vsn]" name="tablero[voltaje_vsn]" value="{{ old('tablero[voltaje_vsn]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vtn]">VOLT.  A NEUTRO
                    VTN (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vtn]" name="tablero[voltaje_vtn]" value="{{ old('tablero[voltaje_vtn]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[voltaje_vnt]">VOLT. NEUTRO-TIERRA
                    VNT (V)</label>
                <input type="text" class="form-control" id="tablero[voltaje_vnt]" name="tablero[voltaje_vnt]" value="{{ old('tablero[voltaje_vnt]') }}">
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label for="tablero[]"></label>
                <select name="tablero[]" id="tablero[]" class="form-control">
                    <option></option>
                </select>
            </div>
        </div> --}}
    </div>
    <hr>
    <h4>PROTECTORES DE SOBRETENSIONES.</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[marca]">MARCA</label>
                <input type="text" class="form-control" id="protectores[marca]" name="protectores[marca]" value="{{ old('protectores[marca]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[tipo]">TIPO</label>
                <input type="text" class="form-control" id="protectores[tipo]" name="protectores[tipo]" value="{{ old('protectores[tipo]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[modelo]">MODELO</label>
                <input type="text" class="form-control" id="protectores[modelo]" name="protectores[modelo]" value="{{ old('protectores[modelo]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[n_serie]">N° DE SERIE</label>
                <select name="protectores[n_serie]" id="protectores[n_serie]" class="form-control">
                    <option></option>
                    <option value="DIAL">DIAL</option>
                    <option value="CICLOMETRO">CICLOMETRO</option>
                    <option value="DISPLAY">DISPLAY</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[capacidad_corriente]">CAPACIDAD CORRIENTE (kA)</label>
                <input type="text" class="form-control" id="protectores[capacidad_corriente]" name="protectores[capacidad_corriente]" value="{{ old('protectores[capacidad_corriente]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[capacidad_voltaje]">CAPACIDAD VOLTAJE (kV)</label>
                <input type="text" class="form-control" id="protectores[capacidad_voltaje]" name="protectores[capacidad_voltaje]" value="{{ old('protectores[capacidad_voltaje]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[coneccion]">TIPO DE CONEXIÓN</label>
                <select name="protectores[coneccion]" id="protectores[coneccion]" class="form-control">
                    <option></option>
                    <option value="FASE-FASE">FASE-FASE</option>
                    <option value="FASE - NEUTRO">FASE - NEUTRO</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[coneccion_2]">TIPO DE CONEXIÓN</label>
                <select name="protectores[coneccion_2]" id="protectores[coneccion_2]" class="form-control">
                    <option></option>
                    <option value="FASE-TIERRA">FASE-TIERRA</option>
                    <option value="NEUTRO-TIERRA">NEUTRO-TIERRA</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[visualizacion]">VISUALIZACIÓN DE ALARMAS</label>
                <input type="text" class="form-control" id="protectores[visualizacion]" name="protectores[visualizacion]" value="{{ old('protectores[visualizacion]') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="protectores[gestion_remota]">GESTIÓN REMOTA</label>
                <input type="text" class="form-control" id="protectores[gestion_remota]" name="protectores[gestion_remota]" value="{{ old('protectores[gestion_remota]') }}">
            </div>
        </div>
    </div>
</div>

<table>
    <tr>
        <td colspan="11" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">DIRECCIÓN DE O{{"&" }}M RED DE ACCESO</td>
        <td colspan="1" rowspan="4" style="text-align: center; border: 3px solid #000000; ">Logo 2</td>
    </tr>
    <tr>
        <td colspan="11" rowspan="1" style="background-color:#C00000; border: 3px solid #ffff; color:white; text-align: center; font-size: 11pt; font-weight: bold;
        font-size: 11pt;">PLAN DE MANTENIMIENTO PREVENTIVO INTEGRAL RED MOVIL</td>
    </tr>
    <tr>
        <td colspan="11" rowspan="2" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">MANTENIMIENTO PREVENTIVO REDES ELECTRICAS BT/MT</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000; text-align:center">{{ $id->campus->site_name }} </td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">1.- INFORMACIÓN GENERAL</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000; "></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">RED ELECTRICA EXTERNA</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="4" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 12.89px">TRANSFORMADOR</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 17.33px; height: 52px">TIPO S/E</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 18.22px;">PROPIETARIO</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 12.56px;">MARCA</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 16.33px;">CAPACIDAD (KVA)</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 16.11px;">NUM. FASES</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 16.11px;">CONEXIÓN</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 23.22px;">ELECTRIFICADORA</td>
        <td style="background-color: #FCE4D6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 20.22px;">VOLTAJE PRIMARIO NOMINAL (V)</td>
        <td style="background-color: #A6A6A6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 18.56px;">VOLTAJE SECUNDARIO NOMINAL (V)</td>
        <td style="background-color: #A6A6A6;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; width: 20.67px;">CORRIENTE SECUNDARIO NOMINAL (AMP)</td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['transformador']['tipo'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['tipo'] }}</td>
        <td style="background-color: {{ $dates['transformador']['propietario'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['propietario'] }}</td>
        <td style="background-color: {{ $dates['transformador']['marca'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['marca'] }}</td>
        <td style="background-color: {{ $dates['transformador']['cantidad_kv'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['cantidad_kv'] }}</td>
        <td style="background-color: {{ $dates['transformador']['num_fases'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['num_fases'] }}</td>
        <td style="background-color: {{ $dates['transformador']['conexion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['conexion'] }}</td>
        <td style="background-color: {{ $dates['transformador']['electrificadora'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['electrificadora'] }}</td>
        <td style="background-color: {{ $dates['transformador']['primario_nominal'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['primario_nominal'] }}</td>
        <td style="background-color: {{ $dates['transformador']['secundario_nominal'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['secundario_nominal'] }}</td>
        <td style="background-color: {{ $dates['transformador']['corriente_secundario_nominal'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['corriente_secundario_nominal'] }}</td>
    </tr>
    <tr>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; height: 40px">TIPO DE SECCIONADOR</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">REFERENCIA SECCIONADOR</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO DE FUSIBLES</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">REFERENCIA FUSIBLES</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDAD FUSIBLES (A)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO DE PARARRAYOS</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">NIVEL DE PROTECCIÓN (kV)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDAD DE PROTECCIÓN (Amp)</td>
        <td style="background-color: #A6A6A6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE SECUNDARIO MEDIDO (V)</td>
        <td style="background-color: #A6A6A6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORRIENTE SECUNDARIO MEDIDA(AMP)</td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['transformador']['seccionador'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['seccionador'] }}</td>
        <td style="background-color: {{ $dates['transformador']['referencia'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['referencia'] }}</td>
        <td style="background-color: {{ $dates['transformador']['tipo_fusibles'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['tipo_fusibles'] }}</td>
        <td style="background-color: {{ $dates['transformador']['referencia_fusible'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['referencia_fusible'] }}</td>
        <td style="background-color: {{ $dates['transformador']['capacidad_fusible'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['capacidad_fusible'] }}</td>
        <td style="background-color: {{ $dates['transformador']['tipo_para'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['tipo_para'] }}</td>
        <td style="background-color: {{ $dates['transformador']['nivel_proteccion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['nivel_proteccion'] }}</td>
        <td style="background-color: {{ $dates['transformador']['capacidad_proteccion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['capacidad_proteccion'] }}</td>
        <td style="background-color: {{ $dates['transformador']['secundario_medido'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['secundario_medido'] }}</td>
        <td style="background-color: {{ $dates['transformador']['secundario_medido_amp'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['transformador']['secundario_medido_amp'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MEDIDOR ENERGIA (CONTADOR)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000; height: 48px">NUMERO DE CUENTA</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">NUMERO DE MEDIDOR</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MARCA</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO</td>
        <td rowspan="2"></td>
        <td colspan="2" rowspan="2" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CONDUCTORES ELECTRICOS MT/BT</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CALIBRE DE CONDUCTOR MT (AWG)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CALIBRE CONDUCTOR BT (AWG)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO DE CANALIZACIÓN</td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['contador']['numero_cuenta'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['contador']['numero_cuenta'] }}</td>
        <td style="background-color: {{ $dates['contador']['numero_medidor'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['contador']['numero_medidor'] }}</td>
        <td style="background-color: {{ $dates['contador']['marca'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['contador']['marca'] }}</td>
        <td style="background-color: {{ $dates['contador']['tipo'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['contador']['tipo'] }}</td>
        <td style="background-color: {{ $dates['conductor']['calibre_mt'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['conductor']['calibre_mt'] }}</td>
        <td style="background-color: {{ $dates['conductor']['calibre_bt'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['conductor']['calibre_bt'] }}</td>
        <td style="background-color: {{ $dates['conductor']['canalizacion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['conductor']['canalizacion'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">RED ELECTRICA INTERNA</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="4" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TABLERO GENERAL DE DISTRIBUCIÓN TGD</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MARCA DEL TABLERO</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MARCA BREAKERS PPAL</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MODELO BREAKER PPAL</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDAD BREAKER PPAL</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MARCA BREAKERS DIST.</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CANTIDAD BREAKERS DISTRIB.</td>
        <td colspan="2" style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDADES BREAKERS DIST.</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORRIENTE FASE<p>IR (A)</p> </td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORRIENTE FASE <p>IS (A)</p> </td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['tablero']['marca_tablero'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['marca_tablero'] }}</td>
        <td style="background-color: {{ $dates['tablero']['marca_breakers'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['marca_breakers'] }}</td>
        <td style="background-color: {{ $dates['tablero']['modelo_breaker'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['modelo_breaker'] }}</td>
        <td style="background-color: {{ $dates['tablero']['capacidad_breaker'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['capacidad_breaker'] }}</td>
        <td style="background-color: {{ $dates['tablero']['marca_breakers_dist'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['marca_breakers_dist'] }}</td>
        <td style="background-color: {{ $dates['tablero']['cantidad_breaker_dist'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['cantidad_breaker_dist'] }}</td>
        <td colspan="2" style="background-color: {{ $dates['tablero']['capacidad_breakers_dist'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['capacidad_breakers_dist'] }}</td>
        <td style="background-color: {{ $dates['tablero']['corriente_ir'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['corriente_ir'] }}</td>
        <td style="background-color: {{ $dates['tablero']['corriente_is'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['corriente_is'] }}</td>
    </tr>
    <tr>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORRIENTE FASE <p>IT (A)</p> </td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORR. NEUTRO <p>IN (A)</p> </td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CORR. TIERRA <p>IcT (A)</p> </td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE LINEAS <p>VRS (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE LINEAS <p>VST (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE LINEAS <p>VRT (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE NEUTRO <p>VRN (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLTAJE NEUTRO <p>VSN (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLT. A NEUTRO <p>VTN (V)</p></td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VOLT. NEUTRO-TIERRA <p>VNT (V)</p></td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['tablero']['corriente_it'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['corriente_it'] }}</td>
        <td style="background-color: {{ $dates['tablero']['neutro_in'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['neutro_in'] }}</td>
        <td style="background-color: {{ $dates['tablero']['tierra_ict'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['tierra_ict'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vrs'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vrs'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vst'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vst'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vrt'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vrt'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vrn'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vrn'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vsn'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vsn'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vtn'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vtn'] }}</td>
        <td style="background-color: {{ $dates['tablero']['voltaje_vnt'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['tablero']['voltaje_vnt'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">PROTECTORES DE SOBRETENSIONES.</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MARCA</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">MODELO</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">N° DE SERIE</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDAD CORRIENTE (ka)</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">CAPACIDAD VOLTAJE (kV)</td>
        <td colspan="2" style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">TIPO DE CONECCIÓN</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">VISUALIZACIÓN DE ALARMAS</td>
        <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">GESTIÓN REMOTA</td>
    </tr>
    <tr>
        <td style="background-color: {{ $dates['protectores']['marca'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['marca'] }}</td>
        <td style="background-color: {{ $dates['protectores']['tipo'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['tipo'] }}</td>
        <td style="background-color: {{ $dates['protectores']['modelo'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['modelo'] }}</td>
        <td style="background-color: {{ $dates['protectores']['n_serie'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['n_serie'] }}</td>
        <td style="background-color: {{ $dates['protectores']['capacidad_corriente'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['capacidad_corriente'] }}</td>
        <td style="background-color: {{ $dates['protectores']['capacidad_voltaje'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['capacidad_voltaje'] }}</td>
        <td style="background-color: {{ $dates['protectores']['coneccion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['coneccion'] }}</td>
        <td style="background-color: {{ $dates['protectores']['coneccion_2'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['coneccion_2'] }}</td>
        <td style="background-color: {{ $dates['protectores']['visualizacion'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['visualizacion'] }}</td>
        <td style="background-color: {{ $dates['protectores']['gestion_remota'] ? '#FFFFFF' : '#FFFF00' }} ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['protectores']['gestion_remota'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000; height: 22px"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">2.- LISTA DE CHEQUEO GENERAL</td>
    </tr>
    <tr>
        <td colspan="5" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">ESTADO DE COMPONENTES</td>
        <td colspan="1" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">EVAL</td>
        <td colspan="5" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">ESTADO DE COMPONENTES</td>
        <td colspan="1" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white">EVAL</td>
    </tr>
    <tr>
        <td colspan="12" style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">RED ELECTRICA EXTERNA</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][1]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][1]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][9]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][9]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][2]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][2]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][10]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][10]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][3]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][3]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][11]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][11]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][4]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][4]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][12]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][12]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][5]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][5]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][13]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][13]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][6]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][6]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][14]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][14]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][7]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][7]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][15]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][15]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][8]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][8]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][16]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][16]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">RED ELECTRICA INTERNA</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][17]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][17]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][25]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][25]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][18]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][18]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][26]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][26]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][19]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][19]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][27]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][27]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][20]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][20]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][28]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][28]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][21]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][21]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][29]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][29]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][22]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][22]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][30]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][30]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][23]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][23]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][31]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][31]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][24]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][24]['value'] }}</td>
        <td colspan="5" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][32]['name'] }}</td>
        <td colspan="1" style="background-color: #FCE4D6; text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;">{{ $dates['check'][32]['value'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000; height: 22px"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">3.- SOPORTES MANTENIMIENTO.</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DEL TRANSFORMADOR</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DEL CORTACIRCUITOS</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DEL TGD</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">AISLADORES DEL TRANSFORMADOR</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PARARRAYOS DEL TRANSFORMADOR</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">CUBA DEL TRANSFORMADOR</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">CORTACIRCUITOS DE ARRANQUE</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PLACA DEL TRANSFORMADOR</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">POSTE</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">BAJANTE DE SPT</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">SPT TRANSFORMADOR</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">CATENARIA MT Aprox. 300 mts</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">INSTALACION BT</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DE LA TRANSFERENCIA</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DEL MEDIDOR</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION R-S</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION S-T</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION R-T</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE CORRIENTE FASE R</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE CORRIENTE FASE S</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE CORRIENTE FASE T</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="height: 35.80px ;font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION FASE R Y NEUTRO</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION FASE S Y NEUTRO</td>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MEDICION DE TENSION FASE T Y NEUTRO</td>
    </tr>
    <tr>
        <td colspan="12" style="border-right: 3px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">4.- PLAN DE MEJORA:</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="7" style="text-align:center; font-size: 10pt; border: 3px solid #000000;">{{ $dates['plan_mejora'] }}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff; font-weight: bold">TECNICO:</td>
        <td colspan="2  " style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff; width: 14.33px ">{{ $dates['tecnico'] }}</td>
        <td style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff;"></td>
        <td style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff; font-weight: bold">REVISOR:</td>
        <td colspan="2" style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff;">{{ $dates['revisor'] }}</td>
        <td style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff;"></td>
        <td colspan="4" style="border-bottom: 3px dashed #0000; font-size: 10pt; border: 3px solid #ffff; border-right: 3px solid #000000;f"></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="4" style="font-size: 10pt; border: 3px solid #000000;">FIRMA:</td>
        <td rowspan="2" colspan="8" style="font-size: 10pt; border: 3px solid #000000;">FIRMA:</td>
    </tr>
</table>
{{-- <tr>
    <td colspan="12" style="border-right: 3px solid #000000;"></td>
</tr>

    <td style="background-color: #FCE4D6 ;text-align: center; font-size: 10pt; font-weight: bold; border: 3px solid #000000;"></td>

    <td colspan="2" rowspan="2" style="background-color: #FCE4D6; font-size: 10pt; font-weight: bold; border: 3px solid #000000;"></td>

    <td colspan="12" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080; color: white"></td>
<tr>
    <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold"></td>
</tr> --}}

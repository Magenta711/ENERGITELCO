@php
    $count=count($dates['check']);
    $count_actions=count($dates['actions']);
    $count_dates_a_a=count($dates['dates_a_a']);
    // $count_dates_a_a=count($dates['dates_a_a']);

@endphp
<table>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="13" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">DIRECCIÓN DE O{{"&" }}M RED DE ACCESO</td>
        <td colspan="1" rowspan="4" style="text-align: center; border: 3px solid #000000; ">Logo 2</td>
    </tr>
    <tr>
        <td colspan="13" rowspan="1" style="background-color:#C00000; border: 3px solid #ffff; color:white; text-align: center; font-size: 11pt; font-weight: bold;
        font-size: 11pt;">PLAN DE MANTENIMIENTO PREVENTIVO INTEGRAL RED MOVIL</td>
    </tr>
    <tr>
        <td colspan="13" rowspan="2" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">MANTENIMIENTO PREVENTIVO AIRES ACONDICIONADOS</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000; text-align:center">{{ $dates['campus'] }}</td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">1.- INFORMACIÓN AIRE ACONDICIONADO</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080;">DATOS GENERALES</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center;  width: 13.89px; height: 25px"></td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 14.33px">MARCA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 15.33px">MODELO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 16.33px">SERIAL</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 12.67px">ID ACTIVO FIJO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 16.22px">ESTADO DE EQUIPO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 18.33px"> TIPO AIRE</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 15.89px">ALIMENTACIÓN AC</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 18.67px">VOLTAJE ENTRADA (v)</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 16.67px">CORRIENTE (AMP)</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 15.33px">CAPACIDAD BTU</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 17.67px">HOROMETRO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 15.11px">GESTIÓN REMOTA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; width: 21.56px">CANT. COMPRESORES</td>
    </tr>
    @for ($i = 1; $i <= $count_dates_a_a; $i++)
    <tr>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; font-weight: bold">A.A {{ $i }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['marca'] ? $dates['dates_a_a'][$i]['marca'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['modelo'] ? $dates['dates_a_a'][$i]['moelo'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['serial'] ? $dates['dates_a_a'][$i]['serial'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['id_activo'] ? $dates['dates_a_a'][$i]['id_activo'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['estado_equipo'] ? $dates['dates_a_a'][$i]['estado_equipo'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['tipo_aire'] ? $dates['dates_a_a'][$i]['tipo_aire'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['alimentacion_ac'] ? $dates['dates_a_a'][$i]['alimentacion_ac'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['voltaje_entrada'] ? $dates['dates_a_a'][$i]['voltaje_entrada'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['corriente'] ? $dates['dates_a_a'][$i]['corriente'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['capacidad'] ? $dates['dates_a_a'][$i]['capacidad'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['horometro'] ? $dates['dates_a_a'][$i]['horometro'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['gestion_remota'] ? $dates['dates_a_a'][$i]['gestion_remota'] : 'N/A'  }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['dates_a_a'][$i]['cant_compresor'] ? $dates['dates_a_a'][$i]['cant_compresor'] : 'N/A'  }}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMPERATURA CUARTO EQUIPO</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMPERATURA AA ENTRADA</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMPERATURA AA SALIDA</td>
        <td colspan="1" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMP. DISPLAY</td>
        <td colspan="1" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMP. TERMOSTATO</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">AJUSTE TERMOSTATO</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; font-weight: bold; color: white">TEMP. TERMOSTATO POS AJUSTE</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['cuarto_equipo'] ? $dates['temp']['cuarto_equipo'] : 'N/A'}}</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['aa_entrada'] ? $dates['temp']['aa_entrada'] : 'N/A'}}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['aa_salida'] ? $dates['temp']['aa_salida'] : 'N/A'}}</td>
        <td colspan="1" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['display'] ? $dates['temp']['display'] : 'N/A'}}</td>
        <td colspan="1" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['termostato'] ? $dates['temp']['termostato'] : 'N/A'}}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['ajuste_termo'] ? $dates['temp']['ajuste_termo'] : 'N/A'}}</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold;">{{ $dates['temp']['termo_pos'] ? $dates['temp']['termo_pos'] : 'N/A'}}</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080;">UNIDAD CONDENSADORA</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center; height: 25px"></td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MARCA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">SERIAL</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">TIPO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">REFRIGERANTE</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MODELO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">AISLAMIENTO M{{ "Ω" }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">PRESIÓN SUCCION</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">PRESIÓN DESCARGA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">NIVEL DE ACEITE</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">VL1/VL2/VL3</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">AMPL1/AMPL2/AMPL3</td>
    </tr>
    @for ($i = 1; $i <= $count_dates_a_a; $i++)
    <tr>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; font-weight: bold">COMPRESOR 1</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['marca'] ? $dates['compresor'][$i]['marca'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['serial'] ? $dates['compresor'][$i]['serial'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['tipo'] ? $dates['compresor'][$i]['tipo'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['refrigerante'] ? $dates['compresor'][$i]['refrigerante'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['modelo'] ? $dates['compresor'][$i]['modelo'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['aislamiento'] ? $dates['compresor'][$i]['aislamiento'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['presion_succion'] ? $dates['compresor'][$i]['presion_succion'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['presion_descarga'] ? $dates['compresor'][$i]['presion_descarga'] : "N/A" }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['nivel_aceite'] ? $dates['compresor'][$i]['nivel_aceite'] : "N/A" }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['vl1'] ? $dates['compresor'][$i]['vl1'] : "N/A" }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['compresor'][$i]['ampl1'] ? $dates['compresor'][$i]['ampl1'] : "N/A" }}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #ffff; text-align: center; height: 25px"></td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MARCA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MODELO</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">SERIAL</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; color: white">TEMPERATURA ENTRADA</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; color: white">TEMPERATURA SALIDA</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; color: white">DIAMETRO EJE</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #A6A6A6; color: white">DIAMETRO ASPAS</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">UNIDAD CONDENSADORA</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['marca'] ? $dates['unidad']['marca'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['modelo'] ? $dates['unidad']['modelo'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['serial'] ? $dates['unidad']['serial'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['temp_entrada'] ? $dates['unidad']['temp_entrada'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['temp_salida'] ? $dates['unidad']['temp_salida'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['diametro_eje'] ? $dates['unidad']['diametro_eje'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['unidad']['diametro_aspas'] ? $dates['unidad']['diametro_aspas'] : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080;">UNIDAD MANEJADORA</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center; height: 25px"></td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MARCA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MODELO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">TIPO</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">TIPO DE FILTRO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">TIPO CORREA</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">MARCA MOTOR</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">ALIMENTACIÓN AC</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">VOLTAJE DEL MOTOR</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CORRIENTE MOTOR</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">AISLAMIENTO (M{{ "Ω" }})</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">SERIAL MOTOR</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">DIMENSIONES BLOWER</td>
    </tr>
    @for ($i = 1; $i <= 3; $i++)
    <tr>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6; font-weight: bold">MANEJADORA 1</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['marca'] ? $dates['manejadora'][$i]['marca'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['modelo'] ? $dates['manejadora'][$i]['modelo'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['tipo'] ? $dates['manejadora'][$i]['tipo'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['tipo_filtro'] ? $dates['manejadora'][$i]['tipo_filtro'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['tipo_correa'] ? $dates['manejadora'][$i]['tipo_correa'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['marca_motor'] ? $dates['manejadora'][$i]['marca_motor'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['alimentacion_ac'] ? $dates['manejadora'][$i]['alimentacion_ac'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['voltaje_motor'] ? $dates['manejadora'][$i]['voltaje_motor'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['corriente_motor'] ? $dates['manejadora'][$i]['corriente_motor'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['aislamiento'] ? $dates['manejadora'][$i]['aislamiento'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['serial_motor'] ? $dates['manejadora'][$i]['serial_motor'] : 'N/A' }}</td>
        <td style="font-size: 8pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['manejadora'][$i]['dimensiones'] ? $dates['manejadora'][$i]['dimensiones'] : 'N/A' }}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">2.- LISTA DE CHEQUEO GENERAL</td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="font-size: 12pt; border: 3px solid #000000; text-align: center; background-color: #808080;">PARAMETRO DE EVALUACIÓN</td>
    </tr>
    @for ($i = 1; $i <= $count; $i++)
        <tr>
            <td colspan="13" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['check'][$i]['id'] }}</td>
            <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">{{ $dates['check'][$i]['value']== 'N/A' ? "NO APLICA" : $dates['check'][$i]['value'] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">3.- ACCIONES REALIZADAS</td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center; height: 25px"></td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">LIMPIEZA DE SERPENTINES</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">AJUSTE ELEMENTOS DE CONTROL</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">ADICIÓN REFRIGERANTE</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CORRECCIÓN DE DRENAJES</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">LUBRICACIÓN DE COMPONENTES</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CAMBIO FILTROS SECADO</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">ALINEACIÓN DE POLEAS</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CAMBIO COMPONENTES ELECTRONICOS</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CAMBIO DE COMPRESOR</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">CAMBIO DE CORREAS/FILTROS</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; background-color: #FCE4D6;">OTRAS REPARACIONES</td>
    </tr>

    @for ($i = 1; $i <= $count_actions; $i++)
    <tr>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">MANEJADORA {{ $i }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['limpieza'] ? $dates['actions'][$i]['limpieza'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['ajuste'] ? $dates['actions'][$i]['ajuste'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['adicion'] ? $dates['actions'][$i]['adicion'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center;">{{ $dates['actions'][$i]['correccion'] ? $dates['actions'][$i]['correccion'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['lubricacion'] ? $dates['actions'][$i]['lubricacion'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['cambio_filtro'] ? $dates['actions'][$i]['cambio_filtro'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['alineacion'] ? $dates['actions'][$i]['alineacion'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['cambio_componentes'] ? $dates['actions'][$i]['cambio_componentes'] : 'N/A' }}</td>
        <td style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['cambio_compresor'] ? $dates['actions'][$i]['cambio_compresor'] : 'N/A' }}</td>
        <td  style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['cambio_correas'] ? $dates['actions'][$i]['cambio_correas'] : 'N/A' }}</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #000000; text-align: center; font-weight: bold">{{ $dates['actions'][$i]['otras_reparaciones'] ? $dates['actions'][$i]['otras_reparaciones'] : 'N/A' }}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">4.- SOPORTES MANTENIMIENTO (ANEXOS FOTOGRAFICOS).</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">CONDENSADORA POS MANTENIMIENTO</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">EVAPORADORA POS MANTENIMIENTO</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">FILTROS POS MANTENIMIENTO</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA UNIDAD CONDENSADORA</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA UNIDAD MANEJADORA</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA COMPRESOR<td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">PANORAMICA DEL AIRE ACONDICIONADO</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">MOTOR Y ASPA CONDENSADORA</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">TEMPERATURA AIRE DE ENTRADA<td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">TEMPERATURA AIRE DE SALIDA</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">TEMPERATURA SALON</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">TERMOSTATO<td>
    </tr><tr>
        <td colspan="4" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
        <td colspan="5" rowspan="13" style="font-size: 10pt; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">AJUSTES MECANICOS Y ELECTRICOS</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">AJUSTES MECANICOS Y ELECTRICOS</td>
        <td colspan="5" style="font-size: 10pt; background-color:#A6A6A6; border: 3px solid #000000; color: white; text-align:center; font-weight: bold">SERIAL DEL ELEMENTO<td>
    </tr>
    <tr>
        <td colspan="14" style="border-right: 3px solid #000000"></td>
    </tr>
    <tr>
        <td colspan="14" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">5.- PLAN DE MEJORA:</td>
    </tr>
    <tr>
        <td colspan="14" rowspan="7" style="font-size: 10pt; border: 3px solid #000000;">{{ $dates['plan_mejora'] }}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td style="font-size: 10pt; border: 3px solid #ffff; font-weight: bold">TECNICO:</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #ffff; text-align: center; ">{{ $dates['tecnico'] }}</td>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center;"></td>
        <td style="font-size: 10pt; border: 3px solid #ffff; font-weight: bold">REVISOR:</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid #ffff; text-align: center;">{{ $dates['revisor'] }}</td>
        <td style="font-size: 10pt; border: 3px solid #ffff; text-align: center;"></td>
        <td colspan="6" style="font-size: 10pt; border: 3px solid #ffff; text-align: center;"></td>

    </tr>
    <tr>
        <td rowspan="2" colspan="4" style="font-size: 10pt; border: 3px solid #000000;">FIRMA:</td>
        <td rowspan="2" colspan="10" style="font-size: 10pt; border: 3px solid #000000;">FIRMA:</td>
    </tr>
    <tr>
        <td style=" height: 50px"></td>
    </tr>
</table>





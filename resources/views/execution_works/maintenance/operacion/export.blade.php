@php
    function resizeHeightCell($string) {
        $str_len = strlen($string);
        $size = ceil($str_len/41) * 11;

        if ($size>0) {
            return $size;
        }else {
            $size=11;
            return $size;
        }
    }
@endphp
<table>
    <tr>
        <td colspan="3" rowspan="5" style="text-align: center; border: 3px solid black; width: 16px;"></td>
        <td colspan="6" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold; font-size: 11pt;">OPERACIÓN Y MANTENIMIENTO</td>
        <td colspan="3" rowspan="5" style="text-align: center; border: 3px solid black; width: 16px;"></td>
    </tr>
    <tr>
        <td colspan="6" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">CLARO - PROVEEDORES</td>
    </tr>
    <tr>
        <td colspan="6" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">MANTENIMIENTO CORRECTIVO Y DE EMERGENCIAS</td>
    </tr>
    <tr>
        <td colspan="6" rowspan="2" style="background-color:#C00000;"></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td colspan="12" style="height: 7px"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">INFORMACIÓN GENERAL</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">NOMBRE DE ESTACIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['estacionBase'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">CATEGORÍA:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['categoria'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">REGIONAL:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['regional'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">RESPONSABLE:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $id->revisor }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">DEPARTAMENTO:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['departamento'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">No. INC:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['noInc'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">DIRECCIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['direccion'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">No. TAS:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">OT{{ $id->campus->OT}}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">TIPO DE ESTACIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['tipoEstacion'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">FECHA EJECUCIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['fechaEjecucion'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">TIPO DE SITIO:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['tipoSitio'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">FECHA FIN ACTIVIDAD:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['fechaFin'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">SITE OWNER:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['siteOwner'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">¿IMPLICA EXCLUSIÓN?</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['general']['exclusion'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="height: 7px"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold">INFORMACIÓN DE LA ACTIVIDAD</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">TIPO DE ACTIVIDAD:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['tipoActividad'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">TIPO DE EQUIPO EN FALLA:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['fallaEquipo'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">MARCA:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['marca'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">MODELO:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['modelo'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">PRESENTA AFECTACIÓ N DE SERVICIOS:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['afectaciones'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">REINSTALACIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['reinstalacion'] }}</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">CAMBIO:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['cambio'] }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black">REPARACIÓN:</td>
        <td colspan="3" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['activity']['reparacion'] }}</td>
    </tr>

    <tr>
        <td colspan="12" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold">DESCRIPCIÓN DE LA FALLA</td>
    </tr>
    <tr>
        <td colspan="12" style="text-align: center; font-size: 10pt; border: 3px solid black; height: {{ resizeHeightCell( $dates['activity']['descripcionFalla']) }}px">{{ $dates['activity']['descripcionFalla'] }}</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold">DESCRIPCIÓN DE LA SOLUCIÓN</td>
    </tr>
    <tr>
        <td colspan="12" style="text-align: center; font-size: 10pt; border: 3px solid black; height: {{ resizeHeightCell( $dates['activity']['descripcionSolucion'])}}px;">{{ $dates['activity']['descripcionSolucion'] }}</td>
    </tr>
    <tr>
        <td colspan="12" style="height: 7px"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-size: 11pt; font-weight: bold;  border: 3px solid black">CAMBIO DE REPUESTOS Y/O PARTES (Para los casos que aplique)</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; font-size: 11pt; font-weight: bold">DATOS DE REPUESTOS RETIRADOS</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">DESCRIPCIÓN</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MARCA</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MODELO</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">SERIAL</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; font-size: 11pt; font-weight: bold">DATOS DE REPUESTOS INSTALADO</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">DESCRIPCIÓN</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MARCA</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MODELO</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">SERIAL</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; font-size: 11pt; font-weight: bold">LISTADO DE MATERIALES UTILIZADOS EN LA ACTIVIDAD (Para los casos que aplique)</td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">DESCRIPCIÓN</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MARCA</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">MODELO</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center;">CANTIDAD</td>
    </tr>
    <tr>
        <td colspan="12" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align:center;">LISTADO DE MATERIALES UTILIZADOS EN LA ACTIVIDAD MATERIAL DE BODEGA (Para los casos que aplique)         </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">¿Material comprado por el operario?</td>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">Descripción del material</td>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">Cantidad</td>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">Tipo de unidad</td>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">Foto Antes</td>
        <td colspan="2" style="font-size: 7.5pt; border: 3px solid blackbackground-color:#8B8B8B; text-align:center; font-weight: bold">Foto Después</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black"></td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black"></td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black"></td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black"></td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['fotos']['antes'] == 'SI' ? 'SI' : 'NO' }}</td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['fotos']['despues'] == 'SI' ? 'SI' : 'NO' }}</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; font-size: 11pt; font-weight: bold"></td>
    </tr>
    @for ($i = 1; $i <= $id->cantidad_fotos; $i++)
        <tr>
            <td colspan="6" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align:center;">EVIDENCIA DE LA ACTIVIDAD</td>
            <td colspan="6" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align:center;">EVIDENCIA DE LA ACTIVIDAD</td>
        </tr>
        <tr>
            <td colspan="6" rowspan="13" style="font-size: 10pt; border: 3px solid black"></td>
            <td colspan="6" rowspan="13" style="font-size: 10pt; border: 3px solid black"></td>
        </tr>
        <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
                <td colspan="2" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white;">DESCRIPCION {{ $i }}</td>
                @foreach ($id->files as $items)
                    @if ($items->description=='1. FOTO '.$i)
                        <td colspan="4" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white;">{{ $items->commentary }}</td>
                    @endif
                @endforeach
                @php
                    $i++;
                    $filteredFiles = $id->files->filter(function($item) use ($i) {
                        return $item->description == '1. FOTO ' . $i;
                    });
                @endphp
                <td colspan="2" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white;">DESCRIPCION {{ $i }}</td>
                @foreach ($filteredFiles as $items)
                    <td colspan="4" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white;">
                        {{ empty($items->commentary) ? '' : $items->commentary }}
                    </td>
                @endforeach
            </tr>
    @endfor
    <tr>
        <td colspan="6" style="font-size: 10pt; border: 3px solid black; text-align: center">FALLA RESUELTA:</td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['findings']['FallaResuelta'] }}</td>
        <td colspan="4" style="font-size: 10pt; border: 3px solid black; text-align: center">OPERATIVO</td>
    </tr>
    <tr>
        <td colspan="12" style="text-align: center; font-size: 10pt; border: 3px solid black; height: {{ resizeHeightCell($dates['findings']['ObeservacionesActividad']) }}px">OBSERVACIONES DE LA ACTIVIDAD:{{ $dates['findings']['ObeservacionesActividad'] }}</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; font-size: 11pt; font-weight: bold; text-align: center">HALLAZGOS</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: center; font-size: 10pt; border: 3px solid black">¿Se encontraron novedades en la estación?</td>
        <td colspan="2" style="text-align: center; font-size: 10pt; border: 3px solid black">{{ $dates['findings']['FallaEstacion'] }}</td>
        <td colspan="4" style="text-align: center; font-size: 10pt; border: 3px solid black; height: 26px">Si se encuentran novedades que ponen en riesgo el servicio del sitio, por favor reportarlo</td>
    </tr>
    <tr>
        <td colspan="2" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white; text-align: center">HALLAZGO</td>
        <td colspan="4" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white; text-align: center">SISTEMA</td>
        <td colspan="2" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white; text-align: center">PRIORIDAD</td>
        <td colspan="4" style="background-color:#8B8B8B; font-size: 10pt; border: 3px solid black;color:white; text-align: center">DESCRIPCIÓN</td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10pt; border: 3px solid black;color:white;">{{ $dates['findings']['hallazgo'] }}</td>
        <td colspan="4" style="font-size: 10pt; border: 3px solid black;color:white;">{{ $dates['findings']['sistema'] }}</td>
        <td colspan="2" style="font-size: 10pt; border: 3px solid black;color:white;">{{ $dates['findings']['prioridad'] }}</td>
        <td colspan="4" style="font-size: 10pt; border: 3px solid black;color:white;">{{ $dates['findings']['descripcion'] }}</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="3"></td>
    </tr>
    <tr></tr><tr></tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">6. TRANSPORTES ESPECIALES</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">Distancia en KM</td>
        <td colspan="4" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">Tiempo de desplazamiento</td>
        <td colspan="1" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">Tipo de transporte</td>
        <td colspan="3" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">Observación de transporte</td>
        <td colspan="3" rowspan="1" style="background-color:#8B8B8B; color:white; font-size: 11pt; font-weight: bold; text-align: center; border: 3px solid black;">Foto Transporte</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="20" style="text-align:center; font-size: 11pt; font-weight: bold; border: 3px solid black;">{{ $dates['transport']['distancia'] }}</td>
        <td colspan="4" rowspan="20" style="text-align:center; font-size: 11pt; font-weight: bold; border: 3px solid black;">{{ $dates['transport']['TiempoDesplazamiento'] }}</td>
        <td colspan="1" rowspan="20" style="text-align:center; font-size: 11pt; font-weight: bold; border: 3px solid black;">{{ $dates['transport']['transporte'] }}</td>
        <td colspan="3" rowspan="20" style="text-align:center; font-size: 11pt; font-weight: bold; border: 3px solid black;">{{ $dates['transport']['observaciones'] }}</td>
        <td colspan="3" rowspan="20" style="text-align:center; font-size: 11pt; font-weight: bold; border: 3px solid black;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center; font-weight: bold;">Nombre del Personal Quien Ejecuta:</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center;">{{ $id->tecnico }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center; font-weight: bold;">Empresa Quien Ejecuta:</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center;">{{ $id->empresa }}</td>

    </tr>
    <tr>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center; font-weight: bold;">Nombre del Quien Revisa:</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center;">{{ $id->revisor }}</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center; font-weight: bold;">Fecha de Elaboración del Informe:</td>
        <td colspan="3" style="font-size: 10pt; border: 3px solid black;text-align:center;">{{ $id->fechaElaboracion }}</td>
    </tr>
</table>

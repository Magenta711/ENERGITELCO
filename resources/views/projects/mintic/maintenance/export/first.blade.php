@php
function checkedActivity($idActivity, $activities)
{
    foreach ($activities as $key => $value) {
        if ($value->activity_id == $idActivity) {
            return $value->status;
        }
    }
    return 'NO';
}

@endphp

<table>
    <tr>
        <td></td>
        <td colspan="15"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="7" colspan="4" style="border: 1px solid #000000;"></td>
        <td rowspan="7" colspan="8" style="border: 1px solid #000000;">
            @if ($id->type_format == 'Mantenimiento correctivo')
                FORMATO NOTIFICACIÓN DE MANTENIMIENTO CORRECTIVO CENTROS DIGITALES
            @endif
            @if ($id->type_format == 'Mantenimiento preventivo')
                FORMATO NOTIFICACIÓN DE MANTENIMIENTO PREVENTIVO CENTROS DIGITALES
            @endif
        </td>
        <td rowspan="7" colspan="3" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="border-left: 2px solid #000000;">N° DE CASO IM:</td>
        <td colspan="4">{{ $id->num }}</td>
        <td style="border-left: 2px solid #000000;">Fecha:</td>
        <td colspan="2">{{ $id->date }}</td>
        <td colspan="2" style="border-left: 2px solid #000000;">Empresa colaboradora:</td>
        <td colspan="5" style="border-right: 2px solid #000000;">{{ $id->collaborating_company }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">1. INFORMACIÓN
            GENERAL</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">CONTRATO No.</td>
        <td colspan="11" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">Contratista</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">1042 de 2020</td>
        <td colspan="11" style="text-align: center;border: 1px solid #000000;">COMCEL SAS</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">DEPARTAMENTO</td>
        <td colspan="5" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">MUNICIPIO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">CENTRO POBLADO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SEDE INSTITUCIÓN
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">{{ $id->department }}</td>
        <td colspan="5" style="text-align: center;border: 1px solid #000000;">{{ $id->municpality }}</td>
        <td colspan="3" style="text-align: center;border: 1px solid #000000;">{{ $id->population }}</td>
        <td colspan="3" style="text-align: center;border: 1px solid #000000;">{{ $id->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">ID BENEFICIARIO
        </td>
        <td colspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">ID MINTIC</td>
        <td colspan="5" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NOMBRE DEL
            RESPONSABLE
            (RESPONSABLE DE LA INSTITUCIÓN EDUCATIVA / AUTORIDAD COMPENTE)</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NÚMERO DE CEDULA
        </td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NÚMERO DE CONTACTO
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">{{ $id->code }}</td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">{{ $id->project->con_sede }}</td>
        <td colspan="5" style="text-align: center;border: 1px solid #000000;">{{ $id->responsable_name }}</td>
        <td colspan="3" style="text-align: center;border: 1px solid #000000;">{{ $id->responsable_cc }}</td>
        <td colspan="3" style="text-align: center;border: 1px solid #000000;">{{ $id->responsable_number }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">CORREO ELECTRÓNICO
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center;border: 1px solid #000000;">
            {{ $id->responsable_email }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center;background: #A6A6A6;border: 1px solid #000000;">
            @if ($id->type_format == 'Mantenimiento correctivo')
                2. EQUIPOS INSTALADOS/RETIRADOS
            @endif
            @if ($id->type_format == 'Mantenimiento preventivo')
                2. ACTIVIDADES DE MANTENIMIENTO PREVENTIVO
            @endif
        </td>
    </tr>
    @if ($id->type_format == 'Mantenimiento correctivo')
        <tr>
            <td></td>
            <td style="text-align: center;background: #D0CECE;border: 1px solid #000000;">ESPECIAL</td>
            <td style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SAP</td>
            <td colspan="7" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">Descripción
            </td>
            <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">Cantidad
                Retirado
            </td>
            <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">Cantidad
                Instalado
            </td>
        </tr>
        @foreach ($equipments as $equipment)
            @if ($equipment->is_informe)
                <tr>
                    <td></td>
                    <td style="border: 1px solid #000000;">Acceso</td>
                    <td style="border: 1px solid #000000;">{{ $equipment->sap }}</td>
                    <td colspan="7" style="border: 1px solid #000000;">{{ $equipment->name }}</td>
                    <td colspan="3" style="border: 1px solid #000000;">
                        @php
                            $amount = 0;
                            foreach ($id->equipments as $key => $value) {
                                if ($value->type == 'retired' && $value->detail_id == $equipment->id) {
                                    $amount++;
                                }
                            }
                            echo $amount;
                            $amount = 0;
                        @endphp
                    </td>
                    <td colspan="3" style="border: 1px solid #000000;">
                        @php
                            $amount = 0;
                            foreach ($id->equipments as $key => $value) {
                                if ($value->type == 'install' && $value->detail_id == $equipment->id) {
                                    $amount++;
                                }
                            }
                            echo $amount;
                            $amount = 0;
                        @endphp
                    </td>
                </tr>
            @endif
        @endforeach
    @endif
    @if ($id->type_format == 'Mantenimiento preventivo')
        <tr>
            <td></td>
            <td style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SAP</td>
            <td colspan="8" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">Descripción
            </td>
            <td colspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SI</td>
            <td colspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NO</td>
            <td colspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">N/A</td>
        </tr>
        @foreach ($activities as $activity)
            @php
                $checkedActivity = checkedActivity($activity->id, $id->activities);
            @endphp
            <tr>
                <td></td>
                <td style="text-align: center;border: 1px solid #000000;">
                    {!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->sap }}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                <td colspan="8" style="border: 1px solid #000000;">
                    {!! $activity->type == 1 ? '<b>' : '' !!}{{ $activity->description }}{!! $activity->type == 1 ? '</b>' : '' !!}</td>
                <td colspan="2" style="text-align: center;border: 1px solid #000000;">
                    {{ $checkedActivity == 'SI' ? 'X' : '' }}
                </td>
                <td colspan="2" style="text-align: center;border: 1px solid #000000;">
                    {{ $checkedActivity == 'NO' ? 'X' : '' }}
                </td>
                <td colspan="2" style="text-align: center;border: 1px solid #000000;">
                    {{ $checkedActivity == 'N/A' ? 'X' : '' }}
                </td>
            </tr>
        @endforeach
    @endif
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center;background: #A6A6A6;border: 1px solid #000000;">
            @if ($id->type_format == 'Mantenimiento correctivo')
                SERIAL EQUIPO/S RETIRADOS E INSTALADOS
            @endif
            @if ($id->type_format == 'Mantenimiento preventivo')
                3. SERIAL EQUIPO/S RETIRADOS E INSTALADOS
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SERIAL EQUIPO/S
            RETIRADOS</td>
        <td colspan="7" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SERIAL EQUIPO/S
            INSTALADOS</td>
    </tr>
    @php
        $j = 0;
    @endphp
    @foreach ($id->equipments as $equipment_item)
        @if ($equipment_item->type == 'retired')
            @php
                $j++;
            @endphp
            <tr>
                <td></td>
                <td colspan="4" style="border: 1px solid #000000;">{{ $equipment_item->serial }}</td>
                <td colspan="4" style="border: 1px solid #000000;">{{ $equipment_item->detail->name }}</td>
                <td colspan="4" style="border: 1px solid #000000;"></td>
                <td colspan="3" style="border: 1px solid #000000;"></td>
            </tr>
        @endif
    @endforeach
    @for ($i = $j; $i < 7; $i++)
        <tr>
            <td></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
        </tr>
    @endfor
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center;background: #A6A6A6;border: 1px solid #000000;">
            @if ($id->type_format == 'Mantenimiento correctivo')
                3. DESCRIPCIÓN DE LA FALLA / HALLAZGOS
            @endif
            @if ($id->type_format == 'Mantenimiento preventivo')
                4. HALLAZGOS
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">{{ $id->fault_description }}</td>
    </tr>
    {{-- @if ($trabajo->created_at > '2020-12-14 11:00:00') --}}
    <tr>
        <td></td>
        <td colspan="8" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            DATOS DE QUIEN REPARA EL SERVICIO EN EL CENTRO DIGITAL
        </td>
        <td colspan="7" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            DATOS DE INGENIERO DE SOPORTE NOC
        </td>
    </tr>
    {{-- @endif --}}
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NOMBRES Y
            APELLIDOS:
        </td>
        <td colspan="5" style="border: 1px solid #000000;">{{ $id->receives_name }}</td>
        <td colspan="3" rowspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            NOMBRES Y
            APELLIDOS:</td>
        <td colspan="4" rowspan="2" style="border: 1px solid #000000;">{{ $id->repair_name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">CARGO:</td>
        <td colspan="5" style="border: 1px solid #000000;">{{ $id->receives_position }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NÚMERO DE CEDULA:
        </td>
        <td colspan="5" style="border: 1px solid #000000;">{{ $id->receives_cc }}</td>
        <td colspan="3" rowspan="2" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            CARGO:
        </td>
        <td colspan="4" rowspan="2" style="border: 1px solid #000000;">{{ $id->repair_position }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">NÚMERO DE
            TELÉFONO O
            CEDULAR:</td>
        <td colspan="5" style="border: 1px solid #000000;">311 306 6482</td>{{-- {{ $id->receives_tel }} --}}
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">CORREO
            ELECTRÓNICO:
        </td>
        <td colspan="5" style="border: 1px solid #000000;">jorge.ortega@energitelco.com</td>{{-- {{ $id->receives_mail }} --}}
        <td colspan="3" rowspan="4" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            TICKET, SI
            APLICA</td>
        <td colspan="4" rowspan="4" style="border: 1px solid #000000;">{{ $id->ticket }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">
            <br>FIRMA:<br>
        </td>
        <td colspan="5" rowspan="3" style="border: 1px solid #000000;"></td>
    </tr>
</table>

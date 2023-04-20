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
        <td colspan="10"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="7" colspan="3" style="text-align: center; justify-content: center; border: 1px solid #000000;"></td>
        <td rowspan="7" colspan="7" style="border: 1px solid #000000; text-align:center;     ">
            INFORME REGISTRO CAMBIO EQUIPO
        </td>
        <td rowspan="7" colspan="2" style="border: 1px solid #000000; text-align:center">Version 1.0</td>
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
        <td rowspan="2" colspan="12" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">ID BENEFICIARIO
        </td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">{{ $id->code }}</td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">NOMBRE SEDE</td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">{{ $id->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">DEPARTAMENTO</td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">{{ $id->department }}</td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">MUNICIPIO</td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">{{ $id->municpality }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">ULTIMA MILLA:</td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">{{ $id->project->con_sede }}</td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">FECHA VISITA SUBSANACIÓN:</td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">{{ $id->date }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">NOMBRE ALIADO:</td>
        <td colspan="2" style="text-align: center;border: 1px solid #000000;">ENERGITELCO</td>
        <td colspan="3" style="background: #D0CECE;border: 1px solid #000000;">NOMBRE TECNICO ALIADO:</td>
        <td colspan="4" style="text-align: center;border: 1px solid #000000;">{{ $id->receives_name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000"></td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="2" colspan="3" style="text-align: justify;background: #D0CECE;border: 1px solid #000000;">DESCRIPCIÓN DE DIAGNOSTICO DE LA FALLA Y SOLUCIÒN</td>
        <td rowspan="2" colspan="9" style="text-align: justify;border: 1px solid #000000;">{{ $id->fault_description }}</td>
    </tr>
    <tr>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000"></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="12" style="background: #D0CECE;background: #D0CECE;border: 1px solid #000000;">RELACIONE LOS EQUIPOS A REEMPLAZAR:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">TIPO DE EQUIPO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">MARCA</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">MODELO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SERIAL</td>
    </tr>
    @foreach ($id->equipments as $equipment_item)
        @if ($equipment_item->type == 'retired')
            <tr>
                <td></td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->serial }}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->detail->brand }}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->detail->name }}
                    {{-- Validar si el nombre es los mismo que el modelo, si es diferente, hay un model_id en la base de datos --}}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->serial }}
                </td>
            </tr>
        @endif
    @endforeach


    <tr>
        <td></td>
        <td colspan="12" style="background: #D0CECE;background: #D0CECE;border: 1px solid #000000;">RELACIONE LOS EQUIPOS NUEVOS A INSTALAR:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="text-align: center;border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">TIPO DE EQUIPO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">MARCA</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">MODELO</td>
        <td colspan="3" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">SERIAL</td>
    </tr>
    @foreach ($id->equipments as $equipment_item)
        @if ($equipment_item->type == 'install')
            <tr>
                <td></td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->serial }}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->detail->brand }}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->detail->name }}
                    {{-- Validar si el nombre es los mismo que el modelo, si es diferente, hay un model_id en la base de datos --}}
                </td>
                <td colspan="3" style="border: 1px solid #000000;">
                    {{ $equipment_item->serial }}
                </td>
            </tr>
        @endif
    @endforeach

    <tr>
        <td></td>
        <td colspan="12" style="text-align: center;background: #D0CECE;border: 1px solid #000000;">REGISTRO FOTOGRÁFICO EQUIPO(S) ANTIGUO DONDE SE EVIDENCIE SERIAL</td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="17" colspan="6"></td>
        <td rowspan="17" colspan="6"></td>
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
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>

    <tr>
        <td></td>
        <td colspan="12" style="text-align: center;border: 1px solid #000000;background: #D0CECE">REGISTRO FOTOGRÁFICO EQUIPO(S) NUEVO DONDE SE EVIDENCIE SERIAL</td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="17" colspan="6"></td>
        <td rowspan="17" colspan="6"></td>
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
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
       <td></td>
       <td rowspan="3" colspan="12" style="background: #D0CECE;border: 1px solid #000000;">OBSERVACIONES:</td>
    </tr>

    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="4" colspan="12" style="border: 1px solid #000000;"></td>
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
        <td colspan="12" style="background: #D0CECE; border: 1px solid #000000;">Firma del rector o representante de la escuela</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="background: #D0CECE; border: 1px solid #000000;">Nombre: {{$id->responsable_name}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="background: #D0CECE; border: 1px solid #000000;">Celular: {{$id->responsable_number}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="12" style="background: #D0CECE; border: 1px solid #000000;">Correo: {{$id->responsable_email}}</td>
    </tr>
</table>

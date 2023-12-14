{{-- V.1.5.20 06-01-2022 06:00:00 --}}
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
            FORMATO PARADAS DE RELOJ
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
        <td colspan="3" style="border: 1px solid #000000;">N° DE CASO IM:</td>
        <td colspan="2" style="border: 1px solid #000000;">{{ $item->num }}</td>
        <td style="border: 1px solid #000000;">FECHA:</td>
        <td colspan="2" style="border: 1px solid #000000;">{{ $item->date }}</td>
        <td colspan="4" style="border: 1px solid #000000;">EMPRESA COLABORADORA</td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $id->collaborating_company }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">1. INFORMACIÓN
            GENERAL</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">CONTRATO No.</td>
        <td colspan="11" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">CONTRATISTA</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">1042 de 2020</td>
        <td colspan="11" style="border: 1px solid #000000;">COMCEL SA</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            ID BENEFICIARIO
        </td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            ID MINTIC
        </td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            CENTRO POBLADO
        </td>
        <td colspan="3" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            SEDE INSTITUCIÓN EDUCATIVA O CASO
        </td>
        <td colspan="3" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            DEPARTAMENTO</td>
        <td colspan="3" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            MUNICIPIO
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $id->code }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $id->con_sede }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $id->population }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">
            {{ $id->name }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">
            {{ $id->dep }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">
            {{ $id->mun }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            2. PARADAS DE RELOJ
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">Descripción</td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">Fecha inicial</td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">Hora inicial</td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">Fecha fin</td>
        <td colspan="2" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">Hora fin</td>
        <td colspan="3" style="text-align: center; background: #D0CECE;border: 1px solid #000000;">
            Número de parada
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Vandalismo
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_1_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_1_date_init ? explode(' ', $item->cause_1_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_1_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_1_date_finilly ? explode(' ', $item->cause_1_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_1_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Robo
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_2_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_2_date_init ? explode(' ', $item->cause_2_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_2_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_2_date_finilly ? explode(' ', $item->cause_2_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_2_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Terrorismo
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_3_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_3_date_init ? explode(' ', $item->cause_3_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_3_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_3_date_finilly ? explode(' ', $item->cause_3_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_3_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Orden Público
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_4_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_4_date_init ? explode(' ', $item->cause_4_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_4_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_4_date_finilly ? explode(' ', $item->cause_4_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_4_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Paros Cívicos
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_5_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_5_date_init ? explode(' ', $item->cause_5_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_5_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_5_date_finilly ? explode(' ', $item->cause_5_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_5_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Desastres
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_6_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_6_date_init ? explode(' ', $item->cause_6_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_6_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_6_date_finilly ? explode(' ', $item->cause_6_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_6_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Descargas Atmosfericas
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_7_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_7_date_init ? explode(' ', $item->cause_7_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_7_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_7_date_finilly ? explode(' ', $item->cause_7_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_7_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - CD Energía Alternativa
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_8_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_8_date_init ? explode(' ', $item->cause_8_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_8_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_8_date_finilly ? explode(' ', $item->cause_8_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_8_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;
        ">Fuerza Mayor - Ausencia de Suministros
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_9_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_9_date_init ? explode(' ', $item->cause_9_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_9_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_9_date_finilly ? explode(' ', $item->cause_9_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_9_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Caso Fortuito - Centro Digital Temporizado</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_10_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_10_date_init ? explode(' ', $item->cause_10_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_10_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_10_date_finilly ? explode(' ', $item->cause_10_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_10_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Caso Fortuito - Fibra Daños Animales y/o Humanos</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_11_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_11_date_init ? explode(' ', $item->cause_11_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_11_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_11_date_finilly ? explode(' ', $item->cause_11_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_11_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Caso Fortuito - Manipulación elementos por Terceros</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_12_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_12_date_init ? explode(' ', $item->cause_12_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_12_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_12_date_finilly ? explode(' ', $item->cause_12_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_12_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Falla Energia Electrica en CD</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_13_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_13_date_init ? explode(' ', $item->cause_13_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_13_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_13_date_finilly ? explode(' ', $item->cause_13_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_13_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Falla Infraestructura fisica CD
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_14_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_14_date_init ? explode(' ', $item->cause_14_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_14_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_14_date_finilly ? explode(' ', $item->cause_14_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_14_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Falla Energia Comercial Zona</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_15_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_15_date_init ? explode(' ', $item->cause_15_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_15_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_15_date_finilly ? explode(' ', $item->cause_15_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_15_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Imposibilidad accesos BTS
            (Terceros, Bases Militares</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_16_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_16_date_init ? explode(' ', $item->cause_16_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_16_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_16_date_finilly ? explode(' ', $item->cause_16_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_16_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Imposibilidad accesos al CD</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_17_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_17_date_init ? explode(' ', $item->cause_17_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_17_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_17_date_finilly ? explode(' ', $item->cause_17_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_17_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Atribuible Terceros - Imposibilidad programar actividad
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_18_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_18_date_init ? explode(' ', $item->cause_18_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_18_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_18_date_finilly ? explode(' ', $item->cause_18_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_18_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Continuidad Servicio - Trabajo Programado</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_19_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_19_date_init ? explode(' ', $item->cause_19_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_19_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_19_date_finilly ? explode(' ', $item->cause_19_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_19_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Continuidad servicio - Instalaciones no disponibles -
            Fuera de horario</td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_20_date_init)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_20_date_init ? explode(' ', $item->cause_20_date_init)[1] : '' }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ explode(' ', $item->cause_20_date_finilly)[0] }}
        </td>
        <td colspan="2" style="border: 1px solid #000000;">
            {{ $item->cause_20_date_finilly ? explode(' ', $item->cause_20_date_finilly)[1] : '' }}
        </td>
        <td colspan="3" style="border: 1px solid #000000;">{{ $item->cause_20_num }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            Descripción de parada de Reloj 1.
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">{{ $item->description_1 }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            Descripción de parada de Reloj 2.
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">{{ $item->description_2 }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            Descripción de parada de Reloj 3.
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">{{ $item->description_3 }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            Descripción de parada de Reloj 4.
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">{{ $item->description_4 }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="text-align: center; background: #A6A6A6;border: 1px solid #000000;">
            DATOS DE QUIEN REPORTA LA PARADA DE RELOJ
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">NOMBRES Y APELLIDOS</td>
        <td colspan="12" style="text-align: center; border: 1px solid #000000;">
            {{ $item->responsable_name }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">CARGO</td>
        <td colspan="12" style="text-align: center; border: 1px solid #000000;">
            {{ $item->responsable_position }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">NÚMERO DE CEDULA</td>
        <td colspan="12" style="text-align: center; border: 1px solid #000000;">
            {{ $item->responsable_document }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">NÚMERO DE TELÉFONO O CELULAR</td>
        <td colspan="12" style="text-align: center; border: 1px solid #000000;">
            {{ $item->responsable_number }}
        </td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">CORREO ELECTRÓNICO</td>
        <td colspan="12" style="text-align: center; border: 1px solid #000000;">
            {{ $item->responsable_email }}</td>
    </tr>
    <tr>
        <td></td>
        <td rowspan="2" colspan="3" style="border: 1px solid #000000;">Firma</td>
        <td rowspan="2" colspan="12" style="text-align: center; border: 1px solid #000000;"></td>
    </tr>
</table>

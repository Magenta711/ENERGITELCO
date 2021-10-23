@php
function getAge($birthDate)
{
    $birthDate = explode("-", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
    ? ((date("Y") - intval($birthDate[0])))
    : (date("Y") - intval($birthDate[0])) - 1);

    return $age;
}
@endphp
 <table>
     <tr>
         <td colspan="16"></td>
     </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="8" rowspan="3" style="border: 1px solid #000000;text-align: center">CONTROL DE DOCUMENTACIÓN DE CONDUCTORES</td>
        <td colspan="2" style="border: 1px solid #000000;">Código</td>
        <td colspan="2" style="border: 1px solid #000000;">L-FR-23</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Versión</td>
        <td colspan="2" style="border: 1px solid #000000;">00</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Fecha</td>
        <td colspan="2" style="border: 1px solid #000000;">31/07/2018</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Fecha:</td>
        <td colspan="6" style="border: 1px solid #000000;">{{$data->created_at}}</td>
        <td colspan="2" style="border: 1px solid #000000;">Ciudad:</td>
        <td colspan="5" style="border: 1px solid #000000;">{{$data->city}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">Nombres y apellidos:</td>
        <td colspan="11" style="border: 1px solid #000000;">{{$data->user->name}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="5" style="border: 1px solid #000000;">Número de identificación:</td>
        <td colspan="3" style="border: 1px solid #000000;">{{$data->user->cedula}}</td>
        <td colspan="2" style="border: 1px solid #000000;">Ciudad:</td>
        <td colspan="5" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="7" style="border: 1px solid #000000;">Categoría de la licencia de conducción:</td>
        <td style="border: 1px solid #000000;">{{$data->category}}</td>
        <td colspan="4" style="border: 1px solid #000000;">Fecha de vigencia:</td>
        <td colspan="3" style="border: 1px solid #000000;">{{$data->effective_date}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="5" style="border: 1px solid #000000;">Inscripción ante el RUNT</td>
        <td colspan="10" style="border: 1px solid #000000;">{{$data->runt}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="5" style="border: 1px solid #000000;">Tipo de vehículo que conduce:</td>
        <td colspan="10" style="border: 1px solid #000000;">{{$data->moto ? 'Moto' : '' }} {{$data->car ? 'Carro' : '' }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">Edad (años):</td>
        <td colspan="2" style="border: 1px solid #000000;">{{getAge($data->user->register->date_birth)}}</td>
        <td colspan="4" style="border: 1px solid #000000;">Género:</td>
        <td colspan="2" style="border: 1px solid #000000;">Masculino</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;"></td>
        <td style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Grupo de trabajo al que pertenece:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" style="border: 1px solid #000000;">Administrativo</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Comercial</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Técnico</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Operativo</td>
        <td style="border: 1px solid #000000;"></td>
        <td style="border: 1px solid #000000;">Otro</td>
        <td style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Explique:</td>
        <td colspan="13" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Tipo de contrato:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Indefinido:</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Definido:</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Contratista:</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="2" style="border: 1px solid #000000;">Otro:</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">Explique:</td>
        <td colspan="13" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td style="border: 1px solid #000000;">Cargo:</td>
        <td style="border: 1px solid #000000;"></td>
        <td colspan="13" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="6" style="border: 1px solid #000000;">Experiencia en conducción (años):</td>
        <td style="border: 1px solid #000000;">{{$data->experience}}</td>
        <td colspan="8" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Reporte de comparendos y fotomultas e histórico de los mismos:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">FECHA</td>
        <td colspan="3" style="border: 1px solid #000000;">CIUDAD</td>
        <td colspan="3" style="border: 1px solid #000000;">VEHÍCULO</td>
        <td colspan="3" style="border: 1px solid #000000;">MOTIVO</td>
        <td colspan="4" style="border: 1px solid #000000;">OBSERVACIONES</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Conducir sin portar el Seguro Obligatorio de Accidentes de tránsito ordenado por la Ley. además, el vehículo será inmovilizado.</td>
    </tr>
    @forelse($data->reports as $key => $value)
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Control de ingreso de conductores con deudas de comparendos y fotomultas:</td>
    </tr>
    @forelse($data->controls as $key => $value)
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;">FECHA</td>
            <td colspan="3" style="border: 1px solid #000000;">CIUDAD</td>
            <td colspan="3" style="border: 1px solid #000000;">VEHÍCULO</td>
            <td colspan="3" style="border: 1px solid #000000;">MOTIVO</td>
            <td colspan="4" style="border: 1px solid #000000;">OBSERVACIONES</td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Reporte de accidentes:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">FECHA</td>
        <td colspan="3" style="border: 1px solid #000000;">CIUDAD</td>
        <td colspan="3" style="border: 1px solid #000000;">VEHÍCULO</td>
        <td colspan="3" style="border: 1px solid #000000;">RURAL/URBANO</td>
        <td colspan="4" style="border: 1px solid #000000;">OBSERVACIONES</td>
    </tr>
    @forelse($data->accidents as $key => $value)
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">Acciones realizadas en seguridad vial:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">• Exámenes físicos, de alcohol y drogas psicoactivas:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">TIPO DE EXAMEN</td>
        <td colspan="4" style="border: 1px solid #000000;">FECHA</td>
        <td colspan="3" style="border: 1px solid #000000;">RESULTADO</td>
        <td colspan="4" style="border: 1px solid #000000;">COMENTARIOS</td>
    </tr>
    @forelse($data->exams as $key => $value)
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="4" style="border: 1px solid #000000;"></td>
    </tr>
    @empty
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="3" style="border: 1px solid #000000;"></td>
        <td colspan="4" style="border: 1px solid #000000;"></td>
    </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">• Pruebas teóricas y prácticas realizadas:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" style="border: 1px solid #000000;">TIPO DE EXAMEN</td>
        <td colspan="4" style="border: 1px solid #000000;">FECHA</td>
        <td colspan="3" style="border: 1px solid #000000;">RESULTADO</td>
        <td colspan="4" style="border: 1px solid #000000;">COMENTARIOS</td>
    </tr>
    @forelse($data->tests as $key => $value)
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">• Capacitaciones recibidas:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" style="border: 1px solid #000000;">FECHA</td>
        <td colspan="3" style="border: 1px solid #000000;">TEMA</td>
        <td colspan="3" style="border: 1px solid #000000;">FACILITADOR</td>
        <td colspan="3" style="border: 1px solid #000000;">DURACIÓN</td>
        <td colspan="4" style="border: 1px solid #000000;">OBSERVACIONES</td>
    </tr>
    @forelse($data->tests as $key => $value)
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @empty
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="3" style="border: 1px solid #000000;"></td>
            <td colspan="4" style="border: 1px solid #000000;"></td>
        </tr>
    @endforelse
    <tr>
        <td></td>
        <td colspan="15" style="border: 1px solid #000000;">• Capacitaciones recibidas:</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8" style="border-left: 3px solid #000000; border-top: 3px solid #000000;border: 1px solid #000000;">FECHA DE REVISIÓN DE LA DOCUMENTACIÓN:</td>
        <td colspan="7" style="border-right: 3px solid #000000; border-top: 3px solid #000000;border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8" style="border-left: 3px solid #000000; border-bottom: 3px solid #000000;border: 1px solid #000000;">FECHA DE REVISIÓN DE LA DOCUMENTACIÓN:</td>
        <td colspan="7" style="border-right: 3px solid #000000; border-bottom: 3px solid #000000;border: 1px solid #000000;"></td>
    </tr>
 </table>
<table>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="5" style="border: 1px solid #000000">ETIQUETA QUE DEBE CONTENER CADA UNA DE LAS FOTOS TOMADAS EN LA ZONA DIGITAL A VERIFICAR</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="border: 1px solid #000000">ID BENEFICIARIO</td>
        <td colspan="2" style="border: 1px solid #000000">{{$id->code}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="border: 1px solid #000000">SEDE EDUCATIVA O CASO ESPECIAL</td>
        <td colspan="2" style="border: 1px solid #000000">{{$id->name}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="border: 1px solid #000000">COORDENADAS</td>
        <td style="border: 1px solid #000000">{{$id->project->lat}}</td>
        <td style="border: 1px solid #000000">{{$id->project->long}}</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td style="border: 1px solid #000000">FECHA</td>
        <td colspan="2" style="border: 1px solid #000000">{{ $id->date }}</td>
    </tr>
</table>

@php
    $i = 0;
    $counta = 0;
    $countb = 0;
    foreach ($id->inventories as $item){
        if ($item->station == 'a'){
            $counta++;
        }
        if ($item->station == 'b'){
            $countb++;
        }
    }
    if ($counta > $countb) {
        $compa = 'a';
    }else {
        $compa = 'b';
    }
@endphp
<table>
    <tr>
        <td rowspan="10"></td>
        <td></td>
        <td></td>
        <td></td>
        @foreach ($id->inventories as $item)
            @if ($item->station == $compa)
                <td style="width: 30px;">{{++$i}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td rowspan="9" style="border: 1px solid #000000;">Adjuntar en este espacio el NE Inventory</td>
        <td rowspan="9"></td>
        <td style="background:#8DB4E2;border: 1px solid #000000">
            NOMBRE ELEMENTO
        </td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px solid #000000;">{{$item->name_element}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000">CODIGO MATERIAL</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px solid #000000;">{{$item->code_material}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000">SERIAL/NUMERO PARTE</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px solid #000000;">{{$item->serial_part}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000;"><br><br><br><br><br>SITIO A<br><br><br><br><br></td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px solid #000000;text-align: center;color: #D9D9D9;">Foto</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td></td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td></td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000">
            NOMBRE ELEMENTO
        </td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px solid #000000;">{{$item->name_element}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000">CODIGO MATERIAL</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px solid #000000;">{{$item->code_material}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000">SERIAL/NUMERO PARTE</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px solid #000000;">{{$item->serial_part}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px solid #000000"><br><br><br><br><br>SITIO B<br><br><br><br><br></td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
            <td style="border: 1px solid #000000;text-align: center;color: #D9D9D9;">Foto</td>
            @endif
        @endforeach
    </tr>
</table>
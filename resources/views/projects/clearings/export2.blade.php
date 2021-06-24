@php
    $i = 0;
@endphp
<table>
    <tr>
        <td rowspan="10"></td>
        <td></td>
        <td></td>
        <td></td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td>{{++$i}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td rowspan="9" style="border: 1px">Adjuntar en este espacio el NE Inventory</td>
        <td rowspan="9"></td>
        <td style="background:#8DB4E2;border: 1px">
            NOMBRE ELEMENTO
        </td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px">{{$item->name_element}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">CODIGO MATERIAL</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px">{{$item->code_material}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">SERIAL/NUMERO PARTE</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px">{{$item->serial_part}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">SITIO A</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'a')
                <td style="border: 1px"></td>
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
        <td style="background:#8DB4E2;border: 1px">
            NOMBRE ELEMENTO
        </td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px">{{$item->name_element}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">CODIGO MATERIAL</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px">{{$item->code_material}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">SERIAL/NUMERO PARTE</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px">{{$item->serial_part}}</td>
            @endif
        @endforeach
    </tr>
    <tr>
        <td style="background:#8DB4E2;border: 1px">SITIO B</td>
        @foreach ($id->inventories as $item)
            @if ($item->station == 'b')
                <td style="border: 1px"></td>
            @endif
        @endforeach
    </tr>
</table>
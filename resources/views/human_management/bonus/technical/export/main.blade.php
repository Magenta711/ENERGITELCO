<table>
    <thead>
        <tr>
            {{-- Logo --}}
            <th style="background: #b7dee8"></th>
            <th colspan="2" style="text-align: center; background: #b7dee8">LISTADO BONIFICACIÓN DE TÉCNICOS</th>
            <th style="background: #b7dee8">Fecha inicio</th>
            <th style="background: #b7dee8">{{$id->start_date}}</th>
            <th style="background: #b7dee8">Fecha de corte</th>
            <th style="background: #b7dee8">{{$id->end_date}}</th>
        </tr>
        <tr>
            <th>Documento</th>
            <th>Funcionario</th>
            <th># Cuenta</th>
            <th>Cantidad </th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>     
            @php
                $count = 0;
                $total = 0;
            @endphp
            @foreach ($array as $key => $item)
                @if ($item['total'] > 0)
                    <tr>
                        <td>{{ $item['cedula'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['cuenta'] }}</td>

                        <td>{{ $item['count'] }}</td>
                        @php
                            $count += $item['count'];
                            $total += $item['total'];
                        @endphp
                        <td>${{ number_format($item['total'],2,',','.') }}</td>
                    </tr>
                @endif
            @endforeach
        <tr>
            <th colspan="3">Total</th>
            <th>{{ $count }}</th>
            <th>${{ number_format($total,2,',','.') }}</th>
        </tr>
    </tbody>
</table>
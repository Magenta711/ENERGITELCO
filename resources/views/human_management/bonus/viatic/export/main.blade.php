<table>
    <thead>
        <tr>
            {{-- Logo --}}
            <th style="background: #b7dee8"></th>
            <th colspan="5" style="text-align: center; background: #b7dee8">LISTADO COMICIONES PERMISOS DE TRABAJO</th>
            <th style="background: #b7dee8">Fecha inicio</th>
            <th colspan="2" style="background: #b7dee8">{{$id->start_date}}</th>
            <th style="background: #b7dee8">Fecha de corte</th>
            <th colspan="2" style="background: #b7dee8">{{$id->end_date}}</th>
        </tr>
        <tr>
            <th>Documento</th>
            <th>Funcionario</th>
            <th># Cuenta</th>
            <th>Cantidad </th>
            @if($id->created_at <= '2021-12-10 24:00:00')
                <th>Bonificación</th>
            @endif
            <th>Viáticos</th>
            <th>Pendientes</th>
            <th>Ajustes</th>
            
            <th>Caja menor</th>
            <th>Valores pendientes</th>

            <th>Total</th>
        </tr>
    </thead>
    <tbody>     
            @php
                if($id->created_at <= '2021-12-10 24:00:00'){
                    $t1 = 0;
                }
                $t2 = 0;
                $t3 = 0;
                $pen = 0;
                $aju = 0;
                $dis = 0;
                $count = 0;
                $totalBox = 0;
                $total = 0;
            @endphp
            @foreach ($array as $key => $item)
                @if ($item['total'] >= 50000)
                    <tr>
                        <td>{{ $item['cedula'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['cuenta'] }}</td>

                        <td>{{ $item['count'] }}</td>
                        @if($id->created_at <= '2021-12-10 24:00:00')
                            <td>${{ number_format($item['bonificacion'],2,',','.') }}</td>
                        @endif
                        <td>${{ number_format($item['viaticos'],2,',','.') }}</td>
                        <td>${{ number_format($item['pending'],2,',','.') }}</td>
                        <td>{{$item['ajustes'] > 0 ? '-' : ''}}${{ number_format($item['ajustes'],2,',','.') }}</td>
                        
                        <td>${{ number_format($item['caja'],2,',','.') }}</td>
                        <td>${{ number_format($item['discharges'],2,',','.') }}</td>
                        @php
                            $count += $item['count'];
                            if($id->created_at <= '2021-12-10 24:00:00'){
                                $t1 += $item['bonificacion'];
                            }
                            $t2 += $item['viaticos'];
                            $pen += $item['pending'];
                            $aju += $item['ajustes'];

                            $t3 += $item['caja'];
                            $dis += $item['discharges'];

                            $total += $item['total'];
                        @endphp
                        <td>${{ number_format($item['total'],2,',','.') }}</td>
                    </tr>
                @endif
            @endforeach
        <tr>
            <th colspan="3">Total</th>
            <th>{{ $count }}</th>
            @if($id->created_at <= '2021-12-10 24:00:00')
                <th>${{ number_format($t1,2,',','.') }}</th>
            @endif
            <th>${{ number_format($t2,2,',','.') }}</th>
            <th>${{ number_format($pen,2,',','.') }}</th>
            <th>{{$aju > 0 ? '-' : ''}}${{ number_format($aju,2,',','.') }}</th>
            <th>${{ number_format($t3,2,',','.') }}</th>
            <th>${{ number_format($dis,2,',','.') }}</th>
            <th>${{ number_format($total,2,',','.') }}</th>
        </tr>
    </tbody>
</table>
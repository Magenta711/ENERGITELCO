

<table>
    @foreach ($all as $cut)
        <thead>
            <tr>
                {{-- Logo --}}
                <th style="background: #b7dee8"></th>
                <th colspan="5" style="text-align: center; background: #b7dee8">LISTADO COMICIONES PERMISOS DE TRABAJO</th>
                <th style="background: #b7dee8">Fecha inicio</th>
                <th style="background: #b7dee8">{{$cut['start_date']}}</th>
                <th style="background: #b7dee8">Fecha de corte</th>
                <th style="background: #b7dee8">{{$cut['end_date']}}</th>
            </tr>
            <tr>
                <th>Documento</th>
                <th>Funcionario</th>
                <th># Cuenta</th>
                <th>Cantidad </th>

                <th>Bonificación</th>
                <th>Viáticos</th>
                <th>Pendientes</th>
                <th>Ajustes</th>
                
                <th>Caja menor</th>
                <th>Entregado</th>
                <th>Valores pendientes</th>

                <th>Total</th>
            </tr>
        </thead>
        <tbody>     
                @php
                    $t1 = 0;
                    $t2 = 0;
                    $t3 = 0;
                    $pen = 0;
                    $aju = 0;
                    $del = 0;
                    $dis = 0;
                    $count = 0;
                    $totalBox = 0;
                    $total = 0;
                @endphp
                @foreach ($cut['array'] as $key => $item)
                    {{-- @if ($item['total'] >= 50000) --}}
                        <tr>
                            <td>{{ $item['cedula'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['cuenta'] }}</td>

                            <td>{{ $item['count'] }}</td>

                            <td>{{ number_format($item['bonificacion'],2,',','.') }}</td>
                            <td>{{ number_format($item['viaticos'],2,',','.') }}</td>
                            <td>{{ number_format($item['pending'],2,',','.') }}</td>
                            <td>-{{ number_format($item['ajustes'],2,',','.') }}</td>
                            
                            <td>{{ number_format($item['caja'],2,',','.') }}</td>
                            <td>{{ number_format($item['deliverable'],2,',','.') }}</td>
                            <td>{{ number_format($item['discharges'],2,',','.') }}</td>
                            @php
                                $count += $item['count'];
                                $t1 += $item['bonificacion'];
                                $t2 += $item['viaticos'];
                                $pen += $item['pending'];
                                $del += $item['deliverable'];
                                $aju += $item['ajustes'];

                                $t3 += $item['caja'];
                                $dis += $item['discharges'];

                                $total += $item['total'];
                            @endphp
                            <td>{{ number_format($item['total'],2,',','.') }}</td>
                        </tr>
                    {{-- @endif --}}
                @endforeach
            <tr>
                <th colspan="3">Total</th>
                <th>{{ $count }}</th>
                <th>{{ number_format($t1,2,',','.') }}</th>
                <th>{{ number_format($t2,2,',','.') }}</th>
                <th>{{ number_format($pen,2,',','.') }}</th>
                <th>-{{ number_format($aju,2,',','.') }}</th>
                <th>{{ number_format($t3,2,',','.') }}</th>
                <th>{{ number_format($del,2,',','.') }}</th>
                <th>{{ number_format($dis,2,',','.') }}</th>
                <th>{{ number_format($total,2,',','.') }}</th>
            </tr>
            <tr>
                <th colspan="3">Total</th>
                <th>{{ $cut['formats'] }}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>{{ number_format($cut['value_bonu'],2,',','.') }}</th>
                <th>{{ number_format($cut['value_box'],2,',','.') }}</th>
                <th>{{ number_format($cut['total'],2,',','.') }}</th>
            </tr>
        </tbody>
    @endforeach
</table>
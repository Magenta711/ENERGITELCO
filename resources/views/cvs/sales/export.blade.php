<table>
    <thead>
        <tr>
            <th colspan="16" style="text-align: center; background: #7390ca">REPORTE DE VENTAS</th>
        </tr>
        <tr>
            <th>FECHA</th>
            <th>NOMBRE</th>
            <th>CEDULA</th>
            <th>MIN</th>
            <th>E-MAIL</th>
            <th>PLANTILLA</th>
            <th>D Ó F</th>
            <th>DESCRIPTION</th>
            <th>BODEGA O CVS</th>
            <th>IMEI</th>
            <th>ICC-ID</th>
            <th>TIPO DE ACTIVACIÓN</th>
            <th>TODO CLARO</th>
            <th>VALOR DE VENTA O RECAUDO</th>
            <th>NOMBRE DE VENDEDOR</th>
            <th>NOMBRE CAJERO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($details as $item)
            @if ($item->sale->status == 1)
                @if ($item->created_at->format('m') == $month)
                    <tr>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->sale->client->name }}</td>
                        <td>{{ $item->sale->client->document }}</td>
                        <td>{{ $item->sale->client->tel }}</td>
                        <td>{{ $item->sale->client->email }}</td>
                        <td>{{ $item->productable_type == "App\Models\cvs\inventory\cvs_inv_moviles" || $item->productable_type == "App\Models\cvs\inventory\cvs_inv_claro_service" ? (($item->payroll) ? $item->payroll : 'Null') :  'N/A' }}</td>
                        <td>{{ $item->type_sale }}</td>
                        <td>{{ $item->productable->description }}</td>
                        <td>{{ $item->sale->sede->name }}</td>
                        <td>{{ $item->productable_type == "App\Models\cvs\inventory\cvs_inv_moviles" ? $item->productable->cod : 'N/A' }}</td>
                        <td>{{ ($item->productable_type == "App\Models\cvs\inventory\cvs_inv_sim") ? $item->productable->cod : (($item->productable->icc_id) ? $item->productable->icc_id : 'N/A') }}</td>
                        <td>{{ $item->activation->name }}</td>
                        <td>..........</td>
                        <td>$ {{ number_format($item->total_value,2,',','.') }}</td>
                        <td>{{ $item->sale->user->name }}</td>
                        <td>{{ $item->sale->cashier->name }}</td>
                    </tr>
                @endif
            @endif
        @endforeach
    </tbody>
</table>
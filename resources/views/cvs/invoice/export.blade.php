<table>
    <thead>
        <tr>
            <th colspan="3" style="text-align: center; background: #7390ca">Corte de pago de caja</th>
        </tr>
        <tr>
            <th>Cajero</th>
            <th>Fecha anterior corte</th>
            <th>Fecha de corte</th>
        </tr>
        <tr>
            <th>{{ $cut->user->name }}</th>
            <th>{{ $cut->start_date }}</th>
            <th>{{ $cut->end_date }}</th>
        </tr>
        <tr>
            <th>FECHA</th>
            <th>DESCRIPCIÓN</th>
            <th>RECAUDO</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $key => $sale)    
            @foreach ($sale->details as $item)
                <tr>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->productable->description }}</td>
                    <td>$ {{ number_format($item->total_value,2,",",".") }}</td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="3">No tiene recaudo de ventas</td>
            </tr>
        @endforelse
        <tr style="font-weight: 700; font-size: 12pt">
            <th colspan="2">Total efectivo</th>
            <th>$ {{ number_format($cut->cash,2,",",".") }}</th>
        </tr>
        <tr style="font-weight: 700; font-size: 12pt">
            <th colspan="2">Total QR</th>
            <th>$ {{ number_format($cut->qr,2,",",".") }}</th>
        </tr>
        <tr style="font-weight: 700; font-size: 12pt">
            <th colspan="2">Total Tarjeta</th>
            <th>$ {{ number_format($cut->card,2,",",".") }}</th>
        </tr>
        <tr style="font-weight: 700; font-size: 12pt">
            <th colspan="2">Total</th>
            <th>$ {{ number_format($cut->value,2,",",".") }}</th>
        </tr>
    </tbody>
</table>
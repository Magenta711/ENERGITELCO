<table class="table-form">
    <thead>
        <tr style="background: cyan">
            <th></th>
            <th colspan="3">
                Lista de pagos
            </th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th># Cuenta</th>
            <th>Cédula</th>
            <th>Neto a pagar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->work_adds as $item)
            <tr>
                <td>{{ $item->user->cedula }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->register ? $item->user->register->bank_account : '' }}</td>
                <td>$ {{ number_format($item->total_pay,2,',','.') }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <th>Total</th>
            <th>$ {{ number_format($data->total_pay,2,',','.') }}</th>
        </tr>
    </tbody>
</table>
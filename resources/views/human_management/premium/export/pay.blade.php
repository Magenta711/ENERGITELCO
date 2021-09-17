<table class="table-form">
    <thead>
        <tr style="background: #FABF8F">
            <th></th>
            <th colspan="3">
                PRIMA DE SERVCIOS
            </th>
        </tr>
        <tr style="background: #FABF8F">
            <th>Cédula</th>
            <th>Nombre</th>
            <th># Cuenta</th>
            <th>Neto a pagar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data->users as $item)
            <tr>
                <td>{{ $item->user->cedula }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->register ? $item->user->register->bank_account : '' }}</td>
                <td>$ {{ number_format($item->total_pay_user,2,',','.') }}</td>
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
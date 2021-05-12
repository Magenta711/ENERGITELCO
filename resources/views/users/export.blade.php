<table>
    <thead>
        <tr>
            {{-- Logo --}}
            <th style="background: #b7dee8"></th>
            <th colspan="32" style="text-align: center; background: #b7dee8">LISTADO ACTUALIZADO DE EMPLEADOS</th>
            <th style="background: #b7dee8">FECHA</th>
            <th style="background: #b7dee8">{{now()->format('d/m/Y')}}</th>
        </tr>
        <tr>
            <th>NOMBRES Y APELLIDOS</th>
            <th>CÉDULA</th>
            <th>EMAIL</th>
            <th>TELÉFONO ASIGNADO EMPRESA</th>
            <th>DIRECCIÓN</th>
            <th>EDAD</th>
            <th>FECHA DE NACIMIENTO</th>
            <th>ESTADO CIVIL</th>
            <th>LUGAR DE RESIDENCIA</th>
            <th>BARRIO</th>
            <th>NACIONALIDAD</th>
            <th>SALUD</th>
            <th>ARL</th>
            <th>PENSIONES</th>
            <th>RH</th>
            <th>FECHA DE INGRESO</th>
            <th>EMPRESA CONTRATANTE</th>
            <th>CARGO</th>
            <th>ÁREA</th>
            <th>DÍA DE DESCANSO</th>
            <th>FECHA DEL ULTIMO CURSO DE ALTURAS</th>
            <th>PRÓXIMO CURSO DE ALTURAS</th>
            <th>NUMERO DE CUENTA</th>
            <th>TELÉFONO FIJO</th>
            <th>NOMBRE DE CONTACTO DE EMERGENCIA</th>
            <th>NUMERO DE CONTACTO PERSONAL</th>
            <th>TALLA CAMISA</th>
            <th>TALLA PANTALÓN</th>
            <th>TALLA BOTAS</th>
            <th>ULTIMA ENTREGA DE DOTACIÓN</th>
            <th>ÚLTIMO EXAMEN</th>
            {{-- <th>VACACIONES X CUMPLIR  2018</th>
            <th>VACACIONES X CUMPLIR 2019</th>
            <th>VACACIONES POR CUMPLIR 2020</th>
            <th>TOTAL VACACIONES CUMPLIDAS</th> --}}
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->cedula }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telefono }}</td>
            <td>{{ $user->direccion }}</td>
            <td>{{ $user->register ? $user->register->age : 'N/A'}}</td>
            <td>{{ $user->register ? $user->register->date_birth : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->marital_status : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->place_residence : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->neighborhood : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->nationality : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->eps : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->arl : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->pension : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->rh : 'N/A' }}</td>
            <td>{{ $user->register && $user->register->hasContract() ? $user->register->hasContract()->start_date : 'N/A' }}</td>
            <td>ENERGITELCO</td>
            <td>{{ $user->position->name }}</td>
            <td>{{ $user->area }}</td>
            <td>{{ $user->register && $user->register->hasContract() ? $user->register->hasContract()->day_breack : 'N/A'}}</td>
            <td>·······</td>
            <td>·······</td>
            <td>{{ $user->register ? $user->register->bank_account : 'N/A' }}</td>
            <td>·······</td>
            <td>{{ $user->register ? $user->register->emergency_contact : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->emergency_contact_number : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->shirt_size : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->pant_size : 'N/A' }}</td>
            <td>{{ $user->register ? $user->register->shoe_size : 'N/A' }}</td>
            <td>·······</td>
            <td>·······</td>
            {{-- <td>·······</td>
            <td>·······</td>
            <td>·······</td>
            <td>·······</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>
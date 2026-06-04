<div class="title text-center">
    <h3>PARAMETRO DE EVALUACIÓN</h3>
</div>
<hr>
<div class="row">
    <div class="table-responsable">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>SAP</td>
                    <td>DESCRIPCIÓN</td>
                    <td>BIEN</td>
                    <td>REGULAR</td>
                    <td>MAL</td>
                    <td>NO APLOCA</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}
                        <input type="hidden" name="check[{{ $item->id }}][name]" value="{{ $item->name }}">
                        </td>
                        <td class="text-center"><input type="radio" name="check[{{ $item->id }}][value]" value="BIEN"></td>
                        <td class="text-center"><input type="radio" name="check[{{ $item->id }}][value]" value="REGULAR"></td>
                        <td class="text-center"><input type="radio" name="check[{{ $item->id }}][value]" value="MAL"></td>
                        <td class="text-center"><input type="radio" name="check[{{ $item->id }}][value]" checked value="NO APLICA"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

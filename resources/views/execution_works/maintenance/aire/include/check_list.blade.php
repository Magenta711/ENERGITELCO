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
                    <td>SI</td>
                    <td>NO</td>
                    <td>N/A</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}
                        <input type="hidden" name="check[{{ $item->id }}][id]" value="{{ $item->name }}">
                        </td>
                        <td><input type="radio" name="check[{{ $item->id }}][value]" value="SI"></td>
                        <td><input type="radio" name="check[{{ $item->id }}][value]" checked value="NO"></td>
                        <td><input type="radio" name="check[{{ $item->id }}][value]" value="N/A"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

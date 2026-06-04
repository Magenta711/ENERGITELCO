<div class="title text-center">
    <h3>RED ELECTRICA EXTERNA</h3>
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
                    @if ($item->type==1)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}
                            <input type="hidden" name="check[{{ $loop->iteration }}][name]" value="{{ $item->name }}">
                            </td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="BIEN"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="REGULAR"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="MAL"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" checked value="NO APLICA"></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="title text-center">
    <h3>RED ELECTRICA INTERNA</h3>
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
                    @if ($item->type==2)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}
                            <input type="hidden" name="check[{{ $loop->iteration }}][name]" value="{{ $item->name }}">
                            </td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="BIEN"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="REGULAR"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" value="MAL"></td>
                            <td class="text-center"><input type="radio" name="check[{{ $loop->iteration }}][value]" checked value="NO APLICA"></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<table>
    <tr>
        <td style="width: 35px"></td>
        <td style="width: 114px"></td>
        <td style="width: 105px"></td>
        <td style="width: 105px"></td>
        <td style="width: 136px"></td>
        <td style="width: 109px"></td>
        <td style="width: 164px"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold">ENERGIA PARA TELECOMUNICACIONES SAS</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold">NIT 900 082 621 - 1</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold">CALLE 48 B NRO 66 - 65 MEDELLIN COLOMBIA</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold">FORMATO DE PRECOTIZACION PARA INSTALACION DE ENERGIA SOLAR</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold; border: 3px solid #000000;">CLIENTE Y UBICACIÓN DEL MISMO</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; font-weight:bold">CLIENTE:</td>
        <td colspan="4" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->client->name }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">NIT O CC:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->client->ide }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">UBICACIÓN:</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->locateProject }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; font-weight:bold">CLASE ON/OFF GRID</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->claseSystem }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">ESTRATO</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->estrato }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">CONSUMO MAX KW/H ULT 6M:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->consumo }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">TIPO DE PROYECTO A COTIZAR</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->typeProject }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold; border: 3px solid #000000;">OBJETIVO, DURACION DE OFERTA E IMPLEMENTACION</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">OBJETIVO DEL PROYECTO:</td>
        <td colspan="10" rowspan="3" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->objetivo_proyecto}}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">DESCRIPCION DEL PROYECTO:</td>
        <td colspan="10" rowspan="3" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->descripcion_proyecto}}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALIDEZ DE LA OFERTA:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->validez_oferta }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">FECHA DE LA OFERTA:</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;"></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">POLIZAS RC, PATRONALES Y RE:</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->polizas }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">GARANTIA EQUIPOS ELECTRONICOS:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->garantia_equipos }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">GARANTIA CELDAS SOLARES:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->garantia_celdas }}</td>
        <td colspan="4" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">GARANTIA MATERIALES ELECTRICOS Y OBRAS CIVILES:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->garantia_materiales }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VERIFICACION OPERACION SISTEMA:</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->verificacion_sistema }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">NIVEL SST:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->nivel_sst }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">MANTENIMIENTO INCLUIDO: </td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->mantenimiento }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">NOTA IMPORTANTE:</td>
        <td colspan="10" rowspan="2" style="background-color:#C4D79B; text-align: lelft; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->nota_importante }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold; border: 3px solid #000000;">OFERTA ECONOMICA DE LA PROPUESTA</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">FECHA PRESENTACION DE LA OFERTA:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;"></td>
        <td colspan="6" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">ACEPTACION MAXIMA DE OFERTA CON EMISION DE DOCUMENTO DE ORDEN DE COMPRA:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR USD:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->items->usd, 0, ',', '.') }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR 1 USD EQUIPOS:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->valores['Valor1'], 0, ',', '.') }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR 2 COP EQUIPOS:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->valores['Valor2'], 0, ',', '.') }}</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR 3 COP MANO OBRA Y CONSUMIBLES:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->valores['Valor3'], 0, ',', '.') }}</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR 4 CERTIFICACION Y TRAMITES:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->valores['Valor4'], 0, ',', '.') }}</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">VALOR 5 IMPUESTOS:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->valores['Valor5'], 0, ',', '.') }}</td>
        <td colspan="5" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold">FLUJO DE LA INVERSION:</td>
        <td colspan="10" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">ITEM</td>
        <td colspan="5" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">ITO</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">INVERSION</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR INVERSION ACUMULADA</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">AVANCE CALENDARIO IMPLEEMNTACION</td>
    </tr>
    @foreach ($id->flujos as $flujo)
        <tr>
            <td></td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $flujo->item }}</td>
            <td colspan="5" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000;">{{ $flujo->hito }}</td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ number_format($flujo->inversion, 0, ',', '.') }}% {{ $flujo->typeInversion }}</td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($flujo->valor, 2, ',', '.') }}</td>
            <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($flujo->valorAcumulado, 2, ',', '.') }}</td>
            <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000;">{{ $flujo->avance }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td colspan="9" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($flujo->valorAcumulado, 2, ',', '.') }}</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; font-weight:bold">FIN DE FASE IMPLEMENTACION E INICIO DE FASE PRODUCCION.</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">LISTADO DE PRECIOS</td>
        <td colspan="1" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">ITEM</td>
        <td colspan="5" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">DESCRIPCION</td>
        <td colspan="1" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR USD</td>
        <td colspan="1" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR COP</td>
        <td colspan="1" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">CANTIDAD</td>
        <td colspan="2" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">TOTAL</td>
    </tr>
    @foreach ($id->precios as $precio)
        <tr>
            <td></td>
            <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $precio->codigo }}</td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $precio->item }}</td>
            <td colspan="5" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000;">{{ $precio->descripcion }}</td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($precio->usd, 2, ',', '.') ?? 0}}</td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($precio->cop, 2, ',', '.') ?? 0}} </td>
            <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">{{ $precio->cantidad }}</td>
            <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($precio->total, 2, ',', '.') }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td colspan="6" rowspan="1" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR EN LETRAS:</td>
        <td colspan="4" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000; font-weight:bold">SUBTOTAL USD</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->totalUSD, 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="6" rowspan="2" style="background-color:#C4D79B; text-align: left; font-size: 8pt; border: 3px solid #000000; font-weight:bold">Notas
            <br>
            No hay
        </td>
        <td colspan="4" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000; font-weight:bold">SUBTOTAL COP</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->totalCOP, 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000; font-weight:bold">IVA SI APLICA </td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->totalCOP * ($id->items->iva / 100), 2, ',', '.') }}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="13" rowspan="1" style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold; border: 3px solid #000000;">FLUJO DE PRODUCCION Y RETORNO DE LA INVERSION</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">ESTRATO DEL PROYECTO:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->estrato }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR INVERSION:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 3px solid #000000;">${{ number_format($id->totalSistema, 2, ',', '.') }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">VALOR ACTUAL KW/H:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->items->valor_kw }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">OPERADOR DE RED:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->simulacion->Operador }}</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">CAPACIDAD INSTALADA KWp:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->capacidadInstalada }}</td>
        <td colspan="3" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">HORAS PROMEDIO DE PRODUCCION PROD./DIA:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->simulacion->PromProduccion }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">DIAS DE PRODUCCION AL AÑO:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;">{{ $id->simulacion->PromProduccionAnual }}</td>
        <td colspan="2" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000; font-weight:bold">FACTOR DE EFICIENCIA:</td>
        <td colspan="1" rowspan="1" style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 3px solid #000000;"></td>
    </tr>
    @foreach ($id->simulacion->kwh as $item)

    @endforeach
</table>

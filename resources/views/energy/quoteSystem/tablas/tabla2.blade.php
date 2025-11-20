        <table style="width: 100%; border-collapse: collapse;">

            <tr>
                <td colspan="13" rowspan="1"
                    style="background-color:#00B050; text-align: center; font-size: 9pt; font-weight: bold; border: 1px solid #000000;">
                    FLUJO DE PRODUCCION Y RETORNO DE LA INVERSION</td>
            </tr>
            <tr>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    ESTRATO DEL PROYECTO:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->estrato }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    VALOR INVERSION:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 1px solid #000000;">
                    ${{ number_format($id->totalSistema, 2, ',', '.') }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    VALOR ACTUAL KW/H:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->items->valor_kw }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    OPERADOR DE RED:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->simulacion->Operador }}</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                </td>
            </tr>
            <tr>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    CAPACIDAD INSTALADA KWp:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->capacidadInstalada }}</td>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    HORAS PROMEDIO DE PRODUCCION PROD./DIA:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->simulacion->PromProduccion }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    DIAS DE PRODUCCION AL AÑO:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->simulacion->PromProduccionAnual }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    FACTOR DE EFICIENCIA:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            @foreach ($id->produccionFinal as $key => $item)
                <tr>
                    <td colspan="3" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        FACTOR DE EFICIENCIA::</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['valor_factor'] }}</td>
                    <td colspan="9" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>


                </tr>
                <tr>
                    <td colspan="3" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        KW/H PRODUCIDOS AÑO {{ $key }}:</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['factor'] }}</td>
                    <td colspan="4" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        VALOR KW/H AÑO EN CURSO CON AUMENTO EN IPC ESTIMADO:</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['valor_kwh'] }}</td>
                    <td colspan="2" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        PRODUCCION AÑO {{ $key }} EN COP:</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['kwh'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        VALOR PRODUCCION AÑO: {{ $item['etiqueta'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['produccion'] }}</td>
                    <td colspan="3" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        VALOR PRODUCCION AÑO: {{ $item['etiqueta'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['mantenimiento'] }}</td>
                    <td colspan="3" rowspan="1"
                        style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                        VALOR COP ESTIMADO AÑO{{ $item['etiqueta'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $item['estimacion'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    TOTAL KW/H PRODUCIDOS DURANTE 30 AÑOS:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->totalProducido }}</td>
                <td colspan="8" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>

            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    TOTAL PRODUCCION ECONOMICA DEL PROYECTO:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->totalEstimacion }}</td>
                <td colspan="5" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 0px solid">Consumo
                    Promedio del cliente:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->simulacion->PromedioCO2 }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    TOTAL TONELADAS DE OXIGENO PRODUCIDAS:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->totalOxigeno }}</td>
                <td colspan="5" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 0px solid">CO2
                    FABRICACION DEL SISTEMA:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->FabricacionCO2 }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    PRODUCCION MENSUAL DE KW/H</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->produccionMensualKw }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">+/- 5%</td>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 0px solid">CO2
                    OPERACION Y MTTO:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">0
                </td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    AREA REQUERIDA PARA EL CULTIBO EN METROS CUADRADOS</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->areaRequerida }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">Medida
                    obligatoria 2,3 m x Largo hasta cumplir área</td>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 0px solid">CO2 ENERGIA
                    CONSUMIDA:</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->EnergiaCO2 }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    Radiación KW/h/metro cuadrado/día</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->radiacion }}</td>
                <td colspan="5" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 0px solid">CO2 TOTAL:
                </td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->TotalCO2 }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    PRODUCCION MENSUAL EN PESOS</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->produccionMensualCOP }}</td>
                <td colspan="8" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; font-weight:bold; border: 0px solid #C4D79B">
                    MESES DE RECUPERACION DE INVERSION</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                    {{ $id->MesesRecuperacion }}</td>
                <td colspan="8" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="9" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                <td colspan="1" rowspan="1"
                    style="background-color:#00B050; text-align: center; font-size: 8pt; border: 1px solid #000000; font-weight:bold">
                    ITEM</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#00B050; text-align: center; font-size: 8pt; border: 1px solid #000000; font-weight:bold">
                    DESCRIPCION</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#00B050; text-align: center; font-size: 8pt; border: 1px solid #000000; font-weight:bold">
                    CANTIDAD</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            @foreach ($id->simulacion->Equipos as $equipos)
                <tr>
                    <td colspan="9" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $equipos['item'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $equipos['descripcion'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 1px solid #000000;">
                        {{ $equipos['cantidad'] }}</td>
                    <td colspan="1" rowspan="1"
                        style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="9" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: right; font-size: 8pt; border: 1px solid #000000; font-weight:bold">
                    CAPACIDAD INSTALADA KWP</td>
                <td colspan="1" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">
                    {{ $id->capacidadInstalada }}</td>
                <td colspan="2" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="13" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="13" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="13" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; color:#00B050; font-size: 8pt; border: 0px solid">
                    NOTA: EL PROYECTO ESTA CALCULADO PARA LOGRAR REDUCIR LA CUENTA DE ENERGIA 48%, PERO ESTO OCURRE
                    MIENTRAS LAS CONDICIONES DE CONSUMO SIGAN IGUALES, ESTABLES EN CASO DE INCREMENTO APARECERA COSTO
                </td>
            </tr>
            <tr>
                <td colspan="13" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">DATOS
                    COMERCIALES DEL RESPONSABLE:</td>
                <td colspan="10" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">
                    {{ $id->responsable->name }}</td>
                <td colspan="10" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">
                    {{ $id->direccion_responsable }}</td>
                <td colspan="10" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">
                    {{ $id->telefeno_responsable }}</td>
                <td colspan="10" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid">
                    {{ $id->email }}</td>
                <td colspan="10" rowspan="1"
                    style="background-color:#C4D79B; text-align: center; font-size: 8pt; border: 0px solid"></td>
            </tr>
        </table>

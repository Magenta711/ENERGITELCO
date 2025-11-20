<?php

namespace App\Http\Controllers\energy\quote;

use App\Exports\CotizacionExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\energy\cotizaciones;
use App\models\energy\cotization\Precotizacion as precotizacion;
use App\Models\Energy\SolarClients;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

class QuoteEnergySystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['review', 'export', 'client_create', 'client_store']);
        $this->middleware('verified')->except(['review', 'export', 'client_create', 'client_store']);
        $this->middleware('permission:Ver Cotizaciones', ['only' => ['index']]);
        $this->middleware('permission:Crear Items Cotizaciones', ['only' => ['items', 'Items_store']]);
        $this->middleware('permission:Crear Cotizaciones', ['only' => ['store', 'create']]);
        $this->middleware('permission:Editar Cotizaciones', ['only' => ['update', 'edit']]);
        $this->middleware('permission:Eliminar Cotizaciones', ['only' => ['destroy']]);
    }

    public function review($token)
    {
        $id = precotizacion::where('token', $token)->first();
        $id = $this->Calculated($id);
        $retorno = $id->retorno;
        $formatted = [];
        foreach ($retorno as $mes => $valores) {
            $formatted[] = [
                'mes' => $mes,
                'kw' => $valores['KW'],
                'cop' => $valores['COP'],
                'retorno' => $valores['RETORNO'],
            ];
        }
        $id->retorno = $formatted;
        return view('energy.quoteSystem.review', compact('id'));
    }

    public function index()
    {
        $cotizacion = precotizacion::latest()->get();
        return view('energy.quoteSystem.index', compact('cotizacion'));
    }

    public function Items()
    {
        $item = [];
        $item = cotizaciones::latest()->first();
        return view('energy.quoteSystem.items.create', compact('item'));
    }
    public function Items_store(Request $request)
    {
        $data = request()->all();
        DB::begintransaction();
        try {
            $cotizacion = cotizaciones::create([
                'objetivo_proyecto'   => $data['objetivo_proyecto'],
                'descripcion_proyecto' => $data['descripcion_proyecto'],
                'validez_oferta'      => $data['validez_oferta'],
                'polizas'             => $data['polizas'],
                'garantia_equipos'    => $data['garantia_equipos'],
                'garantia_celdas'     => $data['garantia_celdas'],
                'garantia_materiales' => $data['garantia_materiales'],
                'verificacion_sistema' => $data['verificacion_sistema'],
                'nivel_sst'           => $data['nivel_sst'],
                'mantenimiento'       => $data['mantenimiento'],
                'nota_importante'     => $data['nota_importante'],
                'iva'                 => $data['Iva'],
                'valor_kw'            => $data['ValorKW'],
                'potenciaPanel'       => $data['potenciaPanel'],
                'margenError'         => $data['margenError'],
            ]);

            if (!empty($data['flujo'])) {
                foreach ($data['flujo'] as $flujo) {
                    $cotizacion->flujos()->create($flujo);
                }
            }

            if (!empty($data['precios'])) {
                foreach ($data['precios'] as $precio) {
                    $precio['panel'] = ($data['panel'] == $precio['item']) ? 'Si' : 'No';
                    $precio['total'] = ($precio['typeInversion'] != 'Valor2' ? $precio['cop'] * $precio['cantidad'] : $precio['usd'] * $precio['cantidad']);
                    $cotizacion->precios()->create($precio);
                }
            }

            $cotizacion->simulacionItems()->create([
                'Operador'              => $data['Operador'],
                'PromProduccion'        => $data['PromProduccion'],
                'PromProduccionAnual'   => $data['PromProduccionAnual'],
                'PromedioCO2'           => $data['PromedioCO2'],
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
                'Equipos'               => $data['Equipos'],
                'FormulaValor3'         => $data['FormulaValor3'],
                'FormulaValor4'         => $data['FormulaValor4'],
            ]);

            DB::commit();
            return redirect()->route('quote_energy_system.index')->with('success', 'Items de cotización actualizados exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al crear la cotización: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $plantilla = [];
        $client = SolarClients::get();
        $plantilla = cotizaciones::latest()->first();
        return view('energy.quoteSystem.create', compact('plantilla', 'client'));
    }

    public function store(Request $request)
    {
        $data = request()->all();
        DB::begintransaction();
        try {
            if ($data['newCliente'] ==  1) {
                $client = SolarClients::create([
                    'name'      => $data['nameNew'],
                    'typeId'    => $data['typeIdNew'],
                    'ide'    => $data['ideNew'],
                    'email'    => $data['emailNew'],
                    'tel'    => $data['telNew'],
                ]);

                $data['client'] = $client->id;
            }

            $precotizacion = precotizacion::create([
                'token'                         => $data['_token'],
                'client_id'                     => $data['client'],
                'locateProject'                 => $data['locateProject'],
                'claseSystem'                   => $data['claseSystem'],
                'typeProject'                   => $data['typeProject'],
                'estrato'                       => $data['estrato'],
                'consumo'                       => $data['consumo'],
                'radiacion'                     => $data['radiacion'],
                'responsable_id'                => $data['responsable_id'],
                'telefeno_responsable'          => $data['responsable_telefono'],
                'direccion_responsable'         => $data['responsable_direccion'],
                'email'                         => $data['responsable_correo'],
                'potenciaPanel'                 => $data['potenciaPanel'],
                'margenError'                   => $data['margenError'],
                'alturaPanel'                   => $data['alturaPanel'],
                'trasiego'                      => $data['trasiego'],
                'distanPuntos'                  => $data['distanPuntos'],
                'status_files'                  => 'Sin Archivos',
            ]);

            $precotizacion->items()->create([
                'precotizacion_id'    => $precotizacion->id,
                'objetivo_proyecto'   => $data['objetivo_proyecto'],
                'descripcion_proyecto' => $data['descripcion_proyecto'],
                'validez_oferta'      => $data['validez_oferta'],
                'fecha_oferta'        => $data['fecha_oferta'],
                'fin_oferta'          => $data['fin_oferta'],
                'polizas'             => $data['polizas'],
                'garantia_equipos'    => $data['garantia_equipos'],
                'garantia_celdas'     => $data['garantia_celdas'],
                'garantia_materiales' => $data['garantia_materiales'],
                'verificacion_sistema' => $data['verificacion_sistema'],
                'nivel_sst'           => $data['nivel_sst'],
                'mantenimiento'       => $data['mantenimiento'],
                'nota_importante'     => $data['nota_importante'],
                'iva'                 => $data['Iva'],
                'valor_kw'            => $data['ValorKW'],
                'usd'                 => $data['usd'],
            ]);

            if (!empty($data['flujo'])) {
                foreach ($data['flujo'] as $flujo) {
                    $precotizacion->flujos()->create($flujo);
                }
            }

            if (!empty($data['precios'])) {
                foreach ($data['precios'] as $precio) {
                    $precio['panel'] = ($data['panel'] == $precio['item']) ? 'Si' : 'No';
                    $precio['total'] = ($precio['typeInversion'] != 'Valor2' ? $precio['cop'] * $precio['cantidad'] : $precio['usd'] * $precio['cantidad']);
                    $precotizacion->precios()->create($precio);
                }
            }

            $precotizacion->simulacion()->create([
                'Operador'              => $data['Operador'],
                'PromProduccion'        => $data['PromProduccion'],
                'PromProduccionAnual'   => $data['PromProduccionAnual'],
                'PromedioCO2'           => $data['PromedioCO2'],
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
                'Equipos'               => $data['Equipos'],
                'FormulaValor3'         => $data['FormulaValor3'],
                'FormulaValor4'         => $data['FormulaValor4'],
            ]);

            $CuntItems = count($precotizacion->precios) + count($precotizacion->flujos) + count($precotizacion->simulacion->Equipos);
            $Position = [];
            $Position = [
                'Servicios' => 'C' . ($CuntItems + 84),
                'Mapa' => 'C' . ($CuntItems + 104),
            ];

            if ($request->hasFile('file_servicios')) {
                $file = $request->file('file_servicios');
                if ($file !== null) {
                    $name = 'Servicios_' . time() . '.' . $file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/energy/quotes', $file, $name);
                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => 'Servicios',
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'place' => $Position['Servicios'],
                        'state' => 1
                    ]);
                }
            }

            if ($request->hasFile('file_maps')) {
                $file = $request->file('file_maps');
                if ($file !== null) {
                    $name = 'Mapa_' . time() . '.' . $file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/energy/quotes', $file, $name);
                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => 'Mapa',
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'place' => $Position['Mapa'],
                        'state' => 1,
                    ]);
                }
            }

            DB::commit();

            Mail::send('energy.quoteSystem.email.admin_email', ['id' => $precotizacion], function ($mail) use ($precotizacion) {
                $mail->subject("SE HA GENERADO UNA COTIZACIÓN DE UN SISTEMA SOLAR");
                $mail->to('solar@energitelco.com', 'Energitelco SAS');
            });

            return redirect()->route('quote_energy_system.index')->with('success', 'Items de precotización creados exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al crear la cotización: ' . $e->getMessage());
        }
    }

    public function client_create()
    {
        $plantilla = [];
        $plantilla = cotizaciones::latest()->first();
        return view('energy.quoteSystem.client', compact('plantilla'));
    }

    public function client_store(Request $request)
    {
        $data = request()->all();
        DB::begintransaction();
        try {
            $client_exists = SolarClients::where('ide', $data['ideNew'])->first();
            $data['client'] = $client_exists ? $client_exists->id : null;
            if (!$client_exists) {
                $client = SolarClients::create([
                    'name'      => $data['nameNew'],
                    'typeId'    => $data['typeIdNew'],
                    'ide'    => $data['ideNew'],
                    'email'    => $data['emailNew'],
                    'tel'    => $data['telNew'],
                ]);
                $data['client'] = $client->id;
            }

            $plantilla = cotizaciones::latest()->first();

            $precotizacion = precotizacion::create([
                'token'         => $data['_token'],
                'client_id'     => $data['client'],
                'locateProject' => $data['ciudad'],
                'direccion' => $data['direccion'],
                'claseSystem'   => $data['claseSystem'],
                'typeProject'   => $data['typeProject'],
                'estrato'       => $data['estrato'],
                'consumo'       => $data['consumo'],
                'status'        => 'Solicitado',
            ]);

            if ($request->hasFile('file_servicios')) {
                $file = $request->file('file_servicios');
                if ($file !== null) {
                    $name = 'Servicios_' . $data['ciudad'] . time() . '.' . $file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/energy/quotes', $file, $name);
                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => 'Servicios',
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'place' => 'C105',
                        'state' => 1
                    ]);
                }
            }

            $precotizacion->items()->create([
                'objetivo_proyecto'   => $plantilla['objetivo_proyecto'],
                'descripcion_proyecto' => $plantilla['descripcion_proyecto'],
                'validez_oferta'      => $plantilla['validez_oferta'],
                'fecha_oferta'        => $plantilla['fecha_oferta'],
                'fin_oferta'          => $plantilla['fin_oferta'],
                'polizas'             => $plantilla['polizas'],
                'garantia_equipos'    => $plantilla['garantia_equipos'],
                'garantia_celdas'     => $plantilla['garantia_celdas'],
                'garantia_materiales' => $plantilla['garantia_materiales'],
                'verificacion_sistema' => $plantilla['verificacion_sistema'],
                'nivel_sst'           => $plantilla['nivel_sst'],
                'mantenimiento'       => $plantilla['mantenimiento'],
                'nota_importante'     => $plantilla['nota_importante'],
                'iva'                 => $plantilla['Iva'],
                'valor_kw'            => $plantilla['ValorKW'],
                'usd'                 => $plantilla['usd'],
                'potenciaPanel'       => $plantilla['potenciaPanel'],
                'margenError'         => $plantilla['margenError'],
                'alturaPanel'         => $plantilla['alturaPanel'],
                'trasiego'            => $plantilla['trasiego'],
                'distanPuntos'        => $plantilla['distanPuntos'],
            ]);
            $precotizacion->flujos()->createMany($plantilla->flujos->toArray());

            $precotizacion->precios()->createMany($plantilla->precios->toArray());

            $precotizacion->simulacion()->create([
                'Operador'              => $plantilla->simulacionItems->Operador,
                'PromProduccion'        => $plantilla->simulacionItems->PromProduccion,
                'PromProduccionAnual'   => $plantilla->simulacionItems->PromProduccionAnual,
                'PromedioCO2'           => $plantilla->simulacionItems->PromedioCO2,
                'kwh_ipc'               => $plantilla->simulacionItems->kwh_ipc,
                'factor_potencia'       => $plantilla->simulacionItems->factor_potencia,
                'Equipos'               => $plantilla->simulacionItems->Equipos,
            ]);

            Mail::send('energy.quoteSystem.email.solicitud_email', ['id' => $precotizacion], function ($mail) use ($precotizacion) {
                $mail->subject("UN CLIENTE HA SOLICITADO UNA COTIZACIÓN DE SU SISTEMA SOLAR");
                $mail->to('solar@energitelco.com', 'Energitelco SAS');
            });

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['error' => 'Error al crear la cotización: ' . $th->getMessage()], 500);
        }
    }

    public function generated(precotizacion $id)
    {
        $id = $this->Calculated($id);
        // return $id->files;
        $retorno = $id->retorno;
        $formatted = [];
        foreach ($retorno as $mes => $valores) {
            $formatted[] = [
                'mes' => $mes,
                'kw' => $valores['KW'],
                'cop' => $valores['COP'],
                'retorno' => $valores['RETORNO'],
            ];
        }
        $id->retorno = $formatted;

        return view('energy.quoteSystem.generated', compact('id'));
    }

    public function FormulasValor($formula, $precios, $iva)
    {
        $resultado = 0;
        $items = [];
        // Reemplazar las referencias de items en la fórmula con sus valores correspondientes
        foreach ($precios as $index => $precio) {
            $itemNumber = $precio->item;
            $items[$itemNumber] = $precio->total;
        }
        // Valores por defecto si no se encuentran en la fórmula
        if (empty($items)) {
            return 0;
        }

        // Valores generales del sistema (Total, IVA, etc.)
        $generalValues = [
            'TotalCOP' => $precios->where('typeInversion', '!=', 'Valor2')->sum('total'),
            'TotalUSD' => $precios->where('typeInversion', 'Valor2')->sum('total'),
            'IVA' => $precios->where('typeInversion', '!=', 'Valor2')->sum('total') * $iva,
        ];

        foreach ($generalValues as $key => $value) {
            # Reemplazar en la fórmula
            $items[$key] = $value;
        }

        // Reemplazar en la fórmula, los valores totales por el numero del item
        foreach ($items as $key => $value) {
            $formula = preg_replace('/\b' . preg_quote($key, '/') . '\b/', $value, $formula);
        }

        // Validar que la fórmula solo contenga números y operadores permitidos
        if (!preg_match('/^[0-9+\-.*\/() ]+$/', $formula)) {
            return 0;
        }

        // Evaluar la fórmula de manera segura
        try {
            // eval es peligroso, pero aquí se usa con precaución después de la validación
            // su función es evaluar la expresión matemática
            eval('$resultado = ' . $formula . ';');
        } catch (\Throwable $th) {
            return 0;
        }

        return $resultado;
    }

    public function Calculated($id)
    {
        // Realizar los cálculos necesarios para la cotización
        $totalCOP = 0;
        $totalUSD = 0;
        // Inicializa los valores
        $valores = [
            'Valor2' => 0,
            'Valor3' => 0,
            'Valor4' => 0,
            'Valor5' => 0,
        ];

        foreach ($id->precios as $precio) {
            if ($precio->typeInversion != 'Valor2') {
                $id->totalCOP += $precio->total;
            } else {
                $id->totalUSD += $precio->total;
            }
            // if (isset($valores[$precio->typeInversion])) {
            //     $valores[$precio->typeInversion] += $precio->total;
            // }
        }
        // Calcula los valores predeterminados
        $valores['Valor1'] = $id->totalUSD;
        $valores['Valor2'] = $id->totalUSD * $id->items->usd;
        $valores['Valor5'] = $id->totalCOP * ($id->items->iva / 100);

        // Calcula los valores basados en fórmulas
        $valores['Valor3'] = $this->FormulasValor($id->simulacion->FormulaValor3, $id->precios, $id->items->iva);
        $valores['Valor4'] = $this->FormulasValor($id->simulacion->FormulaValor4, $id->precios, $id->items->iva);
        $id->valores = $valores;

        //Calcula el valor total del flujo
        $valorAcumulado = 0;
        foreach ($id->flujos as $flujo) {
            $flujo->valor = $valores[$flujo->typeInversion] * ($flujo->inversion / 100);
            $valorAcumulado += $flujo->valor;
            $flujo->valorAcumulado = $valorAcumulado;
        }

        // Selección de paneles y cálculos relacionados
        $panelSeleccionado = $id->precios->where('panel', 'Si')->first();
        if ($panelSeleccionado) {
            $id->cantidadPaneles = $panelSeleccionado->cantidad;
        } else {
            $id->cantidadPaneles = $id->precios[3]->cantidad;
        }
        $id->capacidadInstalada = ($id->cantidadPaneles * $id->potenciaPanel);
        $produccionGeneral = $id->capacidadInstalada * $id->radiacion * $id->simulacion->PromProduccionAnual;
        // Armado de potencias
        $potencias = [];
        foreach ($id->simulacion->kwh_ipc as $key => $value) {
            $potencias[$key]['kwh'] = $value;
            $potencias[$key]['factor'] = $id->simulacion->factor_potencia[$key];
        }
        // Totales de producción
        $id->produccionFinal = $this->ProduccionAnual($potencias, $produccionGeneral);
        $id->totalProducido = array_sum(array_column($id->produccionFinal, 'produccion'));
        $id->totalEstimacion = array_sum(array_column($id->produccionFinal, 'estimacion'));
        $id->totalOxigeno = $id->totalProducido * 0.21;
        $id->produccionMensualKw = ($id->capacidadInstalada * 30 * $id->radiacion) * $id->margenError;
        $id->areaRequerida = ($id->precios[3]->cantidad * 2.3 * 1.15);
        $id->produccionMensualCOP = $id->produccionMensualKw * $id->items->valor_kw;
        $id->MesesRecuperacion = round($flujo->valorAcumulado / $id->produccionMensualCOP, 1);
        $id->TotalCO2 = 0;
        $id->TotalCO2 += $id->FabricacionCO2 = $id->produccionMensualKw * 50 / 1000;
        $id->TotalCO2 += $id->EnergiaCO2 = $id->produccionMensualKw * 0.5;
        $id->TotalCO2 = ($id->TotalCO2 / 100) * 12;
        $id->totalSistema = $id->totalCOP + $valores['Valor5'] + ($id->totalUSD * $id->items->usd);
        $id->descuentoRenta = ($id->valores['Valor2'] + $id->valores['Valor3'] + $id->valores['Valor4']) / 2;
        $id->totalInversion = $id->totalSistema - $id->descuentoRenta - $id->valores['Valor5'];
        $id->retorno = $this->Retorno($id->produccionMensualKw, $id->produccionMensualCOP, $id->totalSistema);
        $id->retornoImpuesto = $this->RetornoImpuesto($id->produccionMensualKw, $id->produccionMensualCOP, $id->totalSistema);
        return $id;
    }

    public function RetornoImpuesto($mensualKW, $mensualCOP, $totalSistema)
    {
        $Acumulado = [];
        $mesKW = 0;
        $mesCOP = 0;
        $factores = [1, 1.08, 1.15, 1.22, 1.29];
        $valor = 0;
        $factor = 1;
        for ($i = 1; $i <= 36; $i++) {
            $mesKW += $mensualKW;
            $Acumulado[$i]['KW'] = round($mesKW, 1);
            if (in_array($i, [13, 25, 37, 49]) && $valor < count($factores) - 1) {
                $valor++;
                $factor = $factores[$valor];
            }

            switch ($i) {
                case 1:
                case 2:
                case 3:
                    $mesCOP = $mensualCOP;
                    break;

                case 4:
                    $mesCOP += $mensualCOP * $factor * 3;
                    break;

                case 12:
                    $mesCOP += $mensualCOP * $factor * 11;
                    break;

                default:
                    $mesCOP += $mensualCOP * $factor;
                    break;
            }

            $Acumulado[$i]['COP'] = round($mesCOP, 2);
            $Acumulado[$i]['RETORNO'] = round($totalSistema - $mesCOP, 2);
        }
        return $Acumulado;
    }

    public function Retorno($mensualKW, $mensualCOP, $totalSistema)
    {
        $Acumulado = [];
        $mesKW = 0;
        $mesCOP = 0;
        $factores = [1, 1.08, 1.15, 1.22, 1.29];
        $valor = 0;
        $factor = 1;
        for ($i = 1; $i <= 60; $i++) {
            $mesKW += $mensualKW;
            $Acumulado[$i]['KW'] = round($mesKW, 1);
            if (in_array($i, [13, 25, 37, 49]) && $valor < count($factores) - 1) {
                $valor++;
                $factor = $factores[$valor];
            }
            $mesCOP += ($mensualCOP * $factor);
            $Acumulado[$i]['COP'] = round($mesCOP, 2);
            $Acumulado[$i]['RETORNO'] = round($totalSistema - $mesCOP, 2);
        }
        return $Acumulado;
    }

    public function ProduccionAnual($potencias, $capacidadInstalada)
    {
        $produccionAnual = [];
        foreach ($potencias as $key => $value) {
            $kwProducidos = [];
            $kwProducidos['valor_kwh'] = $value['kwh'];
            $kwProducidos['valor_factor'] = $value['factor'];
            $kwProducidos['factor'] = $value['factor'] * $capacidadInstalada;
            $kwProducidos['kwh'] =  $value['kwh'] * $kwProducidos['factor'];
            $kwProducidos['produccion'] =  $kwProducidos['kwh'] * 5;

            $kwProducidos['mantenimiento'] =  $kwProducidos['produccion'] * 0.1;
            $kwProducidos['estimacion'] =  $kwProducidos['produccion'] - $kwProducidos['mantenimiento'];

            $kwProducidos['factor'] = round($kwProducidos['factor'], 4);
            $kwProducidos['kwh'] = round($kwProducidos['kwh'], 4);
            $kwProducidos['produccion'] = round($kwProducidos['produccion'], 4);
            $kwProducidos['mantenimiento'] = round($kwProducidos['mantenimiento'], 3);
            $kwProducidos['estimacion'] = round($kwProducidos['estimacion'], 3);

            $inicio = $key;
            $fin = $inicio + 4;
            $kwProducidos['etiqueta'] = " $inicio AL $fin";

            $produccionAnual[$key] = $kwProducidos;
        }
        return $produccionAnual;
    }

    public function edit($id)
    {
        $plantilla = precotizacion::find($id);
        $file_servicios = $plantilla->files->where('description', 'Servicios')->first();
        $file_maps = $plantilla->files->where('description', 'Mapa')->first();
        $plantilla->file_servicios = $file_servicios;
        $plantilla->file_maps = $file_maps;
        return view('energy.quoteSystem.edit', compact('plantilla'));
    }

    public function update(Request $request, precotizacion $id)
    {
        $data = request()->all();
        return $data['flujo'];
        // DB::begintransaction();
        // try {
            $status = $id->status == 'Solicitado' ? 'Pendiente' : $id->status;

            $id->update([
                'token'                         => $data['_token'],
                'locateProject'                 => $data['locateProject'],
                'claseSystem'                   => $data['claseSystem'],
                'typeProject'                   => $data['typeProject'],
                'estrato'                       => $data['estrato'],
                'consumo'                       => $data['consumo'],
                'radiacion'                     => $data['radiacion'],
                'status'                        => $status,
                'responsable_id'                => $data['responsable_id'],
                'telefeno_responsable'          => $data['responsable_telefono'],
                'direccion_responsable'         => $data['responsable_direccion'],
                'email'                         => $data['responsable_correo'],
                'potenciaPanel'                 => $data['potenciaPanel'],
                'margenError'                   => $data['margenError'],
                'alturaPanel'                   => $data['alturaPanel'],
                'trasiego'                      => $data['trasiego'],
                'distanPuntos'                  => $data['distanPuntos'],
                'status_files'                  => 'Pendiente',
            ]);

            $id->items()->update([
                'objetivo_proyecto'   => $data['objetivo_proyecto'],
                'descripcion_proyecto' => $data['descripcion_proyecto'],
                'validez_oferta'      => $data['validez_oferta'],
                'fecha_oferta'        => $data['fecha_oferta'],
                'fin_oferta'          => $data['fin_oferta'],
                'polizas'             => $data['polizas'],
                'garantia_equipos'    => $data['garantia_equipos'],
                'garantia_celdas'     => $data['garantia_celdas'],
                'garantia_materiales' => $data['garantia_materiales'],
                'verificacion_sistema' => $data['verificacion_sistema'],
                'nivel_sst'           => $data['nivel_sst'],
                'mantenimiento'       => $data['mantenimiento'],
                'nota_importante'     => $data['nota_importante'],
                'iva'                 => $data['Iva'],
                'valor_kw'            => $data['ValorKW'],
                'usd'                 => $data['usd'],

            ]);

            $id->flujos()->delete();
            // $id->precios()->delete();
            // $id->simulacion()->delete();

            if (!empty($data['flujo'])) {
                foreach ($data['flujo'] as $flujo) {
                    $id->flujos()->create($flujo);
                }
            }

            // if (!empty($data['precios'])) {
            //     foreach ($data['precios'] as $precio) {
            //         $precio['panel'] = ($data['panel'] == $precio['item']) ? 'Si' : 'No';
            //         $precio['total'] = ($precio['typeInversion'] != 'Valor2' ? $precio['cop'] * $precio['cantidad'] : $precio['usd'] * $precio['cantidad']);
            //         $id->precios()->create($precio);
            //     }
            // }

            // $id->simulacion()->create([
            //     'Operador'              => $data['Operador'],
            //     'PromProduccion'        => $data['PromProduccion'],
            //     'PromProduccionAnual'   => $data['PromProduccionAnual'],
            //     'PromedioCO2'           => $data['PromedioCO2'],
            //     'kwh_ipc'               => $data['kwh_ipc'],
            //     'factor_potencia'       => $data['factor_potencia'],
            //     'Equipos'               => $data['Equipos'],
            //     'FormulaValor3'         => $data['FormulaValor3'],
            //     'FormulaValor4'         => $data['FormulaValor4'],
            // ]);

        //     $CuntItems = count($id->precios) + count($id->flujos) + count($id->simulacion->Equipos);
        //     $Position = [];
        //     $Position = [
        //         'Servicios' => 'C' . ($CuntItems + 84),
        //         'Mapa' => 'C' . ($CuntItems + 104),
        //     ];

        //     if ($request->hasFile('file_Servicios')) {
        //         $file = $request->file('file_Servicios');
        //         $oldFile = $id->files->where('description', 'Servicios')->first();

        //         if ($oldFile) {
        //             if (Storage::exists($oldFile->url)) {
        //                 Storage::delete($oldFile->url);
        //             }
        //             $oldFile->delete();
        //         }
        //         if ($file !== null) {
        //             $name = 'Servicios_' . time() . '.' . $file->getClientOriginalExtension();
        //             $size = $file->getClientSize() / 1000;
        //             $path = Storage::putFileAs('public/energy/quotes', $file, $name);
        //             $id->files()->create([
        //                 'name' => $name,
        //                 'description' => 'Servicios',
        //                 'size' => $size . ' KB',
        //                 'url' => $path,
        //                 'type' => $file->getClientOriginalExtension(),
        //                 'place' => $Position['Servicios'],
        //                 'state' => 1
        //             ]);
        //         }
        //     }

        //     if ($request->hasFile('file_Mapa')) {
        //         $file = $request->file('file_Mapa');
        //         if ($file !== null) {
        //             $oldFile = $id->files->where('description', 'Mapa')->first();
        //             if ($oldFile) {
        //                 if (Storage::exists($oldFile->url)) {
        //                     Storage::delete($oldFile->url);
        //                 }
        //                 $oldFile->delete();
        //             }
        //             $name = 'Mapa_' . time() . '.' . $file->getClientOriginalExtension();
        //             $size = $file->getClientSize() / 1000;
        //             $path = Storage::putFileAs('public/energy/quotes', $file, $name);
        //             $id->files()->create([
        //                 'name' => $name,
        //                 'description' => 'Mapa',
        //                 'size' => $size . ' KB',
        //                 'url' => $path,
        //                 'type' => $file->getClientOriginalExtension(),
        //                 'place' => $Position['Mapa'],
        //                 'state' => 1,
        //             ]);
        //         }
        //     }

        //     DB::commit();
        //     return redirect()->route('quote_energy_system.index')->with('success', 'Items de precotización actualizados exitosamente');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('error', 'Error al actualizar la cotización: ' . $e->getMessage());
        // }
    }

    function FlujoUpdate(Request $request, $id)
    {
        $data = request()->all();
        $precotizacion = precotizacion::find($id);
        if (!$precotizacion) {
            return response()->json(['error' => 'Precotiación no encontrada'], 404);
        }

        $precotizacion->update([
            'status_files'  =>  'Pendiente',
        ]);

        $precotizacion->flujos()->delete();

        if (!empty($data['flujo'])) {
            foreach ($data['flujo'] as $flujo) {
                $precotizacion->flujos()->create($flujo);
            }
        }

        return redirect()->back()->with('success', 'Flujos de inversión actualizados exitosamente');
    }

    function PrecioUpdate(Request $request, $id)
    {
        $data = request()->all();
        $precotizacion = precotizacion::find($id);
        if (!$precotizacion) {
            return response()->json(['error' => 'Precotiación no encontrada'], 404);
        }

        $precotizacion->items()->update([
            'status_files'  =>  'Pendiente',
        ]);

        $precotizacion->precios()->delete();

        if (!empty($data['precios'])) {
            foreach ($data['precios'] as $precio) {
                $precio['panel'] = ($data['panel'] == $precio['item']) ? 'Si' : 'No';
                $precio['total'] = ($precio['typeInversion'] != 'Valor2' ? $precio['cop'] * $precio['cantidad'] : $precio['usd'] * $precio['cantidad']);
                $precotizacion->precios()->create($precio);
            }
        }

        return redirect()->back()->with('success', 'Precios actualizados exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $precotizacion = precotizacion::find($id);
        if ($precotizacion) {
            $precotizacion->flujos()->delete();
            $precotizacion->precios()->delete();
            $precotizacion->simulacion()->delete();
            $precotizacion->items()->delete();
            $precotizacion->delete();
            return redirect()->route('quote_energy_system.index')->with('success', 'Precotiación eliminada exitosamente');
        } else {
            return redirect()->route('quote_energy_system.index')->with('error', 'Precotiación no encontrada');
        }
    }

    public function Approved(Request $request, $id)
    {
        $precotizacion = precotizacion::find($id);
        if ($precotizacion) {
            $charts = [
                'chart1' => 'Grafica_de_Retorno_Inversion',
                'chart2' => 'Grafica_de_COP_Mensual_Acumulado',
                'chart3' => 'Grafica_de_Retorno_Inversion_Impuesto'
            ];

            $CuntItems = count($precotizacion->precios) + count($precotizacion->flujos) + count($precotizacion->simulacion->Equipos);
            $Position = [];
            $Position = [
                'chart1' => 'J' . ($CuntItems + 84),
                'chart2' => 'J' . ($CuntItems + 104), 
                'chart3' => 'C' . ($CuntItems + 128),
            ];
            foreach ($charts as $inputName => $description) {
                $chartData = $request->input($inputName);
                $oldFile = $precotizacion->files->where('description', $description.'_'.$precotizacion->id)->first();
                if ($oldFile) {
                    if (Storage::exists($oldFile->url)) {
                        Storage::delete($oldFile->url);
                    }
                    $oldFile->delete();
                }
                if ($chartData) {
                    $image = str_replace('data:image/png;base64,', '', $chartData);
                    $image = str_replace(' ', '+', $image);
                    $binaryImage = base64_decode($image);

                    $name = 'Grafica_' . $description . '_' . time() . '.png';
                    $path = 'public/energy/quotes/' . $name;

                    Storage::put($path, $binaryImage);

                    $size = round(strlen($binaryImage) / 1024, 2);

                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => $description.'_'.$precotizacion->id,
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => 'png',
                        'place' => $Position[$inputName],
                        'state' => 1,
                    ]);
                }
            }
            $precotizacion->status = 'Aprobada';
            $precotizacion->status_files = 'Actualizado';
            $precotizacion->save();

            Mail::send('energy.quoteSystem.email.client_emial', ['id' => $precotizacion], function ($mail) use ($precotizacion) {
                $mail->subject("SE HA GENERADO UNA COTIZACIÓN DE SU SISTEMA SOLAR");
                $mail->to($precotizacion->client->email, $precotizacion->client->name);
            });
            return redirect()->route('quote_energy_system.index')->with('success', 'Precotiación aprobada exitosamente');
        } else {
            return redirect()->route('quote_energy_system.index')->with('error', 'Precotiación no encontrada');
        }
    }

    public function NoApproved(Request $request, $id)
    {
        $precotizacion = precotizacion::find($id);
        if ($precotizacion) {
            $precotizacion->status = 'Rechazada';
            $precotizacion->save();
            return redirect()->route('quote_energy_system.index')->with('success', 'Precotiación rechazada exitosamente');
        } else {
            return redirect()->route('quote_energy_system.index')->with('error', 'Precotiación no encontrada');
        }
    }

    public function export($id)
    {
        $cotizacion = precotizacion::find($id);
        $id = $this->Calculated($cotizacion);
        $CuntItems = count($cotizacion->precios) + count($cotizacion->flujos) + count($cotizacion->simulacion->Equipos);
        $PositionLogo = 'E'.($CuntItems + 61);
        $files = [];
        $files['logo_energitelco']['name'] = 'logo_energitelco';
        $files['logo_energitelco']['description'] = 'Logo de Incotec';
        $files['logo_energitelco']['path'] = public_path('/img/logoIncotec.jpg');
        $files['logo_energitelco']['height'] = 50;
        $files['logo_energitelco']['coordinates'] = 'C3';
        $files['logo_energitelco']['place'] = 3;

        $files['sistema_solar']['name'] = 'sistema_solar';
        $files['sistema_solar']['description'] = 'Logo de Incotec';
        $files['sistema_solar']['path'] = public_path('/img/sistemasolar.png');
        $files['sistema_solar']['height'] = 125;
        $files['sistema_solar']['coordinates'] = $PositionLogo;
        $files['sistema_solar']['place'] = 3;

        if ($id->files) {
            foreach ($id->files as $key => $value) {
                $height = $value->description == 'Mapa' || $value->description == 'Servicios' ? 225 : ($value->description == 'Grafica_de_Retorno_Inversion_Impuesto_'. $cotizacion->id ? 300 : 380);
                $place = explode('.', $value->description, 2);
                $str = str_random();
                $files[$str]['name'] = $value->name;
                $files[$str]['description'] = $value->description;
                $files[$str]['path'] = public_path('/storage/energy/quotes/' . $value->name);
                $files[$str]['height'] = $height;
                $files[$str]['coordinates'] = $value->place;
                $files[$str]['place'] = 1;
            }
        }

        return (new CotizacionExport($id, $files))->download('PRE-COTIZACION' . $id->created_at . $id->locateProject . '.xlsx');
    }

    public function PDF($id)
    {
        $cotizacion = precotizacion::find($id);
        if (!$cotizacion) {
            abort(404, 'Pre-cotización no encontrada');
        }

        // Ejecutas tu cálculo personalizado
        $cotizacion = $this->Calculated($cotizacion);

        // Pasas los datos a la vista
        $data = [
            'id' => $cotizacion
        ];

        // Preparas los archivos a incluir en el PDF
        $files = [];
        $files['logo_energitelco']['name'] = 'logo_energitelco';
        $files['logo_energitelco']['description'] = 'Logo de Incotec';
        $files['logo_energitelco']['path'] = public_path('/img/logoIncotec.jpg');
        $files['logo_energitelco']['height'] = 60;
        $files['logo_energitelco']['coordinates'] = 'A0';
        $files['logo_energitelco']['place'] = 1;

        $files['sistema_solar']['name'] = 'sistema_solar';
        $files['sistema_solar']['description'] = 'Logo de Incotec';
        $files['sistema_solar']['path'] = public_path('/img/sistemasolar.png');
        $files['sistema_solar']['height'] = 125;
        $files['sistema_solar']['coordinates'] = 'E25';
        $files['sistema_solar']['place'] = 2;
        if ($cotizacion->files) {
            foreach ($cotizacion->files as $key => $value) {
                $height = $value->description == 'Mapa' || $value->description == 'Servicios' ? 225 : 350;
                $column = preg_replace('/[0-9]/', '', $value->place);
                $row = intval(preg_replace('/[^0-9]/', '', $value->place));
                $row = $row - 110;
                $place = $column . $row;
                // return $place;
                $str = str_random();
                $files[$str]['name'] = $value->name;
                $files[$str]['description'] = $value->description;
                $files[$str]['path'] = public_path('/storage/energy/quotes/' . $value->name);
                $files[$str]['height'] = $height;
                $files[$str]['coordinates'] = $place;
                $files[$str]['place'] = 3;
            }
        }

        $pdf = PDF::loadView('energy.quoteSystem.pdfExport', ['files' => $files, 'id' => $cotizacion])->setPaper('a3', 'landscape');


        return $pdf->download('PRE-COTIZACION_' . $cotizacion->created_at . $cotizacion->locateProject  . '.pdf');
    }

    public function update_files(Request $request, $id)
    {
        $precotizacion = precotizacion::find($id);
        if ($precotizacion) {
            $charts = [
                'chart1' => 'Grafica_de_Retorno_Inversion',
                'chart2' => 'Grafica_de_COP_Mensual_Acumulado',
                'chart3' => 'Grafica_de_Retorno_Inversion_Impuesto'
            ];

            $CuntItems = count($precotizacion->precios) + count($precotizacion->flujos) + count($precotizacion->simulacion->Equipos);
            $Position = [];
            $Position = [
                'chart1' => 'J' . ($CuntItems + 84),
                'chart2' => 'J' . ($CuntItems + 104), 
                'chart3' => 'C' . ($CuntItems + 128),
            ];
            foreach ($charts as $inputName => $description) {
                $chartData = $request->input($inputName);
                $oldFile = $precotizacion->files->where('description', $description.'_'.$precotizacion->id)->first();
                if ($oldFile) {
                    if (Storage::exists($oldFile->url)) {
                        Storage::delete($oldFile->url);
                    }
                    $oldFile->delete();
                }
                if ($chartData) {
                    $image = str_replace('data:image/png;base64,', '', $chartData);
                    $image = str_replace(' ', '+', $image);
                    $binaryImage = base64_decode($image);

                    $name = 'Grafica_' . $description . '_' . time() . '.png';
                    $path = 'public/energy/quotes/' . $name;

                    Storage::put($path, $binaryImage);

                    $size = round(strlen($binaryImage) / 1024, 2);

                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => $description.'_'.$precotizacion->id,
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => 'png',
                        'place' => $Position[$inputName],
                        'state' => 1,
                    ]);
                }
            }
            $precotizacion->status_files = 'Actualizado';
            $precotizacion->save();
            return redirect()->route('quote_energy_system.index')->with('success', 'Gráficas actualizadas exitosamente');
        } else {
            return redirect()->route('quote_energy_system.index')->with('error', 'Precotiación no encontrada');
        }
    }
}

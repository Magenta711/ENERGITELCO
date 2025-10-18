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


class QuoteEnergySystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('auth', ['except' => ['review']]);
        $this->middleware('permission:Ver Cotizaciones', ['only' => ['index']]);
        $this->middleware('permission:Crear Items Cotizaciones', ['only' => ['items','Items_store']]);
        $this->middleware('permission:Crear Cotizaciones', ['only' => ['store','create']]);
        $this->middleware('permission:Editar Cotizaciones', ['only' => ['update','edit']]);
        $this->middleware('permission:ELiminar Cotizaciones', ['only' => ['destroy']]);
    }

    public function review($token)
    {
        $id=precotizacion::where('token', $token)->first();
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
                'Equipos'               => $data['Equipos']
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
                'token'         => $data['_token'],
                'client_id'     => $data['client'],
                'locateProject' => $data['locateProject'],
                'claseSystem'   => $data['claseSystem'],
                'typeProject'   => $data['typeProject'],
                'estrato'       => $data['estrato'],
                'consumo'       => $data['consumo'],
                'radiacion'       => $data['radiacion'],
                'responsable_id' => $data['responsable_id'],
                'telefeno_responsable' => $data['responsable_telefono'],
                'direccion_responsable' => $data['responsable_direccion'],
                'email' => $data['responsable_correo'],
            ]);

            if ($request->hasFile('file_servicios')) {

                $file = $request->file('file_servicios');
                if ($file !== null) {
                    $name = 'Servicios-' . $data['locateProject'] . time() . '.' . $file->getClientOriginalExtension();
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

            if ($request->hasFile('file_maps')) {
                $file = $request->file('file_maps');
                if ($file !== null) {
                    $name = 'Mapa-' . $data['locateProject'] . time() . '.' . $file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/energy/quotes', $file, $name);
                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => 'Mapa',
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'place' => 'C125',
                        'state' => 1,
                    ]);
                }
            }

            $precotizacion->items()->create([
                'precotizacion_id'    => $precotizacion->id,
                'objetivo_proyecto'   => $data['objetivo_proyecto'],
                'descripcion_proyecto'=> $data['descripcion_proyecto'],
                'validez_oferta'      => $data['validez_oferta'],
                'fecha_oferta'        => $data['fecha_oferta'],
                'fin_oferta'          => $data['fin_oferta'],
                'polizas'             => $data['polizas'],
                'garantia_equipos'    => $data['garantia_equipos'],
                'garantia_celdas'     => $data['garantia_celdas'],
                'garantia_materiales' => $data['garantia_materiales'],
                'verificacion_sistema'=> $data['verificacion_sistema'],
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
                'Equipos'               => $data['Equipos']
            ]);
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

    public function generated(precotizacion $id)
    {

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
        return view('energy.quoteSystem.generated', compact('id'));
    }

    public function Calculated($id)
    {

        $totalCOP = 0;
        $totalUSD = 0;
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
            if (isset($valores[$precio->typeInversion])) {
                $valores[$precio->typeInversion] += $precio->total;
            }
        }
        $valores['Valor1'] = $id->totalUSD;
        $valores['Valor2'] = $id->totalUSD * $id->items->usd;
        $valores['Valor5'] = $id->totalCOP * ($id->items->iva / 100);
        $id->valores = $valores;

        $valorAcumulado = 0;
        foreach ($id->flujos as $flujo) {
            $flujo->valor = $valores[$flujo->typeInversion] * ($flujo->inversion / 100);
            $valorAcumulado += $flujo->valor;
            $flujo->valorAcumulado = $valorAcumulado;
        }
        $panelSeleccionado = $id->precios->where('panel', 'Si')->first();
        if ($panelSeleccionado) {
            $id->cantidadPaneles = $panelSeleccionado->cantidad;
        } else {
            $id->cantidadPaneles = $id->precios[3]->cantidad;
        }
        $id->capacidadInstalada = ($id->cantidadPaneles * 0.63);
        $produccionGeneral = $id->capacidadInstalada * $id->radiacion * $id->simulacion->PromProduccionAnual;
        $potencias = [];
        foreach ($id->simulacion->kwh_ipc as $key => $value) {
            $potencias[$key]['kwh'] = $value;
            $potencias[$key]['factor'] = $id->simulacion->factor_potencia[$key];
        }
        $id->produccionFinal = $this->ProduccionAnual($potencias, $produccionGeneral);

        $id->totalProducido = array_sum(array_column($id->produccionFinal, 'produccion'));
        $id->totalEstimacion = array_sum(array_column($id->produccionFinal, 'estimacion'));
        $id->totalOxigeno = $id->totalProducido * 0.21;
        $id->produccionMensualKw = ($id->capacidadInstalada * 30 * $id->radiacion) * 0.9;
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
        return $id;
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
        return $data;
        DB::begintransaction();
        try {
            $id->update([
                'token'         => $data['_token'],
                'locateProject' => $data['locateProject'],
                'claseSystem'   => $data['claseSystem'],
                'typeProject'   => $data['typeProject'],
                'estrato'       => $data['estrato'],
                'consumo'       => $data['consumo'],
                'radiacion'    => $data['radiacion'],
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

            // foreach ($id->files as $oldFile) {
            //     if (Storage::exists($oldFile->url)) {
            //         Storage::delete($oldFile->url);
            //     }
            //     $oldFile->delete();
            // }

            //  if ($request->hasFile('file_Servicios')) {

            //     $file = $request->file('file_Servicios');
            //     if ($file !== null) {
            //         $name = 'Servicios-'.$data['locateProject'] . time() . '.' . $file->getClientOriginalExtension();
            //         $size = $file->getClientSize() / 1000;
            //         $path = Storage::putFileAs('public/energy/quotes', $file, $name);
            //         $id->files()->create([
            //             'name' => $name,
            //             'description' => 'Servicios',
            //             'size' => $size . ' KB',
            //             'url' => $path,
            //             'type' => $file->getClientOriginalExtension(),
            //             'place' => 'C105',
            //             'state' => 1
            //         ]);
            //     }
            // }

            // if ($request->hasFile('file_Mapa')) {
            //     $file = $request->file('file_Mapa');
            //     if ($file !== null) {
            //         $name = 'Mapa-'.$data['locateProject'] . time() . '.' . $file->getClientOriginalExtension();
            //         $size = $file->getClientSize() / 1000;
            //         $path = Storage::putFileAs('public/energy/quotes', $file, $name);
            //         $id->files()->create([
            //             'name' => $name,
            //             'description' => 'Mapa',
            //             'size' => $size . ' KB',
            //             'url' => $path,
            //             'type' => $file->getClientOriginalExtension(),
            //             'place' => 'C125',
            //             'state' => 1,
            //         ]);
            //     }
            // }

            $id->flujos()->delete();
            $id->precios()->delete();
            $id->simulacion()->delete();

            if (!empty($data['flujo'])) {
                foreach ($data['flujo'] as $flujo) {
                    $id->flujos()->create($flujo);
                }
            }

            if (!empty($data['precios'])) {
                foreach ($data['precios'] as $precio) {
                    $precio['panel'] = ($data['panel'] == $precio['item']) ? 'Si' : 'No';
                    $precio['total'] = ($precio['typeInversion'] != 'Valor2' ? $precio['cop'] * $precio['cantidad'] : $precio['usd'] * $precio['cantidad']);
                    $id->precios()->create($precio);
                }
            }

            $id->simulacion()->create([
                'Operador'              => $data['Operador'],
                'PromProduccion'        => $data['PromProduccion'],
                'PromProduccionAnual'   => $data['PromProduccionAnual'],
                'PromedioCO2'           => $data['PromedioCO2'],
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
                'Equipos'               => $data['Equipos']
            ]);
            DB::commit();
            return redirect()->route('quote_energy_system.index')->with('success', 'Items de precotización actualizados exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al actualizar la cotización: ' . $e->getMessage());
        }
    }

    function FlujoUpdate(Request $request, $id)
    {
        $data = request()->all();
        $precotizacion = precotizacion::find($id);
        if (!$precotizacion) {
            return response()->json(['error' => 'Precotiación no encontrada'], 404);
        }

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
                'chart1' => 'Gráfica de Retorno Inversión',
                'chart2' => 'Gráfica de COP Mensual Acumulado',
            ];

            foreach ($charts as $inputName => $description) {
                $chartData = $request->input($inputName);

                if ($chartData) {
                    $image = str_replace('data:image/png;base64,', '', $chartData);
                    $image = str_replace(' ', '+', $image);
                    $binaryImage = base64_decode($image);

                    $name = 'Grafica-' . $description . '-' . time() . '.png';
                    $path = 'public/energy/quotes/' . $name;

                    Storage::put($path, $binaryImage);

                    $size = round(strlen($binaryImage) / 1024, 2);

                    $precotizacion->files()->create([
                        'name' => $name,
                        'description' => $description,
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => 'png',
                        'place' => 'I105',
                        'state' => 1,
                    ]);
                }
            }
            $precotizacion->status = 'Aprobada';
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
        $files['sistema_solar']['coordinates'] = 'E85';
        $files['sistema_solar']['place'] = 3;

        if ($id->files) {
            foreach ($id->files as $key => $value) {
                $place = explode('.', $value->description, 2);
                $str = str_random();
                $files[$str]['name'] = $value->name;
                $files[$str]['description'] = $value->description;
                $files[$str]['path'] = public_path('/storage/energy/quotes/' . $value->name);
                $files[$str]['height'] = 225;
                $files[$str]['coordinates'] = $value->place;
                $files[$str]['place'] = 1;
            }
        }

        return (new CotizacionExport($id, $files))->download('Prubea' . $id->created_at . '.xlsx');
        return view('energy.quoteSystem.export', compact('id'));
    }
}

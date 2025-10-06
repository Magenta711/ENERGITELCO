<?php

namespace App\Http\Controllers\energy\quote;

use App\Exports\CotizacionExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\energy\cotizaciones;
use App\models\energy\cotization\precotizacion;
use App\Models\Energy\SolarClients;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class QuoteEnergySystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('permission:Ver Clientes', ['only' => ['index']]);
        // $this->middleware('permission:Crear Clientes', ['only' => ['store','create']]);
        // $this->middleware('permission:Editar Clientes', ['only' => ['update','edit']]);
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
        // return $data;
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
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
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
            $precotizacion = precotizacion::create([
                'client_id'     => $data['client'],
                'locateProject' => $data['locateProject'],
                'claseSystem'   => $data['claseSystem'],
                'typeProject'   => $data['typeProject'],
                'estrato'       => $data['estrato'],
                'consumo'       => $data['consumo'],
                'radiacion'       => $data['radiacion'],
            ]);

            $precotizacion->items()->create([
                'precotizacion_id'  => $precotizacion->id,
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
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
            ]);
            DB::commit();
            return redirect()->route('quote_energy_system.index')->with('success', 'Items de precotización creados exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al crear la cotización: ' . $e->getMessage());
        }
    }

    public function generated(precotizacion $id)
    {

        $id=$this->Calculated($id);
        // return $id;
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

        $id->totalSistema = $id->totalCOP + $valores['Valor5'] + ($id->totalUSD * $id->items->usd);
        $id->descuentoRenta = ($id->valores['Valor2'] + $id->valores['Valor3'] + $id->valores['Valor4']) / 2;
        $id->totalInversion = $id->totalSistema - $id->descuentoRenta - $id->valores['Valor5'];

        return $id;
    }

    public function ProduccionAnual($potencias, $capacidadInstalada)
    {
        $produccionAnual = [];
        foreach ($potencias as $key => $value) {
            $kwProducidos = [];
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
            $produccionAnual[$key] = $kwProducidos;
        }
        return $produccionAnual;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $plantilla = precotizacion::find($id);
        return view('energy.quoteSystem.edit', compact('plantilla'));
    }

    public function update(Request $request, precotizacion $id)
    {
        $data = request()->all();

        DB::begintransaction();
        try {
            $id->update([
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
                'kwh_ipc'               => $data['kwh_ipc'],
                'factor_potencia'       => $data['factor_potencia'],
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

    public function Approved($id)
    {
        $precotizacion = precotizacion::find($id);
        if ($precotizacion) {
            $precotizacion->status = 'Aprobada';
            $precotizacion->save();
            return redirect()->route('quote_energy_system.index')->with('success', 'Precotiación aprobada exitosamente');
        } else {
            return redirect()->route('quote_energy_system.index')->with('error', 'Precotiación no encontrada');
        }
    }

    public function export($id)
    {
        $cotizacion = precotizacion::find($id);
        $id=$this->Calculated($cotizacion);
        $files = [];
        // $files['logo_claro']['name'] = 'Logo_Claro';
        // $files['logo_claro']['description'] = 'Logo de Claro';
        // $files['logo_claro']['path'] = public_path('/img/claro.png');
        // $files['logo_claro']['height'] = 80;
        // $files['logo_claro']['coordinates'] = 'L1';
        // $files['logo_claro']['place'] = 3;
        // return $id->client->name;
        // return (new CotizacionExport($id, $files))->download('Prubea'.$id->created_at.'.xlsx');
        return view('energy.quoteSystem.export', compact('id'));
    }
}

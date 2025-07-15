<?php

namespace App\Http\Controllers\energy\store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientsUsers\Clients;
use App\Models\Energy\SolarShippingValue;
use App\Models\store\Pay;
use App\Models\SolarProducts;


class AdminStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::get();
        foreach ($clients as $client) {
            $client->locate = $client->locate ? json_decode($client->locate, true) : [];
        }
        return view('energy.store.users', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ventas()
    {
        $ventas = Pay::where('status', 'APPROVED')->get();
        $shipping = SolarShippingValue::first();


        return view('energy.store.ventas', compact('ventas', 'shipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ventas_show($id)
    {
        $order = Pay::where('reference', $id)->first();
        if (!$order) {
            return redirect()->route('energy_store_ventas.ventas')->with('error', 'Orden no encontrada');
        }

        $order->locate = $order->locate ? json_decode($order->locate, true) : [];
        $products = collect();

        foreach ($order->products as $value) {
            $product = SolarProducts::where('id', $value['id'])->first();

            if ($product) {
                $tipo = $product->type;
                if (!$products->has($tipo)) {
                    $product->cantidad = 1;
                    $product->valor = $value['valor'];
                    $products[$tipo] = $product;
                } else {
                    $products[$tipo]->cantidad += 1;
                }
                $products[$tipo]['valor'] = $products[$tipo]['cantidad'] * $value['valor'];
            }
        }

        $order->products = $products;
        $order->total = collect($products)->sum('valor');
        return view('energy.store.ventas_detail', compact('order', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

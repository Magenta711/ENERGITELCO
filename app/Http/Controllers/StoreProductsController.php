<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolarProducts;
use App\Models\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\store\Cart;
use App\Models\store\Pay;
use App\Models\store\WompiTransactions;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StoreProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_cart(Request $request, SolarProducts $id)
    {
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();

        $products = [];
        $all_products = [];
        $total = 0;
        $exist = false;

        $total_product = $request->amount_item * $id->price;

        $all_products = $cart_client ? json_decode($cart_client->products, true) ?? [] : [];

        foreach ($all_products as $index => $item) {
            if ($item['product'] === $id->type) {
                $cantidad_existente = (int)$item['cantidad'];
                $cantidad_nueva = (int)$request->amount_item;

                $all_products[$index]['cantidad'] = $cantidad_existente + $cantidad_nueva;
                $all_products[$index]['valor'] += $total_product;

                $exist = true;
                break;
            }
        }

        if (!$exist) {
            $product = [
                'product' => $id->type,
                'cantidad' => (int)$request->amount_item,
                'valor' => $total_product,
            ];
            $all_products[] = $product;
        }

        foreach ($all_products as $item) {
            $subtotal = $item['valor'];
            $total += $subtotal;
        }

        $product = json_encode($all_products);

        if (empty($cart_client)) {
            Cart::create([
                'client_id' => auth('tienda')->id(),
                'products' => $product,
                'total' => $total,
            ]);
        } else {
            $cart_client->update([
                'products' => $product,
                'total' => $total,
            ]);
        }

        return redirect()->intended('product/store/show_cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolarProducts $id)
    {
        $cliente = Auth::guard('tienda')->user();
        $product = SolarProducts::where('status', 1)->get();
        $types = [];

        foreach ($product as $item) {
            $type = $item->type;
            if (!in_array($type, $types)) {
                $types[] = $type;
            }
        }
        $available = count(SolarProducts::where('status', 1)->where('type', $type)->get());
        $id['disponibles'] = $available;
        foreach ($types as $value) {
            $product = SolarProducts::where('status', 1)->where('type', $value)->get();
            if ($product) {
                $products[] = $product;
            }
        }
        $all_products = [];
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();
        if ($cart_client) {
            $all_products = $cart_client ? json_decode($cart_client->products, true) ?? [] : [];
        }

        if (is_numeric($id)) {
            $id = SolarProducts::find($id);
        }
        if ($id && $id->status == 1) {
            return view('store.products', compact('id', 'products', 'cliente', 'cart_client', 'all_products'));
        } else {
            return redirect()->route('welcome')->with('title', 'No disponible')->with('success',);
        }
    }

    public function show_cart()
    {
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();
        $products = [];
        $all_products = $cart_client ? (json_decode($cart_client->products, true) ?? []) : [];
        $cliente = Auth::guard('tienda')->user();
        $product = SolarProducts::where('status', 1)->get();
        foreach ($all_products as $item) {
            $product = SolarProducts::where('type', $item['product'])->first();
            $available = count(SolarProducts::where('status', 1)->where('type', $item['product'])->get());

            if ($product) {
                $product['cantidad'] = $item['cantidad'];
                $product['valor'] = $item['valor'];
                $product['disponibles'] = $available;
                $products[] = $product;
            }
        };

        return view('store.cart', compact('cart_client', 'all_products', 'cliente', 'product', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        $payload = $request->all();
        $transaction = $payload['data']['transaction'];
        $props = data_get($payload, 'signature.properties', []);
        $timestamp = data_get($payload, 'timestamp');

        $string = '';
        foreach ($props as $prop) {
            $string .= data_get($payload, "data." . $prop);
        }
        $string .= $timestamp;
        $string .= config('services.wompi.secret_event_key');

        $calculated = hash('sha256', $string);
        $received = data_get($payload, 'signature.checksum');

        if (!hash_equals($calculated, $received)) {
            Log::error('Firma inválida en webhook de WOMPI', [
                'props' => $props,
                'string' => $string,
                'expected' => $calculated,
                'received' => $received,
            ]);
            return response()->json(['error' => 'Invalid signature'], 403);
        }

        DB::beginTransaction();

        try {
            $status = $transaction['status'];
            $reference = $transaction['reference'];
            WompiTransactions::create([
                'transaction_id'      => data_get($payload, 'data.transaction.id'),
                'amount_in_cents'     => data_get($payload, 'data.transaction.amount_in_cents'),
                'reference'           => data_get($payload, 'data.transaction.reference'),
                'customer_email'      => data_get($payload, 'data.transaction.customer_email'),
                'currency'            => data_get($payload, 'data.transaction.currency'),
                'payment_method_type' => data_get($payload, 'data.transaction.payment_method_type'),
                'status'              => data_get($payload, 'data.transaction.status'),
                'signature'           => data_get($payload, 'signature'),
                'environment'         => data_get($payload, 'environment'),
                'wompi_timestamp'     => Carbon::createFromTimestamp(data_get($payload, 'timestamp')),
                'sent_at'             => Carbon::parse(data_get($payload, 'sent_at')),
                'raw_payload'         => $payload,
            ]);
            $Pay = [];
            $Pay = pay::where('reference', $reference)->first();

            $Pay->update([
                'transaction_id' => data_get($payload, 'data.transaction.id'),
                'status' => data_get($payload, 'data.transaction.status'),
            ]);

            $products = is_array($Pay->products) ? $Pay->products : [];
            $item = [];
            foreach ($products as $value) {
                $product = SolarProducts::find($value['id']);
                if ($product) {
                    $items[] = $product;
                }
            }

            $newStatus = $status === 'APPROVED' ? 3 : 1;

            foreach ($items as $item) {
                $item->update(['status' => $newStatus]);
            }
            if ($status === 'APPROVED') {
                $cart = Cart::where('client_id', $Pay->id_client)->first();
                if ($cart) {
                    $cart->products = json_encode([]);
                    $cart->total = 0;
                    $cart->save();
                }
            }
            DB::commit();
            Log::info("Transacción {$reference} actualizada a estado {$status}");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al guardar transacción WOMPI', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal server error'], 500);
        }

        return response()->json(['received' => true], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_product(Request $request)
    {
        if (!$request->has('product_id')) {
            return response()->json(['success' => false, 'message' => 'No se recibió el product_id']);
        }

        $productId = $request->product_id;

        $cart = Cart::where('client_id', auth('tienda')->id())->first();

        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Carrito no encontrado']);
        }

        $products = json_decode($cart->products, true);

        $products = array_filter($products, function ($item) use ($productId) {
            return $item['product'] !== $productId;
        });

        $products = array_values($products);

        $cart->products = json_encode($products);
        $cart->total = collect($products)->sum('valor');
        $cart->save();

        return response()->json([
            'success' => true,
            'total' => number_format($cart->total, 2, ',', '.'),
            'count' => collect($products)->sum('cantidad')
        ]);
    }

    public function amount_product(Request $request)
    {
        $productId = $request->product_id;
        $amountId = $request->amount_id;
        $valor_venta = $request->valor_venta;

        $cart = Cart::where('client_id', auth('tienda')->id())->first();

        $products = json_decode($cart->products, true);
        $productFound = false;

        foreach ($products as $index => $item) {
            if ($item['product'] == $productId) {
                $products[$index]['cantidad'] = $amountId;
                $products[$index]['valor'] = $amountId * $valor_venta;
                break;
            }
        }

        $cart->products = json_encode($products);
        $cart->total = collect($products)->sum('valor');
        $cart->save();

        return response()->json([
            'success' => true,
            'total' => number_format($cart->total, 2, ',', '.'),
            'count' => $amountId,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pay_show($id, $form)
    {
        $cliente = Auth::guard('tienda')->user();
        $products = [
            'products' => [],
            'total' => 0
        ];
        $reference = 'REF_' . now()->format('YmdHis') . '_' . $id;

        DB::beginTransaction();

        try {
            if ($form == 1) {
                $cart = Cart::where('client_id', $cliente->id)->first();

                if (!$cart) {
                    throw new \Exception('Carrito no encontrado');
                }

                $all_products = json_decode($cart->products, true) ?? [];

                foreach ($all_products as $value) {
                    $items = SolarProducts::where('status', 1)
                        ->where('type', $value['product'])
                        ->limit($value['cantidad'])
                        ->lockForUpdate()
                        ->get();

                    if ($items->count() < $value['cantidad']) {
                        throw new \Exception('No hay suficiente stock para el producto: ' . $value['product']);
                    }

                    foreach ($items as $item) {
                        // $item->update(['status' => 2]);
                        $products['products'][] = $item;
                    }
                }

                $products['total'] = $cart->total;
            } else {

                $item = SolarProducts::where('status', 1)
                    ->where('id', $id)
                    ->lockForUpdate()
                    ->first();

                if (!$item) {
                    throw new \Exception('Producto no disponible');
                }

                // $item->update(['status' => 2]);
                $products['products'][] = $item;
                $products['total'] = $item->valor ?? 0;
            }
            Pay::create([
                'reference' => $reference,
                'id_client' => $cliente->id,
                'products' => collect($products['products'])->map(function ($item) {
                    return [
                        'id'    => $item->id,
                        'type'  => $item->type,
                        'valor' => $item->price,
                    ];
                })->toArray(),
                'valor' => $products['total'],
                'status' => 'pendiente',
                'reserva_created' => now(),
                'expiration_date' => now()->addMinutes(1),
            ]);

            DB::commit();
            Log::info("Reserva creada para referencia $reference por el cliente {$cliente->id}");
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }

        $locate = json_decode($cliente->locate, true);
        return view('store.pay', compact('cliente', 'locate', 'products', 'reference'));
    }

    public function store_address(Request $request)
    {
        $request->validate([
            'number_contact' => 'required',
            'name_contact' => 'required',
            'address' => 'required',
            'departament' => 'required',
            'city' => 'required',
        ]);

        $cliente = Auth::guard('tienda')->user();

        $addres = [
            'number_contact' => $request->number_contact,
            'name_contact' => $request->name_contact,
            'address' => $request->address,
            'departament' => $request->departament,
            'city' => $request->city,
            'house' => $request->house,
            'cod_postal' => $request->cod_postal,
            'others' => $request->others,
        ];

        $cliente->locate = json_encode($addres);
        $cliente->save();
        return response()->json([
            'success' => true,
        ]);
    }

    public function signature_integrity(Request $request)
    {
        $string = '';
        $string .= $request->reference;
        $string .= $request->valor;
        $string .= "COP";
        $string .= config('services.wompi.secret_integrity_key');

        $public_key = config('services.wompi.public_key');
        $calculated = hash('sha256', $string);

        return response()->json([
            'success' => true,
            'string' => $string,
            'public_key' => $public_key,
            'calculated' => $calculated,
        ]);
    }

    public function orders_show()
    {
        $cliente = Auth::guard('tienda')->user();
        $orders = Pay::where('id_client', $cliente->id)
            ->where('status', 'APPROVED')
            ->orderBy('created_at', 'desc')
            ->get();
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();
        $all_products = [];
        if ($cart_client) {
            $all_products = json_decode($cart_client->products, true) ?? [];
        }

        return view('store.orders', compact('cliente', 'orders', 'all_products'));
    }

    public function orders_detail($id)
    {
        $cliente = Auth::guard('tienda')->user();
        $order = Pay::where('id_client', $cliente->id)->where('reference', $id)->first();
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();
        $all_products = [];
        if ($cart_client) {
            $all_products = json_decode($cart_client->products, true) ?? [];
        }
        if (!$order) {
            return redirect()->route('store.orders')->with('error', 'Orden no encontrada');
        }

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
        return view('store.order_detail', compact('cliente', 'order', 'all_products', 'products'));
    }
}

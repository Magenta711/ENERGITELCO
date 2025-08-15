<?php

namespace App\Http\Controllers;

use App\Models\Energy\SolarKit;
use App\Models\Energy\SolarShippingValue;
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
    public function add_cart(Request $request, $id, $type)
    {
        if ($type == 1) {
            $id = SolarProducts::find($id);
        } else {
            $id = SolarKit::find($id);
        }
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
                'type' => $type,
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
    public function show($item)
    {
        $id = SolarProducts::where('type', $item)->where('status', 1)->first();
        if ($id && $id->status == 1) {
            $cliente = Auth::guard('tienda')->user();
            $product = SolarProducts::where('status', 1)->get();
            $min_product = [];
            $productos = SolarProducts::selectRaw('MIN(id) as id')
                ->where('status', 1)->where('type', '!=', $id->type)
                ->groupBy('type')
                ->get();
            $kits = SolarKit::selectRaw('MIN(id) as id')
                ->where('status', 1)
                ->groupBy('type')
                ->get();
            $min_product = SolarProducts::whereIn('id', $productos->pluck('id'))->get();
            $min_kit = SolarKit::whereIn('id', $kits->pluck('id'))->get()->all();
            foreach ($min_kit as $kit) {
                $kit->products = is_array($kit->products) ? $kit->products : [];
                $equiposList = [];
                $tiposAgregados = [];
                $filesAgregados = 0;
                foreach ($kit->products as $producto) {
                    $equipo = SolarProducts::find($producto['id']);
                    if ($equipo && $equipo->files && !in_array($equipo->type, $tiposAgregados)) {
                        foreach ($equipo->files as $file) {
                            $equiposList[] = $file;
                            $tiposAgregados[] = $equipo->type;
                            $filesAgregados++;
                            break;
                        }
                    }
                    if ($filesAgregados >= 4) {
                        break;
                    }
                }
                $kit->files = $equiposList;
            }
            $types = [];

            $available = count(SolarProducts::where('type', $item)->where('status', 1)->get());
            $id['disponibles'] = $available;
            foreach ($product as $item) {
                $type = $item->type;
                if (!in_array($type, $types)) {
                    $types[] = $type;
                }
            }
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
            // return $id;
            return view('store.products', compact('id', 'products', 'cliente', 'cart_client', 'all_products', 'min_product', 'min_kit'));
        } else {
            return redirect()->route('welcome')->with('title', 'No disponible')->with('success');
        }
    }

    public function show_kit($type)
    {
        $id = SolarKit::where('type', $type)->where('status', 1)->first();
        if ($id && $id->status == 1) {
            $cliente = Auth::guard('tienda')->user();
            $id->caracteristics = json_decode($id->caracteristics, true);
            $product = SolarProducts::where('status', 1)->get();
            $min_product = [];
            $productos = SolarProducts::selectRaw('MIN(id) as id')
                ->where('status', 1)
                ->groupBy('type')
                ->get();
            $kits = SolarKit::selectRaw('MIN(id) as id')
                ->where('status', 1)->where('type', '!=', $id->type)
                ->groupBy('type')
                ->get();
            $min_product = SolarProducts::whereIn('id', $productos->pluck('id'))->get()->all();
            $min_kit = SolarKit::whereIn('id', $kits->pluck('id'))->get()->all();
            foreach ($min_kit as $kit) {
                $kit->products = is_array($kit->products) ? $kit->products : [];
                $equiposList = [];
                $tiposAgregados = [];
                $filesAgregados = 0;
                foreach ($kit->products as $producto) {
                    $equipo = SolarProducts::find($producto['id']);
                    if ($equipo && $equipo->files && !in_array($equipo->type, $tiposAgregados)) {
                        foreach ($equipo->files as $file) {
                            $equiposList[] = $file;
                            $tiposAgregados[] = $equipo->type;
                            $filesAgregados++;
                            break;
                        }
                    }
                    if ($filesAgregados >= 4) {
                        break;
                    }
                }
                $kit->files = $equiposList;
            }
            $types = [];
            $available = count(SolarKit::where('type', $type)->where('status', 1)->get());
            $id['disponibles'] = $available;
            foreach ($product as $type) {
                $type = $type->type;
                if (!in_array($type, $types)) {
                    $types[] = $type;
                }
            }
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
            $productos = collect();
            foreach ($id->products as $product) {
                $product = SolarProducts::find($product['id']);
                if ($product) {
                    if (!isset($productos[$product->type])) {
                        $product->cantidad = 1;
                        $productos[$product->type] = $product;
                    } else {
                        $productos[$product->type]->cantidad += 1;
                        $productos[$product->type]->valor += $product->price;
                    }
                }
            }

            return view('store.kit.kits', compact('id', 'products', 'cliente', 'cart_client', 'all_products', 'min_product', 'min_kit', 'productos'));
        } else {
            return redirect()->route('welcome')->with('title', 'No disponible')->with('success');
        }
    }

    public function show_cart()
    {
        $cart_client = Cart::where('client_id', auth('tienda')->id())->first();
        $productos = SolarProducts::selectRaw('MIN(id) as id')
            ->where('status', 1)
            ->groupBy('type')
            ->get();
        $kits = SolarKit::selectRaw('MIN(id) as id')
            ->where('status', 1)
            ->groupBy('type')
            ->get();
        $min_product = SolarProducts::whereIn('id', $productos->pluck('id'))->get();
        $min_kit = SolarKit::whereIn('id', $kits->pluck('id'))->get()->all();
        foreach ($min_kit as $kit) {
            $kit->products = is_array($kit->products) ? $kit->products : [];
            $equiposList = [];
            $tiposAgregados = [];
            $filesAgregados = 0;
            foreach ($kit->products as $producto) {
                $equipo = SolarProducts::find($producto['id']);
                if ($equipo && $equipo->files && !in_array($equipo->type, $tiposAgregados)) {
                    foreach ($equipo->files as $file) {
                        $equiposList[] = $file;
                        $tiposAgregados[] = $equipo->type;
                        $filesAgregados++;
                        break;
                    }
                }
                if ($filesAgregados >= 4) {
                    break;
                }
            }
            $kit->files = $equiposList;
        }
        $products = [];
        $all_products = $cart_client ? (json_decode($cart_client->products, true) ?? []) : [];
        $cliente = Auth::guard('tienda')->user();
        $product = SolarProducts::where('status', 1)->get();
        foreach ($all_products as $item) {
            if ($item['type'] == 1) {
                $product = SolarProducts::where('type', $item['product'])->first();
                $available = count(SolarProducts::where('status', 1)->where('type', $item['product'])->get());
            } else {
                $product = SolarKit::where('type', $item['product'])->first();
                $available = count(SolarKit::where('status', 1)->where('type', $item['product'])->get());
                $product->products = is_array($product->products) ? $product->products : [];
                $equiposList = [];
                $tiposAgregados = [];
                $filesAgregados = 0;
                foreach ($product->products as $items) {
                    $produ = SolarProducts::find($items['id']);
                    if ($produ && $produ->files && !in_array($produ->type, $tiposAgregados)) {
                        foreach ($produ->files as $file) {
                            $equiposList[] = $file;
                            $tiposAgregados[] = $produ->type;
                            $filesAgregados++;
                            break;
                        }
                    }
                    if ($filesAgregados >= 4) {
                        break;
                    }
                }
                $product->files = $equiposList;
            }
            if ($product) {
                if ($item['type'] == 1) {
                    $product['typeGorup'] = 'Producto';
                } else {
                    $product['typeGorup'] = 'Kit';
                }
                $product['cantidad'] = $item['cantidad'];
                $product['valor'] = $item['valor'];
                $product['disponibles'] = $available;
                $products[] = $product;
            }
        };
        return view('store.cart', compact('cart_client', 'all_products', 'cliente', 'product', 'products', 'min_product', 'min_kit'));
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

            foreach ($products as $value) {
                if ($value['GroupType'] == 'producto') {
                    $items[] = SolarProducts::find($value['id']);
                } else {
                    $kit = SolarKit::find($value['id']);
                    $items[] = $kit;
                    $kit->products = is_array($kit->products) ? $kit->products : [];
                    foreach ($kit->products as $product) {
                        $items[] = SolarProducts::find($product['id']);
                    }
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
                $items = [];
                if (empty($all_products)) {
                    throw new \Exception('No hay productos en el carrito');
                }
                foreach ($all_products as $value) {
                    if ($value['type'] == 1) {
                        $items = SolarProducts::where('status', 1)
                            ->where('type', $value['product'])
                            ->limit($value['cantidad'])
                            ->lockForUpdate()
                            ->get();
                        foreach ($items as $item) {
                            $item->groupType = 'producto';
                            $products['products'][] = $item;
                        }
                    } else {
                        $items = SolarKit::where('status', 1)
                            ->where('type', $value['product'])
                            ->limit($value['cantidad'])
                            ->lockForUpdate()
                            ->get();
                        foreach ($items as $item) {
                            $item->groupType = 'kit';
                            $products['products'][] = $item;
                        }
                    }

                    if ($items->count() < $value['cantidad']) {
                        throw new \Exception('No hay suficiente stock para el producto: ' . $value['product']);
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
            $pay = Pay::create([
                'reference' => $reference,
                'id_client' => $cliente->id,
                'products' => collect($products['products'])->map(function ($item) {
                    return [
                        'id'    => $item->id,
                        'GroupType' => $item->groupType,
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

        $Pay = pay::where('reference', $request->reference)->first();
        $products = is_array($Pay->products) ? $Pay->products : [];

        foreach ($products as $value) {
            if ($value['GroupType'] == 'producto') {
                $product = SolarProducts::find($value['id']);
            } else {
                $product = SolarKit::find($value['id']);
            }
            if ($product) {
                $items[] = $product;
            }
        }

        $peso_volumetrico = 0;
        $peso_normal = 0;
        foreach ($items as $item) {
            $peso_volumetrico += ($item->ancho * $item->alto * $item->largo) / 5000;
            $peso_normal += $item->peso;
        }

        $shipping = SolarShippingValue::first();

        $peso_cobrado = max($peso_volumetrico, $peso_normal);
        $kilos_adicionales = max(0, ceil($peso_cobrado - $shipping->kilos_adicionales));
        $costo_adicional = $kilos_adicionales * $shipping->valor_kilos_adic;
        $seguro = 0.01 * $Pay->valor;

        $total_envio = $shipping->base + $costo_adicional + $seguro;
        $total_envio += $total_envio * ($shipping->porcentaje_aumentado / 100);
        $total = $total_envio + $Pay->valor;

        $Pay->collect = $request->locate;
        $Pay->locate = json_encode($addres);
        $Pay->valor_envio = $total_envio;
        $Pay->save();

        return response()->json([
            'total_valor_text' => number_format($total, 2, ',', '.'),
            'total_envio_text' => number_format($total_envio, 2, ',', '.'),
            'total_valor' => $total,
            'success' => true,
        ]);
    }

    public function collect(Request $request)
    {
        $request->validate([
            'number_contact' => 'required',
            'name_contact' => 'required',
        ]);

        $cliente = Auth::guard('tienda')->user();
        $pay = Pay::where('reference', $request->reference)->first();
        if (!$pay) {
            return response()->json([
                'success' => false,
                'message' => 'Pago no encontrado con esa referencia.',
            ], 404);
        }
        $addres = [
            'number_contact' => $request->number_contact,
            'name_contact' => $request->name_contact,
        ];
        $cliente->locate = json_encode($addres);
        $cliente->save();
        $pay->collect = $request->locate;
        $pay->locate = json_encode($addres);
        $pay->valor_envio = 0;
        $pay->save();

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
            if ($value['GroupType'] == 'producto') {
                $product = SolarProducts::where('id', $value['id'])->first();
            } else {
                $product = SolarKit::where('id', $value['id'])->first();
                $product->products = is_array($product->products) ? $product->products : [];
                $equiposList = [];
                $tiposAgregados = [];
                $filesAgregados = 0;
                foreach ($product->products as $items) {
                    $produ = SolarProducts::find($items['id']);
                    if ($produ && $produ->files && !in_array($produ->type, $tiposAgregados)) {
                        foreach ($produ->files as $file) {
                            $equiposList[] = $file;
                            $tiposAgregados[] = $produ->type;
                            $filesAgregados++;
                            break;
                        }
                    }
                    if ($filesAgregados >= 4) {
                        break;
                    }
                }
                $product->files = $equiposList;
            }
            if ($product) {
                $tipo = $product->type;
                if (!$products->has($tipo)) {
                    $product->cantidad = 1;
                    $product->valor = $value['valor'];
                    $product->groupType = $value['GroupType'];
                    $products[$tipo] = $product;
                } else {
                    $products[$tipo]->cantidad += 1;
                }
                $products[$tipo]['valor'] = $products[$tipo]['cantidad'] * $value['valor'];
            }
        }
        $order->locate = $order->locate ? json_decode($order->locate, true) : [];
        $order->products = $products;
        $order->total = collect($products)->sum('valor');
        return view('store.order_detail', compact('cliente', 'order', 'all_products', 'products'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolarProducts;
use App\Models\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
Use App\Models\store\Cart;
Use App\Models\store\Pay;
use Illuminate\Support\Facades\Log;

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
        $cart_client = Cart::where('client_id',auth('tienda')->id())->first();

        $products = [];
        $all_products=[];
        $total=0;
        $exist=false;

        $total_product=$request->amount_item*$id->price;

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

        if(!$exist){
            $product = [
                'product' => $id->type,
                'cantidad' => (int)$request->amount_item,
                'valor' => $total_product,
            ];
            $all_products[] = $product;
        }

        foreach ($all_products as $item) {
            $subtotal = $item['valor'];
            $total+= $subtotal;
        }

        $product= json_encode($all_products);

        if(empty($cart_client)){
                Cart::create([
                    'client_id'=>auth('tienda')->id(),
                    'products'=>$product,
                    'total'=>$total,
                ]);
        } else {
            $cart_client->update([
                'products'=>$product,
                'total'=>$total,
            ]);
        }

        return redirect()->intended('/product/store/view/105519');
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
        $product=SolarProducts::where('status',1)->get();
        $types=[];

        foreach ($product as $item) {
            $type=$item->type;
            if (!in_array($type, $types)) {
                $types[] = $type;
            }
        }
        foreach ($types as $value) {
            $product = SolarProducts::where('status', 1 )->where('type', $value)->first();
            if ($product) {
                $products[] = $product;
            }
        }
        $all_products=[];
        $cart_client = Cart::where('client_id',auth('tienda')->id())->first();
        if($cart_client){
            $all_products = json_decode($cart_client->products, true) ?? [];
        }
        if($id->status==1){
            return view('store.products', compact('id', 'products', 'cliente','cart_client','all_products'));
        } else{
            return redirect()->route('welcome')->with('title','No disponible')->with('success',);
        }

    }

    public function show_cart(){
        $cart_client = Cart::where('client_id',auth('tienda')->id())->first();
        $products=[];
        $all_products = json_decode($cart_client->products, true) ?? [];
        $cliente = Auth::guard('tienda')->user();
        $product=SolarProducts::where('status',1)->get();
        foreach ($all_products as $item) {
            $product = SolarProducts::where('status', 1 )->where('type', $item['product'])->first();
            $available = count( SolarProducts::where('status', 1 )->where('type', $item['product'])->get());
            if ($product) {
                $product['cantidad'] = $item['cantidad'];
                $product['valor'] = $item['valor'];
                $product['disponibles'] = $available;
                $products[] = $product;
            }
        };

        // return $products;

        return view('store.cart', compact('cart_client','all_products','cliente', 'product','products'));
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

        if ($payload['event'] === 'transaction.updated') {
            $transaction = $payload['data']['transaction'];
            $status = $transaction['status'];
            $reference = $transaction['reference'];

            Log::info("Transacción {$reference} actualizada a estado {$status}");
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

        $cart = Cart::where('client_id',auth('tienda')->id())->first();

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

        $cart = Cart::where('client_id',auth('tienda')->id())->first();

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
        $products=[];
        if($form==1){
            $products = Cart::where('client_id',auth('tienda')->id())->first();
            // $all_products = json_decode($products->products, true) ?? [];
        }else{
            $product = SolarProducts::where('status', 1 )->where('type', $value)->first();
        }
        $locate=json_decode($cliente->locate, true);
        $reference = 'REF_' . now()->format('YmdHis') . '_' . $id;
        return view('store.pay', compact('cliente','locate','products','reference'));
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
        
        $addres=[
            'number_contact'=>$request->number_contact,
            'name_contact'=>$request->name_contact,
            'address'=>$request->address,
            'departament'=>$request->departament,
            'city'=>$request->city,
            'house'=>$request->house,
            'cod_postal'=>$request->cod_postal,
            'others'=>$request->others,
        ];

        $cliente->locate = json_encode($addres);
        $cliente->save();
        return response()->json([
            'success' =>true,
        ]);
    }
}

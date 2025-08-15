<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Energy\Offer;
use App\Models\Energy\SolarKit as EnergySolarKit;
use App\Models\SolarProducts;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class SolarKitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver Productos', ['only' => ['index']]);
        $this->middleware('permission:Crear Productos', ['only' => ['store', 'create']]);
        $this->middleware('permission:Editar Productos', ['only' => ['update', 'edit']]);
        $this->middleware('permission:ELiminar Productos', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kits = EnergySolarKit::TypeKit();

        $offer = Offer::latest()->first();
        $kitSelect = null;
        if ($offer && !empty($offer->kit_id)) {
            $kitSelect = EnergySolarKit::find($offer->kit_id);
            if ($kitSelect) {
                $decoded = json_decode($kitSelect->caracteristics ?? '', true);
                $kitSelect->caracteristics = is_array($decoded) ? $decoded : [];
            }
        }

        if (!$offer) {
            $offer = (object)[
                'kit_id' => null
            ];
        }

        return view('energy.kits.index', compact('kits', 'offer', 'kitSelect'));
    }

    public function offer(Request $request)
    {
        $request->validate([
            'kit' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Offer::create([
            'kit_id'     => $request->kit,
            'admin_id'   => auth()->user()->id,
            'description' => $request->description,
            'status'     => $request->status,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);
        return redirect()->route('energy_kits.index')->with('success', 'Kit publicado.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = SolarProducts::getCategories();
        return view('energy.kits.create', compact('categorias'));
    }

    public function getsubcategories($categoryId)
    {
        $subcategories = SolarProducts::getSubcategories($categoryId);
        return response()->json($subcategories);
    }

    public function getProducts($subcategories)
    {
        $products = SolarProducts::getProducts($subcategories);
        return response()->json($products);
    }

    public function getInfo($id)
    {
        $id = EnergySolarKit::find($id);
        $id->caracteristics = json_decode($id->caracteristics, true);
        $id->potencia_dia = $id->caracteristics['potencia_dia'];
        $id->potencia_nominal = $id->caracteristics['potencia_nominal'];
        $id->voltaje = $id->caracteristics['voltaje'];
        return response()->json($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
        ]);

        $request['status'] = 1;
        $caracteristics = [
            'potencia_dia' => $request->potencia_dia,
            'potencia_nominal' => $request->potencia_nominal,
            'voltaje' => $request->voltaje,
        ];
        $request['caracteristics'] = json_encode($caracteristics);
        $products = $request->input('products');
        $productos = [];
        foreach ($products['category'] as $index => $categoryId) {
            $subId = $products['subcategori'][$index];
            $productId = $products['products'][$index];
            $amount    = $products['amount_products'][$index] ?? 1;

            $productos[] = [
                'category_id'    => $categoryId,
                'subcategory_id' => $subId,
                'product_id'     => $productId,
                'amount'         => $amount,
            ];
        }
        DB::beginTransaction();
        try {
            $nombre_original = $request['name'];
            $arr_name = explode(' ', $nombre_original);
            $iniciales = '';
            for ($i = 0; $i < count($arr_name); $i++) {
                $iniciales = $iniciales . str_split($arr_name[$i])[0];
            }
            for ($i = 1; $i <= $request->amount; $i++) {
                $alto = 0;
                $ancho = 0;
                $largo = 0;
                $peso = 0;
                $equipment = [];
                foreach ($productos as $value) {
                    $product = SolarProducts::find($value['product_id']);
                    if ($product) {
                        $equipos = SolarProducts::where('subcategory_id', $value['subcategory_id'])
                            ->where('category_id', $value['category_id'])
                            ->where('type', $product->type)
                            ->where('status', 1)
                            ->limit($value['amount'])
                            ->get();
                        if ($equipos) {
                            foreach ($equipos as $equipo) {
                                $equi = SolarProducts::find($equipo->id);
                                $equi->status = 4;
                                $equi->save();

                                $alto += $equi->alto;
                                $ancho += $equi->ancho;
                                $largo += $equi->largo;
                                $peso += $equi->peso;
                                $equipment[] = $equi;
                            }
                        }
                    }
                }
                $id = EnergySolarKit::create([
                    'name' => $request['name'],
                    'type' => $request['type'],
                    'products' => $equipment,
                    'caracteristics' => $request['caracteristics'],
                    'description' => $request['description'],
                    'warranty' => $request['warranty'],
                    'price' => $request['price'],
                    'discount' => $request['discount'] ?? 0,
                    'final_price' => $request['final_price'] ?? $request['price'],
                    'status' => $request['status'],
                    'alto' => $alto,
                    'ancho' => $ancho,
                    'largo' => $largo,
                    'peso' => $peso,
                ]);
                $codigo = 'KE-' . $iniciales . '-' . $id->id;
                $id->cod_kit = strtoupper($codigo);
                $id->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error creating kit: ' . $e->getMessage());
        }
        return redirect()->route('energy_kits.index')->with('success', 'Kit creado.');
    }


    public function amountProducts($id, $amount, $kit)
    {
        $product = SolarProducts::find($id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }
        $avaliables = SolarProducts::where('subcategory_id', $product->subcategory_id)
            ->where('type', $product->type)->where('status', 1)->count();
        if ($avaliables >= $amount * $kit) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'disponibles' => $avaliables, 'message' => 'Not enough products available']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $kitsGroup = EnergySolarKit::where('type', $type)->get();
        if ($kitsGroup->isEmpty()) {
            return redirect()->back()->with('error', 'No kits found for this type.');
        }
        $kit = EnergySolarKit::where('type', $type)->first();
        $products = collect();
        $kit->caracteristics = json_decode($kit->caracteristics, true);
        $kit->products = is_array($kit->products) ? $kit->products : [];
        foreach ($kit->products as $product) {
            $product = SolarProducts::find($product['id']);
            if ($product) {
                if (!isset($products[$product->type])) {
                    $product->cantidad = 1;
                    $products[$product->type] = $product;
                } else {
                    $products[$product->type]->cantidad += 1;
                    $products[$product->type]->valor += $product->price;
                }
            }
        }

        return view('energy.kits.show', compact('kit', 'products', 'kitsGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        $kit = EnergySolarKit::where('type', $type)->first();
        if (!$kit) {
            return redirect()->back()->with('error', 'Kit not found.');
        }
        $kit->caracteristics = json_decode($kit->caracteristics, true);
        $kit->products = is_array($kit->products) ? $kit->products : [];
        $categorias = SolarProducts::getCategories();;
        $count = EnergySolarKit::CountTypes($kit->type);
        $products = collect();
        foreach ($kit->products as $product) {
            $product = SolarProducts::find($product['id']);
            if ($product) {
                if (!isset($products[$product->type])) {
                    $product->cantidad = 1;
                    $products[$product->type] = $product;
                } else {
                    $products[$product->type]->cantidad += 1;
                    $products[$product->type]->valor += $product->price;
                }
            }
        }
        return view('energy.kits.edit', compact('kit', 'categorias', 'count', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnergySolarKit $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
        ]);
        $kits = EnergySolarKit::where('type', $id->type)->get();
        $caracteristics = [
            'potencia_dia' => $request->potencia_dia,
            'potencia_nominal' => $request->potencia_nominal,
            'voltaje' => $request->voltaje,
        ];
        $request['caracteristics'] = json_encode($caracteristics);

        $NewEquipos = [];
        $newProducts = $request->input('products');
        if (isset($newProducts['products'])) {
            foreach ($newProducts['products'] as $index => $NewproductId) {
                $NewEquipos[] = [
                    'id' => $NewproductId,
                    'amount' => $newProducts['amount_products'][$index],
                ];
            }
        }
        DB::beginTransaction();
        try {
            foreach ($kits as $kit) {
                $FinalEquipments = [];
                $product = [];
                $oldProducts = is_array($kit->products) ? $kit->products : [];
                $alto = 0;
                $ancho = 0;
                $largo = 0;
                $peso = 0;
                foreach ($oldProducts as $productId) {
                    $product = SolarProducts::find($productId['id']);
                    if ($product) {
                        $product->update(['status' => 1]);
                    }
                }
                $products = [];
                $oldInput = $request->input('oldProduct');
                if (isset($oldInput['products_id'])) {
                    foreach ($oldInput['products_id'] as $index => $productId) {
                        $products[] = [
                            'id' => $productId,
                            'amount' => $oldInput['amount_product'][$index],
                        ];
                    }
                }
                foreach ($NewEquipos as $newProduct) {
                    $products[] = [
                        'id' => $newProduct['id'],
                        'amount' => $newProduct['amount'],
                    ];
                }
                foreach ($products as $productData) {
                    $productModel = SolarProducts::find($productData['id']);
                    if ($productModel) {
                        $equipos = SolarProducts::where('subcategory_id', $productModel->subcategory_id)
                            ->where('category_id', $productModel->category_id)
                            ->where('type', $productModel->type)
                            ->where('status', 1)
                            ->limit($productData['amount'])
                            ->get();
                        if ($equipos) {
                            foreach ($equipos as $equipo) {
                                $equipo->update(['status' => 4]);
                                $alto += $equipo->alto;
                                $ancho += $equipo->ancho;
                                $largo += $equipo->largo;
                                $peso += $equipo->peso;
                                $FinalEquipments[] = $equipo;
                            }
                        }
                    }
                }
                $request['products'] = $FinalEquipments;
                $kit->update([
                    'name' => $request['name'],
                    'type' => $request['type'],
                    'products' => $FinalEquipments,
                    'caracteristics' => $request['caracteristics'],
                    'description' => $request['description'],
                    'warranty' => $request['warranty'],
                    'price' => $request['price'],
                    'discount' => $request['discount'] ?? 0,
                    'final_price' => $request['final_price'] ?? $request['price'],
                    'alto' => $alto,
                    'ancho' => $ancho,
                    'largo' => $largo,
                    'peso' => $peso,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating kit: ' . $e->getMessage());
        }

        return redirect()->route('energy_kits.index')->with('success', 'Kit actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_all($id)
    {
        $kitFirst = EnergySolarKit::find($id);
        if (!$kitFirst) {
            return redirect()->back()->with('error', 'Kit not found.');
        }

        DB::beginTransaction();
        try {
            $kits = EnergySolarKit::where('type', $kitFirst->type)->get();
            foreach ($kits as $kit) {
                $products = is_array($kit->products) ? $kit->products : [];
                foreach ($products as $productData) {
                    $product = SolarProducts::find($productData['id']);
                    if ($product) {
                        $product->update(['status' => 1]);
                    }
                }
                $kit->delete();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error deleting kit: ' . $e->getMessage());
        }

        return redirect()->route('energy_kits.index')->with('success', 'Kit eliminado.');
    }
}

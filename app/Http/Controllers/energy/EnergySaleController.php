<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Energy\SolarClients;
use App\Models\Energy\SolarKit;
use App\Models\Energy\SolarSeller;
use App\Models\SolarProducts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class EnergySaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver Ventas', ['only' => ['index']]);
        $this->middleware('permission:Crear Ventas', ['only' => ['store','create']]);
        $this->middleware('permission:Editar Ventas', ['only' => ['update','edit']]);
        $this->middleware('permission:ELiminar Ventas', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=SolarSeller::get();
        return view('energy.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client=SolarClients::get();
        $products=SolarProducts::where('status',1)->get();
        $categorias = SolarProducts::getCategories();
        $kits = SolarKit::TypeKitFree();
        return view('energy.sale.create', compact('client', 'products', 'categorias', 'kits'));
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
            'valorventa'=>['required'],
            'fechaventa'=>['required'],
        ]);
        if($request->newCliente==1){
            $request->validate([
                'nameNew'=>['required'],
                'typeIdNew'=>['required'],
                'ideNew'=>['required'],
                'telNew'=>['required'],
                'emailNew'=>['required'],
                'departamentNew'=>['required'],
                'municipioNew'=>['required'],
                'type_clientNew'=>['required'],
            ]);
            $Cliente=SolarClients::create([
                'name'=>$request->nameNew,
                'typeId'=>$request->typeIdNew,
                'ide'=>$request->ideNew,
                'email'=>$request->emailNew,
                'tel'=>$request->telNew,
                'type_client'=>$request->departamentNew.', '. $request->municipioNew,
                'locate'=>$request->type_clientNew,
            ]);
            $Cliente_id=$Cliente->id;
        }

        if($request->newCliente==0){
            $request->validate([
                'client'=>['required'],
                'nameClient'=>['required'],
                'typeId'=>['required'],
                'ide'=>['required'],
                'locate'=>['required'],
                'type_client'=>['required'],
            ]);
            SolarClients::find($request->client)->update($request->all());
            $Cliente_id=$request->client;
        }
        if($request->products)
        {
            $productSold=$request->input('products');
            foreach ($productSold['category'] as $index => $categoryId) {
                $subId = $productSold['subcategori'][$index];
                $productId = $productSold['products'][$index];
                $amount    = $productSold['amount_products'][$index] ?? 1;
                $value    = $productSold['value_products'][$index];
                $warranty    = $productSold['warranty_products'][$index];

                $productsSoldData[] = [
                    'category_id'    => $categoryId,
                    'subcategory_id' => $subId,
                    'product_id'     => $productId,
                    'amount'         => $amount,
                    'value'         => $value,
                    'warranty'         => $warranty,
                ];
            }
        }

        if($request->kit)
        {
            $kitSold=$request->input('kit');
            foreach ($kitSold['kit'] as $indexKit => $kitId)
            {
                $kit = $kitSold['kit'][$indexKit];
                $kitValue = $kitSold['value_kits'][$indexKit];
                $kitWarranty = $kitSold['warranty_kits'][$indexKit];
                $kitSoldData[] = [
                    'kit_id' => $kit,
                    'value' => $kitValue,
                    'warranty' => $kitWarranty,
                ];
            }
        }
        if($request->item)
        {
            $itemSoldPlus = $request->input('item');
            foreach ($itemSoldPlus['extra_item'] as $indexItem => $item) {
                $itemValue = $itemSoldPlus['extra_value'][$indexItem];
                $itemSoldData[] = [
                    'item' => $item,
                    'value' => $itemValue,
                ];
            }

        }
        DB::beginTransaction();
        try {
            $itemSold = [];
            if (isset($productsSoldData)) {
                foreach ($productsSoldData as $productData) {
                    for ($i=1; $i <= $productData['amount'] ; $i++) {
                        $producType=SolarProducts::find($productData['product_id']);
                        $productUpdate=SolarProducts::where('type', $producType->type)
                            ->where('subcategory_id', $producType->subcategory_id)
                            ->where('status', 1)
                            ->first();
                        if ($productUpdate) {
                            $productUpdate->update([
                                'id_buyer' => $Cliente_id,
                                'status' => 3,
                            ]);
                            $itemSold[] = [
                                'type' => 'SolarProduct',
                                'id' => $productUpdate->id,
                                'value' => $productData['value'],
                                'warranty' => $productData['warranty'],
                            ];
                        }

                    }
                }
            }

            if (isset($kitSoldData)) {
                foreach ($kitSoldData as $kitData) {
                    $kitType = SolarKit::find($kitData['kit_id']);
                    $kitUpdate = SolarKit::where('type', $kitType->type)
                        ->where('name', $kitType->name)
                        ->where('status', 1)
                        ->first();
                    if ($kitUpdate) {
                        $kitUpdate->update([
                            'id_buyer' => $Cliente_id,
                            'status' => 3,
                        ]);
                        $itemSold[] = [
                            'type' => 'SolarKit',
                            'id' => $kitUpdate->id,
                            'value' => $kitData['value'],
                            'warranty' => $kitData['warranty'],
                        ];
                    }
                }
            }

            if (isset($itemSoldData)) {
                foreach ($itemSoldData as $extraItem) {
                    $itemSold[] = [
                        'type' => 'ExtraItem',
                        'value' => $extraItem['value'],
                        'item' => $extraItem['item'],
                    ];
                }
            }

            SolarSeller::create([
                'id_seller' => auth()->id(),
                'id_Client' => $Cliente_id,
                'valor' => $request->valorventa,
                'datesale' => $request->fechaventa,
                'cod_sale' => strtoupper('VE-' . auth()->user()->initials . '-' . time()),
                'productsList' => $itemSold,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al procesar la venta: ' . $e->getMessage());
        }
        return redirect()->route('energy_sale')->with('success','Venta Realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SolarSeller $id)
    {
        // return $id->ProductsLists();
        $pdf = PDF::loadView('energy.sale.include.invoice', compact('id'));
        return $pdf->download('Factura-'.$id->cod_sale.'.pdf');
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

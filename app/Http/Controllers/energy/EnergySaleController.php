<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Energy\SolarClients;
use App\Models\Energy\SolarSeller;
use App\Models\SolarProducts;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

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
        return view('energy.sale.create', compact('client', 'products'));
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
            'productId'=>['required'],
            'ModelProduct'=>['required'],
            'garantiaventa'=>['required'],
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

        $products=SolarProducts::find($request->ModelProduct);

        $products->update([
            'id_buyer'=>$Cliente_id,
            'status'=>2,
        ]);

        $nombre_original = $products->type;
        $arr_name = explode(' ',$nombre_original);
        $iniciales = '';
        for ($i=0; $i < count($arr_name); $i++) {
            $iniciales = $iniciales.str_split($arr_name[$i])[0];
        }

        $Sale=SolarSeller::create([
            'id_seller'=>auth()->id(),
            'id_Client'=>$Cliente_id,
            'id_Product'=>$request->ModelProduct,
            'warranty'=>$request->garantiaventa,
            'valor'=>$request->valorventa,
            'datesale'=>$request->fechaventa
        ]);

        $codigo='VE-'.$iniciales.'-'.$Sale->id;
        $Sale->update(['cod_sale'=>strtoupper($codigo)]);

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

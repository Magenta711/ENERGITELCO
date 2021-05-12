<?php

namespace App\Http\Controllers\cvs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\cvs_activation_type;
use App\Models\cvs\cvs_client;
use App\Models\cvs\cvs_sale;
use App\Models\cvs\cvs_sale_detail;
use App\Models\cvs\inventory\cvs_inv_accesory;
use App\Models\cvs\inventory\cvs_inv_moviles;
use App\Models\cvs\inventory\cvs_inv_sim;
use Illuminate\Support\Facades\Mail;
use App\Exports\SalesExport;
use App\Http\Controllers\retiredUserController;
use App\Models\cvs\inventory\cvs_inv_claro_service;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class CvsSalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de ventas|CVS Exportar reporte de ventas|CVS Crear ventas|CVS Ver ventas|CVS Finalizar ventas|CVS Cancelar ventas',['only' => ['index']]);
        $this->middleware('permission:CVS Exportar reporte de ventas',['only' => ['export']]);
        $this->middleware('permission:CVS Crear ventas',['only' => ['create','store']]);
        $this->middleware('permission:CVS Ver ventas|CVS Finalizar ventas',['only' => ['show']]);
        $this->middleware('permission:CVS Finalizar ventas',['only' => ['end']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = cvs_sale::get();
        return view('cvs.sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accesories = cvs_inv_accesory::where('status',1)->get();
        $moviles = cvs_inv_moviles::where('status',1)->get();
        $sims = cvs_inv_sim::where('status',1)->where('user_id',auth()->id())->get();
        $services = cvs_inv_claro_service::where('status',1)->get();
        $sedes = cvs_sede::get();
        $activations = cvs_activation_type::get();
        $users = User::where('state',1)->get();
        return view('cvs.sales.create',compact('accesories','moviles','sims','services','sedes','activations','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = cvs_client::where('document',$request->document)->first();
        $token = time().Str::random(20);
        if ($client) {
            $client->update([
                'name' => $request->name,
                'document' => $request->document,
                'email' => $request->email,
                'document_type' => $request->document_type,
                'tel' => $request->tel,
                'send_emails' => $request->send_emails,
                'converged_client' => $request->converged_client,
            ]);
        }else {
            $client = cvs_client::create([
                'name' => $request->name,
                'document' => $request->document,
                'email' => $request->email,
                'tel' => $request->tel,
                'document_type' => $request->document_type,
                'send_emails' => $request->send_emails ? $request->send_emails : 0,
                'converged_client' => $request->converged_client,
                'token' => $token,
                'status' => 1,
            ]);
        }
        $sale = cvs_sale::create([
            'client_id' => $client->id,
            'user_id' => auth()->id(),
            'cashier_id' => $request->cashier_id,
            'sede_id' => $request->sede_id,
            'sale_date' => now(),
            'expiration_date' => now()->addMonth(3),
            'total' => $request->total,
            'commentary' => $request->commentary,
            'status' => 3
        ]);

        $sale->update([
            'cod_invoice' => 'RC-00000'.$sale->id,
        ]);
        for ($i=0; $i < count($request->product); $i++) { 
            switch ($request->product[$i]) {
                case '1':
                    $product = 'App\Models\cvs\inventory\cvs_inv_moviles';
                    break;
                case '2':
                    $product = 'App\Models\cvs\inventory\cvs_inv_sim';
                    break;
                case '3':
                    $product = 'App\Models\cvs\inventory\cvs_inv_accesory';
                    break;
                case '4':
                    $product = 'App\Models\cvs\inventory\cvs_inv_claro_service';
                    break;
            }
            $sale_detail = cvs_sale_detail::create([
                'sale_id' => $sale->id,
                'productable_type' => $product,
                'productable_id' => $request->description_id[$i],
                'type_sale' => $request->type_sale[$i],
                'activation_type_id' => $request->activation_type[$i],
                'amount' => $request->amount[$i],
                'value' => $request->value[$i],
                'total_value' => $request->total_value[$i],
            ]);
        }
        return redirect()->route('cvs_sales')->with('success','Se ha generado la venta correctamente el cliente puede pasar a la caja');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_sale $id)
    {
        return view('cvs.sales.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_sale $id)
    {
        return view('cvs.sales.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_sale $id)
    {
        $id->update([
            'commentary' => $request->commentary
        ]);

        foreach ($id->details as $item){
            if (isset($request->activation_date[$item->id])) {
                cvs_sale_detail::where('id',$item->id)->update([
                    'activation_date' => $request->activation_date[$item->id]
                ]);
            }
            if (isset($request->payroll[$item->id])) {
                cvs_sale_detail::where('id',$item->id)->update([
                    'payroll' => $request->payroll[$item->id]
                ]);
            }
        }

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = time().'_file.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/cvs/cajas/', $file, $name);
            $id->file()->create([
                'name' => $name,
                'description' => $id->cod_invoice,
                'size' => $size.' KB',
                'url' => $path,
                'type' => $file->getClientOriginalExtension(),
                'state' => 1
            ]);
        }

        return redirect()->route('cvs_sales')->with('success','Se ha editado la compra correctamente');
    }
    public function end(Request $request,cvs_sale $id)
    {
        $id->update(['status' => 1]);
        return redirect()->route('cvs_sales')->with('success','Se ha finalizado la compra correctamente');
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

    public function export(Request $request) 
    {
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        switch ($request->by) {
            case '1':
                $data = cvs_sale_detail::whereDate('created_at',now()->format('Y-m-d'))->get();
                $start_month = now()->format('m');
                $end_month = now()->format('m');
                break;
            case '2':
                $start_month = Carbon::create($request->by_day)->format('m');
                $end_month = Carbon::create($request->by_day)->format('m');
                $data = cvs_sale_detail::whereDate('created_at', $request->by_day)->get();
                break;
            case '3':
                $time = Carbon::create($request->by_week);
                $start_month = $time->startOfWeek()->format('m');
                $end_month = $time->endOfWeek()->format('m');
                $data = cvs_sale_detail::whereBetween('created_at', [$time->startOfWeek()->format('Y-m-d'), $time->endOfWeek()->format('Y-m-d')])->get();
                break;
            case '4':
                $time = Carbon::create($request->by_month)->format('m');
                $timeY = Carbon::create($request->by_month)->format('Y');
                $start_month = $time;
                $end_month = $time;
                $data = cvs_sale_detail::whereYear('created_at',$timeY)->whereMonth('created_at',$time)->get();
                break;
            case '5':
                $start_month = 1;
                $end_month = 12;
                $data = cvs_sale_detail::whereYear('created_at',$request->by_year)->get();
                break;
            case '6':
                $start_month = Carbon::create($request->start_day)->format('m');
                $end_month = Carbon::create($request->end_date)->format('m');
                $data = cvs_sale_detail::whereBetween('created_at', [$request->start_day, $request->end_date])->get();
                break;
            default:
                return redirect()->back()->withErrors(['Consulta invalidad']);
                break;
        }
        return (new SalesExport($data,$start_month, $end_month))->download(time().'_repote_de_ventas.xlsx');
    }
}

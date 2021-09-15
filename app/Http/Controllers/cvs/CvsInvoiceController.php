<?php

namespace App\Http\Controllers\cvs;

use App\Exports\CvsCutExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\cvs_advertising;
use App\Models\cvs\cvs_sale;
use App\Models\cvs\cvs_sale_detail;
use App\Models\cvs_payment_cut;
use App\Models\system_setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use App\Notifications\notificationMain;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CvsInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de recibos por pagar|CVS Pagar recibos|CVS Cancelar ventas',['only' => ['index']]);
        $this->middleware('permission:CVS Pagar recibos',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Cancelar ventas',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = cvs_sale::where('status',3)->where('cashier_id',auth()->id())->get();
        return view('cvs.invoice.index',compact('sales'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(cvs_sale $id)
    {
        if ($id->status == 3 && $id->cashier_id == auth()->id()) {
            return view('cvs.invoice.edit',compact('id'));
        }
        return redirect()->route('cvs_invoices')->with('success','No tienes acceso a esta página');
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
        $expire = date('d/n/Y', strtotime($request->expiration_date));
        $token = time().Str::random(10);
        $id->update([
            'cash' => $request->cash,
            'cash_value' => $request->cash_value,
            'qr' => $request->qr,
            'qr_value' => $request->qr_value,
            'card' => $request->card,
            'card_value' => $request->card_value,
            'token' => $token,
            'cashier_id' => auth()->id(),
            'status' => 2,
        ]);

        // Guardar el archivo adjunto
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

        // Descontar de la bodega
        foreach ($id->details as $value) {
            if ($value->productable_type == 'App\Models\cvs\inventory\cvs_inv_accesory') {
                $amount = $value->productable->amount - $value->amount;
                $value->productable->update([
                    'status'=> ($amount > 0) ? 1 : 0,
                    'amount' => $amount
                ]);
            }else {
                if ($value->productable_type != 'App\Models\cvs\inventory\cvs_inv_claro_service') {
                    $value->productable->update(['status'=>0]);
                }
            }
        }

        $advertisings = cvs_advertising::get();
        $actives = 0;
        $advertising='';
        foreach ($advertisings as $value) {
            if ($value->date_start <= now()->format('Y-m-d') && $value->date_end >= now()->format('Y-m-d') && $value->status != 0) {
                $value->update([ 'status' => 1 ]);
                $advertising = $value->file;
                $r[] = $value->date_start.' <= '.now()->format('Y-m-d').' Y '.$value->date_end.' >= '.now()->format('Y-m-d').' = '.$value->status.' **';
                $actives++;
            }else {
                $value->update([ 'status' => 0 ]);
                $r[] = $value->date_start.' <= '.now()->format('Y-m-d').' Y '.$value->date_end.' >= '.now()->format('Y-m-d').' = '.$value->status;
            }
        }

        $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
        $pdf = PDF::loadView('cvs.invoice.invoice_pdf',['id'=>$id,'expire'=>$expire, 'system' => $system ]);
        $pdf->save(storage_path('app/public/cvs/invoice/') .$token.'.pdf');

        Mail::send('cvs.email.invoice',['id' => $id, 'expire' => $expire, 'advertising' => $advertising] , function ($mail) use ($pdf,$id) {
            $mail->subject("Energitelco S.A.S. Recibo de pago CVS");
            $mail->to($id->client->email, $id->client->name);
            $mail->attachData($pdf->output(), $id->cod_invoice.'.pdf');
        }); 

        return redirect()->route('cvs_invoices')->with('success','Se ha realizado el pago correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cvs_sale $id)
    {
        $id->update(['status' => 0]);
        return redirect()->route('cvs_invoices')->with('success','Se ha cancelado la venta correctamente');
    }
    

    public function cut()
    {
        // date last breack where user auth
        $cut = cvs_payment_cut::where('status',2)->where('user_id',auth()->id())->get()->last();
        // query items
        if ($cut) {
            $items = cvs_sale::where('cashier_id',auth()->id())->whereBetween('created_at',[$cut->start_date, now()->format('Y-m-d H:i:s')])->where('status','!=',0)->get();
        }else {
            $items = cvs_sale::where('cashier_id',auth()->id())->where('status','!=',0)->get();
        }
        // total
        $total = 0;
        $cash = 0;
        $qr = 0;
        $card = 0;
        
        foreach ($items as $value) {
            if($value->status == 2 || $value->status == 3){
                return redirect()->back()->withErrors('Todos tus vendedores deben finalizar las ventas generar el corte corte');
            }
            $total += floatval($value->total);
            if ($value->cash_value) {
                $cash += floatval($value->cash_value);
            }
            if ($value->qr_value) {
                $qr += floatval($value->qr_value);
            }
            if ($value->card_value) {
                $card += floatval($value->card_value);
            }
        }
        // update cut
        if ($cut) {
            $cut->update([
                'status' => 1,
                'value' => $total,
                'card' => $card,
                'cash' => $cash,
                'qr' => $qr,
                'end_date' => now(),
            ]);
        }else {
            $item = cvs_sale::where('cashier_id',auth()->id())->where('status',1)->first();
            if ($item) {
                $cut = cvs_payment_cut::create([
                    'user_id' => auth()->id(),
                    'status' => 1,
                    'value' => $total,
                    'card' => $card,
                    'cash' => $cash,
                    'qr' => $qr,
                    'start_date' => $item->created_at,
                    'end_date' => now()
                ]);
            }else {
                return redirect()->back()->withErrors('No tienes un historial de recaudos');
            }
        }
        // excel
        // download excel
        $file = Excel::download(new CvsCutExport($items,$cut),time().'_corte_de_pago_caja.xlsx');
        // email
        Mail::send('cvs/email/payment_cut',['cut' => $cut] , function ($mail) use ($file) {
            $mail->subject("Energitelco S.A.S. Corte de pago de caja");
            $mail->to('JORGE.ORTEGA@energitelco.com','JORGE ANDRES ORTEGA BEDOYA');
            $mail->attach($file->getFile(),['as' => 'corte.xlsx']);
        });
        // create cut
        cvs_payment_cut::create([
            'user_id' => auth()->id(),
            'status' => 2,
            'start_date' => now()
        ]);
        // alert value total
        return $file;
        return redirect()->route('cvs_invoices')->with('success','Se ha generado el corte de pago de caja por $ '.number_format($total,2,",",".").' correctamente');
    }
}

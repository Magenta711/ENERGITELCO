<?php

namespace App\Http\Controllers\ccjl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ccjl\ccjl_clients;
use App\Models\ccjl\ccjl_invoice;
use App\Models\ccjl\ccjl_pro_administration;
use App\Models\ccjl\ccjl_pro_local;
use App\Models\ccjl\ccjl_pro_services;
use App\Models\ccjl\ccjl_rents;
use App\Models\ccjl\ccjl_rents_detail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class ccjlRentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:CCJL Lista de rentas|CCJL Pagar rentas|CCJL Cancelar rentas|CCJL Crear rentas|CCJL Editar rentas|CCJL Ver rentas',['only' => ['index']]);
        $this->middleware('permission:CCJL Crear rentas',['only' => ['create','store']]);
        $this->middleware('permission:CCJL Editar rentas',['only' => ['edit','update']]);
        $this->middleware('permission:CCJL Ver rentas|CCJL Recordar pago de rentas|CCJL Pagar rentas',['only' => ['show']]);
        $this->middleware('permission:CCJL Pagar rentas',['only' => ['pay','save']]);
        $this->middleware('permission:CCJL Recordar pago de rentas',['only' => ['remember']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = ccjl_rents::get();
        return view('ccjl.rents.index',compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locals = ccjl_pro_local::where('status',1)->get();
        $administrations  = ccjl_pro_administration::where('status',1)->get();
        $services = ccjl_pro_services::where('status',1)->get();
        return view('ccjl.rents.create',compact('locals','administrations','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = ccjl_clients::where('document',$request->document)->first();
        if ($client) {
            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'document_type' => $request->document_type,
                'number' => $request->number,
            ]);
        }else {
            $client = ccjl_clients::create([
                'name' => $request->name,
                'document' => $request->document,
                'email' => $request->email,
                'number' => $request->number,
                'document_type' => $request->document_type,
                'status' => 1,
            ]);
        }

        $date_end = Carbon::create($request->date_start)->addMonths($request->total_months);

        $rent = ccjl_rents::create([
            'client_id' => $client->id,
            'user_id' => auth()->id(),
            'total' => $request->total,
            'date_start' => $request->date_start,
            'total_months' => $request->total_months,
            'date_end' => $date_end,
            'status' => 3
        ]);

        for ($i=0; $i < count($request->product); $i++) {
            switch ($request->product[$i]) {
                case '1':
                    $product = 'App\Models\ccjl\ccjl_pro_local';
                    ccjl_pro_local::find($request->description_id[$i])->update([
                        'status' => 0
                    ]);
                    break;
                case '2':
                    $product = 'App\Models\ccjl\ccjl_pro_services';
                    break;
                case '3':
                    $product = 'App\Models\ccjl\ccjl_pro_administration';
                    break;
            }
            $rent_detail = ccjl_rents_detail::create([
                'rent_id' => $rent->id,
                'productable_type' => $product,
                'productable_id' => $request->description_id[$i],
                'months' => $request->months[$i],
                'month_rest' => $request->months[$i],
                'value' => $request->value[$i],
                'total_value' => $request->total_value[$i],
            ]);
        }
        for ($i=1; $i <= $request->total_months; $i++) {
            $token = time().Str::random(20);
            $date = Carbon::create($request->date_start)->addMonths($i)->format('Y-m-d');
            $total = 0;
            for ($j=0; $j < count($request->product); $j++) {
                if ($request->months[$j] >= $i) {
                    $total += $request->value[$j];
                }
            }
            $invoice = ccjl_invoice::create([
                'rent_id' => $rent->id,
                'total_pay' =>  $total,
                'expiration_date' => $date,
                'month' => $i,
                'token' => $token,
                'status' => 0
            ]);

            $invoice->update([
                'cod' => 'COD-000'.$invoice->id,
            ]);
        }
        return redirect()->route('CCJL_rents')->with('success','Se ha generado la renta correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ccjl_rents $id)
    {
        return view('ccjl.rents.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ccjl_rents $id)
    {
        $locals = ccjl_pro_local::where('status',1)->get();
        $administrations  = ccjl_pro_administration::where('status',1)->get();
        $services = ccjl_pro_services::where('status',1)->get();
        return view('ccjl.rents.edit',compact('id','locals','administrations','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ccjl_rents $id)
    {
        $request['date_end'] = Carbon::create($request->date_start)->addMonths($request->total_months);

        $id->update($request->all());
        
        for ($i=0; $i < count($request->product); $i++) {
            ccjl_rents_detail::where('id',$request->detail_id[$i])->update([
                'months' => $request->months[$i],
                'value' => $request->value[$i],
                'total_value' => $request->total_value[$i],
            ]);
        }
        for ($i=1; $i <= $request->total_months; $i++) {
            $total = 0;
            for ($j=0; $j < count($request->product); $j++) {
                if ($request->months[$j] >= $i) {
                    $total += $request->value[$j];
                }
            }
            $token = time().Str::random(20);
            $date = Carbon::create($request->date_start)->addMonths($i - 1)->format('Y-m-d');
            if ($request->total_months == $id->total_months) {
                $invoice = ccjl_invoice::where('rent_id',$id->id)->where('month',$i)->update([
                    'total_pay' => $total,
                    'expiration_date' => $date,
                ]);
            }else {
                if ($request->total_months >= $id->total_months) {
                    if ($id->total_months < $i) {
                        $invoice = ccjl_invoice::where('rent_id',$id->id)->where('month',$i)->update([
                            'total_pay' => $total,
                            'expiration_date' => $date,
                        ]);
                    }else {
                        $invoice = ccjl_invoice::create([
                            'rent_id' => $id->id,
                            'total_pay' => $total,
                            'expiration_date' => $date,
                            'month' => $i,
                            'token' => $token,
                            'status' => 0
                        ]);
                        $invoice->update([
                            'cod' => 'COD-000'.$invoice->id,
                        ]);
                    }
                }else {
                    $invoice = ccjl_invoice::where('rent_id',$id->id)->where('month',$i)->update([
                        'total_pay' => $total,
                        'expiration_date' => $date,
                    ]);
                    ccjl_invoice::where('rent_id',$id->id)->where('month','>',$request->total_months)->delete();
                }
            }
        }

        return redirect()->route('CCJL_rents')->with('success','Se ha actualizado la renta correctamente');
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

    public function pay(ccjl_invoice $id)
    {
        return view('ccjl.rents.pay',compact('id'));
    }

    public function save(Request $request, ccjl_invoice $id)
    {
        $total = 0;
        if (isset($request->cash)) {
            $total += $request->cash_value;
        }
        if (isset($request->qr)) {
            $total += $request->cash_value;
        }
        if (isset($request->card)) {
            $total += $request->cash_value;
        }
        $diff = $total - $id->total_pay;

        $id->update([
            'total' => $total,
            'cash' => $request->cash_value,
            'qr' => $request->qr_value,
            'card' => $request->card_value,
            'date_pay' => now(),
            'status' => 1,
        ]);

        foreach ($id->rent->details as $value) {
            if ($value->productable_type == 'App\Models\ccjl\ccjl_pro_local') {
                $value->productable->update([
                    'status' => 0,
                ]);
            }
        }   

        // traid for rest to month to month
        
        $pdf = PDF::loadView('ccjl.rents.invoice_pdf',['id'=>$id]);
        $pdf->save(storage_path('app/public/ccjl/invoice/') .$id->token.'.pdf');
        Mail::send('ccjl.email.invoice',['id' => $id] , function ($mail) use ($pdf,$id) {
            $mail->subject("CENTRO COMERCIAL JOSE LUIS Recibo de pago");
            $mail->to($id->rent->client->email, $id->rent->client->name);
            $mail->attachData($pdf->output(), $id->cod.'.pdf');
        });

        return redirect()->route('CCJL_rents')->with('success','Se ha realizado el pago correctamente');
    }

    public function remember(ccjl_invoice $id)
    {
        Mail::send('ccjl.email.remember',['id' => $id] , function ($mail) use ($id) {
            $mail->subject("CENTRO COMERCIAL JOSE LUIS recuerdo del pago");
            $mail->to($id->rent->client->email, $id->rent->client->name);
        });

        return redirect()->route('CCJL_rents')->with('success','Se ha notificado al cliente el pago correctamente');
    }
}

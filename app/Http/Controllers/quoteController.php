<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\notificationMain;
use App\User;
use App\Models\EnergyValues;
use App\Models\QuoteEnergy;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class quoteController extends Controller
{
    public function __construct() {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=EnergyValues::where('id',1)->first();
        // return $id;
        return view('energy.form', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.quotes_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NombrePdf = preg_replace("/\s+/", "",$request->name);

        // return $NombrePdf;
        $pdf = PDF::loadView('energy/quote_pdf', ['id' => $request]);
        $pdf->save(storage_path('app/public/cotizaciones/') . $NombrePdf.'COTIZACIÓN'.'.pdf');
        Mail::send('emails.quotes_user',['id' => $request] , function ($mail) use ($pdf,$request,$NombrePdf) {
            $mail->subject("ENERGITELCO TE ENVÍA TU COTIZACIÓN");
            $mail->to($request->email, $request->name);
            $mail->attachData($pdf->output(), $NombrePdf.'COTIZACIÓN'.'.pdf');
        });

        if($request->Visita == "True"){
            Mail::send('emails.quotes_visit',['id' => $request] , function ($mail) use ($pdf,$request,$NombrePdf) {
                $mail->subject("SE HA SOLICITADO UNA CITA PARA COTIZAR SU SISTEMA SOLAR");
                $mail->to($request->email, $request->name);
                $mail->attachData($pdf->output(), $NombrePdf.'COTIZACIÓN'.'.pdf');
            });
        }else{
            Mail::send('emails.quotes_admin',['id' => $request] , function ($mail) use ($pdf,$request,$NombrePdf) {
                $mail->subject("NUEVA COTIZACIÓN SISTEMA SOLAR");
                $mail->to('JORGE.ORTEGA@energitelco.com', 'JORGE ORTEGA');
                $mail->attachData($pdf->output(), $NombrePdf.'COTIZACIÓN'.'.pdf');
            });
        }
            // return $pdf;
        if($request->visita=='True'){
            $visita=1;
        }else{
            $visita=0;
        }
        $id=QuoteEnergy::create([
            'name'=>$request->name,
            'Correo'=>$request->email,
            'valorTotal'=>$request->ValorTotalSistema,
            'visita'=>$visita,
            'name_file'=>$NombrePdf.'COTIZACIÓN'.'.pdf'
        ]);

        return redirect()->back()->with(['success' => 'Se ha enviado tu cotización a tu correo']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function visit(Request $id)
    {

        Mail::send('emails.quotes_user',['id' => $request] , function ($mail) use ($pdf,$request) {
            $mail->subject("ENERGITELCO TE ENVÍA TU COTIZACIÓN");
            $mail->to($request->email, $request->name);
            $mail->attachData($pdf->output(), $request->name.' COTIZACIÓN'.'.pdf');
        });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $id)
    {

    }
}

<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chargeAccount;
use App\SignatureChargeAccount;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class chargeaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargeAccounts = chargeAccount::get();
        return view('human_management/chargeaccount/index',compact('chargeAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(string $token = null)
    {
        if ($token && !auth()->check()) {
            return view('human_management/chargeaccount/create',compact('token'));
        }else if(auth()->check() && !$token) {
            return view('human_management/chargeaccount/create',compact('token'));
        }
        return redirect('/home');
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
            'city' => ['required'],
            'date' => ['required'],
            'name' => ['required'],
            'document' => ['required'],
            'concept' => ['required'],
            'value' => ['required'],
        ]);
        if ($request->signature_id) {
            $signature = SignatureChargeAccount::where('name',$request->signature_id)->where('status',0)->first();
            if ($signature) {
                if ($request->token) {
                    $chargeAccount = chargeAccount::where('token',$request->token)->where('status',3)->first();
                    $chargeAccount->update($request->all());
                    $signature->update([
                        'signatures_type' => 'Models/chargeAccount',
                        'signatures_id' => $chargeAccount->id,
                        'status' => 1
                    ]);
                }else {
                    $request['user_id'] = auth()->id();
                    $chargeAccount = chargeAccount::create($request->all());
                    $signature->update([
                        'signatures_type' => 'Models/chargeAccount',
                        'signatures_id' => $chargeAccount->id,
                        'status' => 1
                    ]);
                }
                if($request->hasFile('files')){
                    for ($i=0; $i < count($request->file('files')); $i++) { 
                        $file = $request->file('files')[$i];
                        $name = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/chargeAccount/'.$name));
                        }else{
                            $path = Storage::putFileAs('public/chargeAccount/', $file, $name);
                        }
                        $chargeAccount->files()->create([
                            'nombre'=>$name,
                            'formulario'=>$chargeAccount->id,
                            'extencion' => $file->getClientOriginalExtension(),
                        ]);
                    }
                }
                return redirect()->route('chargeaccount')->with('success','Se ha enviado la cuenta de cobro correctamente');   
            }
        }
        return redirect()->back()->withErrors(['No se valido firma'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(chargeAccount $id)
    {
        return view('human_management/chargeaccount/show',compact('id'));
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

    public function approve($id = null)
    {
        
    }

    public function signature(Request $request)
    {
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->imagen));
        $name = time().str_random();
        $safeName = $name.'.png';
        Storage::put('private/signature/'.$safeName, $image, 'private');
        SignatureChargeAccount::create([
            'name' => $name,
            'file' => $safeName,
            'status' => 0
        ]);
        return response()->json( $name );
    }
}

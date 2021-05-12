<?php

namespace App\Exports;

use App\Models\project\planing\cable_rf;
use App\Models\project\planing\makeupsRf;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class markeRrfExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $makeups = makeupsRf::get();
        $cables = cable_rf::get();
        return view('pdf.marquilla_rf',['makeups'=>$makeups,'cables' =>$cables,'id' => $this->id]);
    }
}

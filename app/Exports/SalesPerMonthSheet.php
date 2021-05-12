<?php

namespace App\Exports;

use App\Models\cvs\cvs_sale_detail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalesPerMonthSheet implements FromView, WithTitle, ShouldAutoSize, WithStyles
{
    private $month;
    private $data;

    public function __construct(object $data, int $month)
    {
        $this->month = $month;
        $this->data  = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('cvs.sales.export', [
            'details' => $this->data,
            'month' => $this->month
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 13]],
            2    => ['font' => ['bold' => true,'size' => 12]],
        ];
    }


    /**
     * @return string
     */
    public function title(): string
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        return $meses[$this->month - 1];
    }
}

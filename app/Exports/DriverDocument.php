<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DriverDocument implements FromView, WithDrawings, WithStyles, ShouldAutoSize, WithTitle
{
    use Exportable;
    
    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(55);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'E2'    => ['font' => ['bold' => true, 'size' => 14]],
            // 23    => ['font' => ['bold' => true]],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
    {
        return view('logistics_infrastructure.drivers.export',[
            'data' => $this->data
        ]);
    }
    
    public function title(): string
    {
        return strtoupper('name');
    }
}

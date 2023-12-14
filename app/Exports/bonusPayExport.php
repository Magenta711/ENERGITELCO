<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class bonusPayExport implements FromView, WithDrawings, WithStyles, ShouldAutoSize
{
    use Exportable;

    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(30);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
            1  => ['font' => ['size' => 14]],
            2  => ['font' => ['size' => 13]],
        ];
    }

    /** 
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('human_management.bonus.administrative.export.list_pay', [
            'data' => $this->data
        ]);
    }
}

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

class CutBonusExport implements FromView, WithDrawings, WithStyles, ShouldAutoSize
{
    use Exportable;

    private $array;
    private $id;

    public function bonus($array,$id){
        $this->array = $array;
        $this->id = $id;

        return $this;
    }

    // Whit Image
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

    // whit styles
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true, 'size' => 14]],
            2    => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('human_management.bonus.technical.export.main', [
            'array' => $this->array,
            'id' => $this->id,
        ]);
    }
}
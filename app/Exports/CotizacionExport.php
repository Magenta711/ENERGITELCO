<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;


class CotizacionExport implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $files;
    use Exportable;


    public function __construct($id, $files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 1 || $value['place'] == 4 || $value['place'] == 3) {
                $array[$key] = new Drawing();
                $array[$key]->setName($value['name']);
                $array[$key]->setDescription($value['description']);
                $array[$key]->setPath($value['path']);
                $array[$key]->setHeight($value['height']);
                $array[$key]->setCoordinates($value['coordinates']);
            }
        }
        return $array;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'B' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'C' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'D' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'E' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'F' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'G' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'H' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'I' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'J' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'K' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'L' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'M' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'N' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     'L2' => ['alignment' => ['horizontal' => 'center']],

        //     1    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     2    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     3    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     4    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     10    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     15    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     25    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
        //     190    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'top']],
        //     166    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'top']],
        ];
    }

    public function view(): View
    {
        return view('energy.quoteSystem.export',[
            'id' => $this->id,
            'files' => $this->files,
        ]);
    }

    public function title(): string
    {
        return 'FORMATO EM5';
    }
}


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


class msuAirExport implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $dates;
    protected $files;
    use Exportable;


    public function __construct($dates, $files)
    {
        $this->dates = $dates;
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
            9    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            11    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            21    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            26   => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            27    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            29    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            31    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            80    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            166    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'top']],
            19    => ['font' => ['bold' => true,]],
            37    => ['font' => ['bold' => true,]],
        ];
    }

    public function view(): View
    {
        // return $files;
        return view('execution_works.maintenance.aire.export',[
            'dates' => $this->dates,
            'files' => $this->files,
        ]);
    }

    public function title(): string
    {
        return 'FORMATO EM2';
    }
}

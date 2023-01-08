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

class minticClockStopExportFirst implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $files;
    
    public function __construct(object $id,$files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 3 || $value['place'] == 4) {
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
            2    => ['font' => ['bold' => true, 'size' => 12 ], 'alignment' => ['horizontal' => 'center','vertical' => 'center']],
            'F2' => ['alignment' => ['wrapText' => true]],
            9    => ['font' => ['bold' => true, 'size' => 11]],
            10    => ['font' => ['bold' => true, 'size' => 14]],
            11    => ['font' => ['bold' => true, 'size' => 11]],
            13    => ['font' => ['bold' => true, 'size' => 11]],
            14    => ['font' => ['bold' => true, 'size' => 11]],
            15    => ['font' => ['bold' => true, 'size' => 14]],
            16    => ['font' => ['bold' => true, 'size' => 11]],
            37    => ['font' => ['bold' => true, 'size' => 11]],
            39    => ['font' => ['bold' => true, 'size' => 11]],
            41    => ['font' => ['bold' => true, 'size' => 11]],
            43    => ['font' => ['bold' => true, 'size' => 11]],
            45    => ['font' => ['bold' => true, 'size' => 11]],
            'B46'    => ['font' => ['bold' => true, 'size' => 11]],
            'B47'    => ['font' => ['bold' => true, 'size' => 11]],
            'B48'    => ['font' => ['bold' => true, 'size' => 11]],
            'B49'    => ['font' => ['bold' => true, 'size' => 11]],
            'B50'    => ['font' => ['bold' => true, 'size' => 11]],
            'B51'    => ['font' => ['bold' => true, 'size' => 11]]
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.stop_clock.export.stop_clock',[
            'id' => $this->id,
        ]);
    }

    public function title(): string
    {
        return 'ACTA DE INSTALACIÓN_20032021';
    }
}

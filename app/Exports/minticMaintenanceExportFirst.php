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

class minticMaintenanceExportFirst implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $equipments;
    protected $files;
    
    public function __construct(object $id,object $equipments,$files)
    {
        $this->id = $id;
        $this->files = $files;
        $this->equipments = $equipments;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 3) {
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
            2    => ['font' => ['bold' => true, 'size' => 14]],
            9    => ['font' => ['bold' => true, 'size' => 11]],
            10    => ['font' => ['bold' => true, 'size' => 14]],
            11    => ['font' => ['bold' => true, 'size' => 11]],
            12    => ['font' => ['bold' => true, 'size' => 14]],
            13    => ['font' => ['bold' => true, 'size' => 11]],
            19    => ['font' => ['bold' => true, 'size' => 14]],
            20    => ['font' => ['bold' => true, 'size' => 14]],
            59    => ['font' => ['bold' => true, 'size' => 14]],
            60    => ['font' => ['bold' => true, 'size' => 11]],
            68    => ['font' => ['bold' => true, 'size' => 11]],
            70    => ['font' => ['bold' => true, 'size' => 11]],
            79    => ['font' => ['bold' => true, 'size' => 11]],
            80    => ['font' => ['bold' => true, 'size' => 11]],
            81    => ['font' => ['bold' => true, 'size' => 11]],
            82    => ['font' => ['bold' => true, 'size' => 11]],
            83    => ['font' => ['bold' => true, 'size' => 11]],
            84    => ['font' => ['bold' => true, 'size' => 11]],
            85    => ['font' => ['bold' => true, 'size' => 11]]
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.first',[
            'id' => $this->id,
            'equipments' => $this->equipments
        ]);
    }

    public function title(): string
    {
        return 'ACTA DE INSTALACIÓN_20032021';
    }
}

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
    protected $activities;
    protected $files;
    
    public function __construct(object $id,object $equipments,$files,$activities)
    {
        $this->id = $id;
        $this->files = $files;
        $this->equipments = $equipments;
        $this->activities = $activities;
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
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.first',[
            'id' => $this->id,
            'equipments' => $this->equipments,
            'activities' => $this->activities
        ]);
    }

    public function title(): string
    {
        return 'ACTA DE INSTALACIÓN_20032021';
    }
}

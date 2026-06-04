<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class minticMaintenanceExportThird implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
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
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 2 || $value['place'] == 3) {
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
            2    => ['font' => ['bold' => true, 'size' => 12]],
            10    => ['font' => ['bold' => true, 'size' => 14]],
            11    => ['font' => ['bold' => true, 'size' => 11]],
            28    => ['font' => ['bold' => true, 'size' => 11]],
            45    => ['font' => ['bold' => true, 'size' => 11]],
            62    => ['font' => ['bold' => true, 'size' => 11]],
            79    => ['font' => ['bold' => true, 'size' => 11]],
            96    => ['font' => ['bold' => true, 'size' => 11]],
            113    => ['font' => ['bold' => true, 'size' => 11]]
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.third',[
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return 'REGISTRO FOTOGRÁFICO DESPÚES';
    }
}

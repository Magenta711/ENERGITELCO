<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class CleatingExportFirst implements FromView, WithDrawings, WithStyles, ShouldAutoSize, WithTitle
{

    protected $id;
    protected $files;
    
    public function __construct(object $id, array $files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function drawings()
    {
        foreach ($this->files as $key => $value) {
            $array[$key] = new Drawing();
            $array[$key]->setName($value['name']);
            $array[$key]->setDescription($value['description']);
            $array[$key]->setPath($value['path']);
            $array[$key]->setHeight($value['height']);
            $array[$key]->setCoordinates($value['coordinates']);
        }
        return $array;
    }
    
    /**
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            2    => ['font' => ['bold' => true, 'size' => 11]],
            3    => ['font' => ['bold' => true, 'size' => 10]],
            4    => ['font' => ['bold' => true, 'size' => 10,'center']],
            7    => ['font' => ['bold' => true, 'size' => 10]],
            11    => ['font' => ['bold' => true, 'size' => 10]],
            18    => ['font' => ['bold' => true, 'size' => 10]],
            23    => ['font' => ['bold' => true, 'size' => 10]],
            28    => ['font' => ['bold' => true, 'size' => 10]],
            31    => ['font' => ['bold' => true, 'size' => 10]],
        ];
    }

    public function view(): View
    {
        return view('projects.clearings.export', [
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return 'DETALLE DE LA DESINSTALACION';
    }
}

<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class minticClockStopExportSecond implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $item;
    protected $files;

    public function __construct(object $id, $item, $files)
    {
        $this->id = $id;
        $this->item = $item;
        $this->files = $files;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 1 || $value['place'] == 3) {
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
            2    => ['font' => ['bold' => true, 'size' => 12], 'alignment' => ['horizontal' => 'center', 'vertical' => 'center']],
            'F2' => ['alignment' => ['wrapText' => true]],
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.stop_clock.export.stop_secund', ['id' => $this->id]);
    }

    public function title(): string
    {
        return 'REGISTRO FOTOGRÁFICO ANTES';
    }
}

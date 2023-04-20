<?php

namespace App\Exports;

use App\Models\autoForm\form;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class minticMaintenanceDevolution implements FromView, WithStyles, WithDrawings, ShouldAutoSize, WithTitle
{
    protected $id;
    protected $equipments;
    protected $activities;
    protected $files;

    use Exportable;

    public function __construct(object $id, object $equipments, $files,$activities)
    {
        $this->id = $id;
        $this->equipments = $equipments;
        $this->activities = $activities;
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
            1    => ['font' => ['bold' => true,'size' => 14]],
            2    => ['font' => ['bold' => true,'size' => 12]],
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.devolution',[
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return "Cambio Equipo Subsanacion";
    }
}

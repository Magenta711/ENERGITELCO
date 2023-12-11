<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class minticMaintenanceExportFour implements FromView, WithTitle, ShouldAutoSize, WithStyles
{
    protected $id;

    public function __construct(object $id,$files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'C2'    => ['font' => ['bold' => true, 'size' => 11]],
            'C4'    => ['font' => ['bold' => true, 'size' => 10]],
            'C5'    => ['font' => ['bold' => true, 'size' => 10]],
            'C6'    => ['font' => ['bold' => true, 'size' => 10]],
            'C7'    => ['font' => ['bold' => true, 'size' => 10]]
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.four',[
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return 'ETIQUETA_RE_FOTOGRÁFICO';
    }
}

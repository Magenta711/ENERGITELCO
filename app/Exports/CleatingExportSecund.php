<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CleatingExportSecund implements FromView, ShouldAutoSize,WithTitle, WithStyles
{
    protected $id;
    
    public function __construct(object $id)
    {
        $this->id = $id;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2    => ['font' => ['bold' => true, 'size' => 11,'center']],
        ];
    }

    public function view(): View
    {
        return view('projects.clearings.export2', [
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return 'INVENTARIO HARDWARE';
    }
}

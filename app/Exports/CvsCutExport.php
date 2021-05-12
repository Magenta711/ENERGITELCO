<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CvsCutExport implements FromView, ShouldAutoSize, WithProperties, WithStyles
{
    use Exportable;

    protected $items;
    protected $cut;
    protected $n;
    
    public function __construct(object $items, object $cut)
    {
        $n = 5;
        foreach ($items as $sale) {
            foreach ($sale->details as $item) {
                $n++;
            }
        }
        $this->n = $n;
        $this->items = $items;
        $this->cut = $cut;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('cvs.invoice.export', [
            'items' => $this->items,
            'cut' => $this->cut
        ]);
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 13]],
            2    => ['font' => ['bold' => true,'size' => 12]],
            4    => ['font' => ['bold' => true,'size' => 12]],
            $this->n    => ['font' => ['bold' => true,'size' => 12]],
            ($this->n + 1)    => ['font' => ['bold' => true,'size' => 12]],
            ($this->n + 2)    => ['font' => ['bold' => true,'size' => 12]],
            ($this->n + 3)    => ['font' => ['bold' => true,'size' => 13]],
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => auth()->user()->name,
            'lastModifiedBy' => auth()->user()->name,
            'title'          => 'Exportar reporte de caja',
            'description'    => 'Corte de pago de caja',
            'subject'        => 'Corte de pago de caja',
            'keywords'       => 'ventas,exportar,corte',
            'category'       => 'Cortes',
            'manager'        => 'Jorge Andres Ortega Bedoya',
            'company'        => 'Energitelco SAS',
        ];
    }
}

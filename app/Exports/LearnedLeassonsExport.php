<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LearnedLeassonsExport implements FromView, WithDrawings, WithStyles, ShouldAutoSize, WithTitle
{
    use Exportable;
    
    private $data;
    
    public function __construct(object $data)
    {
        $this->data = $data;
    }
    
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            2    => ['font' => ['bold' => true, 'size' => 14]],
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
    {
        return view('learned_lessons.export', [
            'data' => $this->data
        ]);
    }
    
    public function title(): string
    {
        return 'Lesión # '.$this->data->num;
    }
}

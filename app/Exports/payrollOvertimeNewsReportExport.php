<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class payrollOvertimeNewsReportExport implements FromView, WithDrawings, WithStyles, ShouldAutoSize
{
    use Exportable;

    private $data;

    public function actives($data){
        $this->data = $data;

        return $this;
    }

    // Whit Image
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/logo.png'));
        $drawing->setHeight(80);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    // whit styles
    public function styles(Worksheet $sheet)
    {
        return [
            1  => ['font' => ['size' => 14,'bold' => true]],
            2  => ['font' => ['size' => 13,'bold' => true]],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('human_management.payroll_over_time.includes.export.all', [
            'pays' => $this->data
        ]);
    }
}

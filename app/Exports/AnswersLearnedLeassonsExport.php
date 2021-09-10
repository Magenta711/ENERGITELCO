<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnswersLearnedLeassonsExport implements FromView, ShouldAutoSize, WithStyles
{

    use Exportable;

    protected $arrTests;
    protected $arrUsers;
    protected $start_month;
    protected $end_month;
    
    public function __construct(array $arrTests, array $arrUsers, int $start_month,int $end_month)
    {
        $this->arrTests = $arrTests;
        $this->arrUsers = $arrUsers;
        $this->start_month = $start_month;
        $this->end_month = $end_month;
    }

    public function view(): View
    {
        return view('learned_lessons.test.export', [
            'arrTests' => $this->arrTests,
            'arrUsers' => $this->arrUsers,
            'start_month' => $this->start_month,
            'end_month' => $this->end_month
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true,'size' => 13]],
            2    => ['font' => ['bold' => true,'size' => 12]],
        ];
    }
}

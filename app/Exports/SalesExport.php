<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SalesExport implements WithMultipleSheets
{
    use Exportable;

    protected $data;
    protected $start_month;
    protected $end_month;
    
    public function __construct(object $data, int $start_month,int $end_month)
    {
        $this->data = $data;
        $this->start_month = $start_month;
        $this->end_month = $end_month;
    }
    
    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        for ($month = $this->start_month; $month <= $this->end_month; $month++) {
            $sheets[] = new SalesPerMonthSheet($this->data, $month);
        }

        return $sheets;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class minticClockStopExport implements WithMultipleSheets
{
    protected $id;
    protected $files;
    
    use Exportable;
    
    public function __construct(object $id, $files)
    {
        $this->id = $id;
        $this->files = $files;
    }
    
    public function sheets(): array
    {
        $arr['ACTA DE INSTALACIÓN_20032021'] = new minticClockStopExportFirst($this->id,$this->files);
        $arr['REGISTRO FOTOGRÁFICO'] = new minticClockStopExportSecond($this->id,$this->files);

        return $arr;
    }
}
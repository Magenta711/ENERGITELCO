<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class minticClockStopExport implements WithMultipleSheets
{
    protected $id;
    protected $item;
    protected $files;

    use Exportable;

    public function __construct(object $id, $item, $files)
    {
        $this->id = $id;
        $this->item = $item;
        $this->files = $files;
    }

    public function sheets(): array
    {
        $arr['ACTA DE INSTALACIÓN_20032021'] = new minticClockStopExportFirst($this->id, $this->item, $this->files);
        $arr['REGISTRO FOTOGRÁFICO'] = new minticClockStopExportSecond($this->id, $this->item, $this->files);

        return $arr;
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class minticMaintenanceExport implements WithMultipleSheets
{
    use Exportable;

    protected $id;
    protected $equiments;
    
    public function __construct(object $id,object $equiments)
    {
        $this->id = $id;
        $this->equiments = $equiments;
    }
    
    public function sheets(): array
    {
        return [
            'ACTA DE INSTALACIÓN_20032021' => new minticMaintenanceExportFirst($this->id,$this->equiments),
            'REGISTRO FOTOGRÁFICO ANTES' => new minticMaintenanceExportSecund($this->id),
            'REGISTRO FOTOGRÁFICO DESPÚES' => new minticMaintenanceExportThird($this->id)
        ];
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class minticMaintenanceExport implements WithMultipleSheets
{
    protected $id;
    protected $equiments;
    protected $files;
    
    use Exportable;
    
    public function __construct(object $id, object $equiments, $files)
    {
        $this->id = $id;
        $this->equiments = $equiments;
        $this->files = $files;
    }
    
    public function sheets(): array
    {
        return [
            'ACTA DE INSTALACIÓN_20032021' => new minticMaintenanceExportFirst($this->id,$this->equiments,$this->files),
            'REGISTRO FOTOGRÁFICO ANTES' => new minticMaintenanceExportSecund($this->id,$this->files),
            'REGISTRO FOTOGRÁFICO DESPÚES' => new minticMaintenanceExportThird($this->id,$this->files)
        ];
    }
}

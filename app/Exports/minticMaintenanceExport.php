<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class minticMaintenanceExport implements WithMultipleSheets
{
    protected $id;
    protected $equipments;
    protected $activities;
    protected $files;
    
    use Exportable;
    
    public function __construct(object $id, object $equipments, $files,$activities)
    {
        $this->id = $id;
        $this->equipments = $equipments;
        $this->activities = $activities;
        $this->files = $files;
    }
    
    public function sheets(): array
    {
        return [
            'ACTA DE INSTALACIÓN_20032021' => new minticMaintenanceExportFirst($this->id,$this->equipments,$this->files,$this-> activities),
            'REGISTRO FOTOGRÁFICO ANTES' => new minticMaintenanceExportSecund($this->id,$this->files),
            'REGISTRO FOTOGRÁFICO DESPÚES' => new minticMaintenanceExportThird($this->id,$this->files)
        ];
    }
}

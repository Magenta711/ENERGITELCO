<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class CleatingExport implements WithMultipleSheets
{
    protected $id;
    protected $files;

    use Exportable;
    
    public function __construct(object $id, array $files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function sheets(): array
    {
        return [
            'DETALLE DE LA DESINSTALACION' => new CleatingExportFirst($this->id,$this->files),
            'INVENTARIO HARDWARE' => new CleatingExportSecund($this->id),
        ];
    }
}

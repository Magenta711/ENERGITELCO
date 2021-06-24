<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CleatingExport implements WithMultipleSheets
{
    protected $id;
    protected $files;
    protected $filesInv;

    use Exportable;
    
    public function __construct(object $id, array $files, array $filesInv)
    {
        $this->id = $id;
        $this->files = $files;
        $this->filesInv = $filesInv;
    }

    public function sheets(): array
    {
        return [
            'DETALLE DE LA DESINSTALACION' => new CleatingExportFirst($this->id,$this->files),
            'INVENTARIO HARDWARE' => new CleatingExportSecund($this->id,$this->filesInv),
        ];
    }
}

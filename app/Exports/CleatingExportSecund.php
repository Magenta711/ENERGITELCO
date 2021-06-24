<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CleatingExportSecund implements FromView,WithDrawings, ShouldAutoSize,WithTitle
{
    protected $id;
    protected $files;
    
    public function __construct(object $id, array $files)
    {
        $this->id = $id;
        $this->files = $files;
    }

    public function drawings()
    {
        foreach ($this->files as $key => $value) {
            $array[$key] = new Drawing();
            $array[$key]->setName($value['name']);
            $array[$key]->setDescription($value['description']);
            $array[$key]->setPath($value['path']);
            $array[$key]->setHeight($value['height']);
            $array[$key]->setCoordinates($value['coordinates']);
        }
        return $array;
    }

    public function view(): View
    {
        return view('projects.clearings.export2', [
            'id' => $this->id
        ]);
    }

    public function title(): string
    {
        return 'INVENTARIO HARDWARE';
    }   
}

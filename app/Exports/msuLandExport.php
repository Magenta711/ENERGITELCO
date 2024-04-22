<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class msuLandExport implements FromView, WithTitle, WithDrawings, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $dates;
    protected $files;
    use Exportable;


    public function __construct($id, $dates, $files)
    {
        $this->id = $id;
        $this->dates = $dates;
        $this->files = $files;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 1 || $value['place'] == 4) {
                $array[$key] = new Drawing();
                $array[$key]->setName($value['name']);
                $array[$key]->setDescription($value['description']);
                $array[$key]->setPath($value['path']);
                $array[$key]->setHeight($value['height']);
                $array[$key]->setCoordinates($value['coordinates']);
            }
        }
        return $array;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A' => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            'E' => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            'I' => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            'K' => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            1    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            2    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            3    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            4    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            10    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            15    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            25    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            26   => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            27    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            28   => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            29    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            30   => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            31    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            32    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            33    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            34    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            35    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            36    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            40    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            43    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'center']],
            190    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'top']],
            // 166    => ['font' => ['bold' => true,], 'alignment' => ['wrapText' => true,'vertical' => 'top']],
            // 19    => ['font' => ['bold' => true,]],
            // 37    => ['font' => ['bold' => true,]],
        ];
    }

    public function view(): View
    {
        // return $files;
        return view('execution_works.maintenance.tierra.export',[
            'id' => $this->id,
            'dates' => $this->dates,
            'files' => $this->files,
        ]);
    }

    public function title(): string
    {
        return 'FORMATO EM2';
    }
}

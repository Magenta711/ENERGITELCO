<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;


class msuPlantExport implements FromView, WithTitle, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $check;
    protected $plant;
    protected $resultado;

    protected $files;

        use Exportable;


    public function __construct($id,$check,$plant, $resultado,$files)
    {
        $this->id = $id;
        $this->check = $check;
        $this->plant = $plant;
        $this->resultado = $resultado;
        $this->files = $files;
    }

    public function drawings()
    {
        $array = array();
        foreach ($this->files as $key => $value) {
            if ($value['place'] == 3 || $value['place'] == 4) {
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
        // $j = 1;
        // $accEquip = 1;
        // foreach ($this->equipments as $equipment_item) {
        //     if ( $equipment_item->type == 'retired' ){
        //         $j++;
        //     }
        // }
        // foreach ($this->equipments as $equipment_item) {
        //     if ( $equipment_item->is_informe ){
        //         $accEquip++;
        //     }
        // }

        // if ($j = 1) {
        //     $j = 8;
        // }

        $sheet->getStyle('F2' . $sheet->getHighestRow())->getAlignment()->setWrapText(true);
        $sheet->getStyle('F15' . $sheet->getHighestRow())->getAlignment()->setWrapText(true);

        return [
            'A' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'B' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'C' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'D' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'E' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'F' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'G' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'H' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'I' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'J' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'K' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],
            'L' => ['alignment' => ['wrapText' => true,'vertical' => 'center']],

            1    => ['font' => ['bold' => true,]],
            2    => ['font' => ['bold' => true,]],
            3    => ['font' => ['bold' => true,]],
            4    => ['font' => ['bold' => true,]],
            5    => ['font' => ['bold' => true,]],
            6    => ['font' => ['bold' => true,]],
            7    => ['font' => ['bold' => true,]],
            8    => ['font' => ['bold' => true,]],
            9    => ['font' => ['bold' => true,]],
            10    => ['font' => ['bold' => true,]],
            12    => ['font' => ['bold' => true,]],
            13    => ['font' => ['bold' => true,]],
            26    => ['font' => ['bold' => true,]],
            38    => ['height' => ['auto']],
            39    => ['font' => ['bold' => true,]],
            40    => ['font' => ['bold' => true,]],
            41    => ['font' => ['bold' => true,]],
            160    => ['font' => ['bold' => true,]],
            161    => ['font' => ['bold' => true,]],
        ];
    }

    public function view(): View
    {
        return view('execution_works.maintenance.planta.export',[
            'id' => $this->id,
            'check' => $this->check,
            'plant' => $this->plant,
            'resultado' => $this->resultado,
            'files' => $this->files,
        ]);
    }

    public function title(): string
    {
        return 'ACTA DE PLANTA';
    }
}

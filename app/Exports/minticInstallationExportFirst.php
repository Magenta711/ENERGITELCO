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

class minticInstallationExportFirst implements FromView, WithTitle, ShouldAutoSize, WithStyles
{
    protected $id;
    protected $equipments;
    protected $activities;
    // protected $files;

    public function __construct(object $id,object $equipments,$activities)
    {
        $this->id = $id;
        // $this->files = $files;
        $this->equipments = $equipments;
        $this->activities = $activities;
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
            2    => ['font' => ['bold' => true, 'size' => 12 ], 'alignment' => ['horizontal' => 'center','vertical' => 'center']],
            'F2' => ['alignment' => ['wrapText' => true]],
            'F15' => ['alignment' => ['wrapText' => true,'horizontal' => 'center','vertical' => 'center']],
            9    => ['font' => ['bold' => true, 'size' => 11]],
            10    => ['font' => ['bold' => true, 'size' => 14]],
            11    => ['font' => ['bold' => true, 'size' => 11]],
            12    => ['font' => ['bold' => true, 'size' => 14]],
            13    => ['font' => ['bold' => true, 'size' => 11]],
            19    => ['font' => ['bold' => true, 'size' => 14]],
            20    => ['font' => ['bold' => true, 'size' => 14]],
            //Caculate with equipments $accEquip
            // ($accEquip + 20)    => ['font' => ['bold' => true, 'size' => 14]],
            // ($accEquip + 21) => ['font' => ['bold' => true, 'size' => 14]],
            // ($accEquip + 21) + $j    => ['font' => ['bold' => true, 'size' => 14]],
            // ($accEquip + 22) + $j    => ['alignment' => ['wrapText' => true]],
            // (($accEquip + 21) + $j + 2)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B' . (($accEquip + 21) + $j + 3)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'J'. (($accEquip + 21) + $j + 3)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B'. (($accEquip + 21) + $j + 4)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'J'. (($accEquip + 21) + $j + 4)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B'. (($accEquip + 21) + $j + 5)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'J'. (($accEquip + 21) + $j + 5)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B'. (($accEquip + 21) + $j + 6)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'J'. (($accEquip + 21) + $j + 6)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B'. (($accEquip + 21) + $j + 7)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'J'. (($accEquip + 21) + $j + 7)    => ['font' => ['bold' => true, 'size' => 14]],
            // 'B'. (($accEquip + 21) + $j + 8)    => ['font' => ['bold' => true, 'size' => 14]]
        ];
    }

    public function view(): View
    {
        return view('projects.mintic.install.export.first',[
            'id' => $this->id,
            'equipments' => $this->equipments,
            'activities' => $this->activities
        ]);
    }

    public function title(): string
    {
        return 'ACTA DE INSTALACIÓN_20032021';
    }
}

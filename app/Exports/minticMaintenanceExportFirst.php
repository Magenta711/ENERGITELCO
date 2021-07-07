<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class minticMaintenanceExportFirst implements FromView
{
    use Exportable;
    
    protected $id;
    protected $equiments;
    
    public function __construct(object $id,object $equiments)
    {
        $this->id = $id;
        $this->$equiments = $equiments;
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.first',[
            'id' => $this->id,
            'equiments' => $this->equiments
        ]);
    }
}

<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class minticMaintenanceExportThird implements FromView
{
    protected $id;
    
    public function __construct(object $id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('projects.mintic.maintenance.export.third');
    }
}

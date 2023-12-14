<?php

use App\Models\execution_work\kits_status;
use Illuminate\Database\Seeder;

class KitsStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kits_status::create([
            'estado' => "Asignado",
        ]);
        kits_status::create([
            'estado' => "Disponible",
        ]);
        kits_status::create([
            'estado' => "Mantenimiento",
        ]);
        kits_status::create([
            'estado' => "Eliminado",
        ]);
    }
}

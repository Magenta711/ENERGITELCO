<?php

Use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Positions::create([
            'name' => 'Director de Proyectos',
            'type_evaluation' => 0,
            'description' => 'Director de proyectos',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Coordinador de Calidad',
            'type_evaluation' => 1,
            'description' => 'Coordinador de Calidad',
            'state' => 1,
            'offer' => 0
        ]);
        
        Positions::create([
            'name' => 'Coordinador de Ambiental',
            'type_evaluation' => 1,
            'description' => 'Coordinador de Ambiental',
            'state' => 1,
            'offer' => 0
        ]);
        
        Positions::create([
            'name' => 'Coordinador de Riesgos',
            'type_evaluation' => 1,
            'description' => 'Coordinador de Riesgos',
            'state' => 1,
            'offer' => 0
        ]);
        
        Positions::create([
            'name' => 'Coordinador Financiero',
            'type_evaluation' => 1,
            'description' => 'Coordinador Financiero',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Coordinador de Salud Ocupacional',
            'type_evaluation' => 1,
            'description' => 'Coordinador de Salud Ocupacional',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Coordinador Técnico I',
            'type_evaluation' => 1,
            'description' => 'Coordinador',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Coordinador Técnico II',
            'type_evaluation' => 1,
            'description' => 'Coordinador',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Coordinador Técnico III',
            'type_evaluation' => 1,
            'description' => 'Coordinador',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Coordinador de ventas',
            'type_evaluation' => 1,
            'description' => 'Coordinador de ventas',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Técnico I',
            'type_evaluation' => 2,
            'description' => 'Técnico',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Técnico II',
            'type_evaluation' => 2,
            'description' => 'Técnico',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Técnico III',
            'type_evaluation' => 2,
            'description' => 'Técnico',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Técnico de indicadores',
            'type_evaluation' => 2,
            'description' => 'Técnico de indicadores',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Técnico de mantenimiento',
            'type_evaluation' => 2,
            'description' => 'Técnico de mantenimiento',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Asesor de Ventas',
            'type_evaluation' => 3,
            'description' => 'Asesor de Ventas',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Cajera',
            'type_evaluation' => 3,
            'description' => 'Cajera',
            'state' => 1,
            'offer' => 1
        ]);

        Positions::create([
            'name' => 'Asistente',
            'type_evaluation' => 2,
            'description' => 'Apoyo a la operación',
            'state' => 1,
            'offer' => 0
        ]);

        Positions::create([
            'name' => 'Auxiliar',
            'type_evaluation' => 2,
            'description' => 'Apoyo a la operación',
            'state' => 1,
            'offer' => 0
        ]);
    }
}




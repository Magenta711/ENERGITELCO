<?php

use Illuminate\Database\Seeder;

use App\Models\project\planing\makeupsRf;
use App\Models\project\planing\makeup_type;
use App\Models\project\planing\cable_rf;

class makeups_rfSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Types
        makeup_type::create([
            'name' => 'Nodo',
            'place' => 'Nodo',
        ]);
        makeup_type::create([
            'name' => 'Power',
            'place' => 'Nodo',
        ]);
        makeup_type::create([
            'name' => 'Antenas',
            'place' => 'Jumper',
        ]);
        //Makeups
        makeupsRf::create([
            'description' => 'UMTS 850',
            'name' => 'UMTS 850',
            'letter' => 'Sin letra',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'UMTS 850 Cuarta P',
            'name' => 'UMTS 850',
            'letter' => 'Letra E',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'UMTS 1900',
            'name' => 'UMTS 1900',
            'letter' => 'Letra B',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'UMTS 1900 tercera P',
            'name' => 'UMTS 1900',
            'letter' => 'Letra C',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'LTE',
            'name' => 'LTE',
            'letter' => 'Letra D',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'LTE 1900',
            'name' => 'LTE 1900',
            'letter' => 'Letra G',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'GSM 850',
            'name' => 'GSM 850',
            'letter' => 'Letra MG',
            'state' => 1
        ]);
        makeupsRf::create([
            'description' => 'GSM 1900',
            'name' => 'GSM 1900',
            'letter' => 'Letra MG-B',
            'state' => 1
        ]);
        //cable
        cable_rf::create([
            'description' => "AC ZTE",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "ALARMAS EXTERNAS ",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "ALARMAS INTERNAS ",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "ALIMENTACION PDB",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable azul -48 V para System Module (desde power)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de Alarma entre System Modulo y FSEB",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de Tierra Caja de Alarma",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para el System Module",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para OVP RF 1",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para OVP RF 2",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para OVP RF 3",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para OVP RF 4",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para RF 1",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para RF 2",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para RF 3",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable de tierra para RF 4",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Cable negro 0 V para System Module (desde power)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "CUARTO BANCO BATERIAS ",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF1 LOWER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF1 UPPER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF2 LOWER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF2 UPPER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF3 LOWER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF3 UPPER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF4 LOWER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "FALLA EN OVP_RF4 UPPER",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Fibra Optica RF 1",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Fibra Optica RF 2",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Fibra Optica RF 3",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Fibra Optica RF 4",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "GND ZTE",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Linea DC -48 V para RF 1 (Desde SM)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Linea DC -48 V para RF 2 (Desde SM)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Linea DC -48 V para RF 3 (Desde SM)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "Linea DC -48 V para RF 4 (Desde SM)",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "PRIMER BANCO BATERIAS",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 1 DIV",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 1 DIV - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 1 MAIN",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 1 MAIN - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2 DIV",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2 DIV - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2 DIV - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2 MAIN",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2 MAIN - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 2MAIN - LETRA B",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 3 DIV",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 3 MAIN",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 4 DIV",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SECTOR 4 MAIN",
            'type' => 3,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SEGUNDO BANCO BATERIAS",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "SINCRONISMO ",
            'type' => 1,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "TERCER BANCO BATERIAS ",
            'type' => 2,
            'state' => 1
        ]);
        cable_rf::create([
            'description' => "TRANSMISION",
            'type' => 1,
            'state' => 1
        ]);
    }

}

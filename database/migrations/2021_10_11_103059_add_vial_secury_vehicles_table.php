<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVialSecuryVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inv_vehicles', function (Blueprint $table) {
            $table->string('propetary')->nullable();
            $table->string('num_motor')->nullable();
            $table->date('date_cross_piece')->nullable();
            $table->date('date_tacos')->nullable();
            $table->string('liability_insurances')->nullable();
            $table->string('policy_date')->nullable();
            $table->string('policy')->nullable();
            $table->text('last_ch_oil')->nullable();
            $table->text('last_ws_oil')->nullable();
            $table->text('last_val_oil')->nullable();
            $table->text('last_ch_tires')->nullable();
            $table->text('last_ws_tires')->nullable();
            $table->text('last_val_tires')->nullable();
            $table->text('last_ch_lubrication')->nullable();
            $table->text('last_ws_lubrication')->nullable();
            $table->text('last_val_lubrication')->nullable();
            $table->text('last_ch_address')->nullable();
            $table->text('last_ws_address')->nullable();
            $table->text('last_val_address')->nullable();
            $table->text('last_ch_motor')->nullable();
            $table->text('last_ws_motor')->nullable();
            $table->text('last_val_motor')->nullable();
            $table->text('last_ch_clutch')->nullable();
            $table->text('last_ws_clutch')->nullable();
            $table->text('last_val_clutch')->nullable();
            $table->text('last_ch_suspension')->nullable();
            $table->text('last_ws_suspension')->nullable();
            $table->text('last_val_suspension')->nullable();
            $table->text('last_ch_brakes_bands')->nullable();
            $table->text('last_ws_brakes_bands')->nullable();
            $table->text('last_val_brakes_bands')->nullable();
            $table->text('last_ch_brakes_pastes')->nullable();
            $table->text('last_ws_brakes_pastes')->nullable();
            $table->text('last_val_brakes_pastes')->nullable();
            $table->text('last_ch_brake_pump')->nullable();
            $table->text('last_ws_brake_pump')->nullable();
            $table->text('last_val_brake_pump')->nullable();
            $table->text('last_ch_box_transmission')->nullable();
            $table->text('last_ws_box_transmission')->nullable();
            $table->text('last_val_box_transmission')->nullable();
            $table->text('last_ch_brassiness')->nullable();
            $table->text('last_ws_brassiness')->nullable();
            $table->text('last_val_brassiness')->nullable();
            $table->text('last_ch_lights')->nullable();
            $table->text('last_ws_lights')->nullable();
            $table->text('last_val_lights')->nullable();
            $table->text('last_ch_gases')->nullable();
            $table->text('last_ws_gases')->nullable();
            $table->text('last_val_gases')->nullable();
            $table->text('last_ch_wistle')->nullable();
            $table->text('last_ws_wistle')->nullable();
            $table->text('last_val_wistle')->nullable();
            $table->text('last_ch_timing_belt')->nullable();
            $table->text('last_ws_timing_belt')->nullable();
            $table->text('last_val_timing_belt')->nullable();
            $table->text('last_ch_alignment_balancing')->nullable();
            $table->text('last_ws_alignment_balancing')->nullable();
            $table->text('last_val_alignment_balancing')->nullable();
            $table->text('last_ch_batteries')->nullable();
            $table->text('last_ws_batteries')->nullable();
            $table->text('last_val_btcteries')->nullable();
            $table->string('date_summons_report')->nullable();
            $table->string('place_summons_report')->nullable();
            $table->string('area_summons_report')->nullable();
            $table->string('date_incident_report')->nullable();
            $table->string('place_incident_report')->nullable();
            $table->string('area_incident_report')->nullable();
            $table->string('date_accident_report')->nullable();
            $table->string('place_accident_report')->nullable();
            $table->string('area_accident_report')->nullable();
            $table->string('preventive_plan')->nullable();
            $table->string('active_safaty_system')->nullable();
            $table->string('date_preventive_plan')->nullable();
            $table->string('passive_safaty_system')->nullable();
            $table->text('commentary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inv_vehicles', function (Blueprint $table) {
            //
        });
    }
}

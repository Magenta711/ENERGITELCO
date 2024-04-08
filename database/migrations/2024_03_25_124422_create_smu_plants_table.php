<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmuPlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smu_plants', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('plant_id');

            $table->string('marca_equipo_pl1', 50)->nullable();
            $table->string('modelo_equipo_pl1', 50)->nullable();
            $table->string('serial_equipo_pl1', 50)->nullable();
            $table->string('velocidad_motor_pl1', 50)->nullable();
            $table->string('admision_aire_pl1', 50)->nullable();
            $table->string('velocidad_rpm_pl1', 50)->nullable();
            $table->string('horas_trabajo_pl1', 50)->nullable();
            $table->string('frecuencia_pl1', 50)->nullable();
            $table->string('capacidad_kva_pl1', 50)->nullable();
            $table->string('capacidad_kw_pl1', 50)->nullable();
            $table->string('derrateo_pl1', 50)->nullable();
            $table->string('capacidad_derrateo_pl1', 50)->nullable();
            $table->string('marca_motor_pl1', 50)->nullable();
            $table->string('modelo_motor_pl1', 50)->nullable();
            $table->string('serial_motor_pl1', 50)->nullable();
            $table->string('presion_aceite_pl1', 50)->nullable();
            $table->string('temp_aceite_pl1', 50)->nullable();
            $table->string('temp_refrigerante_pl1', 50)->nullable();
            $table->string('marca_generador_pl1', 50)->nullable();
            $table->string('modelo_generador_pl1', 50)->nullable();
            $table->string('serial_generador_pl1', 50)->nullable();
            $table->string('temperatura_ambiente_pl1', 50)->nullable();
            $table->string('voltaje_bateria_pl1', 50)->nullable();
            $table->string('capacidad_bateria_pl1', 50)->nullable();
            $table->string('tipo_bateria_pl1', 50)->nullable();
            $table->string('cantidad_bateria_pl1', 50)->nullable();
            $table->string('estado_bateria_pl1', 50)->nullable();
            $table->string('estado_cargador_pl1', 50)->nullable();
            $table->string('vac_l1_l2_pl1', 50)->nullable();
            $table->string('vac_l1_l3_pl1', 50)->nullable();
            $table->string('vac_l2_l3_pl1', 50)->nullable();
            $table->string('amperios_l1_pl1', 50)->nullable();
            $table->string('amperios_l2_pl1', 50)->nullable();
            $table->string('amperios_l3_pl1', 50)->nullable();
            $table->string('capacidad_amp_pl1', 50)->nullable();
            $table->string('carga_demandada_pl1', 50)->nullable();
            $table->string('porcentaje_carga_pl1', 50)->nullable();

            $table->string('marca_equipo_pl2', 50)->nullable()->default('N/A');
            $table->string('modelo_equipo_pl2', 50)->nullable()->default('N/A');
            $table->string('serial_equipo_pl2', 50)->nullable()->default('N/A');
            $table->string('velocidad_motor_pl2', 50)->nullable()->default('N/A');
            $table->string('admision_aire_pl2', 50)->nullable()->default('N/A');
            $table->string('velocidad_rpm_pl2', 50)->nullable()->default('N/A');
            $table->string('horas_trabajo_pl2', 50)->nullable()->default('N/A');
            $table->string('frecuencia_pl2', 50)->nullable()->default('N/A');
            $table->string('capacidad_kva_pl2', 50)->nullable()->default('N/A');
            $table->string('capacidad_kw_pl2', 50)->nullable()->default('N/A');
            $table->string('derrateo_pl2', 50)->nullable()->default('N/A');
            $table->string('capacidad_derrateo_pl2', 50)->nullable()->default('N/A');
            $table->string('marca_motor_pl2', 50)->nullable()->default('N/A');
            $table->string('modelo_motor_pl2', 50)->nullable()->default('N/A');
            $table->string('serial_motor_pl2', 50)->nullable()->default('N/A');
            $table->string('presion_aceite_pl2', 50)->nullable()->default('N/A');
            $table->string('temp_aceite_pl2', 50)->nullable()->default('N/A');
            $table->string('temp_refrigerante_pl2', 50)->nullable()->default('N/A');
            $table->string('marca_generador_pl2', 50)->nullable()->default('N/A');
            $table->string('modelo_generador_pl2', 50)->nullable()->default('N/A');
            $table->string('serial_generador_pl2', 50)->nullable()->default('N/A');
            $table->string('temperatura_ambiente_pl2', 50)->nullable()->default('N/A');
            $table->string('voltaje_bateria_pl2', 50)->nullable()->default('N/A');
            $table->string('capacidad_bateria_pl2', 50)->nullable()->default('N/A');
            $table->string('tipo_bateria_pl2', 50)->nullable()->default('N/A');
            $table->string('cantidad_bateria_pl2', 50)->nullable()->default('N/A');
            $table->string('estado_bateria_pl2', 50)->nullable()->default('N/A');
            $table->string('estado_cargador_pl2', 50)->nullable()->default('N/A');
            $table->string('vac_l1_l2_pl2', 50)->nullable()->default('N/A');
            $table->string('vac_l1_l3_pl2', 50)->nullable()->default('N/A');
            $table->string('vac_l2_l3_pl2', 50)->nullable()->default('N/A');
            $table->string('amperios_l1_pl2', 50)->nullable()->default('N/A');
            $table->string('amperios_l2_pl2', 50)->nullable()->default('N/A');
            $table->string('amperios_l3_pl2', 50)->nullable()->default('N/A');
            $table->string('capacidad_amp_pl2', 50)->nullable()->default('N/A');
            $table->string('carga_demandada_pl2', 50)->nullable()->default('N/A');
            $table->string('porcentaje_carga_pl2', 50)->nullable()->default('N/A');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smu_plants');
    }
}

<h3 class="text-center">Datos Principales de Plantas</h3>
<p><b>CONSIDERACIONES:</b></p>
<p>Los campos están reducidos para 50 caracteres, si se pasan de este tamaño el campo se pondrá <B>ROJO</B>, deberá reducir el tamaño del texto, de otro modo, saldrá un error al enviar el formulario.</p>
<h4>PLANTA ELÉCTRICA 1</h4>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_equipo_pl1">MARCA EQUIPO</label>
            <input type="text" name="marca_equipo_pl1" id="marca_equipo_pl1" value="{{ $plant->marca_equipo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_equipo_pl1">MODELO</label>
            <input type="text" name="modelo_equipo_pl1" id="modelo_equipo_pl1" value="{{ $plant->modelo_equipo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_equipo_pl1">SERIAL N°</label>
            <input type="text" name="serial_equipo_pl1" id="serial_equipo_pl1" value="{{ $plant->serial_equipo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="velocidad_motor_pl1">VELCOIDAD DEL MOTOR</label>
            <input type="text" name="velocidad_motor_pl1" id="velocidad_motor_pl1" value="{{ $plant->velocidad_motor_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="admision_aire_pl1">ADMISION DE AIRE</label>
            <input type="text" name="admision_aire_pl1" id="admision_aire_pl1" value="{{ $plant->admision_aire_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="velocidad_rpm_pl1">VELOCIDAD (RPM)</label>
            <input type="text" name="velocidad_rpm_pl1" id="velocidad_rpm_pl1" value="{{ $plant->velocidad_rpm_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="horas_trabajo_pl1">HORAS DE TRABAJO</label>
            <input type="text" name="horas_trabajo_pl1" id="horas_trabajo_pl1" value="{{ $plant->horas_trabajo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="frecuencia_pl1">FRECUENCIA (ghz)</label>
            <input type="text" name="frecuencia_pl1" id="frecuencia_pl1" value="{{ $plant->frecuencia_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_kva_pl1">CAPACIDAD KVA</label>
            <input type="text" name="capacidad_kva_pl1" id="capacidad_kva_pl1" value="{{ $plant->capacidad_kva_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_kw_pl1">CAPACIDAD KW</label>
            <input type="text" name="capacidad_kw_pl1" id="capacidad_kw_pl1" value="{{ $plant->capacidad_kw_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="derrateo_pl1">% DERRATEO</label>
            <input type="text" name="derrateo_pl1" id="derrateo_pl1" value="{{ $plant->derrateo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_derrateo_pl1">CAPACIDAD CON DERRATEO</label>
            <input type="text" name="capacidad_derrateo_pl1" id="capacidad_derrateo_pl1" value="{{ $plant->capacidad_derrateo_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_motor_pl1">MARCA MOTOR</label>
            <input type="text" name="marca_motor_pl1" id="marca_motor_pl1" value="{{ $plant->marca_motor_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_motor_pl1">MODELO</label>
            <input type="text" name="modelo_motor_pl1" id="modelo_motor_pl1" value="{{ $plant->modelo_motor_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_motor_pl1">SERIAL N°</label>
            <input type="text" name="serial_motor_pl1" id="serial_motor_pl1" value="{{ $plant->serial_motor_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="presion_aceite_pl1">PRESIÓN DE ACEITE</label>
            <input type="text" name="presion_aceite_pl1" id="presion_aceite_pl1" value="{{ $plant->presion_aceite_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temp_aceite_pl1">TEMP ACEITE</label>
            <input type="text" name="temp_aceite_pl1" id="temp_aceite_pl1" value="{{ $plant->temp_aceite_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temp_refrigerante_pl1">TEMP REFRIGERANTE</label>
            <input type="text" name="temp_refrigerante_pl1" id="temp_refrigerante_pl1" value="{{ $plant->temp_refrigerante_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_generador_pl1">MARCA GENERADOR</label>
            <input type="text" name="marca_generador_pl1" id="marca_generador_pl1" value="{{ $plant->marca_generador_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_generador_pl1">MODELO</label>
            <input type="text" name="modelo_generador_pl1" id="modelo_generador_pl1" value="{{ $plant->modelo_generador_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_generador_pl1">SERIAL</label>
            <input type="text" name="serial_generador_pl1" id="serial_generador_pl1" value="{{ $plant->serial_generador_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for=""></label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for=""></label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temperatura_ambiente_pl1">TEMPERATURA AMBIENTE</label>
            <input type="text" name="temperatura_ambiente_pl1" id="temperatura_ambiente_pl1" value="{{ $plant->temperatura_ambiente_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="voltaje_bateria_pl1">VOLTAJE BATERIA</label>
            <input type="text" name="voltaje_bateria_pl1" id="voltaje_bateria_pl1" value="{{ $plant->voltaje_bateria_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_bateria_pl1">CAPACIDAD BATERIA</label>
            <input type="text" name="capacidad_bateria_pl1" id="capacidad_bateria_pl1" value="{{ $plant->capacidad_bateria_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="tipo_bateria_pl1">TIPO DE BATERIA</label>
            <input type="text" name="tipo_bateria_pl1" id="tipo_bateria_pl1" value="{{ $plant->tipo_bateria_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="cantidad_bateria_pl1">CANTIDAD BATERIA</label>
            <input type="text" name="cantidad_bateria_pl1" id="cantidad_bateria_pl1" value="{{ $plant->cantidad_bateria_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="estado_bateria_pl1">ESTADO BATERIA</label>
            <input type="text" name="estado_bateria_pl1" id="estado_bateria_pl1" value="{{ $plant->estado_bateria_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="estado_cargador_pl1">ESTADO CARGADOR</label>
            <input type="text" name="estado_cargador_pl1" id="estado_cargador_pl1" value="{{ $plant->estado_cargador_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l1_l2_pl1">VAC L1-L2</label>
            <input type="text" name="vac_l1_l2_pl1" id="vac_l1_l2_pl1" value="{{ $plant->vac_l1_l2_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l1_l3_pl1">VAC L1-L3</label>
            <input type="text" name="vac_l1_l3_pl1" id="vac_l1_l3_pl1" value="{{ $plant->vac_l1_l3_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l2_l3_pl1">VAC L2-L3</label>
            <input type="text" name="vac_l2_l3_pl1" id="vac_l2_l3_pl1" value="{{ $plant->vac_l2_l3_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l1_pl1">AMPERIORS L1</label>
            <input type="text" name="amperios_l1_pl1" id="amperios_l1_pl1" value="{{ $plant->amperios_l1_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l2_pl1">AMPERIOS L2</label>
            <input type="text" name="amperios_l2_pl1" id="amperios_l2_pl1" value="{{ $plant->amperios_l2_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l3_pl1">AMPERIOS L3</label>
            <input type="text" name="amperios_l3_pl1" id="amperios_l3_pl1" value="{{ $plant->amperios_l3_pl1 }}" class="form-control text-plant">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="">DIMENSIONAMIENTO / CARGABILIDAD</label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_amp_pl1">CAPACIDAD AMP (NOM)</label>
            <input type="text" name="capacidad_amp_pl1" id="capacidad_amp_pl1" value="{{ $plant->capacidad_amp_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="carga_demandada_pl1">CARGA DEMANDADA (AMP)</label>
            <input type="text" name="carga_demandada_pl1" id="carga_demandada_pl1" value="{{ $plant->carga_demandada_pl1 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="porcentaje_carga_pl1">% DE CARGA PLANTA</label>
            <input type="text" name="porcentaje_carga_pl1" id="porcentaje_carga_pl1" value="{{ $plant->porcentaje_carga_pl1 }}" class="form-control text-plant">
        </div>
    </div>
</div>
<hr>

<h4>PLANTA ELÉCTRICA 2</h4>
<p><b>CONSIDERACIONES:</b></p>
<p>Los campos que no sean llenados se completarán automáticamente con <b> "N/A"</b></p>
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_equipo_pl2">MARCA EQUIPO</label>
            <input type="text" name="marca_equipo_pl2" id="marca_equipo_pl2" value="{{ $plant->marca_equipo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_equipo_pl2">MODELO</label>
            <input type="text" name="modelo_equipo_pl2" id="modelo_equipo_pl2" value="{{ $plant->modelo_equipo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_equipo_pl2">SERIAL N°</label>
            <input type="text" name="serial_equipo_pl2" id="serial_equipo_pl2" value="{{ $plant->serial_equipo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="velocidad_motor_pl2">VELCOIDAD DEL MOTOR</label>
            <input type="text" name="velocidad_motor_pl2" id="velocidad_motor_pl2" value="{{ $plant->velocidad_motor_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="admision_aire_pl2">ADMISION DE AIRE</label>
            <input type="text" name="admision_aire_pl2" id="admision_aire_pl2" value="{{ $plant->admision_aire_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="velocidad_rpm_pl2">VELOCIDAD (RPM)</label>
            <input type="text" name="velocidad_rpm_pl2" id="velocidad_rpm_pl2" value="{{ $plant->velocidad_rpm_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="horas_trabajo_pl2">HORAS DE TRABAJO</label>
            <input type="text" name="horas_trabajo_pl2" id="horas_trabajo_pl2" value="{{ $plant->horas_trabajo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="frecuencia_pl2">FRECUENCIA (ghz)</label>
            <input type="text" name="frecuencia_pl2" id="frecuencia_pl2" value="{{ $plant->frecuencia_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_kva_pl2">CAPACIDAD KVA</label>
            <input type="text" name="capacidad_kva_pl2" id="capacidad_kva_pl2" value="{{ $plant->capacidad_kva_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_kw_pl2">CAPACIDAD KW</label>
            <input type="text" name="capacidad_kw_pl2" id="capacidad_kw_pl2" value="{{ $plant->capacidad_kw_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="derrateo_pl2">% DERRATEO</label>
            <input type="text" name="derrateo_pl2" id="derrateo_pl2" value="{{ $plant->derrateo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_derrateo_pl2">CAPACIDAD CON DERRATEO</label>
            <input type="text" name="capacidad_derrateo_pl2" id="capacidad_derrateo_pl2" value="{{ $plant->capacidad_derrateo_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_motor_pl2">MARCA MOTOR</label>
            <input type="text" name="marca_motor_pl2" id="marca_motor_pl2" value="{{ $plant->marca_motor_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_motor_pl2">MODELO</label>
            <input type="text" name="modelo_motor_pl2" id="modelo_motor_pl2" value="{{ $plant->modelo_motor_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_motor_pl2">SERIAL N°</label>
            <input type="text" name="serial_motor_pl2" id="serial_motor_pl2" value="{{ $plant->serial_motor_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="presion_aceite_pl2">PRESIÓN DE ACEITE</label>
            <input type="text" name="presion_aceite_pl2" id="presion_aceite_pl2" value="{{ $plant->presion_aceite_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temp_aceite_pl2">TEMP ACEITE</label>
            <input type="text" name="temp_aceite_pl2" id="temp_aceite_pl2" value="{{ $plant->temp_aceite_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temp_refrigerante_pl2">TEMP REFRIGERANTE</label>
            <input type="text" name="temp_refrigerante_pl2" id="temp_refrigerante_pl2" value="{{ $plant->temp_refrigerante_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="marca_generador_pl2">MARCA GENERADOR</label>
            <input type="text" name="marca_generador_pl2" id="marca_generador_pl2" value="{{ $plant->marca_generador_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="modelo_generador_pl2">MODELO</label>
            <input type="text" name="modelo_generador_pl2" id="modelo_generador_pl2" value="{{ $plant->modelo_generador_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="serial_generador_pl2">SERIAL</label>
            <input type="text" name="serial_generador_pl2" id="serial_generador_pl2" value="{{ $plant->serial_generador_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for=""></label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for=""></label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="temperatura_ambiente_pl2">TEMPERATURA AMBIENTE</label>
            <input type="text" name="temperatura_ambiente_pl2" id="temperatura_ambiente_pl2" value="{{ $plant->temperatura_ambiente_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="voltaje_bateria_pl2">VOLTAJE BATERIA</label>
            <input type="text" name="voltaje_bateria_pl2" id="voltaje_bateria_pl2" value="{{ $plant->temperatura_ambiente_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_bateria_pl2">CAPACIDAD BATERIA</label>
            <input type="text" name="capacidad_bateria_pl2" id="capacidad_bateria_pl2" value="{{ $plant->capacidad_bateria_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="tipo_bateria_pl2">TIPO DE BATERIA</label>
            <input type="text" name="tipo_bateria_pl2" id="tipo_bateria_pl2" value="{{ $plant->tipo_bateria_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="cantidad_bateria_pl2">CANTIDAD BATERIA</label>
            <input type="text" name="cantidad_bateria_pl2" id="cantidad_bateria_pl2" value="{{ $plant->cantidad_bateria_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="estado_bateria_pl2">ESTADO BATERIA</label>
            <input type="text" name="estado_bateria_pl2" id="estado_bateria_pl2" value="{{ $plant->estado_bateria_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="estado_cargador_pl2">ESTADO CARGADOR</label>
            <input type="text" name="estado_cargador_pl2" id="estado_cargador_pl2" value="{{ $plant->estado_cargador_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l1_l2_pl2">VAC L1-L2</label>
            <input type="text" name="vac_l1_l2_pl2" id="vac_l1_l2_pl2" value="{{ $plant->vac_l1_l2_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l1_l3_pl2">VAC L1-L3</label>
            <input type="text" name="vac_l1_l3_pl2" id="vac_l1_l3_pl2" value="{{ $plant->vac_l1_l3_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="vac_l2_l3_pl2">VAC L2-L3</label>
            <input type="text" name="vac_l2_l3_pl2" id="vac_l2_l3_pl2" value="{{ $plant->vac_l2_l3_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l1_pl2">AMPERIORS L1</label>
            <input type="text" name="amperios_l1_pl2" id="amperios_l1_pl2" value="{{ $plant->amperios_l1_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l2_pl2">AMPERIOS L2</label>
            <input type="text" name="amperios_l2_pl2" id="amperios_l2_pl2" value="{{ $plant->amperios_l2_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="amperios_l3_pl2">AMPERIOS L3</label>
            <input type="text" name="amperios_l3_pl2" id="amperios_l3_pl2" value="{{ $plant->amperios_l3_pl2 }}" class="form-control text-plant">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="">DIMENSIONAMIENTO / CARGABILIDAD</label>
            <input type="hidden" name="" id="" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="capacidad_amp_pl2">CAPACIDAD AMP (NOM)</label>
            <input type="text" name="capacidad_amp_pl2" id="capacidad_amp_pl2" value="{{ $plant->capacidad_amp_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="carga_demandada_pl2">CARGA DEMANDADA (AMP)</label>
            <input type="text" name="carga_demandada_pl2" id="carga_demandada_pl2" value="{{ $plant->carga_demandada_pl2 }}" class="form-control text-plant">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="porcentaje_carga_pl2">% DE CARGA PLANTA</label>
            <input type="text" name="porcentaje_carga_pl2" id="porcentaje_carga_pl2" value="{{ $plant->porcentaje_carga_pl2 }}" class="form-control text-plant">
        </div>
    </div>
</div>

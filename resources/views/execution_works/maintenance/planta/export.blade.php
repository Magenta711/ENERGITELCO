<style>
    *{

    }
</style>
@php
            $count_slpe=count($check['slpe']);
            $count_scpe=count($check['scpe']);
            $count_sa=count($check['sa']);
            $count_srpe=count($check['srpe']);
            $count_seape=count($check['seape']);
            $count_semoceo=count($check['semoceo']);
            $count_gme=count($check['gme']);
            $count_mc=count($check['mc']);
            $count_ta=count($check['ta']);
            $count_prueba=count($check['prueba_realizada']);

    function resizeHeightCell($string) {
        $str_len = strlen($string);
        // $min_height = 12;
        $size = ceil($str_len/41) * 11;

        // echo $string;
        if ($size>0) {
            return $size;
        }else {
            $size=11;
            return $size;
        }
    }
@endphp

<table style="border: 3px solid #000000">
    <tr>
        <td colspan="1" rowspan="3" style="text-align: center; border: 3px solid #000000; width: 20px">Logo 1</td>
        <td colspan="10" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight: bold">Jefatura Tecnico Integral Gerencia Tecnica Regional</td>
        <td colspan="1" rowspan="3" style="text-align: center; border: 3px solid #000000; ">Logo 2</td>
    </tr>
    <tr>
        <td colspan="10" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight: bold;
        font-size: 11pt;">PLAN MANTENIMIENTO SISTEMA DEL GRUPO ELECTROGENO</td>
    </tr>
    <tr>
        <td colspan="10" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight: bold">PROYECTO SMU</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="background-color:#C00000; color:white; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight: bold">1.- INFORMACIÓN GENERAL DEL SITIO</td>
    </tr>
    <tr>
        <td colspan="12" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center; background-color: #ACB9CA;">DATOS GENERALES</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">NOMBRE ESTACION</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->name_base }}</td>

        <td colspan="4" rowspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 0px; background-color:transparent"></td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; width: 20px">ESTRUCTURA</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->structure }}</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">DIRECCION O UBICACIÓN</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->location }}</td>

        {{-- <td colspan="7" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 0px; background-color:transparent"></td> --}}
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">ORDERN DE TRABAJO O TAS</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->order_work }}</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">NOMBRE JEFATURA</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->leadership }}</td>

        {{-- <td colspan="7" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 0px; background-color:transparent"></td> --}}
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">SITE OWNER</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->site_owner }}</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">ZONA O{{ "&" }}M CLARO</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->zone }}</td>

        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">REGION</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->region }}</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">MODALIDAD</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->modus }}</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ">CANTIDAD DE PLANTAS</td>
        <td colspan="2" rowspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; text-align: center;">{{ $id->amount_plant }}</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #C00000; color:white; text-align:center">2.- DATOS PRINCIPALES DE PLANTAS</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">PLANTA ELECTRICA 1</td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA EQUIPO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; width: 12.33px">{{ $plant->marca_equipo_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;  width: 15.56px; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;  width: 17.56px">{{ $plant->modelo_equipo_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;  width: 15.56px; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; width: 15.33px">{{ $plant->serial_equipo_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; width: 16.56px; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">VELOCIDAD DEL MOTOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; width: 15.56px">{{ $plant->velocidad_motor_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;  width: 21.56px; background-color: #F2F2F2; border: 1px solid #000000">ADMISION DEL AIRE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;  width: 13.56px">{{ $plant->admision_aire_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;  width: 15.86px; background-color: #F2F2F2; border: 1px solid #000000">VELOCIDAD (Rpm)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;  width: 11.56px">{{ $plant->velocidad_rpm_pl1 }}</td>
    </tr>

    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">HORAS DE TRABAJO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->horas_trabajo_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">FRECUENCIA (ghz)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->frecuencia_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD KVA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->capacidad_kva_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD KW</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->capacidad_kw_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">% DERRATEO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->derrateo_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">CAPACIDAD CON DERRETEO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->capacidad_derrateo_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA MOTOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->marca_motor_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->modelo_motor_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->serial_motor_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">PRESION DE ACEITE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->presion_aceite_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">TEMP ACEITE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->temp_aceite_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">TEMP REFRIGERANTE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->temp_refrigerante_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
        <td colspan="4" rowspan="3"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA GENERADOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->marca_generador_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->modelo_generador_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°1</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->serial_motor_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">TEMPERATURA AMBIENTE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
        <td colspan="2"></td>
        {{-- <td colspan="2"></td> --}}
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VOLTAJE BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->voltaje_bateria_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->capacidad_bateria_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">TIPO DE BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->tipo_bateria_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CANTIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->cantidad_bateria_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">ESTADO BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->estado_bateria_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">ESTADO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->estado_cargador_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VAC L1-L2</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->vac_l1_l2_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VAC L1-L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->vac_l1_l3_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">VAC L2-L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->vac_l2_l3_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L1</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->amperios_l1_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L2</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->amperios_l2_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->amperios_l3_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="5" rowspan="2"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">DIMENSIONAMIENTO/ CARGABILIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">CAPACIDAD AMP (NOM)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->capacidad_amp_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000 white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;" >CARGA DEMANDADA (AMP)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->carga_demandada_pl1 }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000, white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">% DE CARGA DE PLANTA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->porcentaje_carga_pl1 }}</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">PLANTA ELECTRICA 2</td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA EQUIPO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->marca_equipo_pl2 ? $plant->marca_equipo_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->modelo_equipo_pl2 ? $plant->modelo_equipo_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->serial_equipo_pl2 ? $plant->serial_equipo_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">VELOCIDAD DEL MOTOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->velocidad_motor_pl2 ? $plant->velocidad_motor_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">ADMISION DEL AIRE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->admision_aire_pl2 ? $plant->admision_aire_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VELOCIDAD (Rpm)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->velocidad_rpm_pl2 ? $plant->velocidad_rpm_pl2 : 'N/A' }}</td>
    </tr>

    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">HORAS DE TRABAJO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->horas_trabajo_pl2 ? $plant->horas_trabajo_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">FRECUENCIA (ghz)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->frecuencia_pl2 ? $plant->frecuencia_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD KVA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->capacidad_kva_pl2 ? $plant->capacidad_kva_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD KW</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->capacidad_kw_pl2 ? $plant->capacidad_kw_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">% DERRATEO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->derrateo_pl2 ? $plant->derrateo_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">CAPACIDAD CON DERRETEO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->capacidad_derrateo_pl2 ? $plant->capacidad_derrateo_pl2 : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA MOTOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->marca_motor_pl2 ? $plant->marca_motor_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->modelo_motor_pl2 ? $plant->modelo_motor_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->serial_motor_pl2 ? $plant->serial_motor_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">PRESION DE ACEITE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->presion_aceite_pl2 ? $plant->presion_aceite_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">TEMP ACEITE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->temp_aceite_pl2 ? $plant->temp_aceite_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">TEMP REFRIGERANTE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->temp_refrigerante_pl2 ? $plant->temp_refrigerante_pl2 : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
        <td colspan="4" rowspan="3"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">MARCA GENERADOR</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->marca_generador_pl2 ? $plant->marca_generador_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">MODELO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->modelo_generador_pl2 ? $plant->modelo_generador_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">SERIAL N°1</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->serial_motor_pl2 ? $plant->serial_motor_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">TEMPERATURA AMBIENTE</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->_pl2 ? $plant->_pl2 : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VOLTAJE BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->voltaje_bateria_pl2 ? $plant->voltaje_bateria_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CAPACIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->capacidad_bateria_pl2 ? $plant->capacidad_bateria_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">TIPO DE BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->tipo_bateria_pl2 ? $plant->tipo_bateria_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">CANTIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->cantidad_bateria_pl2 ? $plant->cantidad_bateria_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">ESTADO BATERIA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->estado_bateria_pl2 ? $plant->estado_bateria_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">ESTADO</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->estado_cargador_pl2 ? $plant->estado_cargador_pl2 : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VAC L1-L2</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->vac_l1_l2_pl2 ? $plant->vac_l1_l2_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">VAC L1-L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->vac_l1_l3_pl2 ? $plant->vac_l1_l3_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000">VAC L2-L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->vac_l2_l3_pl2 ? $plant->vac_l2_l3_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L1</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $plant->amperios_l1_pl2 ? $plant->amperios_l1_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L2</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->amperios_l2_pl2 ? $plant->amperios_l2_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000">AMPERIOS L3</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $plant->amperios_l3_pl2 ? $plant->amperios_l3_pl2 : 'N/A' }}</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="5" rowspan="2"></td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #F2F2F2; border: 1px solid #000000; height: 24px; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">DIMENSIONAMIENTO/ CARGABILIDAD</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">CAPACIDAD AMP (NOM)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->capacidad_amp_pl2 ? $plant->capacidad_amp_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; background-color: #F2F2F2; border: 1px solid #000000 white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;" >CARGA DEMANDADA (AMP)</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->carga_demandada_pl2 ? $plant->carga_demandada_pl2 : 'N/A' }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; background-color: #F2F2F2; border: 1px solid #000000, white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">% DE CARGA DE PLANTA</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; white-space: nowrap; word-wrap: break-word; max-width: 100%; overflow: hidden; vertical-align: middle;">{{ $plant->porcentaje_carga_pl2 ? $plant->porcentaje_carga_pl2 : 'N/A' }}</td>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #C00000">3.- LISTA DE CHEQUEO</td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">ESTADO DE COMPONENTES</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">ESTADO GENERAL</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">CAUSA POSIBLE</td>
        <td colspan="2" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">FORMA DE DETECTARLO</td>
        <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA">FORMA DE CORREGIRLO</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA LUBRICACIÓN DE PLANTA ELECTRICA</td>
    </tr>
    @for ($i = 1; $i <= $count_slpe; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['slpe'][$i]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['slpe'][$i]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;height: {{ resizeHeightCell($check['slpe']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['scpe']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['slpe'][$i]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['slpe'][$i]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA DE COMBUSTIBLE DE PLANTA ELECTRICA</td>
    </tr>
    @for ($i = 1; $i <= $count_scpe; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['scpe']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['scpe']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['scpe']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['scpe']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['scpe']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['scpe']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA DE ASPIRACION</td>
    </tr>
    @for ($i = 1; $i <= $count_sa; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['sa']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['sa']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['sa']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['sa']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['sa']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['sa']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA REFRIGERACIÓN DE PLANTA ELECTRICA</td>
    </tr>
    @for ($i = 1; $i <= $count_srpe; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['srpe']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['srpe']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['srpe']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['srpe']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['srpe']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['srpe']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA DE ESCAPE Y ADMISIÓN PLANTA ELECTRICA</td>
    </tr>
    @for ($i = 1; $i <= $count_seape; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['seape']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['seape']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['seape']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['seape']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['seape']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['seape']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">SISTEMA ELECTRICO DE MOTOR OTROS COMPONENTES DEL ELECTROGENO PARA OPERAR</td>
    </tr>
    @for ($i = 1; $i <= $count_semoceo; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['semoceo']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['semoceo']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['semoceo']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['semoceo']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['semoceo']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['semoceo']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">GENERADOR (MECANICO / ELECTRICO)</td>
    </tr>
    @for ($i = 1; $i <= $count_gme; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['gme']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['gme']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['gme']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['gme']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['gme']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['gme']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #D9D9D9; font-weight: bold;">MODULO DE CONTROL</td>
    </tr>
    @for ($i = 1; $i <= $count_mc; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['mc']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['mc']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['mc']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['mc']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['mc']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['mc']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #FFFF00; font-weight: bold">TRANSFERENCIA AUTOMATICA</td>
    </tr>
    @for ($i = 1; $i <= $count_ta; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['ta']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['ta']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['ta']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['ta']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['ta']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['ta']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: 1px">9- Fusibles o  Minibreakers</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: 1px">10- Selectores</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: 1px">11- Pulsadores</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
        <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;"></td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #C00000; font-weight: bold">4. RESULTADO DE PRUEBAS</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA; font-weight: bold">PRUEBA REALIZADA</td>
    </tr>
    @for ($i = 1; $i <= $count_prueba; $i++)
        <tr>
            <td colspan="5" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['prueba_realizada']["$i"]["item"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['prueba_realizada']["$i"]["estado"] }}</td>
            <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['prueba_realizada']["$i"]["causa_posible"] }}</td>
            <td colspan="2" style="font-size: 6pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000; height: {{ resizeHeightCell($check['prueba_realizada']["$i"]["forma_detectarlo"]).'px' }}">{{ $check['prueba_realizada']["$i"]["forma_detectarlo"] }}</td>
            <td colspan="3" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000;">{{ $check['prueba_realizada']["$i"]["forma_corregirlo"] }}</td>
        </tr>
    @endfor
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #C00000; font-weight: bold">5. RESULTADO DE PRUEBAS</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #ACB9CA; font-weight: bold">SERVICIO DE FILTRACION</td>
    </tr>
    <tr>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; border: 1px solid #000000; height: 31,50px">Cambio de aceite</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;; height: 31,50px ">{{ $resultado->cheque_aceite }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; border: 1px solid #000000">Cambio de filtros de aire</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $resultado->cambio_filtro_aire }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif;; border: 1px solid #000000">Cambio de filtros de combustible</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $resultado->cambio_filtro_combustible }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; border: 1px solid #000000">Cambio de filtros de aceite</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $resultado->cambio_filtro_aceite }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 1px solid #000000">Cambio de mangueras de precalentador</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $resultado->cambio_maguera }}</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; border: 1px solid #000000">Cambio o ajuste refrigerante para motor diesel</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000; ">{{ $resultado->cambio_refrigerante }}</td>
    </tr>

    <tr>
        <td colspan=1  style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; ; border: 1px solid #000000">Cambio de baterías</td>
        <td colspan="1" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;">{{ $resultado->cambio_bateria }}</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #C00000">6.- SOPORTES MANTENIMIENTO (ANEXOS FOTOGRAFICOS).</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; text-align: center; border: 3px solid #000000; background-color: #FCE4D6">PLANTA ELECTRICA</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Alarmas activas que impidan el arranque y puesta en servicio</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Nivel de aceite de la planta está dentro de las marcas Max y Min</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Juntas del motor de la planta</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Empaque y Retenedores de Carter</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Estado Pera o sensor de Aceite</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- Presión de Aceite Kg/Cm2 o PSI(Indicar lectura)</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">7- Evidencia de de Diluido o contaminacion.</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">8- Existencia de Fugas</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">9- Presion de aceite a la temperatura de operación</td>
    </tr>
    {{-- gris --}}
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
        <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Conexiones de combustible (adecuadas y no prese+A52:E66ntan fugas)</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Abrazaderas</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Tanques de combustible (anclados adecuadamente)</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">4- Cantidad de contaminación por agua otros materiales extraños así como su calidad (densidad especifica).</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- las líneas de suministro de combustible de BAJA presión por: fugas, condición y seguridad</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- las líneas de combustible del motor, bomba y filtros por fugas, condición y seguridad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">7- las líneas de suministro de combustible de ALTA presión por fugas, condición y seguridad</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">8- Revisar y registrar la presión de combustible</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">9- la restricción de combustible de entrada</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">10- Mangueras</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">11- Resultado de Limpieza.</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">12- Bomba de Inyección</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">13- Bomba de Transferencia</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">14- Nivel Combustible</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">15- Estado válvulas de drenaje tanques (libres de objetos y se accionan facilimente)</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4"style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Inspecciona las condiciones de las tomas de aire y los ductos y su correcta operación</td>
        <td colspan="4"style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">2- Revisa los filtros de aire por condición y seguridad, apretar las abrazadoras y los soportes como lo requieran</td>
        <td colspan="4"style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3-  Inspección de salida de turbocargador (de existir), boquilla y tubos por condiciones y seguridad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Dar servicio a los respiradores del carter y drenaje de la caja de aire como se requiera</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Revisar y registrar la restricción de aire de admisión</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- Revisar registrar la presión del cárter</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Bomba de Agua</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Revisar el nivel de refrigerante, rellenar como se requiera</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Realizar la prueba de presión y revisar posibles fugas</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">4- Revisar la banda de la polea del ventilador por condiciones y tensión adecuada y ajustar o remplazar si es necesario</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Revisar las mangueras y tubos de refrigerante por condiciones adecuadas y seguridad</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- Revisar el panal del radiador por arreglo y limpieza, condiciones y seguridad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">7- Revisar los rodamientos de la polea del ventilador y la polea loca, y Revisar las condiciones y seguridad de los alojamientos, soportes y tensores</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">8- Inspeccionar las aspas del ventilador, guardas y soporte por condiciones de seguridad, apretar los sujetadores</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">9- Estado de Termostato</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">10- Nivel de Refrigerante</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">11- Revisar y registrar la temperatura del refrigerante bajo condiciones de operación</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">12- Sensor de nivel de Refrigerante</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">13- Precalentador</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">14- Sensor de temperatura</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">15- Estado de ventilador</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Multiple de Escape</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">2- Revisar los tubos de escape y sus conexiones donde sean accesibles, apretar sujetadores y tornillos de brindas</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Turboalimentador</td>
    </tr>

    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Revisar los soportes del silenciador, operar sus drenajes</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Tuberia de Escape Exhosto</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- Templetes Sistema de Escape (ajustados y sin signos de oxidación)</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">7- Mangueras del Turboalimentador</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">8- Estado tubería del filtro de aire.</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center"></td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Revisar los cables de la marcha del motor, alambres y conectores por condición y seguridad</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Revisar y registrar el voltaje de flotación de las baterías de arranque y nivel de electrolito</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Revisar el cargador de baterías por operación y salida Bornes de Bateria</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Revisar registrar la corriente de funcionamiento de la marcha</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Revisar los controles eléctricos, terminales de sensores</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">6- Revisar la operación del pre-calentador del agua, termostatos de control y el contactor de desconexión de presión de aceite</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">7- Probar todos los dispositivos de protección del motor</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">8- Alternador y Correas</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">9- Motor de Arranque</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">10- Arnes o cableado de control</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">11- Tarjeta de Control</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">12- Elementos de Medición</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">13- Magnetic-Pickup</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">14- AVR Generador</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">15- Totalizador Planta Y DIMENSIONAMIENTO</td>
    </tr>

    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">16- Test De Lamparas, Leds Y Pilotos</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">17- Fusibles y Protecciones</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">18- Tarjeta De Control De Velocidad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">19- Sensores y Manometros</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center"></td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center"></td>
    </tr>
    {{-- gris --}}
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Revisar y verificar los pernos de anclaje</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Revisar los tornillos del acoplamiento flexible</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Revisar las guardas del ventilador por condiciones y seguridad</td>
    </tr>

    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Revisar la pantalla de la toma de aire por limpieza de las líneas, condiciones y seguridad</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Revisar rodamientos</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">6- Revisar las conexiones mecánicas por apriete, condiciones y seguridad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">7- Revisar y registrar el voltaje residual, en vacío y con carga</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">8- Revisar el ensamble del excitador, estator y campos por limpieza de las líneas e integridad física</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">9- Revisar las terminales de cables y alambres en el generador por condición y seguridad</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center; height: 24px">10- Revisar el rectificador rotativo y el supresor de onda por condición, conexiones y apriete del montaje</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">11- Revisar el extremo del alojamiento de la campana por limpieza de líneas e interferencia de dispositivos con ensamble rotativos</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">12- Probar los dispositivos de protección del generador</td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>{{-- gris --}}
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">1- Verificar la operación de los controles de encendido automático y control remoto</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">2- Verificar la operación y calibración de los instrumentos del generador y el motor</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">3- Verificar la operación del equipo de generación indicadores asociados, luces y alarmas</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">4- Revisar y ajustar como se requiera para real control de potencia real y reactiva sincronizada</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center">5- Revisar y ajustar como se requiera la frecuencia y el voltaje del sistema</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #333F4F; border: 3px solid #000000; color: white; text-align:center"></td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #FFFF00; text-align:center;">TRANSFERENCIA AUTOMATICA</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">1- Estado del Tablero Metalico (Gabinete o Cofre) Y Puerta.</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">2- Terminales de Conductores</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">3- Cableado (estado y organización)</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">4- Contactores Principales</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">5- Vigilantes de Tensión</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">6- Totalizador</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">7- Temporizadores</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">8- Relevos</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">9-  Pilotos </td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">10- Contactos Auxiliares</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">11- Tarjeta de Control</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">12- Display y Modulo de Comunicación.</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center">13- Proteccion sobretensiones y Transientes</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center"></td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #A6A6A6; border: 3px solid #000000; color: white; text-align:center"></td>
    </tr>
    <tr>
        <td colspan="12" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #757171"></td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center">1- Funcionamiento de la Planta en Vacio.</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center">2- Funcionamiento de la Planta con Carga </td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center">3- Transferencia automatica entre Red Comercial y Planta (y viceversa)</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
        <td colspan="4" rowspan="13" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; border: 3px solid #000000;"></td>
    </tr>
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
    <tr>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center">4- Funcionamiento de planta forzada desde Transferencia (Manual)</td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center"></td>
        <td colspan="4" style="font-size: 8pt; font-family:Arial, Helvetica, sans-serif; background-color: #002060; border: 3px solid #000000; color: white; text-align:center"></td>
    </tr>

</table>

{{--  Type marke idu mw  --}}
<h4>Planeación marquillas IDU MW</h4>
<div class="form-group">
    <label for="type_marke_mw">Tipo de enlace de configuración</label>
    <br>
    <label for="type_marke_mw_1">
        <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_1" value="1" class="type_marke_mw">
        Enlace de configuración estándar
    </label>
    <br>
    <label for="type_marke_mw_2">
        <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_2" value="2" class="type_marke_mw">
        Enlace de configuración XPIC
    </label>
    <br>
    <label for="type_marke_mw_3">
        <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_3" value="3" class="type_marke_mw">
        Enlace de configuración con diversidad de espacio (SD)
    </label>
    <br>
    <label for="type_marke_mw_4">
        <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_4" value="4" class="type_marke_mw">
        Enlace de configuración XPIC con diversidad de espacio (SD)
    </label>
    <br>
    <label for="type_marke_mw_5">
        <input type="checkbox" name="type_marke_mw[]" id="type_marke_mw_5" value="5" class="type_marke_mw">
        Enlace de configuración N+1 XPIC
    </label>
    <br>
    <p id="textInfoEnlaces" class="help-block">No se ha chequeado ningún enlace de configuración</p>
</div>
{{--  Modales  --}}
<div class="row">
    <div class="col-md-2" id="divBtnModal_1" style="display: none">
        <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_1" class="btn btn-sm btn-success">E.C. Estándar</button>
    </div>
    <div class="col-md-2" id="divBtnModal_2" style="display: none">
        <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_2" class="btn btn-sm btn-success">E.C. XPIC</button>
    </div>
    <div class="col-md-2" id="divBtnModal_3" style="display: none">
        <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_3" class="btn btn-sm btn-success">E.C. (SD)</button>
    </div>
    <div class="col-md-2" id="divBtnModal_4" style="display: none">
        <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_4" class="btn btn-sm btn-success">E.C. XPIC con (SD)</button>
    </div>
    <div class="col-md-2" id="divBtnModal_5" style="display: none">
        <button type="button" data-toggle="modal" data-target="#modalEnlaceMarked_5" class="btn btn-sm btn-success">E.C. N+1 XPIC</button>
    </div>
</div>
{{--  Modales de enlaces de marquilla MW  --}}
{{--  Model de enlace estándar  --}}
<div class="modal fade" id="modalEnlaceMarked_1" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">
                    Enlace de configuración estándar <br>
                    <small>Aplica para instalaciones con configuración de 1+0 o 0+1</small>
                </h4>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group">
                    <label for="local_station_1">Estación base local</label>
                    <input type="text" id="local_station_1" name="local_station_1" value="{{old('local_station_1')}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_local_1">IP local</label>
                            <input type="text" id="ip_local_1" name="ip_local_1" value="{{old('ip_local_1')}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_local_1">ID local</label>
                            <input type="text" id="id_local_1" name="id_local_1" value="{{old('id_local_1')}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="local_frequency_1">Frecuencia TX local</label>
                            <input type="text" id="local_frequency_1" name="local_frequency_1" value="{{old('local_frequency_1')}}" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="remote_station_1">Estación base remota</label>
                    <input type="text" id="remote_station_1" value="{{old('remote_station_1')}}" name="remote_station_1" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_remote_1">IP remota</label>
                            <input type="text" id="ip_remote_1" value="{{old('ip_remote_1')}}" name="ip_remote_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_remote_1">ID remota</label>
                            <input type="text" id="id_remote_1" value="{{old('id_remote_1')}}" name="id_remote_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="remote_frequency_1">Frecuencia TX remota</label>
                            <input type="text" id="remote_frequency_1" value="{{old('remote_frequency_1')}}" name="remote_frequency_1" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="equipment_brand_1">Marca del equipo</label>
                            <input type="text" id="equipment_brand_1" value="{{old('equipment_brand_1')}}" name="equipment_brand_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="equipment_model_1">Modelo del equipo</label>
                            <input type="text" id="equipment_model_1" value="{{old('equipment_model_1')}}" name="equipment_model_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="instalation_date_1">Fecha de instalación</label>
                            <input type="text" id="instalation_date_1" value="{{old('instalation_date_1')}}" name="instalation_date_1" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena local</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_1_1">Altura antena</label>
                            <input type="text" id="antenna_height_1_1" value="{{old('antenna_height_1_1')}}" name="antenna_height_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_1_1">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_1_1" value="{{old('antenna_diameter_1_1')}}" name="antenna_diameter_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="polarity">Polaridad</label>
                            <input type="text" id="polarity_1_1" value="{{old('polarity_1_1')}}" name="polarity_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_1_1">Modelo de antena</label>
                            <input type="text" id="antenna_model_1_1" value="{{old('antenna_model_1_1')}}" name="antenna_model_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_1_1">Marca de antena</label>
                            <input type="text" id="antenna_brand_1_1" value="{{old('antenna_brand_1_1')}}" name="antenna_brand_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_1_1">Serial de la antena</label>
                            <input type="text" id="antenna_serial_1_1" value="{{old('antenna_serial_1_1')}}" name="antenna_serial_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_1_1">Azimuth</label>
                            <input type="text" id="azimuth_1_1" value="{{old('azimuth_1_1')}}" name="azimuth_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_tx_1_1">Nivel Tx</label>
                            <input type="text" id="level_tx_1_1" value="{{old('level_tx_1_1')}}" name="level_tx_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_1_1">Nivel Rx</label>
                            <input type="text" id="level_rx_1_1" value="{{old('level_rx_1_1')}}" name="level_rx_1_1" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena remota</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_1_2">Altura antena</label>
                            <input type="text" id="antenna_height_1_2" value="{{old('antenna_height_1_2')}}" name="antenna_height_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_1_2">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_1_2" value="{{old('antenna_diameter_1_2')}}" name="antenna_diameter_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="polarity">Polaridad</label>
                            <input type="text" id="polarity_1_2" value="{{old('polarity_1_2')}}" name="polarity_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_1_2">Modelo de antena</label>
                            <input type="text" id="antenna_model_1_2" value="{{old('antenna_model_1_2')}}" name="antenna_model_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_1_2">Marca de antena</label>
                            <input type="text" id="antenna_brand_1_2" value="{{old('antenna_brand_1_2')}}" name="antenna_brand_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_1_2">Serial de la antena</label>
                            <input type="text" id="antenna_serial_1_2" value="{{old('antenna_serial_1_2')}}" name="antenna_serial_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_1_2">Azimuth</label>
                            <input type="text" id="azimuth_1_2" value="{{old('azimuth_1_2')}}" name="azimuth_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_tx_1_2">Nivel Tx</label>
                            <input type="text" id="level_tx_1_2" value="{{old('level_tx_1_2')}}" name="level_tx_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_1_2">Nivel Rx</label>
                            <input type="text" id="level_rx_1_2" value="{{old('level_rx_1_2')}}" name="level_rx_1_2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary"
                    data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{--  Model de enlace XPIC  --}}
<div class="modal fade" id="modalEnlaceMarked_2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">
                    Enlace de configuración XPIC <br>
                    <small>Aplica para instalaciones con configuración XPIC. Dimensiones 9,5 cm x 11,4 cm</small>
                </h4>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group">
                    <label for="station_local_2">Estación base local</label>
                    <input type="text" id="station_local_2" value="{{old('station_local_2')}}" name="station_local_2" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_local_2">IP local</label>
                            <input type="text" id="ip_local_2" value="{{old('ip_local_2')}}" name="ip_local_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_local_2">ID local</label>
                            <input type="text" id="id_local_2" value="{{old('id_local_2')}}" name="id_local_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="local_frecuency_2">Frecuencia TX local</label>
                            <input type="text" id="local_frecuency_2" value="{{old('local_frecuency_2')}}" name="local_frecuency_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="station_remote_2">Estación base remota</label>
                    <input type="text" id="station_remote_2" value="{{old('station_remote_2')}}" name="station_remote_2" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_remote_2">IP remota</label>
                            <input type="text" id="ip_remote_2" value="{{old('ip_remote_2')}}" name="ip_remote_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_remote_2">ID remota</label>
                            <input type="text" id="id_remote_2" value="{{old('id_remote_2')}}" name="id_remote_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="remote_frecuency_2">Frecuencia TX remota</label>
                            <input type="text" id="remote_frecuency_2" value="{{old('remote_frecuency_2')}}" name="remote_frecuency_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="equipment_brand_2">Marca de equipo</label>
                            <input type="text" id="equipment_brand_2" value="{{old('equipment_brand_2')}}" name="equipment_brand_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="equipment_model_2">Modelo de equipo</label>
                            <input type="text" id="equipment_model_2" value="{{old('equipment_model_2')}}" name="equipment_model_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="instalation_date_2">Fecha de instalación</label>
                            <input type="text" id="instalation_date_2" value="{{old('instalation_date_2')}}" name="instalation_date_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena local</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_2_1">Altura antena</label>
                            <input type="text" id="antenna_height_2_1" value="{{old('antenna_height_2_1')}}" name="antenna_height_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_2_1">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_2_1" value="{{old('antenna_diameter_2_1')}}" name="antenna_diameter_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_2_1">Modelo de antena</label>
                            <input type="text" id="antenna_model_2_1" value="{{old('antenna_model_2_1')}}" name="antenna_model_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_2_1">Marca de antena</label>
                            <input type="text" id="antenna_brand_2_1" value="{{old('antenna_brand_2_1')}}" name="antenna_brand_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_2_1">Serial de la antena</label>
                            <input type="text" id="antenna_serial_2_1" value="{{old('antenna_serial_2_1')}}" name="antenna_serial_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_2_1">Azimuth</label>
                            <input type="text" id="azimuth_2_1" value="{{old('azimuth_2_1')}}" name="azimuth_2_1" class="form-control">
                        </div>
                    </div>
                    <h5>Polaridad vertical</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_tx_2_1_1">Nivel Tx</label>
                            <input type="text" id="level_tx_2_1_1" value="{{old('level_tx_2_1_1')}}" name="level_tx_2_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_2_1_1">Nivel Rx</label>
                            <input type="text" id="level_rx_2_1_1" value="{{old('level_rx_2_1_1')}}" name="level_rx_2_1_1" class="form-control">
                        </div>
                    </div>
                    <h5>Polaridad horizontal</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_tx_2_1_2">Nivel Tx</label>
                            <input type="text" id="level_tx_2_1_2" value="{{old('level_tx_2_1_2')}}" name="level_tx_2_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_2_1_2">Nivel Rx</label>
                            <input type="text" id="level_rx_2_1_2" value="{{old('level_rx_2_1_2')}}" name="level_rx_2_1_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena remota</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_2_2">Altura antena</label>
                            <input type="text" id="antenna_height_2_2" value="{{old('antenna_height_2_2')}}" name="antenna_height_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_2_2">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_2_2" value="{{old('antenna_diameter_2_2')}}" name="antenna_diameter_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_2_2">Modelo de antena</label>
                            <input type="text" id="antenna_model_2_2" value="{{old('antenna_model_2_2')}}" name="antenna_model_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_2_2">Marca de antena</label>
                            <input type="text" id="antenna_brand_2_2" value="{{old('antenna_brand_2_2')}}" name="antenna_brand_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_2_2">Serial de la antena</label>
                            <input type="text" id="antenna_serial_2_2" value="{{old('antenna_serial_2_2')}}" name="antenna_serial_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_2_2">Azimuth</label>
                            <input type="text" id="azimuth_2_2" value="{{old('azimuth_2_2')}}" name="azimuth_2_2" class="form-control">
                        </div>
                    </div>
                    <h5>Polaridad vertical</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_tx_2_2_1">Nivel Tx</label>
                            <input type="text" id="level_tx_2_2_1" value="{{old('level_tx_2_2_1')}}" name="level_tx_2_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_2_2_1">Nivel Rx</label>
                            <input type="text" id="level_rx_2_2_1" value="{{old('level_rx_2_2_1')}}" name="level_rx_2_2_1" class="form-control">
                        </div>
                    </div>
                    <h5>Polaridad horizontal</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_tx_2_2_2">Nivel Tx</label>
                            <input type="text" id="level_tx_2_2_2" value="{{old('level_tx_2_2_2')}}" name="level_tx_2_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_2_2_2">Nivel Rx</label>
                            <input type="text" id="level_rx_2_2_2" value="{{old('level_rx_2_2_2')}}" name="level_rx_2_2_2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary"
                    data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{--  Model de enlace (SD)  --}}
<div class="modal fade" id="modalEnlaceMarked_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">
                    Enlace de configuración con diversidad de espacio (SD)<br>
                    <small>Aplica para instalaciones con configuración con diversidad de espacio (SD).</small>
                </h4>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group">
                    <label for="station_local_3">Estación base local</label>
                    <input type="text" id="station_local_3" value="{{old('station_local_3')}}" name="station_local_3" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_local_1">IP local</label>
                            <input type="text" id="ip_local_3" value="{{old('ip_local_3')}}" name="ip_local_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_local_3">ID local</label>
                            <input type="text" id="id_local_3" value="{{old('id_local_3')}}" name="id_local_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="local_frecuency_3">Frecuencia TX local</label>
                            <input type="text" id="local_frecuency_3" value="{{old('local_frecuency_3')}}" name="local_frecuency_3" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="station_remote_3">Estación base remota</label>
                    <input type="text" id="station_remote_3" value="{{old('station_remote_3')}}" name="station_remote_3" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="ip_remote_3">IP remota</label>
                            <input type="text" id="ip_remote_3" value="{{old('ip_remote_3')}}" name="ip_remote_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="id_remote_3">ID remota</label>
                            <input type="text" id="id_remote_3" value="{{old('id_remote_3')}}" name="id_remote_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="remote_frecuency_3">Frecuencia TX remota</label>
                            <input type="text" id="remote_frecuency_3" value="{{old('remote_frecuency_3')}}" name="remote_frecuency_3" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="equipment_brand_3">Marca de equipo</label>
                            <input type="text" id="equipment_brand_3" value="{{old('equipment_brand_3')}}" name="equipment_brand_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="equipment_model_3">Modelo de equipo</label>
                            <input type="text" id="equipment_model_3" value="{{old('equipment_model_3')}}" name="equipment_model_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="instalation_date_3">Fecha de instalación</label>
                            <input type="text" id="instalation_date_3" value="{{old('instalation_date_3')}}" name="instalation_date_3" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena local</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="polarity_3_1">Polaridad</label>
                            <input type="text" id="polarity_3_1" value="{{old('polarity_3_1')}}" name="polarity_3_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_3_1">Azimuth</label>
                            <input type="text" id="azimuth_3_1" value="{{old('azimuth_3_1')}}" name="azimuth_3_1" class="form-control">
                        </div>
                    </div>
                    <h5>Antena principal</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_3_1_1">Altura antena</label>
                            <input type="text" id="antenna_height_3_1_1" value="{{old('antenna_height_3_1_1')}}" name="antenna_height_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_3_1_1">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_3_1_1" value="{{old('antenna_diameter_3_1_1')}}" name="antenna_diameter_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_3_1_1">Modelo de antena</label>
                            <input type="text" id="antenna_model_3_1_1" value="{{old('antenna_model_3_1_1')}}" name="antenna_model_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_3_1_1">Marca de antena</label>
                            <input type="text" id="antenna_brand_3_1_1" value="{{old('antenna_brand_3_1_1')}}" name="antenna_brand_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_3_1_1">Serial de la antena</label>
                            <input type="text" id="antenna_serial_3_1_1" value="{{old('antenna_serial_3_1_1')}}" name="antenna_serial_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_tx_3_1_1">Nivel Tx</label>
                            <input type="text" id="level_tx_3_1_1" value="{{old('level_tx_3_1_1')}}" name="level_tx_3_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_3_1_1">Nivel Rx</label>
                            <input type="text" id="level_rx_3_1_1" value="{{old('level_rx_3_1_1')}}" name="level_rx_3_1_1" class="form-control">
                        </div>
                    </div>
                </div>
                <h5>Antena diversidad</h5>
                <div class="row">
                    <div class="col-md-4">
                        <label for="antenna_height_3_1_2">Altura antena</label>
                        <input type="text" id="antenna_height_3_1_2" value="{{old('antenna_height_3_1_2')}}" name="antenna_height_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_diameter_3_1_2">Diámetro Antena</label>
                        <input type="text" id="antenna_diameter_3_1_2" value="{{old('antenna_diameter_3_1_2')}}" name="antenna_diameter_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_model_3_1_2">Modelo de antena</label>
                        <input type="text" id="antenna_model_3_1_2" value="{{old('antenna_model_3_1_2')}}" name="antenna_model_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_brand_3_1_2">Marca de antena</label>
                        <input type="text" id="antenna_brand_3_1_2" value="{{old('antenna_brand_3_1_2')}}" name="antenna_brand_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_serial_3_1_2">Serial de la antena</label>
                        <input type="text" id="antenna_serial_3_1_2" value="{{old('antenna_serial_3_1_2')}}" name="antenna_serial_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="level_tx_3_1_2">Nivel Tx</label>
                        <input type="text" id="level_tx_3_1_2" value="{{old('level_tx_3_1_2')}}" name="level_tx_3_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="level_rx_3_1_2">Nivel Rx</label>
                        <input type="text" id="level_rx_3_1_2" value="{{old('level_rx_3_1_2')}}" name="level_rx_3_1_2" class="form-control">
                    </div>
                </div>
                <hr>
                <h5>Configuración antena remota</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="polarity_3_2">Polaridad</label>
                            <input type="text" id="polarity_3_2" value="{{old('polarity_3_2')}}" name="polarity_3_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_3_2">Azimuth</label>
                            <input type="text" id="azimuth_3_2" value="{{old('azimuth_3_2')}}" name="azimuth_3_2" class="form-control">
                        </div>
                    </div>
                    <h5>Antena principal</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_3_2_1">Altura antena</label>
                            <input type="text" id="antenna_height_3_2_1" value="{{old('antenna_height_3_2_1')}}" name="antenna_height_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_3_2_1">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_3_2_1" value="{{old('antenna_diameter_3_2_1')}}" name="antenna_diameter_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_3_2_1">Modelo de antena</label>
                            <input type="text" id="antenna_model_3_2_1" value="{{old('antenna_model_3_2_1')}}" name="antenna_model_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_3_2_1">Marca de antena</label>
                            <input type="text" id="antenna_brand_3_2_1" value="{{old('antenna_brand_3_2_1')}}" name="antenna_brand_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_3_2_1">Serial de la antena</label>
                            <input type="text" id="antenna_serial_3_2_1" value="{{old('antenna_serial_3_2_1')}}" name="antenna_serial_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_tx_3_2_1">Nivel Tx</label>
                            <input type="text" id="level_tx_3_2_1" value="{{old('level_tx_3_2_1')}}" name="level_tx_3_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_3_2_1">Nivel Rx</label>
                            <input type="text" id="level_rx_3_2_1" value="{{old('level_rx_3_2_1')}}" name="level_rx_3_2_1" class="form-control">
                        </div>
                    </div>
                    <h5>Antena diversidad</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_height_3_2_2">Altura antena</label>
                            <input type="text" id="antenna_height_3_2_2" value="{{old('antenna_height_3_2_2')}}" name="antenna_height_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_3_2_2">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_3_2_2" value="{{old('antenna_diameter_3_2_2')}}" name="antenna_diameter_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_3_2_2">Modelo de antena</label>
                            <input type="text" id="antenna_model_3_2_2" value="{{old('antenna_model_3_2_2')}}" name="antenna_model_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_3_2_2">Marca de antena</label>
                            <input type="text" id="antenna_brand_3_2_2" value="{{old('antenna_brand_3_2_2')}}" name="antenna_brand_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_3_2_2">Serial de la antena</label>
                            <input type="text" id="antenna_serial_3_2_2" value="{{old('antenna_serial_3_2_2')}}" name="antenna_serial_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_tx_3_2_2">Nivel Tx</label>
                            <input type="text" id="level_tx_3_2_2" value="{{old('level_tx_3_2_2')}}" name="level_tx_3_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_3_2_2">Nivel Rx</label>
                            <input type="text" id="level_rx_3_2_2" value="{{old('level_rx_3_2_2')}}" name="level_rx_3_2_2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary"
                    data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{--  Model de enlace XPIC (SD)  --}}
<div class="modal fade" id="modalEnlaceMarked_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración XPIC con diversidad de espacio (SD)<br>
                    <small>Aplica para instalaciones con configuración con XPIC con diversidad de espacio (SD)</small>
                </h4>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group">
                    <label for="station_local_4">Estación base local</label>
                    <input type="text" id="station_local_4" value="{{old('station_local_4')}}" name="station_local_4" class="form-control">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="ip_local_4">IP local</label>
                        <input type="text" id="ip_local_4" value="{{old('ip_local_4')}}" name="ip_local_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="id_local_4">ID local</label>
                        <input type="text" id="id_local_4" value="{{old('id_local_4')}}" name="id_local_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="local_frecuency_4">Frecuencia TX local</label>
                        <input type="text" id="local_frecuency_4" value="{{old('local_frecuency_4')}}" name="local_frecuency_4" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="station_remote_4">Estación base remota</label>
                    <input type="text" id="station_remote_4" value="{{old('station_remote_4')}}" name="station_remote_4" class="form-control">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="ip_remote_4">IP remota</label>
                        <input type="text" id="ip_remote_4" value="{{old('ip_remote_4')}}" name="ip_remote_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ip_remote_4">ID remota</label>
                        <input type="text" id="id_remote_4" value="{{old('id_remote_4')}}" name="id_remote_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="remote_frecuency_4">Frecuencia TX remota</label>
                        <input type="text" id="remote_frecuency_4" value="{{old('remote_frecuency_4')}}" name="remote_frecuency_4" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="equipment_brand_4">Marca de equipo</label>
                        <input type="text" id="equipment_brand_4" value="{{old('equipment_brand_4')}}" name="equipment_brand_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="equipment_model_4">Modelo de equipo</label>
                        <input type="text" id="equipment_model_4" value="{{old('equipment_model_4')}}" name="equipment_model_4" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="instalation_date_4">Fecha de instalación</label>
                        <input type="text" id="instalation_date_4" value="{{old('instalation_date_4')}}" name="instalation_date_4" class="form-control">
                    </div>
                </div>
                <hr>
                <h3>Configuración antena local</h3>
                <div class="form-group">
                    <label for="azimuth_4_1">Azimuth</label>
                    <input type="text" id="azimuth_4_1" value="{{old('azimuth_4_1')}}" name="azimuth_4_1" class="form-control">
                </div>
                <hr>
                <h4>Antena principal</h4>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="antenna_height_4_1">Altura antena</label>
                        <input type="text" id="antenna_height_4_1" value="{{old('antenna_height_4_1')}}" name="antenna_height_4_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_diameter_4_1">Diámetro Antena</label>
                        <input type="text" id="antenna_diameter_4_1" value="{{old('antenna_diameter_4_1')}}" name="antenna_diameter_4_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_model_4_1">Modelo de antena</label>
                        <input type="text" id="antenna_model_4_1" value="{{old('antenna_model_4_1')}}" name="antenna_model_4_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_brand_4_1">Marca de antena</label>
                        <input type="text" id="antenna_brand_4_1" value="{{old('antenna_brand_4_1')}}" name="antenna_brand_4_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_serial_4_1">Serial de la antena</label>
                        <input type="text" id="antenna_serial_4_1" value="{{old('antenna_serial_4_1')}}" name="antenna_serial_4_1" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Polaridad vertical</h5>
                        <div class="form-group">
                            <label for="level_tx_4_1_1">Nivel Tx</label>
                            <input type="text" id="level_tx_4_1_1" value="{{old('level_tx_4_1_1')}}" name="level_tx_4_1_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4">Nivel Rx</label>
                            <input type="text" id="level_rx_4_1_1" value="{{old('level_rx_4_1_1')}}" name="level_rx_4_1_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Polaridad horizontal</h5>
                        <div class="form-group">
                            <label for="level_tx_4_1_2">Nivel Tx</label>
                            <input type="text" id="level_tx_4_1_2" value="{{old('level_tx_4_1_2')}}" name="level_tx_4_1_2" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="level_rx_4_1_2">Nivel Rx</label>
                            <input type="text" id="level_rx_4_1_2" value="{{old('level_rx_4_1_2')}}" name="level_rx_4_1_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Antena Diversidad</h4>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label for="antenna_height_4_1_2">Altura antena</label>
                        <input type="text" id="antenna_height_4_1_2" value="{{old('antenna_height_4_1_2')}}" name="antenna_height_4_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_diameter_4_1_2">Diámetro Antena</label>
                        <input type="text" id="antenna_diameter_4_1_2" value="{{old('antenna_diameter_4_1_2')}}" name="antenna_diameter_4_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_model_4_1_2">Modelo de antena</label>
                        <input type="text" id="antenna_model_4_1_2" value="{{old('antenna_model_4_1_2')}}" name="antenna_model_4_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_brand_4_1_2">Marca de antena</label>
                        <input type="text" id="antenna_brand_4_1_2" value="{{old('antenna_brand_4_1_2')}}" name="antenna_brand_4_1_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_serial_4_1_2">Serial de la antena</label>
                        <input type="text" id="antenna_serial_4_1_2" value="{{old('antenna_serial_4_1_2')}}" name="antenna_serial_4_1_2" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Polaridad vertical</h5>
                        <div class="form-group">
                            <label for="level_tx_4_1_2_1">Nivel Tx</label>
                            <input type="text" id="level_tx_4_1_2_1" value="{{old('level_tx_4_1_2_1')}}" name="level_tx_4_1_2_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4">Nivel Rx</label>
                            <input type="text" id="level_rx_4_1_2_1" value="{{old('level_rx_4_1_2_1')}}" name="level_rx_4_1_2_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Polaridad horizontal</h5>
                        <div class="form-group">
                            <label for="level_tx_4_1_2_2">Nivel Tx</label>
                            <input type="text" id="level_tx_4_1_2_2" value="{{old('level_tx_4_1_2_2')}}" name="level_tx_4_1_2_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4_1_2_2">Nivel Rx</label>
                            <input type="text" id="level_rx_4_1_2_2" value="{{old('level_rx_4_1_2_2')}}" name="level_rx_4_1_2_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Configuración antena remota</h3>
                <div class="form-group">
                    <label for="azimuth_4_2">Azimuth</label>
                    <input type="text" id="azimuth_4_2" value="{{old('azimuth_4_2')}}" name="azimuth_4_2" class="form-control">
                </div>
                <hr>
                <h4>Antena principal</h4>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="antenna_height_4_2">Altura antena</label>
                        <input type="text" id="antenna_height_4_2" value="{{old('antenna_height_4_2')}}" name="antenna_height_4_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_diameter_4_2">Diámetro Antena</label>
                        <input type="text" id="antenna_diameter_4_2" value="{{old('antenna_diameter_4_2')}}" name="antenna_diameter_4_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_model_4_2">Modelo de antena</label>
                        <input type="text" id="antenna_model_4_2" value="{{old('antenna_model_4_2')}}" name="antenna_model_4_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_brand_4_2">Marca de antena</label>
                        <input type="text" id="antenna_brand_4_2" value="{{old('antenna_brand_4_2')}}" name="antenna_brand_4_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_serial_4_2">Serial de la antena</label>
                        <input type="text" id="antenna_serial_4_2" value="{{old('antenna_serial_4_2')}}" name="antenna_serial_4_2" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Polaridad vertical</h5>
                        <div class="form-group">
                            <label for="level_tx_4_2_1">Nivel Tx</label>
                            <input type="text" id="level_tx_4_2_1" value="{{old('level_tx_4_2_1')}}" name="level_tx_4_2_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4_2_1">Nivel Rx</label>
                            <input type="text" id="level_rx_4_2_1" value="{{old('level_rx_4_2_1')}}" name="level_rx_4_2_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Polaridad horizontal</h5>
                        <div class="form-group">
                            <label for="level_tx_4_2_2">Nivel Tx</label>
                            <input type="text" id="level_tx_4_2_2" value="{{old('level_tx_4_2_2')}}" name="level_tx_4_2_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4_2_2">Nivel Rx</label>
                            <input type="text" id="level_rx_4_2_2" value="{{old('level_rx_4_2_2')}}" name="level_rx_4_2_2" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Antena Diversidad</h4>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="antenna_height_4_2_2">Altura antena</label>
                        <input type="text" id="antenna_height_4_2_2" value="{{old('antenna_height_4_2_2')}}" name="antenna_height_4_2_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_diameter_4_2_2">Diámetro Antena</label>
                        <input type="text" id="antenna_diameter_4_2_2" value="{{old('antenna_diameter_4_2_2')}}" name="antenna_diameter_4_2_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_model_4_2_2">Modelo de antena</label>
                        <input type="text" id="antenna_model_4_2_2" value="{{old('antenna_model_4_2_2')}}" name="antenna_model_4_2_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_brand_4_2_2">Marca de antena</label>
                        <input type="text" id="antenna_brand_4_2_2" value="{{old('antenna_brand_4_2_2')}}" name="antenna_brand_4_2_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="antenna_serial_4_2_2">Serial de la antena</label>
                        <input type="text" id="antenna_serial_4_2_2" value="{{old('antenna_serial_4_2_2')}}" name="antenna_serial_4_2_2" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Polaridad vertical</h5>
                        <div class="form-group">
                            <label for="level_tx_4_2_2_1">Nivel Tx</label>
                            <input type="text" id="level_tx_4_2_2_1" value="{{old('level_tx_4_2_2_1')}}" name="level_tx_4_2_2_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4_2_2_1">Nivel Rx</label>
                            <input type="text" id="level_rx_4_2_2_1" value="{{old('level_rx_4_2_2_1')}}" name="level_rx_4_2_2_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Polaridad horizontal</h5>
                        <div class="form-group">
                            <label for="level_tx_4_2_2_2">Nivel Tx</label>
                            <input type="text" id="level_tx_4_2_2_2" value="{{old('level_tx_4_2_2_2')}}" name="level_tx_4_2_2_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level_rx_4_2_2_2">Nivel Rx</label>
                            <input type="text" id="level_rx_4_2_2_2" value="{{old('level_rx_4_2_2_2')}}" name="level_rx_4_2_2_2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{--  Model de enlace N+1 XPIC  --}}
<div class="modal fade" id="modalEnlaceMarked_5" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Enlace de configuración N+1 XPIC<br>
                    <small>Aplica para instalaciones con configuración N+1 XPIC</small>
                </h4>
            </div>
            <div class="modal-body table-responsive">
                <div class="form-group">
                    <label for="station_local_5">Estación base local</label>
                    <input type="text" id="station_local_5" value="{{old('station_local_5')}}" name="station_local_5" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ip_local_5">IP local</label>
                            <input type="text" id="ip_local_5" value="{{old('ip_local_5')}}" name="ip_local_5" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="id_local_5">ID local</label>
                            <input type="text" id="id_local_5" value="{{old('id_local_5')}}" name="id_local_5" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="station_remota_5">Estación base remota</label>
                    <input type="text" id="station_remota_5" value="{{old('station_remota_5')}}" name="station_remota_5" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ip_remote_5">IP remota</label>
                            <input type="text" id="ip_remote_5" value="{{old('ip_remote_5')}}" name="ip_remote_5" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="id_remote_5">ID remota</label>
                            <input type="text" id="id_remote_5" value="{{old('id_remote_5')}}" name="id_remote_5" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="equipment_brand_5">Marca de equipo</label>
                            <input type="text" id="equipment_brand_5" value="{{old('equipment_brand_5')}}" name="equipment_brand_5" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="equipment_model_5">Modelo de equipo</label>
                            <input type="text" id="equipment_model_5" value="{{old('equipment_model_5')}}" name="equipment_model_5" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="instalation_date_5">Fecha de instalación</label>
                            <input type="text" id="instalation_date_5" value="{{old('instalation_date_5')}}" name="instalation_date_5" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena local</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_heigth_5_1">Altura antena</label>
                            <input type="text" id="antenna_heigth_5_1" value="{{old('antenna_heigth_5_1')}}" name="antenna_heigth_5_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_5_1">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_5_1" value="{{old('antenna_diameter_5_1')}}" name="antenna_diameter_5_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_5_1">Modelo de antena</label>
                            <input type="text" id="antenna_model_5_1" value="{{old('antenna_model_5_1')}}" name="antenna_model_5_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_5_1">Marca de antena</label>
                            <input type="text" id="antenna_brand_5_1" value="{{old('antenna_brand_5_1')}}" name="antenna_brand_5_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_5_1">Serial de la antena</label>
                            <input type="text" id="antenna_serial_5_1" value="{{old('antenna_serial_5_1')}}" name="antenna_serial_5_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_5_1">Azimuth</label>
                            <input type="text" id="azimuth_5_1" value="{{old('azimuth_5_1')}}" name="azimuth_5_1" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="frecuency_5_1_1">Frecuencia Tx 1</label>
                            <input type="text" id="frecuency_5_1_1" value="{{old('frecuency_5_1_1')}}" name="frecuency_5_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="frecuency_5_1_2">Frecuencia Tx 2</label>
                            <input type="text" id="frecuency_5_1_2" value="{{old('frecuency_5_1_2')}}" name="frecuency_5_1_2" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_5_1_1">Nivel Tx 1</label>
                            <input type="text" id="level_5_1_1" value="{{old('level_5_1_1')}}" name="level_5_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_1_2">Nivel Tx 2</label>
                            <input type="text" id="level_5_1_2" value="{{old('level_5_1_2')}}" name="level_5_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_1_3">Nivel Tx 3</label>
                            <input type="text" id="level_5_1_3" value="{{old('level_5_1_3')}}" name="level_5_1_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_1_4">Nivel Tx Stand By</label>
                            <input type="text" id="level_5_1_4" value="{{old('level_5_1_4')}}" name="level_5_1_4" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="frecuency_rx_5_1_1">Frecuencia Rx 1</label>
                            <input type="text" id="frecuency_rx_5_1_1" value="{{old('frecuency_rx_5_1_1')}}" name="frecuency_rx_5_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="frecuency_rx_5_1_2">Frecuencia Rx 2</label>
                            <input type="text" id="frecuency_rx_5_1_2" value="{{old('frecuency_rx_5_1_2')}}" name="frecuency_rx_5_1_2" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_rx_5_1_1">Nivel Rx 1</label>
                            <input type="text" id="level_rx_5_1_1" value="{{old('level_rx_5_1_1')}}" name="level_rx_5_1_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_1_2">Nivel Rx 2</label>
                            <input type="text" id="level_rx_5_1_2" value="{{old('level_rx_5_1_2')}}" name="level_rx_5_1_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_1_3">Nivel Rx 3</label>
                            <input type="text" id="level_rx_5_1_3" value="{{old('level_rx_5_1_3')}}" name="level_rx_5_1_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_1_4">Nivel Rx Stand By</label>
                            <input type="text" id="level_rx_5_1_4" value="{{old('level_rx_5_1_4')}}" name="level_rx_5_1_4" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Configuración antena remota</h5>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="antenna_heigth_5_2">Altura antena</label>
                            <input type="text" id="antenna_heigth_5_2" value="{{old('antenna_heigth_5_2')}}" name="antenna_heigth_5_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_diameter_5_2">Diámetro Antena</label>
                            <input type="text" id="antenna_diameter_5_2" value="{{old('antenna_diameter_5_2')}}" name="antenna_diameter_5_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_model_5_2">Modelo de antena</label>
                            <input type="text" id="antenna_model_5_2" value="{{old('antenna_model_5_2')}}" name="antenna_model_5_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_brand_5_2">Marca de antena</label>
                            <input type="text" id="antenna_brand_5_2" value="{{old('antenna_brand_5_2')}}" name="antenna_brand_5_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="antenna_serial_5_2">Serial de la antena</label>
                            <input type="text" id="antenna_serial_5_2" value="{{old('antenna_serial_5_2')}}" name="antenna_serial_5_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="azimuth_5_2">Azimuth</label>
                            <input type="text" id="azimuth_5_2" value="{{old('azimuth_5_2')}}" name="azimuth_5_2" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="frecuency_5_2_1">Frecuencia Tx 1</label>
                            <input type="text" id="frecuency_5_2_1" value="{{old('frecuency_5_2_1')}}" name="frecuency_5_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="frecuency_5_2_2">Frecuencia Tx 2</label>
                            <input type="text" id="frecuency_5_2_2" value="{{old('frecuency_5_2_2')}}" name="frecuency_5_2_2" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_5_2_1">Nivel Tx 1</label>
                            <input type="text" id="level_5_2_1" value="{{old('level_5_2_1')}}" name="level_5_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_2_2">Nivel Tx 2</label>
                            <input type="text" id="level_5_2_2" value="{{old('level_5_2_2')}}" name="level_5_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_2_3">Nivel Tx 3</label>
                            <input type="text" id="level_5_2_3" value="{{old('level_5_2_3')}}" name="level_5_2_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_5_2_4">Nivel Tx Stand By</label>
                            <input type="text" id="level_5_2_4" value="{{old('level_5_2_4')}}" name="level_5_2_4" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="frecuency_rx_5_2_1">Frecuencia Rx 1</label>
                            <input type="text" id="frecuency_rx_5_2_1" value="{{old('frecuency_rx_5_2_1')}}" name="frecuency_rx_5_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="frecuency_rx_5_2_2">Frecuencia Rx 2</label>
                            <input type="text" id="frecuency_rx_5_2_2" value="{{old('frecuency_rx_5_2_2')}}" name="frecuency_rx_5_2_2" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="level_rx_5_2_1">Nivel Rx 1</label>
                            <input type="text" id="level_rx_5_2_1" value="{{old('level_rx_5_2_1')}}" name="level_rx_5_2_1" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_2_2">Nivel Rx 2</label>
                            <input type="text" id="level_rx_5_2_2" value="{{old('level_rx_5_2_2')}}" name="level_rx_5_2_2" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_2_3">Nivel Rx 3</label>
                            <input type="text" id="level_rx_5_2_3" value="{{old('level_rx_5_2_3')}}" name="level_rx_5_2_3" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="level_rx_5_2_4">Nivel Rx Stand By</label>
                            <input type="text" id="level_rx_5_2_4" value="{{old('level_rx_5_2_4')}}" name="level_rx_5_2_4" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
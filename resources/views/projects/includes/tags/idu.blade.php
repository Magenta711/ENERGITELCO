<h4>Planeación marquillas IDU Estaciones base</h4>
<div class="row">
    <div class="col-md-2">
        <button type="button" data-toggle="modal" data-target="#modalMarkedEB1" class="btn btn-sm btn-success">Estación base 1</button>
    </div>
    <div class="col-md-2">
        <button type="button" data-toggle="modal" data-target="#modalMarkedEB2" class="btn btn-sm btn-success">Estación base 2</button>
    </div>
</div>
{{--  Modal marquilla estacion base 1  --}}
<div class="modal fade" id="modalMarkedEB1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla IDU estación base 1</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="station_local_10">Estación base local</label>
                            <input type="text" value="{{old('station_local_10')}}" name="station_local_10" id="station_local_10" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="station_remote_10">Estación base remota</label>
                            <input type="text" value="{{old('station_remote_10')}}" name="station_remote_10" id="station_remote_10" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="equipment_brand_10">Marca</label>
                        <input type="text" value="{{old('equipment_brand_10')}}" name="equipment_brand_10" id="equipment_brand_10" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="equipment_model_10">Modelo</label>
                        <input type="text" value="{{old('equipment_model_10')}}" name="equipment_model_10" id="equipment_model_10" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Gestión</h4>
                <p>Equipo a instalar</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="card_10_1">Targeta</label>
                        <input type="text" value="{{old('card_10_1')}}" name="card_10_1" id="card_10_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_10_1">Slot</label>
                        <input type="text" value="{{old('slot_10_1')}}" name="slot_10_1" id="slot_10_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_10_1">Puerto o DDF#</label>
                        <input type="text" value="{{old('ddf_10_1')}}" name="ddf_10_1" id="ddf_10_1" class="form-control">
                    </div>
                </div>
                <p>Equipo de donde se toma la gestión</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="destination_equipment_10">Equipo destino [Nemónico E.B-ID local]</label>
                        <input type="text" value="{{old('destination_equipment_10')}}" name="destination_equipment_10" id="destination_equipment_10" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="remote_management_10">E.B. Remota de gestión</label>
                        <input type="text" value="{{old('remote_management_10')}}" name="remote_management_10" id="remote_management_10" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="card_10_2">Targeta</label>
                        <input type="text" value="{{old('card_10_2')}}" name="card_10_2" id="card_10_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_10_2">Slot</label>
                        <input type="text" value="{{old('slot_10_2')}}" name="slot_10_2" id="slot_10_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_10_2">Puerto o DDF#</label>
                        <input type="text" value="{{old('ddf_10_2')}}" name="ddf_10_2" id="ddf_10_2" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Energía</h4>
                <p>Equipo a instalar</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_10_1">Posición Main (-48)</label>
                        <input type="text" class="form-control" name="main_position_10" id="main_position_10" value="{{old('main_position_10')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="pdb_10_1">PDB</label>
                        <input type="text" class="form-control" name="pdb_10_1" id="pdb_10_1" value="{{old('pdb_10_1')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_10_2">Posición Main (+0)</label>
                        <input type="text" class="form-control" name="main_position_10_2" id="main_position_10_2" value="{{old('main_position_10_2')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="stand_by_10_2">Posición Stand By (-48)</label>
                        <input type="text" class="form-control" name="stand_by_10_1" id="stand_by_10_1" value="{{old('stand_by_10_1')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="pdb_10_2">PDB</label>
                        <input type="text" class="form-control" name="pdb_10_2" id="pdb_10_2" value="{{old('pdb_10_2')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="stand_by_10_2">Posición Stand By (+0)</label>
                        <input type="text" class="form-control" name="stand_by_10_2" id="stand_by_10_2" value="{{old('stand_by_10_2')}}" inputmode="">
                    </div>
                </div>
                <hr>
                <h4>Hilo de drenaje</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_10_3">Posición Main (+0)</label>
                        <input type="text" class="form-control" name="main_position_10_3" id="main_position_10_3" value="{{old('main_position_10_3')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="stand_by_10_3">Posición Stand By (-48)</label>
                        <input type="text" class="form-control" name="stand_by_10_3" id="stand_by_10_3" value="{{old('stand_by_10_3')}}" inputmode="">
                    </div>
                </div>
                <hr>
                <h4>Marquillas E1 / Fibra / ETH</h4>
                <p>Estilo a instalar</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="card_10_3">Targeta</label>
                        <input type="text" name="card_10_3" id="card_10_3" value="{{old('card_10_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_10_3">Slot</label>
                        <input type="text" name="slot_10_3" id="slot_10_3" value="{{old('slot_10_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_10_3">Puerto o DDF#</label>
                        <input type="text" name="ddf_10_3" id="ddf_10_3" value="{{old('ddf_10_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="e1_10_3">E1 #</label>
                        <input type="text" name="e1_10_3" id="e1_10_3" value="{{old('e1_10_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="txrx_10_3">TxRx</label>
                        <input type="text" name="txrx_10_3" id="txrx_10_3" value="{{old('txrx_10_3')}}" class="form-control">
                    </div>
                </div>
                <p>Equipo a donde se conecta</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="destination_equipment_10_4">Equipo destino [Nemónico E.B-ID local]</label>
                        <input type="text" name="destination_equipment_10_4" id="destination_equipment_10_4" value="{{old('destination_equipment_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="remote_connection_10_4">E.B. Remota de conexión</label>
                        <input type="text" name="remote_connection_10_4" id="remote_connection_10_4" value="{{old('remote_connection_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="card_10_4">Targeta</label>
                        <input type="text" name="card_10_4" id="card_10_4" value="{{old('card_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_10_4">Slot</label>
                        <input type="text" name="slot_10_4" id="slot_10_4" value="{{old('slot_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_10_4">Puerto o DDF#</label>
                        <input type="text" name="ddf_10_4" id="ddf_10_4" value="{{old('ddf_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="e1_10_4">E1 #</label>
                        <input type="text" name="e1_10_4" id="e1_10_4" value="{{old('e1_10_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="txrx_10_4">TxRx</label>
                        <input type="text" name="txrx_10_4" id="txrx_10_4" value="{{old('txrx_10_4')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
{{--  Modal marquilla estacion base 2  --}}
<div class="modal fade" id="modalMarkedEB2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla IDU estación base 2</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="station_local_11">Estación base local</label>
                            <input type="text" value="{{old('station_local_11')}}" name="station_local_11" id="station_local_11" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="station_remote_11">Estación base remota</label>
                            <input type="text" value="{{old('station_remote_11')}}" name="station_remote_11" id="station_remote_11" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="equipment_brand_11">Marca</label>
                        <input type="text" value="{{old('equipment_brand_11')}}" name="equipment_brand_11" id="equipment_brand_11" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="equipment_model_11">Modelo</label>
                        <input type="text" value="{{old('equipment_model_11')}}" name="equipment_model_11" id="equipment_model_11" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Gestión</h4>
                <p>Equipo a instalar</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="card_11_1">Targeta</label>
                        <input type="text" value="{{old('card_11_1')}}" name="card_11_1" id="card_11_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_11_1">Slot</label>
                        <input type="text" value="{{old('slot_11_1')}}" name="slot_11_1" id="slot_11_1" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_11_1">Puerto o DDF#</label>
                        <input type="text" value="{{old('ddf_11_1')}}" name="ddf_11_1" id="ddf_11_1" class="form-control">
                    </div>
                </div>
                <p>Equipo de donde se toma la gestión</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="destination_equipment_11">Equipo destino [Nemónico E.B-ID local]</label>
                        <input type="text" value="{{old('destination_equipment_11')}}" name="destination_equipment_11" id="destination_equipment_11" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="remote_management_11">E.B. Remota de gestión</label>
                        <input type="text" value="{{old('remote_management_11')}}" name="remote_management_11" id="remote_management_11" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="card_11_2">Targeta</label>
                        <input type="text" value="{{old('card_11_2')}}" name="card_11_2" id="card_11_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_11_2">Slot</label>
                        <input type="text" value="{{old('slot_11_2')}}" name="slot_11_2" id="slot_11_2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_11_2">Puerto o DDF#</label>
                        <input type="text" value="{{old('ddf_11_2')}}" name="ddf_11_2" id="ddf_11_2" class="form-control">
                    </div>
                </div>
                <hr>
                <h4>Energía</h4>
                <p>Equipo a instalar</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_11_1">Posición Main (-48)</label>
                        <input type="text" class="form-control" name="main_position_11" value="{{old('main_position_11')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="pdb_11_1">PDB</label>
                        <input type="text" class="form-control" name="pdb_11_1" value="{{old('pdb_11_1')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_11_2">Posición Main (+0)</label>
                        <input type="text" class="form-control" name="main_position_11_2" value="{{old('main_position_11_2')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="stand_by_11_2">Posición Stand By (-48)</label>
                        <input type="text" class="form-control" name="stand_by_11_1" value="{{old('stand_by_11_1')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="pdb_11_2">PDB</label>
                        <input type="text" class="form-control" name="pdb_11_2" value="{{old('pdb_11_2')}}" inputmode="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="stand_by_11_2">Posición Stand By (+0)</label>
                        <input type="text" class="form-control" name="stand_by_11_2" value="{{old('stand_by_11_2')}}" inputmode="">
                    </div>
                </div>
                <hr>
                <h4>Hilo de drenaje</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="main_position_11_3">Posición Main (+0)</label>
                        <input type="text" class="form-control" name="main_position_11_3" value="{{old('main_position_11_3')}}" inputmode="">
                    </div>
                    <div class="col-md-6">
                        <label for="stand_by_11_3">Posición Stand By (-48)</label>
                        <input type="text" class="form-control" name="stand_by_11_3" value="{{old('stand_by_11_3')}}" inputmode="">
                    </div>
                </div>
                <hr>
                <h4>Marquillas E1 / Fibra / ETH</h4>
                <p>Estilo a instalar</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="card_11_3">Targeta</label>
                        <input type="text" name="card_11_3" id="card_11_3" value="{{old('card_11_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_11_3">Slot</label>
                        <input type="text" name="slot_11_3" id="slot_11_3" value="{{old('slot_11_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_11_3">Puerto o DDF#</label>
                        <input type="text" name="ddf_11_3" id="ddf_11_3" value="{{old('ddf_11_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="e1_11_3">E1 #</label>
                        <input type="text" name="e1_11_3" id="e1_11_3" value="{{old('e1_11_3')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="txrx_11_3">TxRx</label>
                        <input type="text" name="txrx_11_3" id="txrx_11_3" value="{{old('txrx_11_3')}}" class="form-control">
                    </div>
                </div>
                <p>Equipo a donde se conecta</p>
                <div class="row">
                    <div class="col-md-6">
                        <label for="destination_equipment_11_4">Equipo destino [Nemónico E.B-ID local]</label>
                        <input type="text" name="destination_equipment_11_4" id="destination_equipment_11_4" value="{{old('destination_equipment_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="remote_connection_11_4">E.B. Remota de conexión</label>
                        <input type="text" name="remote_connection_11_4" id="remote_connection_11_4" value="{{old('remote_connection_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="card_11_4">Targeta</label>
                        <input type="text" name="card_11_4" id="card_11_4" value="{{old('card_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="slot_11_4">Slot</label>
                        <input type="text" name="slot_11_4" id="slot_11_4" value="{{old('slot_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ddf_11_4">Puerto o DDF#</label>
                        <input type="text" name="ddf_11_4" id="ddf_11_4" value="{{old('ddf_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="e1_11_4">E1 #</label>
                        <input type="text" name="e1_11_4" id="e1_11_4" value="{{old('e1_11_4')}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="txrx_11_4">TxRx</label>
                        <input type="text" name="txrx_11_4" id="txrx_11_4" value="{{old('txrx_11_4')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
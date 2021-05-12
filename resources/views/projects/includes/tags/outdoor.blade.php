<h4>Planeación marquillas OUTDOOR</h4>
<div class="row">
    <div class="col-md-2">
        <button type="button" data-toggle="modal" data-target="#modalMarkedOutdoor" class="btn btn-sm btn-success">Planeación de marquilla OUTDOOR</button>
    </div>
</div>
{{--  Modal marquilla outdoor  --}}
<div class="modal fade" id="modalMarkedOutdoor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLongTitle">Planeación de marquilla OUTDOOR</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="radio_model_20">Modelo de radio</label>
                            <input type="text" name="radio_model_20" id="radio_model_20" value="{{old('radio_model_20')}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="band_20">Banda</label>
                            <input type="text" name="band_20" id="band_20" value="{{old('band_20')}}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="polarity_20">Polaridad</label>
                            <input type="text" name="polarity_20" id="polarity_20" value="{{old('polarity_20')}}" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="station_20_1">Estación A</label>
                            <input type="text" name="station_20_1" id="station_20_1" value="{{old('station_20_1')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="azimuth_20_1">Azimuth A</label>
                            <input type="text" name="azimuth_20_1" id="azimuth_20_1" value="{{old('azimuth_20_1')}}" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="station_20_2">Estación B</label>
                            <input type="text" name="station_20_2" id="station_20_2" value="{{old('station_20_2')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="azimuth_20_2">Azimuth B</label>
                            <input type="text" name="azimuth_20_2" id="azimuth_20_2" value="{{old('azimuth_20_2')}}" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <h4>Cantidad de marquillas Estación base 1</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="amount_20_1_1">IF MAIN</label>
                            <input type="number" name="amount_20_1_1" id="amount_20_1_1" value="{{old('amount_20_1_1')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_1_2">IF STAND BY</label>
                            <input type="number" name="amount_20_1_2" id="amount_20_1_2" value="{{old('amount_20_1_2')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_1_3">OUD MAIN - GND</label>
                            <input type="number" name="amount_20_1_3" id="amount_20_1_3" value="{{old('amount_20_1_3')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_1_4">ODU STAND BY - GND</label>
                            <input type="number" name="amount_20_1_4" id="amount_20_1_4" value="{{old('amount_20_1_4')}}" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <h4>Cantidad de marquillas Estación base 2</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="amount_20_2_1">IF MAIN</label>
                            <input type="number" name="amount_20_2_1" id="amount_20_2_1" value="{{old('amount_20_2_1')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_2_2">IF STAND BY</label>
                            <input type="number" name="amount_20_2_2" id="amount_20_2_2" value="{{old('amount_20_2_2')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_2_3">OUD MAIN - GND</label>
                            <input type="number" name="amount_20_2_3" id="amount_20_2_3" value="{{old('amount_20_2_3')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="amount_20_2_4">ODU STAND BY - GND</label>
                            <input type="number" name="amount_20_2_4" id="amount_20_2_4" value="{{old('amount_20_2_4')}}" class="form-control">
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
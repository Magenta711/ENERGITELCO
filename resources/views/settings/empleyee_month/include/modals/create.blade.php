<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{route('setting_empleyee_month_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLongTitle">Crear empleado del mes</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="month">Mes</label>
                                <input type="month" name="month" id="month" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">Secciona el funcionario</label>
                                <select name="user_id" id="user_id" class="form-control user_select">
                                    <option disabled selected></option>
                                    @foreach ($users as $item)
                                        <option value="{{$item->id}}" file_data="{{$item->foto}}">{{$item->cedula}} {{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="file_create">Avatar</label><br>
                                <div class="text-center mb-3" style="padding: 10px; width: 100%">
                                    <img src="" alt="" width="40%" id="preimg_create">
                                </div>
                                <label for="file_create" class="form-control text-center"><i class="fa fa-upload"></i></label>
                                <input type="file" name="file" id="file_create" class="hide">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary btn-send">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>